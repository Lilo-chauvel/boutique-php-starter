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
        private Cart $cart,
        private bool $status = false
    ) {
        $this->date = date('d-m-Y');
        $this->createId();
    }

    /**
     * Generate unique order ID
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
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * Get the order ID
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the total of the order
     */
    public function getTotal(): float
    {
        return $this->cart->getTotalCart();
    }

    /**
     * Count the number of items in the order
     */
    public function getItemCount(): int
    {
        return $this->cart->count();
    }

    /**
     * Get the order status
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Set the order status
     */
    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
