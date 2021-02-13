<?php

/**
 * Class CartItem
 */
class CartItem
{
    /**
     * @var string
     */
    private string $id;
    /**
     * @var string
     */
    private string $name;
    /**
     * @var float
     */
    private float $price;
    /**
     * @var int
     */
    private int $quantity;

    /**
     * CartItem constructor.
     * @param $id
     * @param $name
     * @param $price
     */
    public function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->quantity = 0;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return float|int
     */
    public function getTotalPrice()
    {
        return $this->getQuantity() * $this->getPrice();
    }

    /**
     * @return TRUE
     */
    public function increase(): bool
    {
        $this->quantity += 1;
        return TRUE;
    }
}