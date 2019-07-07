
// код для выпадающего меню и его сворачивании по клику на ссылку или вне этой области

jQuery(function($) {
    // В класс "page" обернуто все содержимое страницы. 
    // Можно повесить событие и на body, но тогда это меню не будет работать на I-pad
    jQuery('.wrapper').click(function( event ){
        // проверяем находится ли элемент на который кликнули в нашем меню,
        // то есть в контейнере "menu-container"
        var eventInMenu = $( event.target ).parents('.catalog_box');

        // если родителя нет, значит клик был вне меню и меню сворачиваем
        if( !eventInMenu.length ){
            $('.bellows').hide();
        }
    });

   $(function(){
   		$('.aside_title_btn').on('click', function(){

   			$('.bellows').slideToggle(300, function(){
   				if($(this).css ('display') === 'none'){
   					$(this).removeAttr('style');
   				}
   			});
   		});

   });



});



jQuery(function($) {
    // В класс "page" обернуто все содержимое страницы. 
    // Можно повесить событие и на body, но тогда это меню не будет работать на I-pad
    jQuery('.wrapper').click(function( event ){
        // проверяем находится ли элемент на который кликнули в нашем меню,
        // то есть в контейнере "menu-container"
        var eventInMenu = $( event.target ).parents('.flexMenu-viewMore');

        // если родителя нет, значит клик был вне меню и меню сворачиваем
        if( !eventInMenu.length ){
            $('.flexMenu-popup').hide();
        }
    });

});




