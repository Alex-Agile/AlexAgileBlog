<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostContent
 *
 * @ORM\Table(name="post_contents", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="post_id_locale_id", columns={"post_id", "locale_id"})
 * }, indexes={
 *     @ORM\Index(name="post_id", columns={"post_id"}),
 *     @ORM\Index(name="locale_id", columns={"locale_id"}),
 *     @ORM\Index(name="route_id", columns={"route_id"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostContentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PostContent extends BaseEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="post_content_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="text", nullable=true)
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
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="text", nullable=true)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="image_alt", type="text", nullable=true)
     */
    private $image_alt;

    /**
     * @var string
     *
     * @ORM\Column(name="image_origin", type="text", nullable=true)
     */
    private $image_origin;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_title", type="text", nullable=true)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text", nullable=true)
     */
    private $metaKeywords;

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
     * @var Route
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Route")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="route_id", referencedColumnName="route_id")
     * })
     */
    private $route;

    /**
     * @var Post
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Post", inversedBy="contents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_id", referencedColumnName="post_id")
     * })
     */
    private $post;

    /**
     * @var Locale
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Locale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locale_id", referencedColumnName="locale_id")
     * })
     */
    private $locale;

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
     * Set title
     *
     * @param string $title
     *
     * @return PostContent
     */
    public function setTitle(string $title): PostContent
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
     * @return PostContent
     */
    public function setDescription(string $description): PostContent
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
     * Set content
     *
     * @param string $content
     *
     * @return PostContent
     */
    public function setContent(string $content): PostContent
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return PostContent
     */
    public function setImage(string $image): PostContent
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * Set imageAlt
     *
     * @param string $imageAlt
     *
     * @return PostContent
     */
    public function setImageAlt(string $imageAlt): PostContent
    {
        $this->image_alt = $imageAlt;

        return $this;
    }

    /**
     * Get imageAlt
     *
     * @return string
     */
    public function getImageAlt(): string
    {
        return $this->image_alt;
    }

    /**
     * Set imageOrigin
     *
     * @param string $imageOrigin
     *
     * @return PostContent
     */
    public function setImageOrigin(string $imageOrigin): PostContent
    {
        $this->image_origin = $imageOrigin;

        return $this;
    }

    /**
     * Get imageOrigin
     *
     * @return string
     */
    public function getImageOrigin(): string
    {
        return $this->image_origin;
    }

    /**
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return PostContent
     */
    public function setMetaTitle(string $metaTitle): PostContent
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get metaTitle
     *
     * @return string
     */
    public function getMetaTitle(): string
    {
        return $this->metaTitle;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     *
     * @return PostContent
     */
    public function setMetaDescription(string $metaDescription): PostContent
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string
     */
    public function getMetaDescription(): string
    {
        return $this->metaDescription;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     *
     * @return PostContent
     */
    public function setMetaKeywords(string $metaKeywords): PostContent
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string
     */
    public function getMetaKeywords(): string
    {
        return $this->metaKeywords;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return PostContent
     */
    public function setCreated(\DateTime $created): PostContent
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
     * @return PostContent
     */
    public function setModified(\DateTime $modified): PostContent
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
     * Set route
     *
     * @param Route $route
     *
     * @return PostContent
     */
    public function setRoute(Route $route = null): PostContent
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }

    /**
     * Set post
     *
     * @param Post $post
     *
     * @return PostContent
     */
    public function setPost(Post $post = null): PostContent
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return Post
     */
    public function getPost(): Post
    {
        return $this->post;
    }

    /**
     * Set locale
     *
     * @param Locale $locale
     *
     * @return PostContent
     */
    public function setLocale(Locale $locale = null): PostContent
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * Get locale
     *
     * @return Locale
     */
    public function getLocale(): Locale
    {
        return $this->locale;
    }
}
