<?php namespace Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="chapters")
 **/
class Chapter {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     **/
    protected $title;

    /**
     * @ManyToOne(targetEntity="Book", inversedBy="chapters")
     * @var Book
     **/
    protected $book;

    /**
     * @OneToMany(targetEntity="Page", mappedBy="chapter")
     * @var Page[]
     **/
    protected $pages = null;

    public function __construct()
    {
        $this->pages = new ArrayCollection();
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

    /**
     * @param Book $book
     */
    public function setBook($book)
    {
        $book->assignToChapter($this);
        $this->book = $book;
    }

    public function getBook()
    {
        return $this->book;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function assignToPage($page)
    {
        $this->pages[] = $page;
    }
}