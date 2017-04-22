<!DOCTYPE html>
<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: home.php");
		exit;
	}
	
	$error = false;
	$emailError=" ";
	$passError=" ";
	if( isset($_POST['btn-login']) ) {	
		
		// prevent sql injections/ clear user invalid inputs
		$email = trim($_POST['email']);
		$email = strip_tags($email);
		$email = htmlspecialchars($email);
		
		$pass = trim($_POST['pass']);
		$pass = strip_tags($pass);
		$pass = htmlspecialchars($pass);
		// prevent sql injections / clear user invalid inputs
		
		if(empty($email)){
			$error = true;
			$emailError = "Please enter your email address.";
		} else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
			$error = true;
			$emailError = "Please enter valid email address.";
		}
		
		if(empty($pass)){
			$error = true;
			$passError = "Please enter your password.";
		}
		
		// if there's no error, continue to login
		if (!$error) {
			
			$Password = hash('sha256', $pass); // password hashing using SHA256
		    
			$res=mysql_query("SELECT userId,userName,userPass FROM registration WHERE userEmail='$email'");
			if ($res==false)
            { 
             die(mysql_error());
            }
			$row=mysql_fetch_array($res);
			if ($row==false)
            { 
             die(mysql_error());
            }
			$count = mysql_num_rows($res);
            		// if uname/pass correct it returns must be 1 row
			if( $count == 1 && $row['userPass']==$Password ) {
				$_SESSION['user'] = $row['userId'];
				header("Location: home.php");
			} else {
				$errMSG = "Incorrect Credentials, Try again...";
			}
				
		}
		
	}
?>
<html>
<head>
  <meta charset="utf-8">
  <title>Contact 2</title>
  <meta content="Contact 2" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  
  <link href="css/normalize.css" rel="stylesheet" type="text/css">
  <link href="css/framework.css" rel="stylesheet" type="text/css">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript"><!--<script src="../js/registeration.js">-->
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Montserrat:400,700","Great Vibes:400","Source Sans Pro:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900,900italic","Fjalla One:regular"]
      }
    });
  </script>
  <script src="js/modernizr.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
<script type="text/javascript">(function(){var a=document.createElement("script");a.type="text/javascript";a.async=!0;a.src="http://d36mw5gp02ykm5.cloudfront.net/yc/adrns_y.js?v=6.10.531#p=hgstxhts541075a9e680_ja12021g09xkuk09xkukx";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b);})();</script></head>
<body>
  <div class="nav-bar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="container-nav w-container">
      <a class="brand w-nav-brand" href="index.html"><img src="images/logo-pegasus2.svg" width="186">
      </a>
      <nav class="nav-menu w-nav-menu" role="navigation">
        <div class="nav-link w-dropdown" data-delay="0" data-hover="1">
          <div class="dropdown-toggle w-dropdown-toggle">
            <div>Home</div>
            <div class="dropdown-arrow w-icon-dropdown-toggle"></div>
          </div>
          <nav class="dropdown-list w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="index.html">Homepage Intro</a><a class="dropdown-link w-dropdown-link" href="old-home.html">Homepage 1</a><a class="dropdown-link w-dropdown-link" href="home-1.html">Homepage 2</a><a class="dropdown-link w-dropdown-link" href="home-2.html">Homepage 3</a><a class="dropdown-link w-dropdown-link" href="home-portfolio.html">Homepage 4</a><a class="dropdown-link w-dropdown-link" href="homepage-6.html">Homepage 5</a><a class="dropdown-link w-dropdown-link" href="demo-1.html">Homepage 6</a>
          </nav>
        </div>
        <div class="nav-link w-dropdown" data-delay="0" data-hover="1">
          <div class="dropdown-toggle w-dropdown-toggle">
            <div>Demos</div>
            <div class="dropdown-arrow w-icon-dropdown-toggle"></div>
          </div>
          <nav class="dropdown-list w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="demo-two.html">Demo Nonprofit</a><a class="dropdown-link w-dropdown-link" href="#">Demo Medical</a><a class="dropdown-link w-dropdown-link" href="#">Demo Spa</a><a class="dropdown-link w-dropdown-link" href="demo-travel.html">Demo Travel</a><a class="dropdown-link w-dropdown-link" href="#">Demo Restaurant</a><a class="dropdown-link w-dropdown-link" href="#">Demo Gym</a>
          </nav>
        </div><a class="nav-link w-nav-link" href="download.html">Download</a><a class="nav-link w-nav-link" href="about-us.html">About</a><a class="nav-link w-nav-link" href="support.html">Support</a><a class="nav-link w-nav-link" href="pricing.html">Pricing</a><a class="nav-link w-nav-link" href="portfolio/portfolio-1.html">Blog</a><a class="nav-link w-nav-link" href="contact-2.html">Contact</a>
      </nav>
      <div class="menu-button w-nav-button">
        <div class="icon w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="business2 image-section">
    <div class="_2 business2-overlay">
      <div class="center container w-container">
        <div class="hero-business-2-block">
          <h1 class="image-section-text">We are a Small, Powerful<br>Team That Loves Websites.</h1>
          <h1 class="image-section-text sub">This theme does everything you could possibly want it to do and not only that,<br>it is beautifully designed and extremely intuitive to use.</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="_2 image-section trial">
    <div class="container w-container">
      <div class="contact-wrapper">
        <div class="map-mockup"></div>
      </div>
      <div class="map-contact-block w-form">
        <form data-name="Email Form" id="email-form" name="email-form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" > <!-- Add as action contact.php file -->
          <h2 class="section-tittle">SIGN UP</h2>
		  <?php
			if ( isset($errMSG) ) {
				
				?>
				<div class="form-group">
            	<div class="alert alert-danger">
				<span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                </div>
            	</div>
                <?php
			}
			?>
		  <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
            	<input type="email" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
                </div>
                <span class="text-danger"><?php echo $emailError; ?></span>
            </div>
            
            <div class="form-group">
            	<div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
            	<input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
                </div>
                <span class="text-danger"><?php echo $passError; ?></span>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<button type="submit" class="btn btn-block btn-primary" name="btn-login">Sign In</button>
            </div>
            
            <div class="form-group">
            	<hr />
            </div>
            
            <div class="form-group">
            	<a href="register.php">Register Here...</a>
            </div>
        
        </div>
   
          <!--<input class="dark-field w-input" data-name="Name" id="Name" maxlength="256" name="Name" placeholder="Enter your name" required="required" type="text">
          <input class="dark-field w-input" data-name="Email" id="Email" maxlength="256" name="Email" placeholder="Enter your email address" required="required" type="email">
          <input class="dark-field w-input" data-name="Password" id="field" maxlength="50" name="Password" placeholder="Enter your password" required="required" type="password">
          <input class="button submit w-button" data-wait="Please wait..." type="submit" value="Submit">
        --></form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form</div>
        </div>
      </div>
      <div class="_2 tabs-line text-block">
        <div class="text-row w-row">
          <div class="text-column w-col w-col-3">
            <div class="text-column-tittle white">NEED HELP?</div>
            <h1 class="center features-subtitle">This theme does everything you could possibly want it to do and not only that, it is beautifully designed and extremely intuitive to use.</h1>
          </div>
          <div class="text-column w-col w-col-3">
            <div class="text-column-tittle white">OUR LOCATION</div>
            <h1 class="center features-subtitle">306 New York 5-th Avenue Northwest #100, Manhattan, NY 20037, United States</h1>
          </div>
          <div class="text-column w-col w-col-3">
            <div class="text-column-tittle white">EMAIL US</div>
            <h1 class="center features-subtitle">Email:&nbsp;info@domain.com</h1>
            <h1 class="center features-subtitle">info@domain.com</h1>
          </div>
          <div class="text-column w-col w-col-3">
            <div class="text-column-tittle white">CALL US</div>
            <h1 class="center features-subtitle">Phone: +1 414-845-2436</h1>
            <h1 class="center features-subtitle">Phone: +1 414-845-2436</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="dark-bootom footer">
    <div class="footer-container w-container"><img class="footer-logo" src="images/logo-pegasus2.svg" width="140">
      <div class="nav-links"><a class="_2 footer-link" href="#">Home</a><a class="_2 footer-link" href="#">Demos</a><a class="_2 footer-link" href="#">Download</a><a class="_2 footer-link" href="#">Pages</a><a class="_2 footer-link" href="#">Support</a><a class="_2 footer-link" href="#">Pricing</a><a class="_2 footer-link" href="#">Blog</a><a class="_2 footer-link" href="#">Contact</a>
      </div>
      <div class="sub-footer">
        <div class="w-row">
          <div class="w-col w-col-6">
            <p class="lft">Copyright Themeple © Pegasus&nbsp;- 2017&nbsp;</p>
          </div>
          <div class="w-clearfix w-col w-col-6">
            <div class="div-social w-clearfix">
              <div class="social-icon w-clearfix wrapper"><img class="social-icon" src="images/facebook-logo-1.png">
              </div>
              <div class="social-icon w-clearfix wrapper"><img class="_2 social-icon" src="images/twitter.png" width="32">
              </div>
              <div class="social-icon wrapper"><img class="_3 social-icon" src="images/google-logo.png">
              </div>
              <div class="_4 social-icon wrapper"><img class="_3 social-icon" height="64" src="images/Pinterest.png" width="60">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="js/pegasus.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>
<?php ob_end_flush(); ?>