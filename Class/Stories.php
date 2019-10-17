<?php

class Stories
{
    protected $id;
    protected $name;
    protected $author;
    protected $category;
    protected $image;

    public function __construct($name,$author,$category,$image)
    {
        $this->name = $name;
        $this->author = $author;
        $this->category = $category;
        $this->image = $image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
}