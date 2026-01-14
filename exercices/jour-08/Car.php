<?php
class car
{
    public function __construct(
        public string $brand,
        public string $model,
        public int $year
    ) {
    }
    public function getAge(): int
    {
        $today = new DateTime();
        $dateYear = new DateTime($this->year . "-01-01");
        $age = $today->diff($dateYear)->y;
        return $age;
    }
    public function display()
    {
        echo $this->brand ." ". $this->model . " " . $this->getAge()."<br>";
    }
}
$car1 = new car("Renault", "Clio", 2003);
echo $car1->display();
echo $car1->getAge();
echo "<br>";
$car2 = new car("Alpha Romeo", "Junior Ibrida MY25", 2025);
echo $car2->display();
echo $car2->getAge();
echo "<br>";
$car3 = new car("BMW", "SERIE 1", 2012);
echo $car3->display();
echo $car3->getAge();
