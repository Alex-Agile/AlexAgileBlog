<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"})
 * }, indexes={
 *     @ORM\Index(name="parent_category_id", columns={"parent_category_id"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Category extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="category_id", type="integer")
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
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_category_id", referencedColumnName="category_id", nullable=true)
     * })
     */
    private $parentCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Post", mappedBy="categories", cascade={"persist"})
     */
    private $posts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CategoryContent", mappedBy="category", cascade={"persist"})
     */
    private $contents;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Category
     */
    public function setName(string $name): Category
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
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Category
     */
    public function setCreated(\DateTime $created): Category
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
     * @return Category
     */
    public function setModified(\DateTime $modified): Category
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
     * @param Category $parentCategory
     *
     * @return Category
     */
    public function setParentCategory(Category $parentCategory): Category
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * @return Category
     */
    public function getParentCategory(): Category
    {
        return $this->parentCategory;
    }

    /**
     * Add post
     *
     * @param Post $post
     *
     * @return Category
     */
    public function addPost(Post $post): Category
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
     * Get post
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * Add contents
     *
     * @param CategoryContent $contents
     *
     * @return Category
     */
    public function addContent(CategoryContent $contents): Category
    {
        $this->contents[] = $contents;

        return $this;
    }

    /**
     * Remove contents
     *
     * @param CategoryContent $contents
     */
    public function removeContent(CategoryContent $contents)
    {
        $this->contents->removeElement($contents);
    }

    /**
     * Get contents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContents(): Collection
    {
        return $this->contents;
    }
}
