<?php
session_start();
include('connection.php');
$q = "select * from categories";
$element = mysqli_query($dbc, $q);
?>


<!DOCTYPE html>

<html data-wf-page="58af4efed7e833d72d0c44eb" data-wf-site="57bab4d00c7bdb623822fa70">
<head>
  <meta charset="utf-8">
  <title>Content</title>
  <meta content="Nibble" property="title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  
  <link href="../css/normalize.css" rel="stylesheet" type="text/css">
  <link href="../css/framework.css" rel="stylesheet" type="text/css">
  <link href="../css/style.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript">
    WebFont.load({
      google: {
        families: ["Open Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic","Montserrat:400,700","Great Vibes:400","Source Sans Pro:200,200italic,300,300italic,regular,italic,600,600italic,700,700italic,900,900italic","Fjalla One:regular"]
      }
    });
  </script>
  <script src="../js/modernizr.js" type="text/javascript"></script>
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="https://daks2k3a4ib2z.cloudfront.net/img/webclip.png" rel="apple-touch-icon">
</head>
<body>
  <div class="nav-bar w-nav" data-animation="default" data-collapse="medium" data-duration="400">
    <div class="container-nav w-container">
<!--   nibble logo  -->
      <a class="brand w-nav-brand" href="../index.html"><img src="../images/logo-pegasus2.svg" width="186">
      </a>
      <nav class="nav-menu w-nav-menu" role="navigation">
        <div class="nav-link w-dropdown" data-delay="0" data-hover="1">
          <div class="dropdown-toggle w-dropdown-toggle">
            <div>Home</div>
            <div class="dropdown-arrow w-icon-dropdown-toggle"></div>
          </div>
          <nav class="dropdown-list w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="../index.html">Homepage Intro</a><a class="dropdown-link w-dropdown-link" href="../old-home.html">Homepage 1</a><a class="dropdown-link w-dropdown-link" href="../home-1.html">Homepage 2</a><a class="dropdown-link w-dropdown-link" href="../home-2.html">Homepage 3</a><a class="dropdown-link w-dropdown-link" href="../home-portfolio.html">Homepage 4</a><a class="dropdown-link w-dropdown-link" href="../homepage-6.html">Homepage 5</a><a class="dropdown-link w-dropdown-link" href="../demo-1.html">Homepage 6</a>
          </nav>
        </div>
        <div class="nav-link w-dropdown" data-delay="0" data-hover="1">
          <div class="dropdown-toggle w-dropdown-toggle">
            <div>Demos</div>
            <div class="dropdown-arrow w-icon-dropdown-toggle"></div>
          </div>
          <nav class="dropdown-list w-dropdown-list"><a class="dropdown-link w-dropdown-link" href="../demo-two.html">Demo Nonprofit</a><a class="dropdown-link w-dropdown-link" href="#">Demo Medical</a><a class="dropdown-link w-dropdown-link" href="#">Demo Spa</a><a class="dropdown-link w-dropdown-link" href="../demo-travel.html">Demo Travel</a><a class="dropdown-link w-dropdown-link" href="#">Demo Restaurant</a><a class="dropdown-link w-dropdown-link" href="#">Demo Gym</a>
          </nav>
        </div><a class="nav-link w-nav-link" href="../download.html">Download</a><a class="nav-link w-nav-link" href="../about-us.html">About</a><a class="nav-link w-nav-link" href="../support.html">Support</a><a class="nav-link w-nav-link" href="../pricing.html">Pricing</a><a class="nav-link w-nav-link" href="blog.php">Blog</a><a class="nav-link w-nav-link" href="../contact-2.html">Contact</a>
      </nav>
      <div class="menu-button w-nav-button">
        <div class="icon w-icon-nav-menu"></div>
      </div>
    </div>
  </div>
  <div class="hero section">
    <div class="center container w-container"></div>
    <div class="w-container">
      <h1 class="center heading white">Categories</h1>
      <p class="_2 center paragraph white">This section brings everything you could possibly want it to do and not only that,
        <br>it is beautifully designed and extremely intuitive to use for the students.</p>

<!---    blocks start from here onwards  -->
 
<?php 
if(mysqli_num_rows($element)>0) {  $i=0; $y=0;
  while($row=mysqli_fetch_assoc($element)){ $i=$i+1;   ?>
<?php  if($i%3==1) {?>
   <div class="blog-row w-row">   
<?php   } 
else 
{
$y++;  }
 ?>
        <div class="w-col w-col-4">
          <a class="_4 blog-column w-inline-block"  onclick= "<?php $_SESSION['value']="English" ?> " href="category-detail.php?category=<?php echo $row['title']; ?>"   >
            <div class="date-line w-clearfix">
              <h6 class="date-blog">  <!--   <?php echo $row['date'];  ?>   -->

</h6>
            </div>
            <div class="div-text">
              <div class="mini-tittle"><?php echo $row['description'];  ?></div>
              <h4 class="bigger-tittle"><?php echo $row['title'];  ?></h4>
              <div class="by mini-tittle">By</div>
              <h5 class="link"><?php echo $row['author'];  ?></h5>
            </div>
          </a>
        </div>
 <?php  if($y==2) {?>
</div>
<?php $y=0; }  ?>
<?php  }     }  ?>
  <br><br>
</div>
<!----  ends here for now  -->

<!---  hardcoded text   -----
        <div class="w-col w-col-4">
          <a class="_2 _3 blog-column w-inline-block" href="post-detail.php">
            <div class="date-line w-clearfix">
              <h3 class="date-blog">JAN 07</h3>
            </div>
            <div class="div-text">
              <div class="mini-tittle">Linear Programming</div>
              <h4 class="bigger-tittle">MATHEMATICS</h4>
              <div class="by mini-tittle">By</div>
              <h5 class="link">Toni Montory</h5>
            </div>
          </a>
        </div>
        <div class="w-col w-col-4">
          <a class="_5 blog-column w-inline-block" href="../portfolio/single-page-portfolio.html">
            <div class="date-line w-clearfix">
              <h3 class="date-blog">JAN 07</h3>
            </div>
            <div class="div-text">
              <div class="mini-tittle">evs</div>
              <h4 class="bigger-tittle">ENVIRONMENT STUDIES</h4>
              <div class="by mini-tittle">By</div>
              <h5 class="link">Toni Montory</h5>
            </div>
          </a>
        </div>
      </div>
      <div class="blog-row w-row">
        <div class="w-col w-col-4">
          <a class="_6 blog-column w-inline-block" href="../portfolio/single-page-portfolio.html">
            <div class="date-line w-clearfix">
              <h3 class="date-blog">JAN 07</h3>
            </div>
            <div class="div-text">
              <div class="mini-tittle">Organic</div>
              <h4 class="bigger-tittle">CHEMISTRY</h4>
              <div class="by mini-tittle">By</div>
              <h5 class="link">Toni Montory</h5>
            </div>
          </a>
        </div>
        <div class="w-col w-col-4">
          <a class="_3 blog-column w-inline-block" href="../portfolio/single-page-portfolio.html">
            <div class="date-line w-clearfix">
              <h3 class="date-blog">JAN 07</h3>
            </div>
            <div class="div-text">
              <div class="mini-tittle">Magnetism</div>
              <h4 class="bigger-tittle">PHYSICS</h4>
              <div class="by mini-tittle">By</div>
              <h5 class="link">Toni Montory</h5>
            </div>
          </a>
        </div>
        <div class="w-col w-col-4">
          <a class="_6 blog-column last w-inline-block" href="../portfolio/single-page-portfolio.html">
            <div class="date-line w-clearfix">
              <h3 class="date-blog">JAN 07</h3>
            </div>
            <div class="div-text">
              <div class="mini-tittle">Civics</div>
              <h4 class="bigger-tittle">SOCIAL STUDIES</h4>
              <div class="by mini-tittle">By</div>
              <h5 class="link">Toni Montory</h5>
            </div>
          </a>
        </div>
      </div>


-----   ends here --->
 


    <div class="_3 containe trial w-container">
      <div class="div-text">
        <div class="news-text-section">Subscribe for Your
          <br>Latest Updates!</div>
        <div class="_2 news-text-section subtitle">Unite with us.
          <br>These are the efforts done for the sake of students.</div>
      </div>
      <div class="trial-wrapper w-form">
        <form class="w-clearfix" data-name="Email Form" id="email-form" name="email-form">
          <input class="trial-field w-input" data-name="Email 5" id="email-5" maxlength="256" name="email-5" placeholder="Enter your email address" required="required" type="email">
          <input class="sec trial-button w-button" data-wait="Please wait..." type="submit" value="Sign up now!">
        </form>
        <div class="w-form-done">
          <div>Thank you! Your submission has been received!</div>
        </div>
        <div class="w-form-fail">
          <div>Oops! Something went wrong while submitting the form</div>
        </div>
      </div>
    </div>
    <div class="footer-container w-container"></div>
    <div class="containner-footer w-container"><img class="_2 logo-footer" src="../images/logo-pegasus2.svg" width="140">
      <p class="_2 lft">Copyright Themeple ÃÂÃÂ© Pegasus&nbsp;- 2017&nbsp;</p>
      <div class="_2 div-social w-clearfix">
        <div class="social-icon w-clearfix wrapper"><img class="social-icon" src="../images/facebook-logo-1.png">
        </div>
        <div class="social-icon w-clearfix wrapper"><img class="_2 social-icon" src="../images/twitter.png" width="32">
        </div>
        <div class="social-icon w-clearfix wrapper"><img class="_3 social-icon" src="../images/google-logo.png">
        </div>
        <div class="_4 social-icon w-clearfix wrapper"><img class="_3 social-icon" height="64" src="../images/Pinterest.png">
        </div>
      </div>
    </div>
  </div>
  <div class="_2 dark-bootom footer"></div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="../js/pegasus.js" type="text/javascript"></script>
  <!-- [if lte IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif] -->
</body>
</html>