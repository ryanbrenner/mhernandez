/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
*/


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
*/
function updateViewportDimensions() {
	var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
	return { width:x,height:y }
}
// setting the viewport width
var viewport = updateViewportDimensions();

/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
*/
var waitForFinalEvent = (function () {
	var timers = {};
	return function (callback, ms, uniqueId) {
		if (!uniqueId) { uniqueId = "Don't call this twice without a uniqueId"; }
		if (timers[uniqueId]) { clearTimeout (timers[uniqueId]); }
		timers[uniqueId] = setTimeout(callback, ms);
	};
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;

/*
 * Put all your regular jQuery in here.
*/
jQuery(document).ready(function($) {

  $('.mobile-menu').on('click', function() {
    $('body').toggleClass('menu_active');
  });

  $('.news_expand').on('click', function(e) {
  	e.preventDefault();
  	$('#wrap').addClass('news_active');
  	$this = $(this);
  	$list = $this.closest('.news_single');
  	$container = $list.find('.news_expanded__container');
  	$container.css({
  		opacity: 0,
  		display:'table',
  	}).animate({
  		opacity: 1
  	}, 350, function() {
  		$list.addClass('is_expanded');
  		$container.css({
  			opacity:'',
  			display:''
  		});
  	});
  });

  $('.news_close').on('click', function(e) {
  	e.preventDefault();
  	$this = $(this);
  	$list = $this.closest('.news_single');
  	$container = $list.find('.news_expanded__container');
  	$container.animate({
  		opacity: 0
  	}, 350, function() {
  		$container.css({
  			opacity:''
  		});
  		$list.removeClass('is_expanded');
  		$('#wrap').removeClass('news_active');
  	});
  });

  $('.news_expanded__container').on('click', function(e) {
    if (!$(e.target).is('.news_expanded__content') && !$(e.target).closest('.news_expanded__content').length) {
      $this = $(this);
      $list = $this.closest('.news_single');
      $this.animate({
        opacity: 0
      }, 350, function() {
        $this.css({
          opacity:''
        });
        $list.removeClass('is_expanded');
        $('#wrap').removeClass('news_active');
      });
    }
  });

}); /* end of as page load scripts */
