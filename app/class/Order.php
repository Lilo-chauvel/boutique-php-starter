<?php

namespace App\Class;

/**
 * Order is created after a cart validation and is validated when payment is done
 */
class Order
{
    public static array $ordersIds = [];
    private int $id;
    private string $date;

    public function __construct(
        private User $user,
        private Cart $cart,
        private bool $status = false
    ) {
        $this->date = date("d-m-Y");
        $this->createId();
    }

    /**
     * Generate unique order ID
     * @return int
     */
    private function createId(): int
    {
        $this->id = rand(1000, 9999);
        while (in_array($this->id, self::$ordersIds)) {
            $this->id = rand(1000, 9999);
        }
        self::$ordersIds[] = $this->id;
        return $this->id;
    }

    /**
     * Get the order date
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get the order ID
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the total of the order
     * @return float
     */
    public function getTotal(): float
    {
        return $this->cart->getTotalCart();
    }

    /**
     * Count the number of items in the order
     * @return int
     */
    public function getItemCount(): int
    {
        return $this->cart->count();
    }

    /**
     * Get the order status
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the order status
     * @param bool $status
     * @return self
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;
        return $this;
    }
}