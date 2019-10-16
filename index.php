<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
    <table>
        <tr>
            <td>Name:</td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>Author:</td>
            <td>
                <input type="text" name="author">
            </td>
        </tr>
        <tr>
            <td>Category:</td>
            <td>
                <input type="text" name="category">
            </td>
        </tr>
        <tr>
            <td>Picture:</td>
            <td>
                <input type="file">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Add">
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
    </table>
    <table>
        <?php
        include_once "Class/DBConnect.php";
        include_once "Class/Stories.php";
        include_once "Class/library_of_stories.php";

        $stories = $manager->getAll();
        foreach ($stories as $key => $story): ?>
            <tr>
                <td><?php echo ++$key ?></td>
                <td><?php $story->getName() ?></td>
                <td><?php $story->getAuthor() ?></td>
                <td><?php $story->getCategory() ?></td>
                <td><?php $story->getImage() ?></td>
                <td><a href="CRUD/delete?id=<?php echo $story->getId() ?>"></a></td>
                <td></td>
            </tr>
        <?php endforeach; ?>
    </table>
</form>
</body>
</html>