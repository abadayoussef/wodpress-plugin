jQuery(document).ready(function() {
	jQuery("#formAddData").validate({
		submitHandler: function () {
			let postData = jQuery("#formAddData").serialize() + "&action=abadata_request";
			jQuery.post(abadata_ajax_url, postData, function (response) {
				alert(response);
			});
		}
	});
} );
