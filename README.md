## M. -  PHP E-Commerce System

This is a basic e-commerce system built using PHP and Object-Oriented Programming (OOP). The application allows users to browse products, add products to a shopping cart, and complete the checkout process. Data is stored using JSON files to maintain simplicity and avoid using a relational database.


## Demo (not functional)
 [Click Here](http://alamin-babu.infinityfreeapp.com/ecommerce) 👈

## Features

- **Browse Products**: Users can view a list of available products with images, descriptions, prices, and key features.
- **Add to Cart**: Users can add products to a shopping cart.
- **Buy Now**: Users can directly add a product to the cart and proceed to checkout.
- **Checkout Process**: Users can provide their details and complete the purchase.
- **JSON-based Database**: Products, users, and orders are stored in JSON files.


## Key Functionalities
- **Product Management**: Products are loaded from product.json, and the available stock is managed automatically when orders are placed.

- **User Authentication**: Basic user authentication is implemented using the user.json file.

- **Cart Management**: The cart functionality is managed using sessions, allowing users to add and remove items.

- **Order Processing**: Once the user completes the checkout, the order is stored in orders.json, and the product stock is updated.



## Limitations
- **Incomplete Design**: The project lacks a complete design and proper configuration. The user -  interface is minimal and may not be fully responsive or user-friendly.
- **Functional Issues**: The project is in a preliminary state and may not work as intended. Some functionalities might be buggy or incomplete.
- **Security Concerns**: The project does not include advanced security measures. Passwords are encrypted but other security aspects like input validation, sanitization, and protection against common vulnerabilities are not fully implemented.
- **Limited Features**: The project focuses on core functionalities and does not include advanced features such as product categories, user roles, or comprehensive order management.


## Future Work
- Improve the design and user interface to make it more professional and responsive.
- Enhance security features and input validation.
- Implement additional features like user account management, product categories, and advanced order management.
- Refactor code for better organization and maintainability.

