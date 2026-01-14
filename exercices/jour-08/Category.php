<?php	

class category{
    public function __construct(
        public int $id,
        public string $name,
        public string $description,
    ){

    }
    public function getSlug(){
        echo (string)str_replace(" ","_",strtolower($this->name)); 
    }
}

$category1 = new category(1, "Cat 1", "nice");
$category1->getSlug();
$category2 = new category(2, "Cat 2", "cool");
$category2->getSlug();
$category3 = new category(3, "Cat 3", "great");
$category3->getSlug();
?>