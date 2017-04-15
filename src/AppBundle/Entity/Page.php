<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="pages", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"})
 * }, indexes={
 *     @ORM\Index(name="order", columns={"order"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Page extends BaseEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="page_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="order", type="integer", nullable=true)
     */
    private $order;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="js_callback", type="text", nullable=true)
     */
    private $jsCallback;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_private", type="integer", nullable=true)
     */
    private $isPrivate;

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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PageContent", mappedBy="page", cascade={"persist"})
     */
    private $contents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contents = new ArrayCollection();
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
     * Set order
     *
     * @param integer $order
     *
     * @return Page
     */
    public function setOrder(int $order): Page
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
     * Set name
     *
     * @param string $name
     *
     * @return Page
     */
    public function setName(string $name): Page
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
     * Set jsCallback
     *
     * @param string $jsCallback
     *
     * @return Page
     */
    public function setJsCallback(string $jsCallback): Page
    {
        $this->jsCallback = $jsCallback;

        return $this;
    }

    /**
     * Get jsCallback
     *
     * @return string
     */
    public function getJsCallback(): string
    {
        return $this->jsCallback;
    }

    /**
     * Set isPrivate
     *
     * @param bool $isPrivate
     *
     * @return Page
     */
    public function setIsPrivate(bool $isPrivate): Page
    {
        $this->isPrivate = $isPrivate;

        return $this;
    }

    /**
     * Get isPrivate
     *
     * @return bool
     */
    public function getIsPrivate(): bool
    {
        return $this->isPrivate;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Page
     */
    public function setCreated(\DateTime $created): Page
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated():\DateTime
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param \DateTime $modified
     *
     * @return Page
     */
    public function setModified(\DateTime $modified): Page
    {
        $this->modified = $modified;

        return $this;
    }

    /**
     * Get modified
     *
     * @return \DateTime
     */
    public function getModified():\DateTime
    {
        return $this->modified;
    }

    /**
     * Add content
     *
     * @param PageContent $content
     *
     * @return Page
     */
    public function addContent(PageContent $content): Page
    {
        $this->contents[] = $content;

        return $this;
    }

    /**
     * Remove content
     *
     * @param PageContent $content
     */
    public function removeContent(PageContent $content)
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
}
