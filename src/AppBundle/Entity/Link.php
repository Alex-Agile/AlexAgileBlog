<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Link
 *
 * @ORM\Table(name="links", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LinkRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Link extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="link_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="target_url", type="text", nullable=true)
     */
    private $targetUrl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="open_blank", type="integer", nullable=true)
     */
    private $openBlank;

    /**
     * @var boolean
     *
     * @ORM\Column(name="home", type="integer", nullable=true)
     */
    private $home;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Post", mappedBy="links", cascade={"persist"})
     */
    private $posts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     * @return Link
     */
    public function setName(string $name): Link
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
     * Set title
     *
     * @param string $title
     *
     * @return Link
     */
    public function setTitle(string $title): Link
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Link
     */
    public function setDescription(string $description): Link
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Set targetUrl
     *
     * @param string $targetUrl
     *
     * @return Link
     */
    public function setTargetUrl(string $targetUrl): Link
    {
        $this->targetUrl = $targetUrl;

        return $this;
    }

    /**
     * Get targetUrl
     *
     * @return string
     */
    public function getTargetUrl(): string
    {
        return $this->targetUrl;
    }

    /**
     * Set openBlank
     *
     * @param bool $openBlank
     *
     * @return Link
     */
    public function setOpenBlank(bool $openBlank): Link
    {
        $this->openBlank = $openBlank;

        return $this;
    }

    /**
     * Get openBlank
     *
     * @return bool
     */
    public function getOpenBlank(): bool
    {
        return $this->openBlank;
    }

    /**
     * Set home
     *
     * @param boolean $home
     *
     * @return Link
     */
    public function setHome(bool $home): Link
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Link
     */
    public function setCreated(\DateTime $created): Link
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
     * @return Link
     */
    public function setModified(\DateTime $modified): Link
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
     * Add post
     *
     * @param Post $post
     *
     * @return Link
     */
    public function addPost(Post $post): Link
    {
        $this->posts[] = $post;

        return $this;
    }

    /**
     * Remove post
     *
     * @param Post $post
     */
    public function removePost(Post $post)
    {
        $this->posts->removeElement($post);
    }

    /**
     * Get posts
     *
     * @return Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }
}
