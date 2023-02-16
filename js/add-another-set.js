// Doc ready
$(document).ready(function () {

	// Clear cart list
	$('#list-group').html('<p id="alert-empty">Your cart is empty!</p>');
});

/**
	* [convertNumberToCurrency description]
	*
	* @param   {[Number]}  number  [number description]
	*
	* @return  {[type]}  [return description]
	*/
function convertNumberToCurrency(number) {
	if (typeof number !== 'number' || number < 1000 || number > 999999) {
		alert('Invalid price!');
	}

	const divider = number >= 10000 ? 100 : 10;
	const currency = (number / divider).toFixed(2);

	return parseFloat(currency);
}

// Cart Storage
const cart = [];

// Add another set
$('#add-another-set').on('click', function () {
	const selectIds = ['cpu', 'cpu-cooler', 'motherboard', 'memory', 'video-card', 'storage', 'power-supply', 'case'];
	let item = [];
	let summary = 0;

	// Each selects by id
	selectIds.forEach(id => {
		let select = $(`#${id}`);
		let selectValue = select.val();

		if (selectValue !== ' ' && selectValue.length > 0) {

			// Handle props
			let specification = selectValue.split('/')[0];
			let name = selectValue.split('/')[1];
			let price = parseInt(selectValue.split('/')[2]);

			if (price > 0) {
				item.push({
					specification: specification,
					name: name,
					price: price
				});

				summary += price;
			}

			// Reset the selected values
			select.prop('selectedIndex', 0);
		}
	});

	if (item.length > 0) {
		cart.push(item);
		alert('Set added to cart!');
	}

	// Imperative code
	// Create li element (cart item) for list
	const elementLi = $('<li>').addClass('list-group-item d-flex justify-content-between lh-condensed');
	const elementDiv = $('<div>');
	const elementh6 = $('<h6>').addClass('my-0').text(`Set #${cart.length}`);
	const elementSpan = $('<span>').addClass('text-muted').text(`$${convertNumberToCurrency(summary)}`);

	elementDiv.append(elementh6);
	item.forEach(el => {
		elementDiv.append($('<small>').addClass('text-muted').html(`
			<strong>${el.specification}:</strong> ${el.name} - <strong>$${convertNumberToCurrency(el.price)}</strong> <br>
		`));
	});
	elementLi.append(elementDiv);
	elementLi.append(elementSpan);

	/**
		* [calcCartSummary description]
		*
		* @param   {[Array]}  cart  [cart description]
		*
		* @return  {[Float]}        [return description]
		*/
	function calcCartSummary(cart) {
		let summary = 0;

		cart.forEach(item => {
			item.forEach(el => {
				summary += el.price;
			})
		})

		return convertNumberToCurrency(summary);
	}

	// Create li element (cart symmary)
	const elementLiSummary = $('<li>').addClass('list-group-item d-flex justify-content-between');
	elementLiSummary.html(`
		<span>Total (USD)</span>
		<strong id="cart-summary">$${calcCartSummary(cart)}</strong>
	`);

	// Remove empty cart - alert
	$('#alert-empty').remove();

	// Append created elements to list
	$('#list-group').append(elementLi);

	if ($('#cart-summary').length > 0) {
		$('#cart-summary').parent().remove();
		$('#list-group').append(elementLiSummary);
	} else {
		$('#list-group').append(elementLiSummary);
	}
});
