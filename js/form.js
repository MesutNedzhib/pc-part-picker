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

/**
	* [checkFileds description]
	*
	* @param   {[Object]}  object  [object description]
	*
	* @return  {[Boolean]}          [return description]
	*/
function checkFileds(object) {
	let isValid = true;

	for (let field in object) {
		if (!validateField(field)) {
			isValid = false;
			break;
		} else if (field === 'email') {
			if (!validateEmail(object[field])) {
				isValid = false;
				break;
			}
		} else if (field === 'phoneNumber') {
			if (!validatePhoneNumber(object[field])) {
				isValid = false;
				break;
			}
		}
	}

	return isValid;
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

	const userData = {
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

	if (checkFileds(userData)) {
		// Send data
		$.ajax({
			method: 'POST',
			url: 'controllers/index.php',
			data: userData,
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
