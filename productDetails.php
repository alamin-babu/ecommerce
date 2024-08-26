<?php
session_start();
require_once 'product.php';

$productObj = new Product();

if (isset($_GET['id'])) {
    $productId = htmlspecialchars($_GET['id']);
    $product = $productObj->getProductById($productId);

    if ($product === null) {
        echo 'Product not found.';
        exit();
    }
} else {
    echo 'No product ID specified.';
    exit();
}

// Handle Add to Cart and Buy Now
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $productId = $_POST['product_id'];

    if ($action === 'add') {
        $_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + 1;
        header("Location: productDetails.php?id=" . $productId);
        exit();
    } elseif ($action === 'buy') {
        $_SESSION['cart'][$productId] = ($_SESSION['cart'][$productId] ?? 0) + 1;
        header("Location: cart.php");
        exit();
    }
}
?>
<?php include "./head.php"  ?>


<div>
    <div>
        <div class="image"> <img style="" src="<?php echo htmlspecialchars($product->getProductImage()); ?>"
                alt="<?php echo htmlspecialchars($product->getProductName()); ?>">
        </div>
        <h1><?php echo htmlspecialchars($product->getProductName()); ?></h1>
        <p><?php echo htmlspecialchars($product->getProductDescription()); ?></p>
        <p>Price: $<?php echo htmlspecialchars($product->getProductPrice()); ?></p>

        <h3>Features:</h3>
        <ul>
            <?php foreach ($product->getProductFeatures() as $feature): ?>
            <li><?php echo htmlspecialchars($feature); ?></li>
            <?php endforeach; ?>
        </ul>
        <form method="POST" action="">
            <input type="hidden" name="product_id" value="<?php echo $productId; ?>">
            <button type="submit" name="action" value="add">Add to Cart</button>
            <button type="submit" name="action" value="buy">Buy Now</button>
        </form>
        <br>
    </div>
</div>