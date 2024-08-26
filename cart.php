<?php
session_start();
require_once 'product.php';

$productObj = new Product();
$cartItems = [];

// Retrieve cart items
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $productDetails = $productObj->getProductDetails($productId);
        if ($productDetails) {
            $cartItems[] = [
                'product' => $productDetails,
                'quantity' => $quantity
            ];
        }
    }
}

// removal items from cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['remove_from_cart'])) {
        $productId = $_POST['product_id'];
        unset($_SESSION['cart'][$productId]);

        header("Location: cart.php");
        exit();
    }

    if (isset($_POST['update_quantity'])) {
        $productId = $_POST['product_id'];
        $quantity = intval($_POST['quantity']);

        if ($_POST['update_quantity'] === 'plus') {
            $quantity++;
        } elseif ($_POST['update_quantity'] === 'minus' && $quantity > 1) {
            $quantity--;
        }

        if ($quantity <= 0) {
            unset($_SESSION['cart'][$productId]);
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }

        header("Location: cart.php");
        exit();
    }

    if (isset($_POST['checkout'])) {
        header("Location: checkout.php");
        exit();
    }
}
?>


<?php include "./head.php"  ?>


<div class="shopping-cart-table">
    <h1 style="text-align:left;">Shopping Cart</h1>
    <div class="table">
        <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
        <?php else: ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $totalPrice = 0; ?>
                <?php foreach ($cartItems as $item): 
                    $productPrice = floatval($item['product']['price']);
                    $subtotal = $productPrice * $item['quantity'];
                    $totalPrice += $subtotal;
                ?>
                <tr>
                    <td>
                        <img src="<?php echo htmlspecialchars($item['product']['image']); ?>"
                            alt="<?php echo htmlspecialchars($item['product']['name']); ?>" width="100" height="100" />
                        <?php echo htmlspecialchars($item['product']['name']); ?>
                    </td>
                    <td>$<?php echo htmlspecialchars(number_format($productPrice, 2)); ?></td>
                    <td>
                        <form method="POST" action="" style="display: inline;">
                            <input type="hidden" name="product_id"
                                value="<?php echo htmlspecialchars($item['product']['id']); ?>">
                            <button style="" type="submit" name="update_quantity" value="minus">-</button>
                            <input type="number" name="quantity"
                                value="<?php echo htmlspecialchars($item['quantity']); ?>" min="1" />
                            <button type="submit" name="update_quantity" value="plus">+</button>
                        </form>
                    </td>
                    <td>$<?php echo htmlspecialchars(number_format($subtotal, 2)); ?></td>
                    <td>
                        <form method="POST" action="" style="display: inline;">
                            <input type="hidden" name="product_id"
                                value="<?php echo htmlspecialchars($item['product']['id']); ?>">
                            <button style="background-color: red; color:white; border:none;" type="submit"
                                name="remove_from_cart">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h3>Total Price: $<?php echo number_format($totalPrice, 2); ?></h3>
        <form method="POST" action="">
            <button style="background-color:#f27f20; width: 15%" type="submit" name="checkout">Checkout</button>
        </form>
        <?php endif; ?>

    </div>