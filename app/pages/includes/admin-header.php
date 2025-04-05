<!DOCTYPE html>
<html lang="en">
<head>
	<title>AJALA AFRICA</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?=ROOT?>/assets/css/stylez.css">
	<script src="https://cdn.tiny.cloud/1/7o4jlslzrsi71o52v14qiqfp4lo7vj6hndurpabz56n2wkbz/tinymce/6/tinymce.min.js"
                    referrerpolicy="origin"></script>
    
<!-- jQuery from CDN -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Summernote CSS & JS from CDN  -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.css" rel="stylesheet"> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-lite.min.js"></script> 


  
</head>
<body>
	<style>
		header a{
			color: white;
		}

		.dropdown-list{
			background-color: #444;
		}
	</style>
	<header style="background-color: #6f6af8; color: white;">
		 <div class="logo-holder">
			<a href="<?=ROOT?>"><img class="logo" src="<?=ROOT?>/assets/images/logo1.png"></a>
		</div>
		<div class="header-div">
			<div class="main-title">
				ADMIN AREA
				<div class="socials">
				
				</div>
			</div>
			<div class="main-nav">
				<div class="nav-item"><a href="<?=ROOT?>/admin">Dashboard</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/users">Users</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/songs">Songs</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/categories">Categories</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/artists">Artists</a></div>
				<div class="nav-item"><a href="<?=ROOT?>/admin/blogs">Blog</a></div>
				<div class="nav-item dropdown">
					<a href="#">Hi, <?=user('username')?></a>
					<div class="dropdown-list">
						<div class="nav-item"><a href="<?=ROOT?>/profile">Profile</a></div>
						<div class="nav-item"><a href="<?=ROOT?>">Website</a></div>
						<div class="nav-item"><a href="<?=ROOT?>/logout">Logout</a></div>
					</div>
				</div>
			</div>
		</div>
	</header>

	<?php if(message()):?>
		<div class="alert"><?=message('',true)?></div>
	<?php endif;?>