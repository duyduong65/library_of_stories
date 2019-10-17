<?php

include_once "../Class/DBConnect.php";
include_once "../Class/Stories.php";
include_once "../Class/library_of_stories.php";

$manager = new library_of_stories();
$id = $_POST['id'];

//var_dump($_FILES['image']['error']);
//die();
if ($_FILES['image']['error'] == 4) {

    $story = $manager->findStoryById($id);
    $image = $story->getImage();

    $category = $_POST['category'];
    $author = $_POST['author'];
    $name = $_POST['name'];

    $story = new Stories($name, $author, $category, $image);
    $manager->update($id, $story);

}
if ($_FILES['image']['error'] == 0) {
    $story = $manager->findStoryById($id);
    $imageName = $story->getImage();
    unlink("../images/" . $imageName);
    $story = $manager->findStoryById($id);
    $image = $story->getImage();


    $image = $_FILES['image']['name'];
    $target = "../images/" . date("Y_m_d_h_i_s_a") . basename($image);

    $category = $_POST['category'];
    $author = $_POST['author'];
    $name = $_POST['name'];
    $story = new Stories($name, $author, $category, $target);
    $manager->update($id, $story);

    move_uploaded_file($_FILES['image']['tmp_name'], $target);

}

header("Location:../index.php");

