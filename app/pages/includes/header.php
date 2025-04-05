
<!DOCTYPE html>

<html lang="en">

<head>

 
    
    
<?php include page('og-meta-tag') ?>
    
    
    
	<title><?=ucfirst($URL[0])?> - AJALA AFRICA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		  <!-- Favicon for modern browsers -->
  <link style="background-color: #1e1e66; "rel="icon" href="<?=ROOT?>/assets/images/ajalalogo.png" type="image/png" sizes="32x32">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!-- Favicon for IE -->
  <link style="background-color: #1e1e66;" rel="icon" href="<?=ROOT?>/assets/images/ajalalogo.png" type="image/x-icon">
  
  <!-- Apple Touch Icon (iOS) -->
  <link style="background-color: #1e1e66;" rel="apple-touch-icon" sizes="180x180" href="<?=ROOT?>/assets/images/ajalalogo.png">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/style.css?67er">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<link rel="stylesheet" type="/text/css" href="<?=ROOT?>assets/css/bootstrap-icons.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> <!-- ICONSCOUT CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
	<!-- Animation Links -->
	<link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
		<link rel="icon" href="images/favicon.jpg"/>
		<link href="<?=ROOT?>/assets/css/owl.carousel.min.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/owl.theme.default.min.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/lightbox.min.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/owl.theme.default.min.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/animate.min.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/normalize.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/styles.css" rel="stylesheet"/>
		<link href="<?=ROOT?>/assets/css/responsive.css" rel="stylesheet"/>
	<!-- End of Animation Links -->
	
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!------- GOOGLE FONTS(MONTSERRAT) -->
</head>
<body>

	<header>

<nav>
    <div class="container nav__container">
        <div class="nav__logo"><a href="<?=ROOT?>" style="color: white;"><img class="logo" style="width: auto; height: 4em";" src="<?=ROOT?>/assets/images/logo1.png" ></a></div>
        <ul class="nav__items">
          <li><a href="<?=ROOT?>" style="color: white;" class="item__color">Home</a></li>
            <li><a href="<?=ROOT?>/music" style="color: white;" class="item__color">Music</a></li>
            <li><a href="<?=ROOT?>/playlist" style="color: white;" class="item__color">Playlist</a></li>
        <!--    <li class="nav__profile">
                <a href="#" class="item__color">Category</a>
                <ul> 
                    <li><a href="#">Country</a></li>
                    <li><a href="#">Pop</a></li>
                    <li><a href="#">R&B</a></li>
                </ul> 
            </li> -->
            <li><a href="<?=ROOT?>/blogs" style="color: white;" class="item__color">Blog</a></li>
            <li><a href="<?=ROOT?>/about" style="color: white;" class="item__color">About</a></li>
            <li class="nav__profile">
                <a href="#" style="color: white;" class="item__color">Hi, <?=user('username')?></a>
                <ul>
                    <li><a href="<?=ROOT?>/admin/profile" style="color: white;" class="item__color">Profile</a></li>
                    <li><a href="<?=ROOT?>/admin" style="color: white;" class="item__color">Admin</a></li>
                    <li><a href="<?=ROOT?>/logout" style="color: white;" class="item__color">Logout</a></li>
                </ul>
            </li>
        </ul>

        <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
        <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
<!-- ============end of nav========= -->


  </header>
