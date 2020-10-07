
(function($){
	// выбрать валюту
	$('#currency').change(function(){
		window.location = 'currency/change?curr=' + $(this).val();
	});

	// выбраьт модификацию
	$('.available select').on('change', function(){
		var modId = $(this).val(),
				color = $(this).find('option').filter(':selected').data('title'),
				price = $(this).find('option').filter(':selected').data('price'),
				baseprice = $('#base-price').data('base');	

		if (price) {
			$('#base-price').text(symbol_left+price+symbol_right);
		} else {
			$('#base-price').text(symbol_left+baseprice+symbol_right);
		}
	});

})(jQuery);

// Cart
(function($){

	$('body').on('click' , '.add_to_cart_link', function(e){
		e.preventDefault();
		var id = $(this).data('id'),
				qty = $('input.qty').val() ? $('input.qty').val() : 1,
				mod = $('.available select').val();

		$.ajax({
			url: path + '/cart/add',
			data: {id:id, qty:qty, mod:mod},
			type: 'GET',
			success: function (res){
				showCart(res);
			},
			error: function() {
				alert('Ошибка! Попробуйте позже');
			}
		})

		//console.log(id, qty, mod);
	});

	function showCart(cart) {
		if ($.trim(cart) == '	<h3>Корзина пуста</h3>') {
			$('.not-empty-cart').hide();
		} else {
			$('.not-empty-cart').show();
		}

		$('#cart .modal-body').html(cart);
		$('#cart').modal();

		if($('.cart-sum').text()) {
			$('.simpleCart_total').text($('.cart-sum').text());
		} else {
			$('.simpleCart_total').text('Корзина путса');
		}

	}

	$('#cart .modal-body').on('click' , '.del-item', function(){

		$.ajax({
			url: path + '/cart/delete',		
			data: {id:$(this).attr('data-id')},
			type: 'GET',
			success: function (res){
				showCart(res);
			},
			error: function() {
				alert('Ошибка! Попробуйте позже');
			}
		})

	});

	$('#cart .modal-content').on('click' , '.del-all-items', function(){	
		$.ajax({
			url: path + '/cart/clear',
			type: 'GET',
			success: function (res){
				showCart(res);
			},
			error: function() {
				alert('Ошибка! Попробуйте позже');
			}
		})

	});

	$('.show-cart').click(function(e) {
		e.preventDefault();

			$.ajax({
				url: path + '/cart/show',			
				type: 'GET',
				success: function (res){
					showCart(res);
				},
				error: function() {
					alert('Ошибка! Попробуйте позже');
				}
			})
		
	});

	function clearCart() {

	}


})(jQuery);

//Search 
(function($){
$(document).ready(function(){
	var products = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.whitespace,
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
				wildcard: '%QUERY',
				url: path + '/search/typeahead?query=%QUERY'
		}
	});

	products.initialize();

	$("#typeahead").typeahead({
		// hint: false,
		highlight: true
	},{
		name: 'products',
		display: 'title',
		limit: 9,
		source: products
	});

	$('#typeahead').bind('typeahead:select', function(ev, suggestion) {
		console.log(suggestion);
		window.location = path + '/search/?s=' + encodeURIComponent(suggestion.title);
	});
});
})(jQuery);