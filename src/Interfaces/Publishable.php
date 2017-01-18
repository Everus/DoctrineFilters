<?php

namespace Everus\DoctrineFilters\Interfaces;


interface Publishable
{
    public function getPublished();
    public function setPublished($published);
}