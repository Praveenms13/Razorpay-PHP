<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Muhamad Nauval Azhar">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta name="description" content="This is a payment page template based on Bootstrap 5">
	<title>Razorpay payment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
<script>
    alert("Hi!, Due to unavoidable situations, All the datas in the database are deleted, even I dont have any backup for this database 😭. I am working on it and will fix as soon as possible 🥰. Users Can't Use feel the full potential of this project")
</script>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-sm-center h-100">
				<div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
					<div class="text-center my-5">
						<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="logo" width="100">
					</div>
					<div class="card shadow-lg">
						<div class="card-body p-5">
							<h1 class="fs-4 card-title fw-bold mb-4">Pay Now</h1>
							<form method="POST" class="needs-validation" action="pay.php">
								<div class="mb-3">
									<label class="mb-2 text-muted" for="name">Name</label>
									<input id="name" type="text" class="form-control" name="name" value="" required autofocus>
									<div class="invalid-feedback">
										Name is required	
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="email">E-Mail Address</label>
									<input id="email" type="email" class="form-control" name="email" value="" required>
									<div class="invalid-feedback">
										Email is invalid
									</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="price">Price</label>
									<input id="price" type="text" class="form-control" name="price" required>
								    <div class="invalid-feedback">
								    	Price is required
							    	</div>
								</div>

								<div class="mb-3">
									<label class="mb-2 text-muted" for="phone">Phone Number</label>
									<input id="phone" type="text" class="form-control" name="phone" required>
								    <div class="invalid-feedback">
								    	Phone number is required
							    	</div>
								</div>

								<p class="form-text text-muted mb-3">
									By paying, you agree with our terms and conditions.
								</p>

								<div class="align-items-center d-flex">
									<button type="submit" class="btn btn-primary ms-auto">
										Pay Now	
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="text-center mt-5 text-muted">
						Copyright &copy; 2017-2021 &mdash; Your Company 
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/login.js"></script>
</body>
</html>
