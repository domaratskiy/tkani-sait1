// Модальное окно

// открыть по кнопке
$('.js-button-login').click(function() { 
	
	$('.js-overlay-login').fadeIn();
	$('.js-overlay-login').addClass('disabled');
	$('body').addClass('owerflow-hiden');

});

// закрыть на крестик
$('.js-close-login').click(function() { 
	$('.js-overlay-login').fadeOut();
	$('body').removeClass('owerflow-hiden');
});




// // закрыть по клику вне окна
// $(document).mouseup(function (e) { 
// 	var popup = $('.js-popup-login');
// 	if (e.target!=popup[0 ]&& popup.has(e.target).length === 0){
// 		$('.js-overlay-login').fadeOut();
// 		$('body').removeClass('owerflow-hiden');
		
// 	}
// });

// открыть по таймеру 
// $(window).on('load', function () { 
// 	setTimeout(function(){
// 		if($('.js-overlay-campaign').hasClass('disabled')) {
// 			return false;
// 		} else {
			
// 			$(".js-overlay-campaign").fadeIn();
// 		}
// 	}, 5000);
// });

$('.js-button-registration').click(function() { 
	
	$('.js-overlay-registration').fadeIn();
	$('.js-overlay-registration').addClass('disabled');
	$('body').addClass('owerflow-hiden');
});

// закрыть на крестик
$('.js-close-registration').click(function() { 
	$('.js-overlay-registration').fadeOut();
	$('body').removeClass('owerflow-hiden');
	
});

// // закрыть по клику вне окна
// $(document).mouseup(function (e) { 
// 	var popup = $('.js-popup-registration');
// 	if (e.target!=popup[0]&&popup.has(e.target).length === 0){
// 		$('.js-overlay-registration').fadeOut();
// 		$('body').removeClass('owerflow-hiden');
		
		
// 	}
// });