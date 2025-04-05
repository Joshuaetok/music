<?php require page("includes/header"); ?>
	
	<center><div class="section-title">Blog Post</div></center>

	<section class="content">
		
		<?php
  $slug = $URL[1] ?? null;
  $query = "select * from blogs where slug = :slug limit 1";
  $row = db_query_one($query, ["slug" => $slug]);
  ?>

		<?php if (!empty($row)): ?>
			<?php include page("blog-full"); ?>
		<?php endif; ?>

	</section>

<?php require page("includes/footer"); ?>