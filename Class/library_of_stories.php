<?php
include_once "DBConnect.php";
include_once "Stories.php";

class library_of_stories
{
    protected $connect;

    public function __construct()
    {
        $db = new DBConnect("mysql:host=localhost;dbname=library_of_stories", "root", "khongbiet1");
        $this->connect = $db->connect();
    }

    public function getConnect()
    {
        return $this->connect;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM stories";
        $stmt = $this->connect->query($sql);
        $stmt = $stmt->fetchAll();
        $stories = [];

        foreach ($stmt as $value) {
            $story = new Stories($value['name'], $value['author'], $value['category'], $value['image']);
            $story->setId($value['id']);
            array_push($stories, $story);
        }
        return $stories;
    }

    public function addStory($story)
    {
        $sql = "INSERT INTO stories(name,author,category,image) VALUES (:name,:author,:category,:image)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":name", $story->getName());
        $stmt->bindParam(":author", $story->getAuthor());
        $stmt->bindParam(":category", $story->getCategory());
        $stmt->bindParam(":image", $story->getImage());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM stories WHERE id=:id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }

    public function findStoryById($id)
    {
        $sql = "SELECT name , author, category, image  FROM stories WHERE id=:id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $story = $stmt->fetch();

        $name = $story['name'];
        $author = $story['author'];
        $category = $story['category'];
        $image = $story['image'];

        $story = new Stories($name, $author, $category, $image);
        return $story;
    }

    public function update($id, $story)
    {
        $sql = "UPDATE stories SET name=:name,author = :author,category = :category,image = :image WHERE id=:id";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(":name", $story->getName());
        $stmt->bindParam(":author", $story->getAuthor());
        $stmt->bindParam(":category", $story->getCategory());
        $stmt->bindParam(":image", $story->getImage());
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}

$manager = new library_of_stories();