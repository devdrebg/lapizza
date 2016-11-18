jQuery(document).ready(function(){
	jQuery('#messages').modal('show');

	jQuery('input[name="addproductcart[quantity]"]').keyup(function(e) {
		if (/\D/g.test(this.value)) {
			// Filter non-digits from input value.
			this.value = this.value.replace(/\D/g, '');
		}
	});

	jQuery('input[name="addproductcart[quantity]"]').on('change keyup', function() {
		var quantity = jQuery(this).val();

		if(quantity < 1) {
			jQuery(this).val('1');
		}
	});

	jQuery('.minus').click(function() {
		var target = jQuery(this).attr('data-target');
		var quantity = jQuery('#' + target).val();

		if(quantity > 1) {
			quantity--;
			jQuery("#" + target).val(quantity);	
		}

		return false;
	});

	jQuery('.plus').click(function() {		
		var target = jQuery(this).attr('data-target');
		var quantity = jQuery('#' + target).val();

		quantity++;		
		jQuery("#" + target).val(quantity);

		return false;
	});

	jQuery('.frmqtdcart form .minus, .frmqtdcart form .plus').click(function() {
		var formtarget = jQuery(this).attr('data-form');

		setTimeout(function() {
			jQuery('#form-' + formtarget).submit();
		}, 1000)
	});

	jQuery('.frmqtdcart form input').on('change', function() {
		var formtarget = jQuery(this).attr('data-form');

		setTimeout(function() {
			jQuery('#form-' + formtarget).submit();
		}, 1000)
	});

	setTimeout(function () {
        $("#messages").modal("hide");
    }, 10000);
});
