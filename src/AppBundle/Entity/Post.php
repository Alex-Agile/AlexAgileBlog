<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="posts", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"}),
 *     @ORM\UniqueConstraint(name="order", columns={"order"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Post extends BaseEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="post_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="show", type="integer", nullable=true)
     */
    private $show;

    /**
     * @var bool
     *
     * @ORM\Column(name="home", type="integer", nullable=true)
     */
    private $home;

    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", nullable=true)
     */
    private $order;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modified", type="datetime", nullable=false, columnDefinition="TIMESTAMP ON UPDATE CURRENT_TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $modified;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Category", inversedBy="posts")
     * @ORM\JoinTable(name="posts_categories",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="post_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     *   }
     * )
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $categories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostContent", mappedBy="post", cascade={"persist"})
     */
    private $contents;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Comment", mappedBy="post", cascade={"persist"})
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Link", inversedBy="posts")
     * @ORM\JoinTable(name="posts_links",
     *   joinColumns={
     *     @ORM\JoinColumn(name="post_id", referencedColumnName="post_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="link_id", referencedColumnName="link_id")
     *   }
     * )
     * @ORM\OrderBy({"name" = "ASC"})
     */
    private $links;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->contents = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->links = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Post
     */
    public function setName(string $name): Post
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set show
     *
     * @param bool $show
     *
     * @return Post
     */
    public function setShow(bool $show): Post
    {
        $this->show = $show;

        return $this;
    }

    /**
     * Get show
     *
     * @return bool
     */
    public function getShow(): bool
    {
        return $this->show;
    }

    /**
     * Set home
     *
     * @param bool $home
     *
     * @return Post
     */
    public function setHome(bool $home): Post
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home
     *
     * @return bool
     */
    public function getHome(): bool
    {
        return $this->home;
    }

    /**
     * Set order
     *
     * @param integer $order
     *
     * @return Post
     */
    public function setOrder(int $order): Post
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return integer
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Post
     */
    public function setCreated(\DateTime $created): Post
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Post
     */
    public function setModified(\DateTime $modified): Post
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified(): \DateTime
    {
        return $this->modified;
    }

    /**
     * Add category
     *
     * @param Category $category
     *
     * @return Post
     */
    public function addCategory(Category $category): Post
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return Collection
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * Add content
     *
     * @param PostContent $content
     *
     * @return Post
     */
    public function addContent(PostContent $content): Post
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param PostContent $content
     */
    public function removeContent(PostContent $content)
    {
        $this->contents->removeElement($content);
    }

    /**
     * Get contents
     *
     * @return Collection
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }

    /**
     * Add comment
     *
     * @param Comment $comment
     *
     * @return Post
     */
    public function addComment(Comment $comment): Post
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param Comment $comment
     */
    public function removeComment(Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    /**
     * Add link
     *
     * @param Link $link
     *
     * @return Post
     */
    public function addLink(Link $link): Post
    {
        $this->links[] = $link;

        return $this;
    }

    /**
     * Remove link
     *
     * @param Link $link
     */
    public function removeLink(Link $link)
    {
        $this->links->removeElement($link);
    }

    /**
     * Get links
     *
     * @return Collection
     */
    public function getLinks(): Collection
    {
        return $this->links;
    }
}
