/******************* FREESIAEMPIRE CUSTOMIZER CUSTOM SCRIPTS ******************************/
(function($) {
	$('.preview-notice').prepend('<span id="acyaempire_upgrade"><a target="_blank" class="button btn-upgrade" href="' + acyaempire_upgrade_links.upgrade_link + '">' + acyaempire_upgrade_links.upgrade_text + '</a></span>');
	jQuery('#customize-info .btn-upgrade, .misc_links').click(function(event) {
		event.stopPropagation();
	});
})(jQuery);