<?php require page('includes/header')?>

<style>
    .btn {
    margin-bottom: 5px;
    display: inline-block;
    font-weight: 400;
    color: white;
    text-align: center;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-color: #1e1e66;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>







	
	<div class="section-title">Music</div>

	<section class="content">
		
		<?php 
			$limit = 9;
			$offset = ($page - 1) * $limit;

			$rows = db_query("select * from songs order by id desc limit $limit offset $offset");

		?>

		<?php if(!empty($rows)):?>
			<?php foreach($rows as $row):?>
				<?php include page('includes/song')?>
			<?php endforeach;?>
		<?php endif;?>

	</section>

	<div class="mx-2">
		<a href="<?=ROOT?>/music?page=<?=$prev_page?>">
			<button class="btn bg-orange">Prev</button>
		</a>
		<a href="<?=ROOT?>/music?page=<?=$next_page?>">
			<button class="float-end btn bg-orange">Next</button>
		</a>
	</div>
<?php require page('includes/footer')?>