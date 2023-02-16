; (function ($, document, window, undefined) {
	// doc ready
	$(document).ready(function () {

		// Clear list group
		$('#list-group').html('<p>Your cart is empty!</p>');

		// Fill in the selection fields
		function fillSelectionFields(data, id) {
			data.forEach(el => {
				let select = $(`#${id}`);
				let labelText = $(`label[for="${select.attr('id')}"]`).text();
				select.append(`<option value="${labelText}/${el.name}/${el.price}">— ${el.name} —</option>`);
			});
		}

		fetchItems('case')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'case');
			});

		fetchItems('cpu-cooler')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'cpu-cooler');
			});

		fetchItems('cpu')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'cpu');
			});

		fetchItems('memory')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'memory');
			});

		fetchItems('motherboard')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'motherboard');
			});

		fetchItems('power-supply')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'power-supply');
			});

		fetchItems('storage')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'storage');
			});

		fetchItems('video-card')
			.done(function (response) {
				const data = JSON.parse(response);

				fillSelectionFields(data, 'video-card');
			});
	});

	function fetchItems(type) {
		return $.ajax({
			url: 'inc/fetch-parts.php',
			type: 'GET',
			data: {
				type: type
			}
		});
	}
})(jQuery, document, window);

// Validate fields
function validateField(value) {
	if (value.length > 0 && value !== " ") {
		return true;
	} else {
		alert('You have entered an empty or invalid field!');
		return false;
	}
}

function validateEmail(value) {
	const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

	if (value.match(regex)) {
		return true;
	} else {
		alert('You have entered an invalid email address!');
		return false;
	}
}

function validatePhoneNumber(value) {
	const regex = /^[0-9]{10}$/;

	if (value.match(regex)) {
		return true;
	} else {
		alert('You have entered an invalid phone number!');
		return false;
	}
}

// Hanlde form
$('#form').submit(function (e) {
	e.preventDefault();

	const firstName = $('#firstName').val();
	const lastName = $('#lastName').val();
	const email = $('#email').val();
	const phoneNumber = $('#phone-number').val();
	const address = $('#address').val();
	const country = $('#country').val();
	const state = $('#state').val();
	const zip = $('#zip').val();
	const ccName = $('#cc-name').val();
	const ccNumber = $('#cc-number').val();
	const ccExpiration = $('#cc-expiration').val();
	const ccCVV = $('#cc-cvv').val();

	if (
		validateField(firstName) &&
		validateField(lastName) &&
		validateEmail(email) &&
		validatePhoneNumber(phoneNumber) &&
		validateField(address) &&
		validateField(country) &&
		validateField(state) &&
		validateField(zip) &&
		validateField(ccName) &&
		validateField(ccNumber) &&
		validateField(ccExpiration) &&
		validateField(ccCVV)
	) {
		const formData = {
			firstName: firstName,
			lastName: lastName,
			email: email,
			phoneNumber: phoneNumber,
			address: address,
			country: country,
			state: state,
			zip: zip,
			ccName: ccName,
			ccNumber: ccNumber,
			ccExpiration: ccExpiration,
			ccCVV: ccCVV
		};

		// Send data
		$.ajax({
			method: 'POST',
			url: 'controllers/index.php',
			data: formData,
			dataType: 'json',
			success: function (response) {
				console.log(response);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	}
})

// Convert number to currency
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

	selectIds.forEach(id => {
		let select = $(`#${id}`);
		let selectValue = select.val();

		if (selectValue !== ' ' && selectValue.length > 0) {
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

	// Create cart item (li element)

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


	// Calculate cart summary

	function calcCartSummary(cart) {
		let summary = 0;

		cart.forEach(item => {
			item.forEach(el => {
				summary += el.price;
			})
		})

		return convertNumberToCurrency(summary);
	}

	// Create cart symmary (li element)

	const elementLiSummary = $('<li>').addClass('list-group-item d-flex justify-content-between');

	elementLiSummary.html(`
		<span>Total (USD)</span>
		<strong id="cart-summary">$${calcCartSummary(cart)}</strong>
	`);

	// Append created elements to list

	$('#list-group').append(elementLi);

	if ($('#cart-summary').length > 0) {
		$('#cart-summary').parent().remove();
		$('#list-group').append(elementLiSummary);
	} else {
		$('#list-group').append(elementLiSummary);
	}
});



