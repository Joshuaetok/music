<!--start music card-->
<div class="music-card-full" style="max-width: 800px;">
	
	<h2 class="card-title" style="color: black;"><?=esc($row['title'])?></h2>

	<div style="overflow: hidden;">
		<img src="<?=ROOT?>/<?=$row['image']?>">
	</div>
	<div class="card-content">
		<div>	<?= html_entity_decode(esc($row['description'])) ?>
</div>

	</div>
</div>
<!--end music card-->
