<?php
session_start();
require_once 'Product.php';

$productObj = new Product();
$cartItems = [];
$totalPrice = 0;

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); 
    exit();
}

// Retrieve cart items
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        $product = $productObj->getProductById($productId);
        if ($product) {
            $cartItems[] = [
                'product_id' => $product->getProductId(),
                'quantity' => $quantity
            ];
            $totalPrice += floatval($product->getProductPrice()) * $quantity;
        }
    }
}

// Handle order placement
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    
    if (!empty($cartItems) && $name && $email && $address) {
        $order = [
            'customer' => [
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'username' => $_SESSION['username'] 
            ],
            'items' => $cartItems,
            'total_price' => $totalPrice,
            'date' => date('Y-m-d H:i:s')
        ];

        // Save order to JSON file
        $orderFile = 'orders.json';
        $orders = [];
        if (file_exists($orderFile)) {
            $orders = json_decode(file_get_contents($orderFile), true);
        }
        $orders[] = $order;
        file_put_contents($orderFile, json_encode($orders, JSON_PRETTY_PRINT));

        unset($_SESSION['cart']);

        header("Location: order_success.php");
        exit();
    } else {
        $error = "Please fill in all details and ensure your cart is not empty.";
    }
}
?>
<?php include "./head.php"  ?>


<div class=" container checkout-div">


    <h1 class="mb-4">Checkout</h1>

    <?php if (!empty($cartItems)): ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <textarea id="address" name="address" rows="4" class="form-control" required></textarea>
        </div>

        <h2>Total Price: $<?php echo number_format($totalPrice, 2); ?></h2>

        <button type="submit" style="background-color:#f27f20; width: 15%">Place Order</button>
    </form>
    <?php else: ?>
    <div class="alert alert-info" role="alert">
        Your cart is empty.
    </div>
    <?php endif; ?>

    <?php if (isset($error)): ?>
    <div class="alert alert-danger mt-4" role="alert">
        <?php echo htmlspecialchars($error); ?>
    </div>
    <?php endif; ?>





</div>