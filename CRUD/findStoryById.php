<?php
include_once "../Class/DBConnect.php";
include_once "../Class/Stories.php";
include_once "../Class/library_of_stories.php";

$manager = new library_of_stories();
$id = $_GET['id'];

$story = $manager->findStoryById($id);
$name = $story->getName();
$author = $story->getAuthor();
$category = $story->getCategory();
$image = $story->getImage();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="../CRUD/update.php" method="post" enctype="multipart/form-data">
    <table>
        <div id="div"><img src="../images/<?php echo $image ?>" alt="" width="200px"></div>
        <tr style="display: none">
            <td><input type="text" name="id" value="<?php echo $id ?>"></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="name" value="<?php echo $name ?>">
            </td>
        </tr>
        <tr>
            <td>Author:</td>
            <td>
                <input type="text" name="author" value="<?php echo $author ?>">
            </td>
        </tr>
        <tr>
            <td>Category:</td>
            <td>
                <input type="text" name="category" value="<?php echo $category ?>">
            </td>
        </tr>
        <tr>
            <td>Picture:</td>
            <td>
                <input name="image" type="file">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Update">
            </td>
        </tr>

    </table>
    <table>
        <tr>
            <td style="width: 300px">ID</td>
            <td style="width: 20%">Name</td>
            <td style="width: 20%">Author</td>
            <td style="width: 20%">Category</td>
            <td style="width: 20%">Picture</td>
        </tr>
        <?php
        include_once "../Class/DBConnect.php";
        include_once "../Class/Stories.php";
        include_once "../Class/library_of_stories.php";

        $stories = $manager->getAll();

        foreach ($stories as $key => $story): ?>
            <tr>
                <td style="width: 20%"><?php echo ++$key ?></td>
                <td style="width: 20%"><?php echo $story->getName() ?></td>
                <td style="width: 20%"><?php echo $story->getAuthor() ?></td>
                <td style="width: 20%"><?php echo $story->getCategory() ?></td>
                <td style="width: 20%"><img src="../images/<?php echo $story->getImage() ?>" width="100px"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>
