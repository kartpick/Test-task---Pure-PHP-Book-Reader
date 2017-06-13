<?php namespace Models;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="pages")
 **/
class Page {

    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     * @var int
     **/
    protected $id;

    /**
     * @Column(type="text")
     * @var string
     **/
    protected $data;

    /**
     * @Column(type="integer")
     * @var int
     **/
    protected $number;

    /**
     * @ManyToOne(targetEntity="Chapter", inversedBy="pages")
     * @var Chapter
     **/
    protected $chapter;

    /**
     * @OneToOne(targetEntity="Page")
     * @var Page
     **/
    protected $previous = null;

    /**
     * @OneToOne(targetEntity="Page")
     * @var Page
     **/
    protected $next = null;

    public function __construct()
    {
        $this->chapters = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setNumber($number)
    {
        $this->number = $number;
    }

    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param Chapter $chapter
     */
    public function setChapter($chapter)
    {
        $chapter->assignToPage($this);
        $this->chapter = $chapter;
    }

    public function getChapter()
    {
        return $this->chapter;
    }

    public function getPrevious()
    {
        return $this->previous;
    }

    public function getNext()
    {
        return $this->next;
    }
}