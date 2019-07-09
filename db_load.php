<?php

require_once 'database.php';
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
$db_name = 'books';
$db_found = mysqli_select_db($connect, $db_name);
