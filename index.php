<?php
define( 'BASE_DIR', dirname( __FILE__ ) );
include_once __DIR__ . '/inc/helpers.php';
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

	<title>2create: Part Picker</title>

	<link href="css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
	<div class="container">
		<div class="py-5 text-center">
			<h2>PC Part Picker</h2>
		</div>

		<div class="row">
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">Your cart</span>
				</h4>

				<ul class="list-group mb-3" id="list-group">
					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Set #1</h6>
							<small class="text-muted"><strong>CPU:</strong> AMD Threadripper 1950X - <strong>$749.99</strong></small> <br>
							<small class="text-muted"><strong>Memory:</strong> Crucial Ballistix Sport LT 2x8GB - <strong>$159.99</strong></small>
						</div>

						<span class="text-muted">$909.98</span>
					</li>

					<li class="list-group-item d-flex justify-content-between lh-condensed">
						<div>
							<h6 class="my-0">Set #1</h6>
							<small class="text-muted"><strong>CPU:</strong> AMD Threadripper 1950X - <strong>$749.99</strong></small> <br>
							<small class="text-muted"><strong>Memory:</strong> Crucial Ballistix Sport LT 2x8GB - <strong>$159.99</strong></small>
						</div>
						<span class="text-muted">$909.98</span>
					</li>

					<li class="list-group-item d-flex justify-content-between">
						<span>Total (USD)</span>
						<strong>$1819.96</strong>
					</li>
				</ul>
			</div>

			<div class="col-md-8 order-md-1">
				<h4 class="mb-3">Your Details</h4>

				<form class="needs-validation" id="form" novalidate method="post">
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">First name</label>
							<input type="text" class="form-control" id="firstName" placeholder="" value="" required>
						</div>

						<div class="col-md-6 mb-3">
							<label for="lastName">Last name</label>
							<input type="text" class="form-control" id="lastName" placeholder="" value="" required>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-6 mb-3">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" placeholder="you@example.com">
						</div>

						<div class="col-md-6 mb-3">
							<label for="phone-number">Phone Number</label>
							<input type="text" class="form-control" id="phone-number" />
						</div>
					</div>

					<div class="mb-3">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
					</div>

					<div class="mb-3">
						<label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
						<input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
					</div>

					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="country">Country</label>
							<select class="custom-select d-block w-100" id="country" required>
								<option value="">Choose...</option>
								<option>United States</option>
							</select>
						</div>
						<div class="col-md-4 mb-3">
							<label for="state">State</label>
							<select class="custom-select d-block w-100" id="state" required>
								<option value="">Choose...</option>
								<option value="Alabama">Alabama</option>
							    <option value="Alaska">Alaska</option>
							    <option value="American Samoa">American Samoa</option>
							    <option value="Arizona">Arizona</option>
							    <option value="Arkansas">Arkansas</option>
							    <option value="California">California</option>
							    <option value="Colorado">Colorado</option>
							    <option value="Connecticut">Connecticut</option>
							    <option value="Delaware">Delaware</option>
							    <option value="District Of Columbia">District Of Columbia</option>
							    <option value="Federated States Of Micronesia">Federated States Of Micronesia</option>
							    <option value="Florida">Florida</option>
							    <option value="Georgia">Georgia</option>
							    <option value="Guam">Guam</option>
							    <option value="Hawaii">Hawaii</option>
							    <option value="Idaho">Idaho</option>
							    <option value="Illinois">Illinois</option>
							    <option value="Indiana">Indiana</option>
							    <option value="Iowa">Iowa</option>
							    <option value="Kansas">Kansas</option>
							    <option value="Kentucky">Kentucky</option>
							    <option value="Louisiana">Louisiana</option>
							    <option value="Maine">Maine</option>
							    <option value="Marshall Islands">Marshall Islands</option>
							    <option value="Maryland">Maryland</option>
							    <option value="Massachusetts">Massachusetts</option>
							    <option value="Michigan">Michigan</option>
							    <option value="Minnesota">Minnesota</option>
							    <option value="Mississippi">Mississippi</option>
							    <option value="Missouri">Missouri</option>
							    <option value="Montana">Montana</option>
							    <option value="Nebraska">Nebraska</option>
							    <option value="Nevada">Nevada</option>
							    <option value="New Hampshire">New Hampshire</option>
							    <option value="New Jersey">New Jersey</option>
							    <option value="New Mexico">New Mexico</option>
							    <option value="New York">New York</option>
							    <option value="North Carolina">North Carolina</option>
							    <option value="North Dakota">North Dakota</option>
							    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
							    <option value="Ohio">Ohio</option>
							    <option value="Oklahoma">Oklahoma</option>
							    <option value="Oregon">Oregon</option>
							    <option value="Palau">Palau</option>
							    <option value="Pennsylvania">Pennsylvania</option>
							    <option value="Puerto Rico">Puerto Rico</option>
							    <option value="Rhode Island">Rhode Island</option>
							    <option value="South Carolina">South Carolina</option>
							    <option value="South Dakota">South Dakota</option>
							    <option value="Tennessee">Tennessee</option>
							    <option value="Texas">Texas</option>
							    <option value="Utah">Utah</option>
							    <option value="Vermont">Vermont</option>
							    <option value="Virgin Islands">Virgin Islands</option>
							    <option value="Virginia">Virginia</option>
							    <option value="Washington">Washington</option>
							    <option value="West Virginia">West Virginia</option>
							    <option value="Wisconsin">Wisconsin</option>
							    <option value="Wyomin">Wyomin</option>
							</select>
						</div>
						<div class="col-md-3 mb-3">
							<label for="zip">Zip</label>
							<input type="text" class="form-control" id="zip" placeholder="" required>
						</div>
					</div>
					<hr class="mb-4">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="same-address">
						<label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="save-info">
						<label class="custom-control-label" for="save-info">Save this information for next time</label>
					</div>
					<hr class="mb-4">

					<h4 class="mb-3">PC Parts</h4>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cpu">CPU</label>

							<select name="cpu" id="cpu" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<label for="cpu-cooler">CPU Cooler</label>

							<select name="cpu" id="cpu-cooler" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="motherboard">Motherboard</label>

							<select name="cpu" id="motherboard" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<label for="memory">Memory</label>

							<select name="cpu" id="memory" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="video-card">Video Card</label>

							<select name="cpu" id="video-card" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<label for="storage">Storage</label>

							<select name="cpu" id="storage" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="power-supply">Power Supply</label>

							<select name="cpu" id="power-supply" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<label for="case">Case</label>

							<select name="cpu" id="case" class="form-control">
								<option value="">— None —</option>
							</select>
						</div>

						<div class="col-md-6 mb-3">
							<button id="add-another-set" type="button" class="btn btn-primary">+ Add Another Set</button>
						</div><!-- /.col-md-6 mb-3 -->
					</div>

					<hr class="mb-4" />

					<h4 class="mb-3">Payment</h4>

					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-name">Name on card</label>
							<input type="text" class="form-control" id="cc-name" placeholder="" required>
							<small class="text-muted">Full name as displayed on card</small>
							<div class="invalid-feedback">
								Name on card is required
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="cc-number">Credit card number</label>
							<input type="text" class="form-control" id="cc-number" placeholder="" required>
							<div class="invalid-feedback">
								Credit card number is required
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">Expiration</label>
							<input type="text" class="form-control" id="cc-expiration" placeholder="" required>
							<div class="invalid-feedback">
								Expiration date required
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-cvv">CVV</label>
							<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
							<div class="invalid-feedback">
								Security code required
							</div>
						</div>
					</div>
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
				</form>
			</div>
		</div>

		<footer class="my-5 pt-5 text-muted text-center text-small">
			<p class="mb-1">&copy; 2018 2create</p>
		</footer>
	</div>

	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
	<script src="../../assets/js/vendor/popper.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<script src="../../assets/js/vendor/holder.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>
