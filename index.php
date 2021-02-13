<?php
session_start();
error_reporting(-1); ?>

    <!--gets ajax and jQuery for links-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- everytime a link with class link is pushed this runs -->
    <script>
        $(function () {
            $('.link').click(function () {
                // gets element to extract data from attributes
                const elem = $(this);
                $.ajax({
                    type: 'GET',
                    url: 'cartFunction.php',
                    data: {
                        id: elem.attr('data-id'),
                        name: elem.attr('data-name'),
                        price: elem.attr('data-price'),
                        action: elem.attr('data-action')
                    },
                    // reloads the page to update cart
                    success: function () {
                        location.reload();
                    }
                });
            });
        });
    </script>

<?php
require_once "Cart.php";
// Outside of project scope but could upload to MySQL database for different users
// ######## please do not alter the following code ########
$products = [
    ["name" => "Sledgehammer", "price" => 125.75],
    ["name" => "Axe",
        "price" => 190.50],
    ["name" => "Bandsaw",
        "price" => 562.131],
    ["name" => "Chisel",
        "price" => 12.9
    ],
    ["name" => "Hacksaw",
        "price" => 18.45],
];
// #######################################################

// not sure whether to format the number on as displayed or send to object the convert back - i'll ask around
foreach ($products as $product) {
    $name = $product['name'];
    $price = $product['price'];
    $id = $product['name'];
    ?>
    <h3>Name: <?php echo $name ?> Price: <?php echo number_format($price, 2) ?></h3>
    <a href="#" class="link" data-id="<?php echo $id; ?>" data-name="<?php echo $name; ?>"
       data-price="<?php echo $price; ?>" data-action="add">Add to Cart</a>
    <?php
}
?>
    <h1>Cart</h1>
<?php
require_once "shoppingCart.php";
