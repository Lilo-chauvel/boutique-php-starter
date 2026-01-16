<?php
/**
 * Order is create after a cart validation and he is validate when the paid is done
 */
class Order
{

    public static array $TabIdOrder = [];
    private int $id;
    private string $date;
    public function __construct(
        private User $user,
        private Cart $item,
        private bool $statut = false,
    ) {
        $this->date = date("d-m-Y");
        $this->creatId();
    }
    private function creatId()
    {
        $this->id = rand(1000, 9999);
        $maxTab = count(self::$TabIdOrder);
        $i = 0;
        while ($i < $maxTab) {
            if ($this->id === self::$TabIdOrder[$i]) {
                $this->id = rand(1000, 9999);
                $i = 0;
            } else {
                $i++;
            }
        }
        self::$TabIdOrder[] = $this->id;
        return $this->id;
    }

    /**
     * Give the date of a Order
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Give the id of a Order
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Calculate the total of a order and return the total
     */
    public function getTotalOrder()
    {
        return $this->item->getTotalCart();
    }
    /**
     * Count and return the number of item in the order
     */
    public function getItemCount()
    {
        return $this->item->count();
    }
}