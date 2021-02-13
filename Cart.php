<?php
require_once "CartItem.php";


/**
 * Class Cart
 */
class Cart
{
    /**
     * @var array
     */
    private array $items = [];

    /**
     * @param $id
     * @param $name
     * @param $price
     */
    public function addItem($id, $name, $price)
    {
        $cartItem = $this->getItem($id);
        if ($cartItem === null) {
            $cartItem = new CartItem($id, $name, $price);
            $this->items[$id] = $cartItem;
        }
        $cartItem->increase();
    }

    /**
     * @param $id
     */
    public function removeItem($id)
    {
        unset($this->items[$id]);
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param $id
     * @return mixed|null
     */
    public function getItem($id)
    {
        return $this->items[$id] ?? null;
    }

    /**
     * @return int
     */
    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;
        foreach ($this->items as $item){
            $totalQuantity += $item->getQuantity();
        }
        return $totalQuantity;
    }
}