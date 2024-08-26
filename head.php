<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M. Buy your desire Gadgets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/login.css">
    <link rel="stylesheet" href="style/cart.css">
    <link rel="stylesheet" href="style/card.css">
    <style>
    .navbar {
        background-color: #000000;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 15px;
        z-index: 10;

    }

    .navbar-brand,
    .navbar-nav .nav-link {
        color: #ffffff;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.1);
    }

    .navbar-nav .nav-item {
        display: flex;
        align-items: center;
    }

    .navbar-nav .nav-link {
        display: flex;
        align-items: center;
        text-align: left;
    }

    .navbar-nav .nav-link i {
        font-size: 1.5rem;
        margin-right: 0.5rem;
    }

    .navbar-nav .nav-link .button-text {
        display: flex;
        flex-direction: column;
    }

    .navbar-nav .nav-link .button-text small {
        font-size: 0.75rem;
        opacity: 0.7;
    }

    .button-text {
        color: #f27f20;

    }

    .button-text a {
        color: #f27f20;
    }

    @media (max-width: 991.98px) {
        .navbar-nav .nav-item {
            margin-top: 1rem;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="../ecommerce/index.php"><img
                    style=" margin-left:25px; background-color: ; width:50px; height:50px" src="media/m.png" alt=""></a>

            <!-- Hamburger button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Search bar -->
                <form class="d-flex mx-auto mt-2 mt-lg-0 col-12 col-lg-6">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>

                <!-- Nav buttons -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span><img src="media/tag.png" alt=""></span>
                            <div class="button-text">
                                <strong>Offers</strong>
                                <small>Latest Offers</small>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">
                            <span><img src="media/add-to-cart.png" alt=""></span>
                            <div class="button-text">
                                <strong>Cart(<?php echo isset($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0; ?>)</strong>
                                <small>Add items</small>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span><img src="media/order-delivery.png" alt=""></span>
                            <div class="button-text">
                                <strong>Pre-Order</strong>
                                <small>Order Today</small>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['username'])): ?>
                        <a class="" href="#">
                            <span><img src="media/user.png" alt=""></span>
                            <div class="button-text">
                                <strong
                                    style="color:#f27f20"><?php echo htmlspecialchars($_SESSION['username']); ?></strong>
                                <small> <a style="color:#f27f20; display: flex; margin-top: 0;" href="logout.php"
                                        class="">Logout</a></small>
                            </div>
                        </a>

                        <?php else: ?>
                        <a class="" href="login.php">
                            <span><img src="media/user.png" alt=""></span>
                            <div class="button-text">
                                <strong>Account</strong><br>
                                <small><a style="color:#f27f20; display: flex; margin-top: 0;" href="register.php"
                                        class="">Register or Login</a></small>
                            </div>
                        </a>

                        <?php endif; ?>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class=""></div>

    <div class="link-container">
        <a href="#" class="link-item">Phones & Tablets</a>
        <a href="#" class="link-item">Laptop & Desktop</a>
        <a href="#" class="link-item">Sound Equipment</a>
        <a href="#" class="link-item">Power & Accessories</a>
        <a href="#" class="link-item">Fitness & Wearable</a>
        <a href="#" class="link-item">Peripherals</a>
        <a href="#" class="link-item">Cover & Glass</a>
        <a href="#" class="link-item">Smart Electronics</a>
        <a href="#" class="link-item">Used Device</a>
        <a href="#" class="link-item">Blog</a>
    </div>