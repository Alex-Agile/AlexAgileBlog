<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoryContent
 *
 * @ORM\Table(name="category_contents", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="category_locale", columns={"category_id", "locale_id"})
 * }, indexes={
 *     @ORM\Index(name="category_id", columns={"category_id"}),
 *     @ORM\Index(name="locale_id", columns={"locale_id"}),
 *     @ORM\Index(name="route_id", columns={"route_id"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryContentRepository")
 * @ORM\HasLifecycleCallbacks
 */
class CategoryContent extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="category_content_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
     * @var Route
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Route")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="route_id", referencedColumnName="route_id")
     * })
     */
    private $route;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="contents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="category_id")
     * })
     */
    private $category;

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
     * @return CategoryContent
     */
    public function setTitle(string $title): CategoryContent
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
     * @return CategoryContent
     */
    public function setDescription(string $description): CategoryContent
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return CategoryContent
     */
    public function setCreated(\DateTime $created): CategoryContent
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
     * @return CategoryContent
     */
    public function setModified(\DateTime $modified): CategoryContent
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
     * @return CategoryContent
     */
    public function setRoute(Route $route = null): CategoryContent
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
     * Set category
     *
     * @param Category $category
     *
     * @return CategoryContent
     */
    public function setCategory(Category $category = null): CategoryContent
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory(): Category
    {
        return $this->category;
    }

    /**
     * Set locale
     *
     * @param Locale $locale
     *
     * @return CategoryContent
     */
    public function setLocale(Locale $locale = null): CategoryContent
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
