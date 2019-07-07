<?php
if ( !class_exists('MHSettings') ) {
    class MHSettings {
        private $pluginAlias;
        private $pluginTitle;
        private $pluginAbbrev;

        /**
         * @var MHCommon
         */
        private $common;

        public function __construct($pluginAlias, $pluginAbbrev, $pluginTitle, $pluginBaseFile, $common) {
            $this->pluginAlias = $pluginAlias;
            $this->pluginAbbrev = $pluginAbbrev;
            $this->pluginTitle = $pluginTitle;
            $this->pluginBaseFile = $pluginBaseFile;
            $this->common = $common;

            // do hooks and filters
            add_filter('plugin_action_links_' . plugin_basename($pluginBaseFile), array($this, 'settings_plugin_links') );
            add_action('admin_menu', array($this, 'settings_menu'), 59 );
            add_filter("mh_{$pluginAbbrev}_setting_value", array($this, 'get_option'));
            add_filter("mh_{$pluginAbbrev}_all_options", array($this, 'all_options'));
        }

        public function settings_menu() {
            $title = str_replace('WooCommerce ', '', $this->common->getPluginTitle());

            add_submenu_page(
                'woocommerce',
                $title,
                $title,
                'manage_woocommerce',
                $this->pluginAlias,
                array($this, 'settings_page')
            );
        }

        public function settings_plugin_links($links) {
            $action_links = array(
                'settings' => sprintf('<a href="%s">%s</a>', $this->admin_url(), __('Settings', 'woocommerce')),
            );
    
            return array_merge( $action_links, $links );
        }
        
        public function settings_save() {
            $opts = $this->merge_settings_post();
    
            // treat boolean values
            foreach ( $this->default_settings() as $name => $val ) {
                if ( isset($opts[$name]) && isset($_POST[$name]) && in_array($val, array('yes', 'no'))) {
                    $opts[$name] = ( !empty($_POST[$name]) ? 'yes' : 'no' );
                }
            }
    
            update_option($this->pluginAbbrev . '_settings', $opts);
        }
        
        public function merge_settings_post() {
            $defaultSettings = $this->default_settings();
            $allOptions = $this->all_options();
    
            foreach ( $_POST as $key => $val ) {
                if ( in_array($key, array_keys($defaultSettings)) ) {
                    if ( is_numeric($defaultSettings[$key]) ) {
                        $allOptions[$key] = (int) sanitize_text_field($val);
                    }
                    else {
                        $allOptions[$key] = sanitize_text_field($val);
                    }
                }
            }
    
            return $allOptions;
        }
        
        public function save_option($option, $value) {
            $opts = $this->all_options();
            $opts[$option] = $value;
    
            update_option($this->pluginAbbrev . '_settings', $opts);
        }
        
        public function all_options() {
            return array_merge($this->default_settings(),
                               get_option($this->pluginAbbrev . '_settings',
                               array()));
        }
        
        public function get_option($name) {
            $options = $this->all_options();
            $value = isset($options[$name]) ? $options[$name] : null;
    
            return $value;
        }
    
        public function admin_url() {
            return admin_url('admin.php?page=' . $this->pluginAlias);
        }
        
        public function admin_url_current() {
            return $this->tab_url($this->active_tab());
        }
    
        public function tab_url($tab) {
            return $this->admin_url().'&tab='.$tab;
        }

        public function tab_premium_url() {
            return $this->tab_url('tab-buy.php');
        }
    
        public function setting_tab($tab, $label) {
            $class = ($tab == $this->active_tab()) ? 'nav-tab-active' : '';
            $tab = '<a href="'. $this->tab_url($tab) . '" class="nav-tab '.$class.'">'.$label.'</a>';
    
            return $tab;
        }
    
        public function active_tab() {
            $tab = basename(sanitize_file_name( isset($_GET['tab']) ? $_GET['tab'] : null ));
    
            if ( preg_match('/^tab-(.*)$/', $tab) ) {
                return $tab;
            }
    
            return 'tab-general.php';
        }
        
        public function admin_tab() {
            return esc_attr(str_replace('.php', '', $this->active_tab()));
        }
        
        public function settings_page() {
            if ( !current_user_can( 'manage_woocommerce' ) ) {
                exit("invalid permissions");
            }
    
            // Save settings if data has been posted
            if ( ! empty( $_POST ) && check_admin_referer('mh_nonce') ) {
    
                if ( sanitize_text_field($_POST['save']) == __( 'Save settings' ) ) {
                    $this->settings_save();
                }
                else if ( sanitize_text_field($_POST['save']) == __( 'Reset all settings' ) ) {
                    update_option($this->pluginAbbrev . '_settings', $this->default_settings());
                }
            }
            
            $this->enqueue_admin_scripts();

            $title = $this->common->getPluginTitle();
            $displayPremiumTab = ( !$this->common->isPremiumVersion() && $this->has_premium_features() );

            ?>
            <div class="wrap">
                <div class="icon32">
                <br />
                </div>
                <h2 class="nav-tab-wrapper">
                    <?php echo $title; ?>
                    </h2>
                <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
                    <?php foreach ( $this->build_tabs() as $name => $label ): ?>
                        <?php echo $this->setting_tab($name, $label) ?>
                    <?php endforeach; ?>
                    <?php if ( $displayPremiumTab ): ?>
                        <?php echo $this->setting_tab(
                            'tab-buy.php',
                            '<span style="color: orange;">' . __('Get PRO') . '</span>'
                        ); ?>
                    <?php endif; ?>
                </nav>
                <div class="mh-settings-page">
                    <?php $this->render_active_tab() ?>
                </div>
            </div>
            <?php
        }
        
        public function render_active_tab() {
            $tab = $this->active_tab();

            if ( $tab == 'tab-buy.php' ) {
                $this->render_buy_tab();
                return;
            }

            $settings = array();

            foreach ( $this->get_plugin_settings_definitions() as $name => $conf ) {
                $confTab = 'tab-' . strtolower($conf['tab']) . '.php';

                if ( $tab == $confTab ) {
                    $settings[$name] = $conf;
                }
            }

            ?>
            <?php $this->form_header() ?>
            <?php foreach ( $settings as $name => $conf ): ?>
                <div class="conf">
                    <?php if ( empty($conf['depends_on']) ): ?>
                        <?php $this->render_field($settings, $name, $conf) ?>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php $this->form_footer() ?>
            <?php
        }

        public function render_field($settings, $name, $conf) {
            switch($conf['type']) {
                case 'checkbox':
                    $dependants = $this->get_dependant_fields($settings, $name);
                    
                    if ( !empty($dependants) ) {
                        $this->checkbox($name, $conf['label'], 'check-subconf');
                        $this->render_dependant_fields($settings, $dependants);
                    }
                    else {
                        $this->checkbox($name, $conf['label']);
                    }
                    break;

                case 'number':
                    $this->number($name, $conf['label'], $conf['min'], $conf['max']);
                    break;

                case 'text':
                    $size = !empty($conf['size']) ? $conf['size'] : 10;
                    $this->text($name, $conf['label'], $size);
                    break;

                case 'select':
                    $this->select($name, $conf['label'], $conf['options']);
                    break;
            }
        }

        public function get_dependant_fields($settings, $name) {
            $dependants = array();

            foreach ( $settings as $_name => $conf ) {
                if ( !empty($conf['depends_on']) && $conf['depends_on'] == $name ) {
                    $dependants[$_name] = $conf;
                }
            }

            return $dependants;
        }

        public function render_dependant_fields($settings, $dependants) {
            ?>
            <div class="mh-subconf">
                <?php foreach ( $dependants as $name => $conf ): ?>
                    <?php $this->render_field($settings, $name, $conf); ?>
                    <br/>
                <?php endforeach; ?>
            </div>
            <?php
        }

        public function build_tabs() {
            $arrSettings = $this->get_plugin_settings_definitions();
            $tabs = array();

            foreach ( $arrSettings as $conf ) {
                $name = 'tab-' . strtolower($conf['tab']) . '.php';
                $tabs[$name] = $conf['tab'];
            }

            return $tabs;
        }
    
        public function default_settings() {
            $arrSettings = $this->get_plugin_settings_definitions();
            $arr = array();

            foreach ( $arrSettings as $key => $conf ) {
                $arr[ $key ] = $conf['default'];
            }
    
            return $arr;
        }

        public function get_plugin_settings_definitions() {
            return apply_filters("mh_{$this->pluginAbbrev}_settings", array());
        }
        
        public function enqueue_admin_scripts() {
            wp_enqueue_style( $this->pluginAbbrev . '_admin_style', plugins_url('common/assets/admin-settings.css', $this->pluginBaseFile));
            wp_enqueue_script( $this->pluginAbbrev . '_admin_script', plugins_url('common/assets/admin-settings.js', $this->pluginBaseFile));
    
            wp_localize_script( $this->pluginAbbrev . '_admin_script', 'tab_current', $this->admin_tab());
        }
        
        public function form_header() {
            ?>
            <form method="post" id="mainform" action="" enctype="multipart/form-data">
                <?php wp_nonce_field('mh_nonce'); ?>
            <?php
        }
        
        public function form_footer() {
            $pluginUrl = 'https://wordpress.org/support/plugin/'.$this->pluginAlias.'/reviews/#new-post';
    
            ?>
                <hr/>
                <input name="save" class="button-primary" type="submit" value="<?php echo __( 'Save settings' ); ?>" />
                <input name="save" class="button" type="submit" value="<?php echo __( 'Reset all settings' ); ?>" onclick="return confirm('Are you sure?')"/>
            </form>
            <?php if ( !$this->common->isPremiumVersion() ): ?>
                <br/>
                <h4>
                    <?php echo sprintf(__('If you liked this plugin, please help us <a href="%s" target="_blank">giving a 5-star rate</a> on WordPress.org :)'), $pluginUrl); ?>
                </h4>
            <?php endif; ?>
            <?php
        }

        public function get_premium_url() {
            return apply_filters("mh_{$this->pluginAbbrev}_premium_url", '');
        }

        public function has_premium_features() {
            return ( strlen($this->get_premium_url()) > 0 );
        }

        public function list_premium_features() {
            $readmeFile = plugin_dir_path( $this->pluginBaseFile ) . '/readme.txt';
        
            if ( !file_exists($readmeFile) ) {
                return array();
            }
        
            $readme = file_get_contents($readmeFile);
        
            preg_match('/Premium version features:\n(.*)\n\n/isU', $readme, $match);
        
            if ( !empty($match[1]) ) {
                $features = explode("\n", $match[1]);
                return array_filter($features);
            }

            return array();
        }

        public function render_premium_features() {
            $features = $this->list_premium_features();
            $imgYT = plugins_url('common/assets/youtube.png', $this->pluginBaseFile);

            ?>
            <?php foreach ( $features as $feature ): ?>
                <li>
                    <?php echo $this->format_feature_name($feature); ?>
                    <?php $urlDemo = $this->get_feature_youtube_demo($feature);
                          if ( !empty($urlDemo)): ?>
                            &nbsp;
                            <a href="<?php echo $urlDemo; ?>" title="View demonstration video" class="mh-feature-video" target="_blank">
                                View demo
                                <img src="<?php echo $imgYT; ?>"/>
                            </a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
            <?php
        }

        public function format_feature_name($feature) {
            $feature = str_replace('* ', '', $feature);
            return preg_replace('/\[view demo\](.*)/', '', $feature);
        }

        public function get_feature_youtube_demo($feature) {
            preg_match('/\[view demo\](.*)/', $feature, $fmatch);
    
            if ( !empty($fmatch[1]) ) {
                $urlDemo = str_replace(array('(', ')'), '', $fmatch[1]);
                return $urlDemo;
            }

            return null;
        }

        public function render_buy_tab() {
            ?>
            <div class="mh-buy-div">
                <h1>
                    <?php echo $this->pluginTitle . ' PRO'; ?>
                </h1>
                <h3>
                    <?= __('Features included in PRO version') ?>:
                </h3>
                <ul class="mh-premium-features">
                    <?php $this->render_premium_features(); ?>
                </ul>
                <!-- <h1>
                    <a href="http://ragob.com/dddddd" target="_blank"><?= __('View live demo') ?> &rarr;</a>
                </h1> -->
                <h1>
                    <a href="<?php echo $this->get_premium_url(); ?>" target="_blank" style="">
                        <?= __('Buy on Gumroad') ?> &rarr;
                    </a>
                </h1>
            </div>
            <?php
        }
        
        public function checkbox($name, $label, $class = null) {
            $value = $this->get_option($name);
            
            ?>
            <input type="hidden" name="<?php echo $name ?>" value="0" />
            <label>
                <input type="checkbox"
                       <?php if ( $value === 'yes' ): ?>checked<?php endif; ?>
                       class="<?php echo $class ?>"
                       name="<?php echo $name ?>">
                <?php echo $label ?>
            </label>
            <?php
        }
        
        public function text($name, $label, $size = null) {
            $value = $this->get_option($name);
            
            ?>
            <?php echo $label ?>:
            <input type="text" value="<?php echo $value; ?>" size="<?php echo $size; ?>" name="<?php echo $name; ?>">
            <?php
        }
        
        public function number($name, $label, $min, $max) {
            $value = $this->get_option($name);
            
            ?>
            <?php echo $label ?>:
            <input type="number" value="<?php echo $value; ?>" name="<?php echo $name; ?>" min="<?php echo $min; ?>" max="<?php echo $max; ?>">
            <?php
        }
        
        public function select($name, $label, $options) {
            $value = $this->get_option($name);
            
            ?>
            <?php echo $label; ?>:
            <select name="<?php echo $name ?>">
                <?php foreach ( (array) $options as $optVal => $optLabel ): ?>
                    <option <?php if ( $value == $optVal ): ?>selected<?php endif; ?>
                            value="<?php echo $optVal ?>"><?php echo $optLabel; ?></option>
                <?php endforeach; ?>
            </select>
            <?php
        }
    }
}