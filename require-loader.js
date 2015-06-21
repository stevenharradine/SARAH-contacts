require (['../../js/jquery-1.6.2.min'], function ( $ ) {
	require({
		baseUrl: '../../js/'
	}, [
		"navigation",
		"add",
		"edit"
	], function( 
		nav,
		add,
		edit
	) {
		jQuery ("a.contact").bind ("click", function ( e ) {
			e.preventDefault();
			
			var $curButton = jQuery(this);
			var status = $curButton.parent().attr("data-status");
			var contact_id = $curButton.attr("data-contact-id");
			
			switch (status) {
				case "empty"	:	jQuery.ajax( "details.php?contact_id=" + contact_id )
										.done(function(data) {
											$curButton.siblings(".information").hide();
											$curButton.siblings(".information").html(data);

											init_component ("section.phone");
											init_component ("section.address");
											init_component ("section.email");
											init_component ("section.notes");
										})
										.fail(function() {
											alert( "error" );
										})
										.always(function() {
											$curButton.parent().attr("data-status", "open");
											$curButton.siblings(".information").slideDown(500);
										});
									break;
				case "open"		:	$curButton.parent().attr("data-status", "closed");
									$curButton.siblings(".information").slideUp(500);
									break;
				case "closed"	:	$curButton.parent().attr("data-status", "open");
									$curButton.siblings(".information").slideDown(500);
									break;
			}
		});
		
		function init_component(selector) {
			jQuery (selector + " div.add").hide();
			jQuery (selector + " a.add").bind ("click", function ( e ) {
				e.preventDefault();
				
				jQuery(this).hide();
				jQuery (this).parent().find("div.add").slideDown(500);
			});
		}
	});
});