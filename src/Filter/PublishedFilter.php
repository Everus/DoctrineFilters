<?php

namespace Everus\DoctrineFilters\Filter;


use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
use Doctrine\Common\Annotations\Reader;

class PublishedFilter extends SQLFilter
{
    /**
     * @var Reader
     */
    protected $reader;

    public function setAnnotationReader(Reader $reader)
    {
        $this->reader = $reader;
    }

    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (empty($this->reader)) {
            return '';
        }

        $publishable = $this->reader->getClassAnnotation(
            $targetEntity->getReflectionClass(),
            'Everus\\DoctrineFilters\\Annotation\\Publishable'
        );

        if (!$publishable) {
            return '';
        }

        return $targetTableAlias.'.published = 1';
    }
}
