<?php

/**
	* [validateField description]
	*
	* @param   [String or Number]  $value  [$value description]
	*
	* @return  [JSON]          [return description]
	*/
function validateField($value)
{
	if (!preg_match("/^[a-zA-Z0-9\s\p{P}]*$/", $value)) {
		$response = ['success' => false, 'message' => 'Please enter a valid field.'];
		echo json_encode($response);
		return;
	}
}

/**
	* [validateEmail description]
	*
	* @param   [String]  $email  [$email description]
	*
	* @return  [JSON]          [return description]
	*/
function validateEmail($email)
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$response = ['success' => false, 'message' => 'Please enter a valid email address.'];
		echo json_encode($response);
		return;
	}
}

/**
	* [validatePhoneNumber description]
	*
	* @param   [Number]  $phoneNumber  [$phoneNumber description]
	*
	* @return  [JSON]                [return description]
	*/
function validatePhoneNumber($phoneNumber)
{
	if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
		$response = ['success' => false, 'message' => 'Please enter a valid phone number.'];
		echo json_encode($response);
		return;
	}
}

/**
	* [checkFileds description]
	*
	* @param   [Array]  $object  [$object description]
	*
	* @return  [JSON]           [return description]
	*/
function checkFileds($array)
{
	foreach ($array as $prop => $value) {
		if ($prop !== 'email' || $prop !== 'phoneNumber') {
			validateField($value);
		} else if ($prop === 'email') {
			validateEmail($value);
		} else if ($prop === 'phoneNumber') {
			validatePhoneNumber($value);
		}
	}

	$response = ['success' => true, 'message' => 'Successfully submit'];
	echo json_encode($response);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (
		!isset($_POST['firstName']) &&
		!isset($_POST['lastName']) &&
		!isset($_POST['email']) &&
		!isset($_POST['phoneNumber']) &&
		!isset($_POST['address']) &&
		!isset($_POST['country']) &&
		!isset($_POST['state']) &&
		!isset($_POST['zip']) &&
		!isset($_POST['ccName']) &&
		!isset($_POST['ccNumber']) &&
		!isset($_POST['ccExpiration']) &&
		!isset($_POST['ccCVV'])
	) {
		$response = ['success' => false, 'message' => 'Please fill in all fields.'];
		echo json_encode($response);
		return;
	} else {
		// Get form data
		$user = array(
			'firstName' => $_POST['firstName'],
			'lastName' => $_POST['lastName'],
			'email' => $_POST['email'],
			'phoneNumber' => $_POST['phoneNumber'],
			'address' => $_POST['address'],
			'country' => $_POST['country'],
			'state' => $_POST['state'],
			'zip' => $_POST['zip'],
			'ccName' => $_POST['ccName'],
			'ccNumber' => $_POST['ccNumber'],
			'ccExpiration' => $_POST['ccExpiration'],
			'ccCVV' => $_POST['ccCVV']
		);

		// Check and response
		checkFileds($user);
	}
}
