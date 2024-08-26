<h1>All Products</h1>
<div class="container">
    <div class="row">
        <?php foreach ($products as $product): ?>
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="product-card">
                <img src="<?php echo htmlspecialchars($product['image']); ?>"
                    alt="<?php echo htmlspecialchars($product['name']); ?>">
                <h5><?php echo htmlspecialchars($product['name']); ?></h5>
                <p><?php echo htmlspecialchars($product['price']); ?></p>
                <form method="POST" action="">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                    <button type="submit" name="buy_now">Buy Now</button>
                </form>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>