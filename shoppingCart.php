<?php session_start();

// ensures there is a cart object in session before executing code
if (isset($_SESSION['cart'])) {
    $cart = unserialize($_SESSION['cart']);
    $items = $cart->getItems();
    $totalQuantity = $cart->getTotalQuantity();

    // iterates through CartItems in cart then puts then into html
    foreach ($items as $item) {
        $itemName = $item->getName();
        $itemPrice = $item->getPrice();
        $itemQuantity = $item->getQuantity();
        $totalPrice = $item->getTotalPrice();
        $id = $item->getId();
        ?>

        <h3>Name: <?php echo $itemName ?> Price: $<?php echo number_format($itemPrice, 2) ?>
            Quantity: <?php echo $itemQuantity ?> Total:
            $<?php echo number_format($totalPrice, 2) ?></h3>
        <a href="#" class="link" data-id="<?php echo $id; ?>" data-action="remove">Remove From Cart</a>
        <?php
    }
    if ($totalQuantity > 0) {
        ?>
        <h3>Total Items in Cart: <?php echo $totalQuantity ?></h3>
        <?php
    }

}