<!--start music card-->
<style>
    .music-card {
        border-radius: 10px;
        width: 221px; /* Adjust the width as needed */
        overflow: hidden;
        position: relative;
    }

    .music-card img {
        width: 100%;
        height: 221px;
        display: block;
    }

    .card-content {
        padding: 10px;
    }

    .card-title {
      height:auto;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
        word-wrap: break-word;
    }
</style>

<div class="music-card">
    <div class="card-image-container">
        <a href="<?=ROOT?>/blog/<?=$row['slug']?>"><img src="<?=ROOT?>/<?=$row['image']?>"></a>
    </div>
    <div class="card-content">
        <div class="card-title"><strong><?= esc($row['title']) ?></strong></div>
    </div>
</div>
<!--end music card-->