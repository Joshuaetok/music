<?php require page('includes/header')?>


<style>
.btn-container{
  display: flex;
  justify-content: space-between;
}
            .custom-btn {
                display: block;
                text-decoration: none;
                color: white;
                background-color: #1e1e66;
                border-radius: 30px;
                padding: 0.7em;
                margin: 1em auto;
                height: 3em;
                width:10em;
                text-align: center;
                *left: 30em;
                flex-basis:50%;
            }
            a:hover {
                background-color: #1e1e66;
                color: white;
            }
            @media screen and (min-width: 600px) {
                .custom-btn {
                    flex-basis:50%;
                    
                }
            }
        </style>

        
        



<!----------------carousel ---------------------------------->

	<section id="home" class="welcome-area">

				<div class="welcome-slider-area">
					<div id="welcome-slide-carousel" class="carousel slide carousel-fade" data-ride="carousel">
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<div class="single-slide-item" style="background-image: url('<?=ROOT?>/assets/images/ajala1.jpg'); max-height: 100%; background-size:     cover;  
    background-repeat:   no-repeat;
    background-position: center center;          
">
									<div class="single-slide-item-table">
										<div class="single-slide-item-tablecell">
											<div class="containe" style="max-width: 100%;">
												<div class="row">
													<div class="col-md-12">
														<h2 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">Motivational</h2>
														<h1 style="width: 100%;" class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0" style=""> Talented <span> Inspiring</span></h1>
														<p class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="0">Ajala Africa's soulful voice, heartfelt lyrics offer solace and motivation, marking <br/> him as a dedicated artist on a musical journey..</p>
														
														<div class="single_slide_item_button wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s" data-wow-offset="0">
															<a href="<?=ROOT?>/playlist" class="slider_btn s_bg_btn">Playlist</a>
															<a href="<?=ROOT?>/contact" class="slider_btn">Contact</a> 
														</div>
													</div> <!-- END COL  -->
												</div> <!--END  ROW  -->
											</div> <!-- END CONTAINER -->
										</div>
									</div>
								</div> <!-- END SLIDER ITEM -->
						
										</div>
									</div>
								</div>
							</div> <!-- END SLIDER ITEM -->
						</div>
						
					 <!-- Controls -->
					  <a class="left carousel-control" href="#welcome-slide-carousel" role="button" data-slide="prev">
						<i class="ti-hand-point-left" aria-hidden="true"></i>
					  </a>
					  <a class="right carousel-control" href="#welcome-slide-carousel" role="button" data-slide="next">
						<i class="ti-hand-point-right" aria-hidden="true"></i>
					  </a>					
					</div>
				</div> <!-- END SLIDER AREA -->				
			</section>
		<!-- END  HOME DESIGN -->

	
	
	
	
	<!-- <div class="section-title">Featured</div> -->
<!-- Start songs Section -->

	<section class="content">
		<?php 
			//$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
			$rows = db_query("select * from songs order by id desc limit 3");
		?>
		<?php if(!empty($rows)):?>
			<?php foreach($rows as $row):?>
				<?php include page('includes/song')?>
			<?php endforeach;?>
		<?php else:?>
			<div class="m-2">No songs found</div>
		<?php endif;?>
		
	</section>
	<a style="max-width:200px;" class="custom-btn" href="<?=ROOT?>/music">View All Songs</a>

	<!-- End songs Section -->
	
	
	
<!-- Start Blog Section -->
<section class="content">
	<?php 

			//$rows = db_query("select * from songs where featured = 1 order by id desc limit 16");
			$rows = db_query("select * from blogs order by id desc limit 3");
		?>
		<?php if(!empty($rows)):?>
			<?php foreach($rows as $row):?>
				<?php include page('includes/blog')?>
			<?php endforeach;?>
		<?php else:?>
			<div class="m-2">No Posts found</div>
		<?php endif;?>
	</section>
	<a style="max-width:200px;" class="custom-btn" href="<?=ROOT?>/blogs">View All Posts</a>
<!-- End Blog Section -->
	
	
			<!-- START SERVICE -->

			<section id="service" class="section_padding">

				<div class="container">
			  	<div class="section_heading text-center wow zoomIn">
					
					
						<div class="section_heading_border">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div> <!-- END HEADING -->
					
					<div class="row text-center">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="single-service wow fadeInLeft">
							<a href="<?=ROOT?>/about">	<i class="uil uil-cloud-info"></i></a>
								<h4><a href="<?=ROOT?>/about">About</a></h4>
								<P>AJALA AFRICA promotes Africa's diversity, music, and art, fostering unity and cultural appreciation.</P>
							</div>
						</div> <!-- End Col -->
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="single-service wow fadeInDown">
							<a href="<?=ROOT?>/fan">	<i class="uil uil-heart"></i></a>
								<h4><a href="<?=ROOT?>/fan">Become A Fan</a></h4>
								<P>Embrace AJALA AFRICA's rhythms, join the tribe, and dance to Africa's heartbeat.</P>
							</div>
						</div> <!-- End Col -->						
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="single-service wow fadeInRight">
							<a href="<?=ROOT?>/playlist">	<i class="uil uil-users-alt"></i></a>
								<h4><a href="<?=ROOT?>/playlist">Ajala's Playlist</a></h4>
								<P>Discover joy in every beat, play AJALA AFRICA's songs, and feel the rhythm.</P>
							</div>
						</div> <!-- End Col -->
				<!--		<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="single-service wow fadeInLeft">
								<i class="uil uil-home"></i>
								<h4>Contact Us</h4>
								<P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis lectus tortorism.</P>
							</div>
						</div> <!-- End Col -->
			<!--			<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="single-service wow fadeInUp">
								<i class="fa fa-pie-chart"></i>
								<h4>Social Marketing</h4>
								<P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis lectus tortorism.</P>
							</div>
						</div> --><!-- End Col -->
			<!--			<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="single-service wow fadeInRight">
								<i class="fa fa-camera-retro"></i>
								<h4>Photography</h4>
								<P>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed venenatis lectus tortorism.</P>
							</div>
						</div>  --><!-- End Col -->
					</div>
				</div>	<!-- END CONTAINER -->
			</section>
		<!-- END SERVICE -->
	
	
	

<?php require page('includes/footer')?>