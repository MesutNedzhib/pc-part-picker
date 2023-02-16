/**
	* [validateField description]
	*
	* @param   {[String or Number]}  value  [value description]
	*
	* @return  {[Boolean]}         [return description]
	*/
function validateField(value) {
	if (value.length > 0 && value !== " ") {
		return true;
	} else {
		alert('You have entered an empty or invalid field!');
		return false;
	}
}

/**
	* [validateEmail description]
	*
	* @param   {[String]}  value  [value description]
	*
	* @return  {[Boolean]}         [return description]
	*/
function validateEmail(value) {
	const regex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;

	if (value.match(regex)) {
		return true;
	} else {
		alert('You have entered an invalid email address!');
		return false;
	}
}

/**
	* [validatePhoneNumber description]
	*
	* @param   {[Number]}  value  [value description]
	*
	* @return  {[Boolean]}         [return description]
	*/
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

	// Validate fields
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
});
