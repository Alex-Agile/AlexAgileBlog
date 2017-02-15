<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PageContent
 *
 * @ORM\Table(name="page_contents", indexes={
 *     @ORM\Index(name="page_id", columns={"page_id"}),
 *     @ORM\Index(name="locale_id", columns={"locale_id"}),
 *     @ORM\Index(name="route_id", columns={"route_id"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageContentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class PageContent extends BaseEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="page_content_id", type="integer")
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
     * @var Page
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Page", inversedBy="contents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="page_id", referencedColumnName="page_id")
     * })
     */
    private $page;

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
     * @return PageContent
     */
    public function setTitle(string $title): PageContent
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
     * @return PageContent
     */
    public function setDescription(string $description): PageContent
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
     * @return PageContent
     */
    public function setContent(string $content): PageContent
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
     * Set metaTitle
     *
     * @param string $metaTitle
     *
     * @return PageContent
     */
    public function setMetaTitle(string $metaTitle): PageContent
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
     * @return PageContent
     */
    public function setMetaDescription(string $metaDescription): PageContent
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
     * @return PageContent
     */
    public function setMetaKeywords(string $metaKeywords): PageContent
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
     * @return PageContent
     */
    public function setCreated(\DateTime $created): PageContent
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
     * @return PageContent
     */
    public function setModified(\DateTime $modified): PageContent
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
     * @return PageContent
     */
    public function setRoute(Route $route = null): PageContent
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
     * Set page
     *
     * @param Page $page
     *
     * @return PageContent
     */
    public function setPage(Page $page = null): PageContent
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return Page
     */
    public function getPage(): Page
    {
        return $this->page;
    }

    /**
     * Set locale
     *
     * @param Locale $locale
     *
     * @return PageContent
     */
    public function setLocale(Locale $locale = null): PageContent
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
