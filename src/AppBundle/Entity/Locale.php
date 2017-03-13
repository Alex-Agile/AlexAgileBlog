<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locale
 *
 * @ORM\Table(name="locales", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="name", columns={"name"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LocaleRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Locale extends BaseEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="locale_id", type="integer")
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
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;

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
     * @return Locale
     */
    public function setName(string $name): Locale
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
     * @return Locale
     */
    public function setTitle(string $title): Locale
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
     * Set code
     *
     * @param string $code
     *
     * @return Locale
     */
    public function setCode(string $code): Locale
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Locale
     */
    public function setCreated(\DateTime $created): Locale
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
     * @return Locale
     */
    public function setModified(\DateTime $modified): Locale
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
}
