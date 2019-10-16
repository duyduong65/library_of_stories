<?php
include_once "../Class/DBConnect.php";
include_once "../Class/Stories.php";
include_once "../Class/library_of_stories.php";

$manager = new library_of_stories();
$id = $_GET['id'];
$manager->delete($id);

header("Location:../index.php");
