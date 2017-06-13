<?php namespace Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity @Table(name="books")
 **/
class Book {

    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $title;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $author;

    /**
     * @Column(type="string", length=2)
     * @var string
     **/
    protected $language;

    /**
     * @OneToMany(targetEntity="Chapter", mappedBy="book")
     * @var Chapter[]
     **/
    protected $chapters = null;

    public function __construct()
    {
        $this->chapters = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function assignToChapter($chapter)
    {
        $this->chapters[] = $chapter;
    }

    public function getChapters()
    {
        return $this->chapters;
    }
}