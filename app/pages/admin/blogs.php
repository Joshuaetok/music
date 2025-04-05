<?php

if ($action == "add") {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

// data validation
if (empty($_POST["title"])) {
    $errors["title"] = "A title is required.";
} elseif (!preg_match("/^[a-zA-Z0-9 £€©®™°¥√π÷×¶∆•|!?&\-\(\)\[\]\{\}_\'\"\\/\\\\@#\$%^*,.?:;:`~<>_+=–—\s]+$/u", $_POST["title"])) {
    $errors["title"] = "A title can only have letters, numbers, spaces, and valid punctuation.";
}


    // Image upload
    if (!empty($_FILES["image"]["name"])) {
      $folder = "uploads/";

      // Ensure the uploads directory exists
      if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
        file_put_contents($folder . "index.php", "");
      }

      $allowed = ["image/jpeg", "image/png"];

      // Validate the uploaded image
      if (
        $_FILES["image"]["error"] == 0 &&
        in_array($_FILES["image"]["type"], $allowed)
      ) {
        // Set the destination path for the main image
        $destination = $folder . $_FILES["image"]["name"];

        // Move the uploaded image to the destination
        move_uploaded_file($_FILES["image"]["tmp_name"], $destination);

        // Thumbnail handling
        $thumbnail_folder = "uploads/thumbs/";
        $thumbnail_width = 500; // Adjust as needed
        $thumbnail_height = 500; // Adjust as needed

        // Generate thumbnail file name
        $thumbnail_name = "thumb_" . $_FILES["image"]["name"];
        $thumbnail_destination = $thumbnail_folder . $thumbnail_name;

        // Generate and save the thumbnail
        list($width, $height, $type) = getimagesize($destination);

        // Choose the appropriate function based on the image type
        switch ($type) {
          case IMAGETYPE_JPEG:
            $source = imagecreatefromjpeg($destination);
            break;
          case IMAGETYPE_PNG:
            $source = imagecreatefrompng($destination);
            break;
          // Add more cases if needed for other image types
        }

        $thumb_create = imagecreatetruecolor(
          $thumbnail_width,
          $thumbnail_height
        );

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

        // Save the thumbnail based on the image type
        switch ($type) {
          case IMAGETYPE_JPEG:
            imagejpeg($thumb_create, $thumbnail_destination, 100);
            break;
          case IMAGETYPE_PNG:
            imagepng($thumb_create, $thumbnail_destination);
            break;
          // Add more cases if needed for other image types
        }

        // $thumbnail_destination now contains the path to the generated thumbnail
      } else {
        $errors["title"] =
          "Image not valid. Allowed types are " . implode(",", $allowed);
      }
    } else {
      $errors["title"] = "An image is required";
    }

    if (empty($errors)) {
      $values = [
    "title" => trim($_POST["title"]),
    "description" => trim($_POST["description"]),
    "image" => $thumbnail_destination,
    "user_id" => user("id"),
    "date" => date("Y-m-d H:i:s"),
    "slug" => str_to_url(trim($_POST["title"])),
];


$query = "INSERT INTO blogs (title, image, user_id, description, date, slug) VALUES (:title, :image, :user_id, :description, :date, :slug)";
db_query($query, $values);


      message("blog created successfully");
      redirect("admin/blogs");
    }
  }
} elseif ($action == "edit") {
  $query = "SELECT * FROM blogs WHERE id = :id LIMIT 1";
  $row = db_query_one($query, ["id" => $id]);

  if ($_SERVER["REQUEST_METHOD"] == "POST" && $row) {
    $errors = [];

    // data validation
    if (empty($_POST["title"])) {
      $errors["title"] = "a title is required";
    } elseif (!preg_match("/^[a-zA-Z0-9 £€©®™°¥√π÷×¶∆•|!?&\-\(\)\[\]\{\}_\'\"\\/\\\\@#\$%^*,.?\":;:`~<>_+=]+$/u", $_POST["title"])) {


      $errors["title"] = "a title can only have letters with no spaces";
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

    if (empty($errors)) {
      $values = [
    "title" => trim($_POST["title"]),
    "description" => trim($_POST["description"]),
    "user_id" => user("id"),
    "id" => $id,
    "date" => date("Y-m-d H:i:s"),
    "slug" => str_to_url(trim($_POST["title"])),
];


$query = "UPDATE blogs SET title = :title, description = :description, user_id = :user_id, date = :date, slug = :slug WHERE id = :id LIMIT 1";


      // Existing code...

if (!empty($thumbnail_destination)) {
    $query = "UPDATE blogs SET title = :title, description = :description, user_id = :user_id, image = :image, date = :date, slug = :slug WHERE id = :id LIMIT 1";
    $values["image"] = $thumbnail_destination;
} else {
    $query = "UPDATE blogs SET title = :title, description = :description, user_id = :user_id, date = :date, slug = :slug WHERE id = :id LIMIT 1";
}

db_query($query, $values);

// Existing code...




      message("blog edited successfully");
      redirect("admin/blogs");
    }
  }
} elseif ($action == "delete") {
  $query = "SELECT * FROM blogs WHERE id = :id LIMIT 1";
  $row = db_query_one($query, ["id" => $id]);

  if ($_SERVER["REQUEST_METHOD"] == "POST" && $row) {
    $errors = [];

    if (empty($errors)) {
      $values = ["id" => $id];

      $query = "DELETE FROM blogs WHERE id = :id LIMIT 1";
      db_query($query, $values);

      // delete image
      if (file_exists($row["image"])) {
        unlink($row["image"]);
      }

      message("blog deleted successfully");
      redirect("admin/blogs");
    }
  }
} ?>

<?php require page("includes/admin-header"); ?>

<section class="admin-content" style="min-height: 200px;">

    <?php if ($action == "add"): ?>

        <div style="max-width: 500px;margin: auto;">
            <form method="post" enctype="multipart/form-data">

                <h3>Add New Blog</h3>

                <input class="form-control my-1" value="<?= set_value(
                  "title"
                ) ?>" type="text" name="title"
                    placeholder="Blog title">
                <?php if (!empty($errors["title"])): ?>
                <small class="error"><?= $errors["title"] ?></small>
                <?php endif; ?>

                <label>Blog Image:</label>
                <input class="form-control my-1" type="file" name="image">

                <label>Blog Description:</label>
                <textarea id="summernote" rows="10" class="form-control my-1" name="description"><?= set_value(
                  "description"
                ) ?></textarea>

                <?php if (!empty($errors["image"])): ?>
                <small class="error"><?= $errors["image"] ?></small>
                <?php endif; ?>

                <button class="btn bg-orange">Save</button>
                <a href="<?= ROOT ?>/admin/blogs">
                    <button type="button" class="float-end btn">Back</button>
                </a>

               

            </form>
        </div>

    <?php elseif ($action == "edit"): ?>

        <div style="max-width: 500px;margin: auto;">
            <form method="post" enctype="multipart/form-data">
                <h3>Edit Blog</h3>

                <?php if (!empty($row)): ?>

                    <input class="form-control my-1" value="<?= set_value(
                      "title",
                      $row["title"]
                    ) ?>" type="text"
                           name="title" placeholder="Blogtitle">
                    <?php if (!empty($errors["title"])): ?>
                        <small class="error"><?= $errors["title"] ?></small>
                    <?php endif; ?>

                    <img src="<?= ROOT ?>/<?= $row["image"] ?>"
                         style="width:200px;height: 200px;object-fit: cover;">

                    <div>Blog Image:</div>
                    <input class="form-control my-1" type="file" name="image">

                    <label>Blog Description:</label>
                    <textarea id="summernote" rows="10" class="form-control my-1"
                              name="description"><?= set_value(
                                "description",
                                $row["description"]
                              ) ?></textarea>

                    <button class="btn bg-orange">Save</button>
                    <a href="<?= ROOT ?>/admin/blogs">
                        <button type="button" class="float-end btn">Back</button>
                    </a>

                <?php else: ?>
                    <div class="alert">That record was not found</div>
                    <a href="<?= ROOT ?>/admin/blogs">
                        <button type="button" class="float-end btn">Back</button>
                    </a>
                <?php endif; ?>


            </form>
        </div>

    <?php elseif ($action == "delete"): ?>

        <div style="max-width: 500px;margin: auto;">
            <form method="post">
                <h3>Delete Blog</h3>

                <?php if (!empty($row)): ?>

                    <div class="form-control my-1"><?= set_value(
                      "title",
                      $row["title"]
                    ) ?></div>
                    <?php if (!empty($errors["title"])): ?>
                        <small class="error"><?= $errors["title"] ?></small>
                    <?php endif; ?>

                    <button class="btn bg-red">Delete</button>
                    <a href="<?= ROOT ?>/admin/blogs">
                        <button type="button" class="float-end btn">Back</button>
                    </a>

                <?php else: ?>
                    <div class="alert">That record was not found</div>
                    <a href="<?= ROOT ?>/admin/blogs">
                        <button type="button" class="float-end btn">Back</button>
                    </a>
                <?php endif; ?>

            </form>
        </div>

    <?php else: ?>

        <?php
        $query = "SELECT * FROM blogs ORDER BY id DESC LIMIT 20";
        $rows = db_query($query);
        ?>

        <h3>Blogs
            <a href="<?= ROOT ?>/admin/blogs/add">
                <button class="float-end btn bg-purple">Add New</button>
            </a>
        </h3>

<div style='overflow-x:auto'>
        <table class="table">

            <tr>
                <th>ID</th>
                <th>Blog</th>
                <th>Date and Time</th>
                <th>Image</th>
                <th>Action</th>
            </tr>

            <?php if (!empty($rows)): ?>
               <?php foreach ($rows as $row): ?>
    <tr>
        <td><?= $row["id"] ?></td>
        <td><?= $row["title"] ?></td>
        <td><?= $row["date"] ?></td>
        <td>
            <a href="<?= ROOT ?>/blog/<?= $row["slug"] ?>">
                <img src="<?= ROOT ?>/<?= $row["image"] ?>" style="width:100px;height: 100px;object-fit: cover;">
            </a>
        </td>
        <td>
            <a href="<?= ROOT ?>/admin/blogs/edit/<?= $row["id"] ?>">
                <img class="bi" src="<?= ROOT ?>/assets/icons/pencil-square.svg">
            </a>
            <a href="<?= ROOT ?>/admin/blogs/delete/<?= $row["id"] ?>">
                <img class="bi" src="<?= ROOT ?>/assets/icons/trash3.svg">
            </a>
        </td>
    </tr>
<?php endforeach; ?>

            <?php endif; ?>

        </table>
        </div>
    <?php endif; ?>

</section>

 <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
              <script>
$(document).ready(function() {
    $('#summernote').summernote({
        placeholder: 'Welcome Ajala Africa, create a post.',
        tabsize: 2,
        height: 100
    });
});
</script>

<?php require page("includes/admin-footer"); ?>