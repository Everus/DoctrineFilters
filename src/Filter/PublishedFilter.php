<?php

namespace Everus\DoctrineFilters\Filter;


use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class PublishedFilter extends SQLFilter
{
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias)
    {
        if (!$targetEntity->reflClass->implementsInterface('Everus\\DoctrineFilters\\Interfaces\\Publishable')) {
            return '';
        }

        return $targetTableAlias.'.published = 1';
    }
}