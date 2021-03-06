<?php

namespace CommentBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment")
 * @ORM\Entity(repositoryClass="CommentBundle\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity="\CommentBundle\Entity\Comment", mappedBy="pages", cascade={"persist", "remove"})
     */
    private $comment;

    /**
     * @ORM\ManyToMany(targetEntity="\PageBundle\Entity\Page", inversedBy="comments")
     * @ORM\JoinTable(name="pages_comments")
     */
    private $pages;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    public function  __construct(){
        $this->created = new \DateTime();
        $this->pages = new ArrayCollection();
    }
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Comment
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
     * Add page
     *
     * @param \PageBundle\Entity\Page $page
     *
     * @return Comment
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

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * Add comment
     *
     * @param \CommentBundle\Entity\Comment $comment
     *
     * @return Comment
     */
    public function addComment(\CommentBundle\Entity\Comment $comment)
    {
        $this->comment[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \CommentBundle\Entity\Comment $comment
     */
    public function removeComment(\CommentBundle\Entity\Comment $comment)
    {
        $this->comment->removeElement($comment);
    }
}
