<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Label
 *
 * @ORM\Table(name="labels", uniqueConstraints={
 *     @ORM\UniqueConstraint(name="locale_key", columns={"locale_id", "label_key"})
 * }, indexes={
 *     @ORM\Index(name="locale_id", columns={"locale_id"}),
 *     @ORM\Index(name="label_key", columns={"label_key"})
 * })
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LabelRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Label extends BaseEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="label_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="label_key", type="string", length=255, nullable=true)
     */
    private $labelKey;

    /**
     * @var string
     *
     * @ORM\Column(name="translation", type="text", nullable=true)
     */
    private $translation;

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
     * @var Locale
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Locale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="locale_id", referencedColumnName="locale_id")
     * })
     */
    private $locale;

    /**
     * Get labelId
     *
     * @return integer
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set labelKey
     *
     * @param string $labelKey
     *
     * @return Label
     */
    public function setLabelKey(string $labelKey): Label
    {
        $this->labelKey = $labelKey;

        return $this;
    }

    /**
     * Get labelKey
     *
     * @return string
     */
    public function getLabelKey(): string
    {
        return $this->labelKey;
    }

    /**
     * Set translation
     *
     * @param string $translation
     *
     * @return Label
     */
    public function setTranslation(string $translation): Label
    {
        $this->translation = $translation;

        return $this;
    }

    /**
     * Get translation
     *
     * @return string
     */
    public function getTranslation(): string
    {
        return $this->translation;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Label
     */
    public function setCreated(\DateTime $created): Label
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
     * @return Label
     */
    public function setModified(\DateTime $modified): Label
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
     * Set locale
     *
     * @param Locale $locale
     *
     * @return Label
     */
    public function setLocale(Locale $locale = null): Label
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
