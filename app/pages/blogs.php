<?php require page('includes/header')?>
	
	<div class="section-title">Music</div>

	<section class="content">
		
		<?php 

			$rows = db_query("select * from blogs order by id desc limit 12");

		?>

		<?php if(!empty($rows)):?>
			<?php foreach($rows as $row):?>
				<?php include page('includes/blog')?>
			<?php endforeach;?>
		<?php endif;?>

	</section>

<?php require page('includes/footer')?>