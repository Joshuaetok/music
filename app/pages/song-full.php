<?php
//**REMOVE THIS CODE*************
// db_query("update songs set downloads = downloads + 500 where id = :id limit 1",['id'=>$row['id']]);
//************************"""""""""

// Additional code (if needed)
?>

<!-- Start music card -->
<style>
  .music-card-full {
    max-width: 800px;
  }

  .stats {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
  }
  @media (max-width: 768px){
    .stats {
    display: flex;
    flex-direction: column;
    margin-top: 10px;
  }
  }



  .stats-item {
    padding: 10px;
    border-radius: 5px;
    color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
    text-align:center;
    font-weight:bold;
    margin: 20px 0;
  }

  #viewsCount {
    background: linear-gradient(to right, #1e1e66, #ff7e5f);
  }

  #downloadsCount {
    background: linear-gradient(to left, #1e1e66, #6699ff);
  }

  .download {
    text-align:center;
    margin: 20px 0;
    padding: 10px;
    font-weight:bold;
    background-color: lightgray;
    /* Add any specific styles for the download button container */
  }
</style>

<div class="music-card-full">
    <h2 class="card-title"><?= esc(ucwords($row["title"])) ?></h2>
    <div class="card-subtitle"><b>By:</b> <?= esc(
      ucwords(get_artist($row["artist_id"]))
    ) ?></div>
    <div><b>Date Added:</b> <?= get_date($row["date"]) ?></div>
    <br>

    <div style="overflow: hidden;">
        <a href="<?= ROOT ?>/song/<?= $row[
  "slug"
] ?>"><img src="<?= ROOT ?>/<?= $row["image"] ?>"></a>
    </div>
    <br>
    <br>

    <div class="card-content">
        <audio controls style="width: 100%">
            <source src="<?= ROOT ?>/<?= $row["file"] ?>" type="audio/mpeg">
        </audio>

        <div class="stats">
            <div id="viewsCount" class="stats-item views">
                Streams: <?= formatNumber($row["views"]) ?>
            </div>

            <div class="download">
               <a href="<?= ROOT ?>/download/<?= $row["slug"] ?>">
                    <button class="btn bg-purple"> <i class="fas fa-download" style="margin-right:15px;"></i>Download</button>
                </a>
            </div>

            <div id="downloadsCount" class="stats-item downloads">
                Downloads: <?= formatNumber($row["downloads"]) ?>
            </div>
        </div>
    </div>
</div>
<!-- End music card -->
<!-- Output PHP values as data attributes in an HTML element -->
<div id="phpValues"
     data-initial-views="<?= $row["views"] ?>"
     data-initial-downloads="<?= $row["downloads"] ?>"
     data-current-song-id="<?= $row["id"] ?>">
</div>

<?php 
//**function that formats number and displays the formatted number
function formatNumber($number) {
    if ($number >= 1000000) {
        return number_format($number / 1000000, 2, '.', '') . ' M';
    } elseif ($number >= 1000) {
        return number_format($number / 1000, 2, '.', '') . ' K';
    } else {
        return number_format($number, 0, '.', ',');
    }
}



?>



<!-- Include your external JavaScript file -->



  <script src="<?= ROOT ?>/assets/js/song.j"></script>

<?php
// Assuming you have a database connection established

// Retrieve the song ID, increment value, and type from the AJAX request
$songId = isset($_POST["id"]) ? $_POST["id"] : null;
$increment = isset($_POST["increment"]) ? $_POST["increment"] : 0;
$type = isset($_POST["type"]) ? $_POST["type"] : null;

if ($songId !== null && $type !== null) {
  // Update the views or downloads in the database based on the type
  $columnName = $type === "views" ? "views" : "downloads";
  db_query(
    "UPDATE songs SET $columnName = $columnName + $increment WHERE id = :id LIMIT 1",
    ["id" => $songId]
  );

  // Send a response back to the JavaScript, if needed
  echo ucfirst($type) . " count updated successfully";
} else {
  // Handle the case where the song ID or type is not specified
  //echo "Error: Song ID or type not specified";
}


?>