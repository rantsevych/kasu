<?php

namespace TermBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Term
 *
 * @ORM\Table(name="term")
 * @ORM\Entity(repositoryClass="TermBundle\Repository\termRepository")
 */
class Term
{

    /**
     * @ORM\OneToMany(targetEntity="\PageBundle\Entity\Page", mappedBy="category")
     */
    private $pages;


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Term
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Term
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Term
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;//$this->pages->toArray();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add page
     *
     * @param \PageBundle\Entity\Page $page
     *
     * @return Term
     */
    public function addPage(\PageBundle\Entity\Page $page)
    {
        $this->pages[] = $page;

        return $this;
    }

    /**
     * Remove page
     *
     * @param \PageBundle\Entity\Page $page
     */
    public function removePage(\PageBundle\Entity\Page $page)
    {
        $this->pages->removeElement($page);
    }


    public function __toString() {
        return $this->name;
    }

}
