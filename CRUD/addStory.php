<?php
include_once "../Class/DBConnect.php";
include_once "../Class/Stories.php";
include_once "../Class/library_of_stories.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (!empty($_POST['author'])) {
        $author = $_POST['author'];
    }
    if (!empty($_POST['category'])) {
        $category = $_POST['category'];
    }
    $image = $_FILES['image']['name'];
    $target = "../images/" . date("Y_m_d_h_i_s_a") . basename($image);
    $story = new Stories($name, $author, $category, $target);
    $manager = new library_of_stories();
    $manager->addStory($story);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}

header("Location:../index.php");
