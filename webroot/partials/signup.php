<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Responsive facebook like homepage, Registration and login with twitter bootstrap 3.0 - wsnippets.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- <link href="css/sticky-footer.css" rel="stylesheet"> -->
    <link href="../assets/css/signup.css" rel="stylesheet">
	</head>

  <body>
    <div id="wrap">
      <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://wsnippets.com">wsnippets.com</a>
          </div>
		  <div class="collapse navbar-collapse">
           	<form class="navbar-form navbar-right" id="header-form" role="form">
				  <div class="lt-left">
					  <div class="form-group">
						<label for="exampleInputEmail2">Email or Phone</label>
						<input type="email" class="form-control input-sm" id="exampleInputEmail2" placeholder="Email or Phone">
					  </div>
					  <div class="form-group">
						<label for="exampleInputPassword2">Password</label>
						<input type="password" class="form-control input-sm" id="exampleInputPassword2" placeholder="Password">
					  </div>
					  <div class="checkbox">
						<label>
						  <input type="checkbox"> Remember me
						</label>
					  </div>
				  </div>
				  <div class="lt-right">
					<button type="submit" class="login-btn">Login</button>
				  </div>
				</form>

          </div>
        </div>
      </div>
      <div class="container" id="home">
		<div class="row">
			<div class="col-md-7">
				<h3 class="slogan">
					Facebook helps you connect and share with the people in your life.
				</h3>
				<img src="/MonSite/assets/images/background.png" class="img-responsive" />
			</div>
			<div class="col-md-5">
			<form action="#" method="post" class="form" role="form">
			<legend><a>Create your account</a></legend>
            <h4>It's free and always will be.</h4>
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control input-md" name="firstname" placeholder="First Name" type="text" autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control input-md" name="lastname" placeholder="Last Name" type="text" />
                </div>
            </div>
            <input class="form-control input-lg" name="youremail" placeholder="Your Email" type="email" />
            <input class="form-control input-lg" name="reenteremail" placeholder="Re-enter Email" type="email" />
            <input class="form-control input-lg" name="password" placeholder="New Password" type="password" />
            <label for="">
                Birth Date</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control input-lg">
                        <option value="Month">Month</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control input-lg">
                        <option value="Day">Day</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control input-lg">
                        <option value="Year">Year</option>
                    </select>
                </div>
            </div>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                Female
            </label>
            <br />
			<span class="help-block">By clicking Create my account, you agree to our Terms and that you have read our Data Use Policy, including our Cookie Use.</span>
            <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit">
                Create my account</button>
            </form>

			</div>
		</div>
      </div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="text-muted credit"><a href="http://wsnippets.com">WSnippets.com</a></p>
      </div>
    </div>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>