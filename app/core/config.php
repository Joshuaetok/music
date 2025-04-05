<?php
if ($_SERVER['SERVER_NAME'] == "localhost") {
    // for local server
    define("ROOT", "http://localhost:8080/music/public");
    
    define("DBDRIVER", "mysql");
    define("DBHOST", "127.0.0.1");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "music_website_db");
    define("DBSOCKET", ""); // Add this line
} else {
    // for online server
    define("ROOT", "https://www.ajalaafrica.com");

    define("DBDRIVER", "mysql");
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "music_website_db");
    define("DBSOCKET", ""); // Add this line
}
