<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menus", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"})
 * }, indexes={
 *     @ORM\Index(name="IDX_727508CF34ECB4E6", columns={"route_id"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Menu extends BaseEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="menu_id", type="integer")
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
     * @ORM\Column(name="style", type="text", nullable=true)
     */
    private $style;

    /**
     * @var bool
     *
     * @ORM\Column(name="show", type="integer", nullable=true)
     */
    private $show;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Route", inversedBy="menu")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="route_id", referencedColumnName="route_id")
     * })
     */
    private $route;

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
     * @return Menu
     */
    public function setName(string $name): Menu
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
     * @return Menu
     */
    public function setTitle(string $title): Menu
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
     * @return Menu
     */
    public function setDescription(string $description): Menu
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
     * Set style
     *
     * @param string $style
     *
     * @return Menu
     */
    public function setStyle(string $style): Menu
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string
     */
    public function getStyle(): string
    {
        return $this->style;
    }

    /**
     * Set show
     *
     * @param bool $show
     *
     * @return Menu
     */
    public function setShow(bool $show): Menu
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Menu
     */
    public function setCreated(\DateTime $created): Menu
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
     * @return Menu
     */
    public function setModified(\DateTime $modified): Menu
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
     * @return Menu
     */
    public function setRoute(Route $route = null): Menu
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
}
