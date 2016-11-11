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
		var quantity = jQuery('input[name="addproductcart[quantity]"]').val();

		if(quantity > 1) {
			quantity--;
			jQuery('input[name="addproductcart[quantity]"]').val(quantity);	
		}
	});

	jQuery('.plus').click(function() {
		var quantity = jQuery('input[name="addproductcart[quantity]"]').val();

		quantity++;
		jQuery('input[name="addproductcart[quantity]"]').val(quantity);	
	});

	setTimeout(function () {
        $("#messages").modal("hide");
    }, 5000);
});
