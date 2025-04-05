<!DOCTYPE html>
<html lang="en">
<head>
	<title><?=ucfirst($URL[0])?> - Music Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/style.css?67er">
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


	<div class="nav-container">
    <div class="nav-item"><a href="<?=ROOT?>">Home</a></div>

    <div class="nav-item"><a href="<?=ROOT?>/music">Music</a></div>
    
    <div class="nav-item dropdown">
        <a href="#">Category</a>
        <?php 
            $query = "select * from categories order by category asc";
            $categories = db_query($query);
        ?>
        <div class="dropdown-list">
            <?php if(!empty($categories)):?>
                <?php foreach($categories as $cat):?>
                    <div class="nav-item"><a href="<?=ROOT?>/category/<?=$cat['category']?>"><?=$cat['category']?></a></div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
    
    <div class="nav-item"><a href="<?=ROOT?>/artists">Artists</a></div>
    <div class="nav-item"><a href="<?=ROOT?>/about">About us</a></div>
    <div class="nav-item"><a href="<?=ROOT?>/contact">Contact us</a></div>
    
    <?php if(logged_in()):?>
        <div class="nav-item dropdown">
            <a href="#">Hi, <?=user('username')?></a>
            <div class="dropdown-list">
                <div class="nav-item"><a href="<?=ROOT?>/admin/users/edit/<?=user('id')?>">Profile</a></div>
                <div class="nav-item"><a href="<?=ROOT?>/admin">Admin</a></div>
                <div class="nav-item"><a href="<?=ROOT?>/logout">Logout</a></div>
            </div>
        </div>
    <?php endif;?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const navItems = document.querySelector('.nav-container');
    const dropdownLists = document.querySelectorAll('.dropdown-list');

    // Open dropdown on hover
    navItems.addEventListener('mouseover', function (event) {
        const target = event.target;
        if (target.classList.contains('dropdown')) {
            const dropdownList = target.querySelector('.dropdown-list');
            if (dropdownList) {
                dropdownList.style.display = 'block';
            }
        }
    });

    // Close dropdown when not hovering
    navItems.addEventListener('mouseout', function (event) {
        const target = event.target;
        if (target.classList.contains('dropdown')) {
            const dropdownList = target.querySelector('.dropdown-list');
            if (dropdownList) {
                dropdownList.style.display = 'none';
            }
        }
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        if (!event.target.closest('.dropdown')) {
            dropdownLists.forEach(function (dropdownList) {
                dropdownList.style.display = 'none';
            });
        }
    });
});

</script>
	</header>
	
	