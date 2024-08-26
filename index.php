<?php
session_start();
require_once 'product.php';

$productObj = new Product();
$products = $productObj->getAllProducts();
$currentPage = htmlspecialchars($_SERVER['REQUEST_URI']);

// add to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $productId = $_POST['product_id'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 1; 
        } else {
            $_SESSION['cart'][$productId] += 1; 
        }

        // Redirect to avoid form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Buy Now functionality
    if (isset($_POST['buy_now'])) {
        $productId = $_POST['product_id'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] = 1;
        } else {
            $_SESSION['cart'][$productId] += 1;
        }

        header("Location: cart.php");
        exit();
    }
}
?>


<?php include "./head.php"  ?>
<br>
<h1>All Products</h1>
<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product-card">
                <a href="productDetails.php?id=<?php echo $product['id']; ?>">
                    <img width="220px" src="<?php echo htmlspecialchars($product['image']); ?>"
                        alt="<?php echo htmlspecialchars($product['name']); ?>">
                    <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                </a>
                <p><?php echo htmlspecialchars($product['price']); ?> ৳</p>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button style="width:100px; background-color:#f27f20; color:white; margin-bottom:25px" type="submit"
                        name="buy_now">Buy Now</button>
                    <button style="width:100px; border:1px solid #f27f20; color:#f27f20" type="submit"
                        name="add_to_cart">Add to Cart</button>

                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include "./footer.php"  ?>
