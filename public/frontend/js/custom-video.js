(function($) {
	
	"use strict";
	
	// Cache Selectors
	var mainDocument	=$(document),
		video			=$('.popup-youtube');


	//Magnific Video 
	mainDocument.on('ready', function() {
		video.magnificPopup({
		  disableOn: 700,
		  type: 'iframe',
		  mainClass: 'mfp-fade',
		  removalDelay: 160,
		  preloader: false,
		  fixedContentPos: false
		});
	});

})(jQuery);


document.addEventListener('DOMContentLoaded', function () {
	var playButton = document.getElementById('play-button');
	var videoIframe = document.getElementById('video');
	var myModal = new bootstrap.Modal(document.getElementById('myModal'));

	playButton.addEventListener('click', function () {
		var videoSource = playButton.getAttribute('data-src');
		videoIframe.setAttribute('src', videoSource);
		myModal.show();
	});

	myModal._element.addEventListener('hidden.bs.modal', function () {
		videoIframe.setAttribute('src', '');
	});
});