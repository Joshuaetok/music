<?php
// Include your database connection file or initialize it here
 require_once('config.php');
 require_once('functions.php');
 
 try {
     // Fetch all songs from the database
     $songs = db_query("SELECT id FROM songs");
 
     foreach ($songs as $index => $song) {
         $songId = $song['id'];
 
         // Increment views and downloads counts in the database
         db_query("UPDATE songs SET views = views + :viewincrease, downloads = downloads + :downloadincrease WHERE id = :id LIMIT 1", [
             'id' => $songId,
             'viewincrease' => ceil(($index + 1) * mt_rand(700, 1000) / 1000),
             'downloadincrease' => ceil(($index + 1) * mt_rand(600, 900) / 1000)
         ]);
     }
 
     echo 'Counts updated successfully for all songs.';
 } catch (Exception $e) {
     // Log the error message to a file
     error_log('Error updating counts in the database: ' . $e->getMessage(), 0);
 
     // You can also echo or return an error message to the user if necessary
     echo 'Error updating counts in the database. Please try again later.';
 }
 ?>