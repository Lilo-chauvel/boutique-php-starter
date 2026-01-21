<?php

namespace App\Class;

/**
 * Category class
 */
class Category
{
    public function __construct(
        protected int $id,
        protected string $name
    ) {}

    /**
     * Get the name of the category
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the ID of the category
     */
    public function getId(): int
    {
        return $this->id;
    }
}
