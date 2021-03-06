jQuery( function() {
// Sticky Header.
		jQuery(function() {

			// grab the initial top offset of the navigation 
			var bd = jQuery('#sticky_header').offset().top;
			
			// our function that decides weather the navigation bar should have "fixed" css position or not.
			var sticky_header = function(){
				var scroll_top = jQuery(window).scrollTop(); // our current vertical position from the top
				
				// if we've scrolled more than the navigation, change its position to fixed to stick to top, otherwise change it back to relative
				if (scroll_top > bd) { 
					jQuery('#sticky_header').css({ 'position': 'fixed', 'top':0, 'left':0, 'border-bottom': "none", 'box-shadow': '0 1px 2px rgba(0, 0, 0, 0.15)' });
					jQuery('.top-header').addClass('sticky-margin');
				} else {
					jQuery('#sticky_header').css({ 'position': 'relative', 'border-bottom': '1px solid rgba(0, 0, 0, 0.1)', 'box-shadow': "none" }); 
					jQuery('.top-header').removeClass('sticky-margin');
				}   
			};
			
			// run our function on load
			sticky_header();
			
			// and run it again every time you scroll
			jQuery(window).scroll(function() {
				 sticky_header();
			});
			
		});
} );
