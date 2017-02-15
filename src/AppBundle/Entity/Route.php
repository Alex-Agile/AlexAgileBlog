<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Route
 *
 * @ORM\Table(name="routes", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"})
 * }, indexes={
 *     @ORM\Index(name="route_type_id", columns={"route_type_id"}),
 *     @ORM\Index(name="IDX_32D5C2B38C22AA1A", columns={"layout_id"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RouteRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Route extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="route_id", type="integer")
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
     * @ORM\Column(name="path", type="string", nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

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
     * @var Layout
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Layout")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="layout_id", referencedColumnName="layout_id")
     * })
     */
    private $layout;

    /**
     * @var RouteType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\RouteType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="route_type_id", referencedColumnName="route_type_id")
     * })
     */
    private $routeType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Menu", mappedBy="route", cascade={"persist"})
     */
    private $menu;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->menu = new ArrayCollection();
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
     * @return Route
     */
    public function setName(string $name): Route
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
     * Set path
     *
     * @param string $path
     *
     * @return Route
     */
    public function setPath(string $path): Route
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Set action
     *
     * @param string $action
     *
     * @return Route
     */
    public function setAction(string $action): Route
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Route
     */
    public function setDescription(string $description): Route
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
     * @return Route
     */
    public function setCreated(\DateTime $created): Route
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
     * @return Route
     */
    public function setModified(\DateTime $modified): Route
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
     * Set layout
     *
     * @param Layout $layout
     *
     * @return Route
     */
    public function setLayout(Layout $layout = null): Route
    {
        $this->layout = $layout;

        return $this;
    }

    /**
     * Get layout
     *
     * @return Layout
     */
    public function getLayout(): Layout
    {
        return $this->layout;
    }

    /**
     * Set routeType
     *
     * @param RouteType $routeType
     *
     * @return Route
     */
    public function setRouteType(RouteType $routeType = null): Route
    {
        $this->routeType = $routeType;

        return $this;
    }

    /**
     * Get routeType
     *
     * @return RouteType
     */
    public function getRouteType(): RouteType
    {
        return $this->routeType;
    }

    /**
     * Add menu
     *
     * @param Menu $menu
     *
     * @return Route
     */
    public function addMenu(Menu $menu): Route
    {
        $this->menu[] = $menu;

        return $this;
    }

    /**
     * Remove menu
     *
     * @param Menu $menu
     */
    public function removeMenu(Menu $menu)
    {
        $this->menu->removeElement($menu);
    }

    /**
     * Get menu
     *
     * @return Collection
     */
    public function getMenu(): Collection
    {
        return $this->menu;
    }
}
