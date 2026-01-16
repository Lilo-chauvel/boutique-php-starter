<?php	
//---- Relation simple : Product et Category ----
/**
 * Creat a category
 */
class Category
{
    public function __construct(
        /**
         * @var id: It is the ID of the category
         * @var name: The name of the category
         */
        private int $id,
        private string $name
    ) {
    }
    /**
     * Give the name of the category 
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}