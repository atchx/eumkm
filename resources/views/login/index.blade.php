<!doctype html>
<html lang="en">
  <head>
  	<title>Login Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="/logins/img/icon.png">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="/logins/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Selamat Datang</h2>
								<p>di Dashboard Admin E-UMKM</p>
							</div>
			      		</div>
						<div class="login-wrap p-4 p-lg-5">
			      			<div class="d-flex">
			      				<div class="w-100">
			      					<h3 class="mb-4">Silahkan Login</h3>
			      				</div>
			      			</div>
							<form action="/login" method="POST" class="signin-form">
								@csrf
								@if(session()->has('loginError'))
                        			<div class="alert alert-danger fade show" role="alert">
                            			{{ session('loginError') }}
                        			</div>
                        		@endif
			      				<div class="form-group mb-3">
			      					<label class="label" for="email">Email</label>
			      					<input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autofocus required value="{{ old('email') }}">
									@error('email')
										<div class="invalid-feedback">
											{{ $message }}
										</div>
									@enderror
			      				</div>
		            			<div class="form-group mb-3">
		            				<label class="label" for="password">Password</label>
		              				<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
		            			</div>
		            			<div class="form-group">
		            				<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
		            			</div>
		          			</form>
		        		</div>
		      		</div>
				</div>
			</div>
		</div>
	</section>

  <script src="/logins/js/jquery.min.js"></script>
  <script src="/logins/js/popper.js"></script>
  <script src="/logins/js/bootstrap.min.js"></script>
  <script src="/logins/js/main.js"></script>

	</body>
</html>

