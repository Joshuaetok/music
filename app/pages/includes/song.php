<style>
    .music-card {
        width: 221px;
        height: auto;
        background-color: #fff;
        color: #333;
        border-radius: 10px;
        border: 1px solid #ddd;
        cursor: pointer;
        overflow: hidden;
        margin: 10px;
        display: inline-block;
        transition: transform 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .music-card:hover {
        transform: scale(1.05);
    }

    .card-image-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px 10px 0 0;
    }

    .music-card img {
        width: 100%;
        height: 221px;
        object-fit: cover;
        transition: all 0.3s ease;
        border-radius: 10px 10px 0 0;
    }

    .music-card:hover .card-img {
        height: 120px;
        opacity: 0.9;
    }

    .play-pause {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height: 50px;
        width: 50px;
        background-color: #333;
        border-radius: 50%;
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .music-card:hover .play-pause {
        opacity: 0.8;
    }

    .play-pause-icon {
        font-size: 24px;
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .card-title {
        height: 30px;
        overflow: hidden;
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        color: #333;
        text-decoration: none;
        transition: color 0.3s ease;
        display: block;
    }

    .card-title:hover {
        color: #0066cc;
    }

    .card-subtitle {
        font-size: 14px;
        color: #555;
    }

    .card-subtitle i {
        margin-right: 5px;
        color: #333;
    }
    .playing{
      display: inline-block;
      height: 20px; !important
      width: 20px; !important
    }
    .playing .cd{
      height: 100%; !important
      width: 190%; !important
    }
</style>

<!--start music card-->
<div class="music-card">
    <div class="card-image-container">
        <img class="card-img" src="<?=ROOT?>/<?=$row['image']?>" alt="<?=esc($row['title'])?>">
        <div class="play-pause" onclick="toggleVolumePauseIcons(this)">
            <i class="uil uil-volume play-pause-icon" style="display: block;"></i>
            <i class="uil uil-pause play-pause-icon" style="display: none;"></i>
        </div>
      </div>
      <audio class="audioPlayer">
       <source src="<?=ROOT?>/<?=$row['file']?>" type="audio/mpeg">
    </audio>
    <div class="card-content">
      
        <div class="card-title" style="color: red;">
          <span class="playing">
             <img class="cd cd-stop" style="display: inline-block;"  src="<?=ROOT?>/assets/images/cd-stop.jpeg">
             <img class="cd cd-spin" style="display: none;" src="<?=ROOT?>/assets/images/cd-spin.webp">
           </span>
            <a href="<?=ROOT?>/song/<?=$row['slug']?>"><?=esc(ucwords($row['title']))?></a>
        </div>
        <div class="card-subtitle">                                                                                                       
            <b><i class="bi bi-person-fill"></i><?=esc(ucwords(get_artist($row['artist_id'])))?></b>
        </div>
        <div class="card-subtitle" style="padding-top:5px;">
            <i class ="bi bi-cone-striped"></i><?=esc(ucwords(get_category($row['category_id'])))?>
        </div>
    </div>
</div>
<!--end music card-->

<script>
    function toggleVolumePauseIcons(element) {
      console.log(element)
        var volumeIcon = element.querySelector('.uil-volume');
        var pauseIcon = element.querySelector('.uil-pause');
        var cdStop = element.parentElement.parentElement.querySelector('.cd-stop');
        var cdSpin = element.parentElement.parentElement.querySelector('.cd-spin');
        var song = element.parentElement.parentElement.querySelector('.audioPlayer');
        

        if (volumeIcon.style.display === 'block') {
            volumeIcon.style.display = 'none';
            pauseIcon.style.display = 'block';
            cdStop.style.display = 'none';
            cdSpin.style.display = 'inline-block';
            song.play()
        } else {
            volumeIcon.style.display = 'block';
            pauseIcon.style.display = 'none';
            cdStop.style.display = 'inline-block';
            cdSpin.style.display = 'none';
            song.pause()
        }
    }
</script>