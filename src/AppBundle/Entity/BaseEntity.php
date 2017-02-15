<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use AppKernel;
use DateTime;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;
use ReflectionClass;

/**
 * Class BaseEntity
 *
 * Entity base class. Defines common behavior for entity classes
 *
 * @package AppBundle\Entity
 *
 * @method string getTitle()
 * @method BaseEntity setName(string $title): BaseEntity
 * @method BaseEntity setCreated(\Datetime $time): BaseEntity
 * @method BaseEntity setModified(\Datetime $time): BaseEntity
 */
class BaseEntity
{
//    // static kernel service container
//    private static $_kernel = null;
//
//    /**
//     * Set environment
//     */
//    public static function kernelBoot()
//    {
//        $environment = 'prod';
//        if (!array_key_exists('REMOTE_ADDR', $_SERVER)) {
//            $environment = 'test';
//        } elseif (false !== strpos(@$_SERVER['REMOTE_ADDR'], 'local')) {
//            $environment = 'dev';
//        }
//        self::$_kernel = new AppKernel($environment, false);
//        self::$_kernel->boot();
//    }
//
//    /**
//     * Gets Doctrine EM from service container
//     *
//     * @return EntityManager
//     */
//    public static function getDoctrineEm()
//    {
//
//        if (is_null(self::$_kernel)) {
//            self::kernelBoot();
//        }
//        return self::$_kernel->getContainer()
//            ->get('doctrine')
//            ->getManager();
//    }
//
//    /**
//     * Gets Validator from service container
//     *
//     * @return EntityManager
//     */
//    public static function getValidator()
//    {
//
//        if (is_null(self::$_kernel)) {
//            self::kernelBoot();
//        }
//        return self::$_kernel->getContainer()
//            ->get('validator');
//    }

    /**
     * Doctrine PrePersist lifecycle event
     *
     * Persists, if available, entity creation and modified date and entity name before persist
     *
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $reflectionClass = new ReflectionClass(get_class($this));

        // automatically set name if available
        if ($reflectionClass->hasMethod('setName') && $reflectionClass->hasMethod('getTitle')) {
            $this->setName(str_replace(' ', '-', strtolower($this->getTitle())));
        }

        // automatically set created if available
        if ($reflectionClass->hasMethod('setCreated')) {
            $this->setCreated(new DateTime('now'));
        }

        // automatically set modified if available
        if ($reflectionClass->hasMethod('setModified')) {
            $this->setModified(new DateTime('now'));
        }
    }

    /**
     * Doctrine PreUpdate lifecycle event
     *
     * Persists, if available, entity creation and modified date and entity name before update
     *
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $reflectionClass = new ReflectionClass(get_class($this));

        // automatically set name if available
        if ($reflectionClass->hasMethod('setName') && $reflectionClass->hasMethod('getTitle')) {
            $this->setName(str_replace(' ', '-', strtolower($this->getTitle())));
        }

        // automatically set modified if available
        if ($reflectionClass->hasMethod('setModified')) {
            $this->setModified(new DateTime('now'));
        }
    }
}
