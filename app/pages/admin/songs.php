<?php

if ($action == "add") {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    //data validation
    if (empty($_POST["title"])) {
      $errors["title"] = "a title is required";
    } elseif (!preg_match("/^[a-zA-Z0-9 \.\&\-]+$/", $_POST["title"])) {
      $errors["title"] = "a title can only have letters & spaces";
    }

    if (empty($_POST["category_id"])) {
      $errors["category_id"] = "a category is required";
    }

    if (empty($_POST["artist_id"])) {
      $errors["artist_id"] = "an artist is required";
    }

    // image
    if (!empty($_FILES["image"]["name"])) {
      $folder = "uploads/";

      if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . "index.php", "");
      }

      $allowed = ["image/jpeg", "image/png"];

      if (
        $_FILES["image"]["error"] == 0 &&
        in_array($_FILES["image"]["type"], $allowed)
      ) {
        $destination_image = $folder . $_FILES["image"]["name"];
        $thumbnail_folder = "uploads/thumbs/";
        $thumbnail_width = 500; // Adjust as needed
        $thumbnail_height = 500; // Adjust as needed

        // Generate thumbnail file name
        $thumbnail_name = "thumb_" . $_FILES["image"]["name"];

        $thumbnail_destination = $thumbnail_folder . $thumbnail_name;

        move_uploaded_file($_FILES["image"]["tmp_name"], $destination_image);

        // Generate thumbnail
        list($width, $height) = getimagesize($destination_image);
        $thumb_create = imagecreatetruecolor(
          $thumbnail_width,
          $thumbnail_height
        );
        $source = imagecreatefromjpeg($destination_image); // Assuming it's a JPEG file

        imagecopyresized(
          $thumb_create,
          $source,
          0,
          0,
          0,
          0,
          $thumbnail_width,
          $thumbnail_height,
          $width,
          $height
        );
        imagejpeg($thumb_create, $thumbnail_destination, 100);

        // $thumbnail_destination now contains the path to the generated thumbnail
      } else {
        $errors["image"] =
          "Image not valid. Allowed types are " . implode(",", $allowed);
      }
    } else {
      $errors["image"] = "An image is required";
    }

    //audio file
    if (!empty($_FILES["file"]["name"])) {
      $folder = "uploads/";
      if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . "index.php", "");
      }

      $allowed = ["audio/mpeg"];
      if (
        $_FILES["file"]["error"] == 0 &&
        in_array($_FILES["file"]["type"], $allowed)
      ) {
        $destination_file = $folder . $_FILES["file"]["name"];

        move_uploaded_file($_FILES["file"]["tmp_name"], $destination_file);
      } else {
        $errors["file"] =
          "file not valid. allowed types are " . implode(",", $allowed);
      }
    } else {
      $errors["file"] = "an audio file is required";
    }

    if (empty($errors)) {$values = [];
$values["title"] = trim($_POST["title"]);
$values["category_id"] = trim($_POST["category_id"]);
$values["artist_id"] = trim($_POST["artist_id"]);
$values["image"] = $thumbnail_destination;
$values["file"] = $destination_file;
$values["user_id"] = user("id");
$values["date"] = date("Y-m-d H:i:s");
$values["views"] = 0;
$values["slug"] = str_to_url($values["title"]);
$values["downloads"] = 0; // Add this line to initialize downloads to 0

$query = "INSERT INTO songs (title, image, file, user_id, category_id, artist_id, date, views, slug, downloads) VALUES (:title, :image, :file, :user_id, :category_id, :artist_id, :date, :views, :slug, :downloads)";
db_query($query, $values);

      
      
      message("song created successfully");
      redirect("admin/songs");
    }
  }
} elseif ($action == "edit") {
  $query = "select * from songs where id = :id limit 1";
  $row = db_query_one($query, ["id" => $id]);

  if ($_SERVER["REQUEST_METHOD"] == "POST" && $row) {
    $errors = [];

    //data validation
    if (empty($_POST["title"])) {
      $errors["title"] = "a title is required";
    } elseif (!preg_match("/^[a-zA-Z0-9 \.\&\-]+$/", $_POST["title"])) {
      $errors["title"] = "a title can only have letters & spaces";
    }

    if (empty($_POST["category_id"])) {
      $errors["category_id"] = "a category is required";
    }

    if (empty($_POST["artist_id"])) {
      $errors["artist_id"] = "an artist is required";
    }

    //image
    if (!empty($_FILES["image"]["name"])) {
      $folder = "uploads/";
      if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . "index.php", "");
      }

      $allowed = ["image/jpeg", "image/png"];
      if (
        $_FILES["image"]["error"] == 0 &&
        in_array($_FILES["image"]["type"], $allowed)
      ) {
        
        $destination_image = $folder . $_FILES["image"]["name"];
        $thumbnail_folder = "uploads/thumbs/";
        $thumbnail_width = 500; // Adjust as needed
        $thumbnail_height = 500; // Adjust as needed

        // Generate thumbnail file name
        $thumbnail_name = "thumb_" . $_FILES["image"]["name"];

        $thumbnail_destination = $thumbnail_folder . $thumbnail_name;
        
        //************************
        //$destination_image = $folder . $_FILES["image"]["name"];

        move_uploaded_file($_FILES["image"]["tmp_name"], $destination_image);

        // Generate thumbnail
        list($width, $height) = getimagesize($destination_image);
        $thumb_create = imagecreatetruecolor(
          $thumbnail_width,
          $thumbnail_height
        );
        $source = imagecreatefromjpeg($destination_image); // Assuming it's a JPEG file

        imagecopyresized(
          $thumb_create,
          $source,
          0,
          0,
          0,
          0,
          $thumbnail_width,
          $thumbnail_height,
          $width,
          $height
        );
        imagejpeg($thumb_create, $thumbnail_destination, 100);

        // $thumbnail_destination now contains the path to the generated thumbnail

        //************************************

        //delete old file
        if (file_exists($row["image"])) {
          unlink($row["image"]);
        }
      } else {
        $errors["name"] =
          "image no valid. allowed types are " . implode(",", $allowed);
      }
    }

    //audio file
    if (!empty($_FILES["file"]["name"])) {
      $folder = "uploads/";
      if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . "index.php", "");
      }

      $allowed = ["audio/mpeg"];
      if (
        $_FILES["file"]["error"] == 0 &&
        in_array($_FILES["file"]["type"], $allowed)
      ) {
        $destination_file = $folder . $_FILES["file"]["name"];

        move_uploaded_file($_FILES["file"]["tmp_name"], $destination_file);

        //delete old file
        if (file_exists($row["file"])) {
          unlink($row["file"]);
        }
      } else {
        $errors["name"] =
          "file not valid. allowed types are " . implode(",", $allowed);
      }
    }

    if (empty($errors)) {
      $values = [];
$values["title"] = trim($_POST["title"]);
$values["category_id"] = trim($_POST["category_id"]);
$values["artist_id"] = trim($_POST["artist_id"]);
$values["user_id"] = user("id");
$values["id"] = $id;
$values["downloads"] = $row["downloads"]; // Add this line to retain the current value of downloads

$query = "UPDATE songs SET title = :title, user_id = :user_id, category_id = :category_id, artist_id = :artist_id, downloads = :downloads";

if (!empty($destination_image)) {
    $query .= ", image = :image";
    $values["image"] = $thumbnail_destination;
}

if (!empty($destination_file)) {
    $query .= ", file = :file";
    $values["file"] = $destination_file;
}

$query .= " WHERE id = :id LIMIT 1";

db_query($query, $values);


      message("song edited successfully");
      redirect("admin/songs");
    }
  }
} elseif ($action == "delete") {
  $query = "select * from songs where id = :id limit 1";
  $row = db_query_one($query, ["id" => $id]);

  if ($_SERVER["REQUEST_METHOD"] == "POST" && $row) {
    $errors = [];

    if (empty($errors)) {
      $values = [];
      $values["id"] = $id;

      $query = "delete from songs where id = :id limit 1";
      db_query($query, $values);

      //delete image
      if (file_exists($row["image"])) {
        unlink($row["image"]);
      }

      //delete audio file
      if (file_exists($row["file"])) {
        unlink($row["file"]);
      }

      message("song deleted successfully");
      redirect("admin/songs");
    }
  }
} ?>

<?php require page("includes/admin-header"); ?>

	<section class="admin-content" style="min-height: 200px;">
  
  		<?php if ($action == "add"): ?>
  			
  			<div style="max-width: 500px;margin: auto;">
	  			<form method="post" enctype="multipart/form-data">

	  				<h3>Add New Song</h3>

	  				<input name="title" class="form-control my-1" value="<?= set_value(
         "title"
       ) ?>" type="text" title="title" placeholder="Song title">
	  				<?php if (!empty($errors["title"])): ?>
	  					<small class="error"><?= $errors["title"] ?></small>
	  				<?php endif; ?>
 					
 					<?php
      $query = "select * from categories order by category asc";
      $categories = db_query($query);
      ?>
 					<select name="category_id" class="form-control my-1">
	  					<option value="">--Select Category--</option>

	  					<?php if (!empty($categories)): ?>
		  					<?php foreach ($categories as $cat): ?>
		  						<option <?= set_select("category_id", $cat["id"]) ?> value="<?= $cat[
   "id"
 ] ?>"><?= $cat["category"] ?></option>
		  					<?php endforeach; ?>
	  					<?php endif; ?>
	  				</select>
	  				<?php if (!empty($errors["category_id"])): ?>
	  					<small class="error"><?= $errors["category_id"] ?></small>
	  				<?php endif; ?>
 					
  					<?php
       $query = "select * from artists order by name asc";
       $artists = db_query($query);
       ?>

 					<select name="artist_id" class="form-control my-1">
	  					<option value="">--Select Artist--</option>
	  					<?php if (!empty($artists)): ?>
		  					<?php foreach ($artists as $cat): ?>
		  						<option <?= set_select("artist_id", $cat["id"]) ?> value="<?= $cat[
   "id"
 ] ?>"><?= $cat["name"] ?></option>
		  					<?php endforeach; ?>
	  					<?php endif; ?>
	  				</select>
	  				<?php if (!empty($errors["artist_id"])): ?>
	  					<small class="error"><?= $errors["artist_id"] ?></small>
	  				<?php endif; ?>

 					<div class="form-control my-1">
 						<div>Image:</div>
	  					<input class="form-control my-1" type="file" name="image">
	  					
	  					<?php if (!empty($errors["image"])): ?>
		  					<small class="error"><?= $errors["image"] ?></small>
		  				<?php endif; ?>

					</div>

					<div class="form-control my-1">
						<div>Audio File:</div>
		  				<input class="form-control my-1" type="file" name="file">

		  				<?php if (!empty($errors["file"])): ?>
		  					<small class="error"><?= $errors["file"] ?></small>
		  				<?php endif; ?>
		  			</div>
 
	  				<button class="btn bg-orange">Save</button>
	  				<a href="<?= ROOT ?>/admin/songs">
	  					<button type="button" class="float-end btn">Back</button>
	  				</a>
	  			</form>
	  		</div>

  		<?php elseif ($action == "edit"): ?>
 
  			<div style="max-width: 500px;margin: auto;">
	  			<form method="post" enctype="multipart/form-data">
	  				<h3>Edit Song</h3>

	  				<?php if (!empty($row)): ?>

	  					  				<input name="title" class="form-control my-1" value="<?= set_value(
                "title",
                $row["title"]
              ) ?>" type="text" title="title" placeholder="Song title">
	  				<?php if (!empty($errors["title"])): ?>
	  					<small class="error"><?= $errors["title"] ?></small>
	  				<?php endif; ?>
 					
 					<?php
      $query = "select * from categories order by category asc";
      $categories = db_query($query);
      ?>
 					<select name="category_id" class="form-control my-1">
	  					<option value="">--Select Category--</option>

	  					<?php if (!empty($categories)): ?>
		  					<?php foreach ($categories as $cat): ?>
		  						<option <?= set_select(
            "category_id",
            $cat["id"],
            $row["category_id"]
          ) ?> value="<?= $cat["id"] ?>"><?= $cat["category"] ?></option>
		  					<?php endforeach; ?>
	  					<?php endif; ?>
	  				</select>
	  				<?php if (!empty($errors["category_id"])): ?>
	  					<small class="error"><?= $errors["category_id"] ?></small>
	  				<?php endif; ?>
 					
  					<?php
       $query = "select * from artists order by name asc";
       $artists = db_query($query);
       ?>

 					<select name="artist_id" class="form-control my-1">
	  					<option value="">--Select Artist--</option>
	  					<?php if (!empty($artists)): ?>
		  					<?php foreach ($artists as $cat): ?>
		  						<option <?= set_select(
            "artist_id",
            $cat["id"],
            $row["artist_id"]
          ) ?> value="<?= $cat["id"] ?>"><?= $cat["name"] ?></option>
		  					<?php endforeach; ?>
	  					<?php endif; ?>
	  				</select>
	  				<?php if (!empty($errors["artist_id"])): ?>
	  					<small class="error"><?= $errors["artist_id"] ?></small>
	  				<?php endif; ?>

 					<div class="form-control my-1">
 						<div>Image:</div>
 						<img src="<?= ROOT ?>/<?= $row[
  "image"
] ?>" style="width:200px;height: 200px;object-fit: cover;">
	  					<input class="form-control my-1" type="file" name="image">
	  					
	  					<?php if (!empty($errors["image"])): ?>
		  					<small class="error"><?= $errors["image"] ?></small>
		  				<?php endif; ?>

					</div>

					<div class="form-control my-1">
						<div>Audio File:</div>
						<div><?= $row["file"] ?></div>
		  				<input class="form-control my-1" type="file" name="file">

		  				<?php if (!empty($errors["file"])): ?>
		  					<small class="error"><?= $errors["file"] ?></small>
		  				<?php endif; ?>
		  			</div>

	  				<button class="btn bg-orange">Save</button>
	  				<a href="<?= ROOT ?>/admin/songs">
	  					<button type="button" class="float-end btn">Back</button>
	  				</a>

	  				<?php else: ?>
	  					<div class="alert">That record was not found</div>
	  					<a href="<?= ROOT ?>/admin/songs">
		  					<button type="button" class="float-end btn">Back</button>
		  				</a>
	  				<?php endif; ?>

	  			</form>
	  		</div>

  		<?php elseif ($action == "delete"): ?>

  			<div style="max-width: 500px;margin: auto;">
	  			<form method="post">
	  				<h3>Delete Song</h3>

	  				<?php if (!empty($row)): ?>

	  				<div class="form-control my-1" ><?= set_value("title", $row["title"]) ?></div>
	  				<?php if (!empty($errors["title"])): ?>
	  					<small class="error"><?= $errors["title"] ?></small>
	  				<?php endif; ?>

	  				<button class="btn bg-red">Delete</button>
	  				<a href="<?= ROOT ?>/admin/songs">
	  					<button type="button" class="float-end btn">Back</button>
	  				</a>

	  				<?php else: ?>
	  					<div class="alert">That record was not found</div>
	  					<a href="<?= ROOT ?>/admin/songs">
		  					<button type="button" class="float-end btn">Back</button>
		  				</a>
	  				<?php endif; ?>

	  			</form>
	  		</div>

  		<?php else: ?>

  			<?php
     $limit = 20;
     $offset = ($page - 1) * $limit;

     $query = "select * from songs order by id desc limit $limit offset $offset";
     $rows = db_query($query);
     ?>
  			<h3>Songs
  				<a href="<?= ROOT ?>/admin/songs/add">
  					<button class="float-end btn bg-purple">Add New</button>
  				</a>
  			</h3>

  			

<div style='overflow-x:auto'>
  			  <table class="table">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Category</th>
        <th>Artist</th>
        <th>Audio</th>
        <th>Action</th>
    </tr>

    <?php if (!empty($rows)): ?>
        <?php foreach ($rows as $row): ?>
            <tr>
                <td><?= $row["id"] ?></td>
                <td><?= $row["title"] ?></td>
                <td><img src="<?= ROOT ?>/<?= $row[
  "image"
] ?>" style="width:100px;height: 100px;object-fit: cover;"></td>
                <td><?= get_category($row["category_id"]) ?></td>
                <td><?= get_artist($row["artist_id"]) ?></td>
                <td>
                    <audio class="audioPlayer" controls>
                        <source src="<?= ROOT ?>/<?= $row[
  "file"
] ?>" type="audio/mpeg">
                    </audio>
                </td>
                <td>
                    <a href="<?= ROOT ?>/admin/songs/edit/<?= $row["id"] ?>">
                        <img class="bi" src="<?= ROOT ?>/assets/icons/pencil-square.svg">
                    </a>
                    <a href="<?= ROOT ?>/admin/songs/delete/<?= $row["id"] ?>">
                        <img class="bi" src="<?= ROOT ?>/assets/icons/trash3.svg">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
</div>


  			
  			
  			
  			
  			
  			
  		<?php endif; ?>

  	<div class="mx-2">
		<a href="<?= ROOT ?>/admin/songs?page=<?= $prev_page ?>">
			<button class="btn bg-orange">Prev</button>
		</a>
		<a href="<?= ROOT ?>/admin/songs?page=<?= $next_page ?>">
			<button class="float-end btn bg-orange">Next</button>
		</a>
	</div>


	</section>
	
	<script>
	
	  

// PLAY ONE SONG AT A TIME
document.addEventListener('DOMContentLoaded', function () {

        var audioPlayers = document.querySelectorAll('.audioPlayer');


        audioPlayers.forEach(function (player) {
            player.addEventListener('play', function () {
                pauseOtherPlayers(player);
            });
        });

        function pauseOtherPlayers(currentPlayer) {
            audioPlayers.forEach(function (player) {
                if (player !== currentPlayer) {
                    player.pause();
                    }
            });
        }
    });
	
	</script>

	
	
	
	

<?php require page("includes/admin-footer"); ?>