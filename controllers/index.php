<?php

function validateField($value)
{
	if (!preg_match("/^[a-zA-Z0-9\s\p{P}]*$/", $value)) {
		$response = ['success' => false, 'message' => 'Please enter a valid field.'];
		echo json_encode($response);
		return;
	}
}

function validateEmail($email)
{
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$response = ['success' => false, 'message' => 'Please enter a valid email address.'];
		echo json_encode($response);
		return;
	}
}

function validatePhoneNumber($phoneNumber)
{
	if (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
		$response = ['success' => false, 'message' => 'Please enter a valid phone number.'];
		echo json_encode($response);
		return;
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Get form data

	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$email = $_POST['email'];
	$phoneNumber = $_POST['phoneNumber'];
	$address = $_POST['address'];
	$country = $_POST['country'];
	$state = $_POST['state'];
	$zip = $_POST['zip'];
	$ccName = $_POST['ccName'];
	$ccNumber = $_POST['ccNumber'];
	$ccExpiration = $_POST['ccExpiration'];
	$ccCVV = $_POST['ccCVV'];

	if (
		!isset($firstName) &&
		!isset($lastName) &&
		!isset($email) &&
		!isset($phoneNumber) &&
		!isset($address) &&
		!isset($country) &&
		!isset($state) &&
		!isset($zip) &&
		!isset($ccName) &&
		!isset($ccNumber) &&
		!isset($ccExpiration) &&
		!isset($ccCVV)
	) {
		$response = ['success' => false, 'message' => 'Please fill in all fields.'];
		echo json_encode($response);
		return;
	}

	validateField($firstName);
	validateField($lastName);
	validateEmail($email);
	validatePhoneNumber($phoneNumber);
	validateField($address);
	validateField($country);
	validateField($state);
	validateField($zip);
	validateField($ccName);
	validateField($ccNumber);
	validateField($ccExpiration);
	validateField($ccCVV);

	$response = ['success' => true, 'message'=> 'Successfully submit'];
	echo json_encode($response);
}
