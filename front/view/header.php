<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive E-Commerce Website</title>
    <style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4;
}

.header {
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: center;
}

.navbar {
    margin: 20px 0;
}

.navbar .nav-links {
    list-style: none;
    display: flex;
    justify-content: center;
}

.navbar .nav-links li {
    margin: 0 15px;
}

.navbar .nav-links a {
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: color 0.3s;
}

.navbar .nav-links a:hover {
    color: #f39c12;
}

.product-gallery {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
    background-color: white;
}

.product-item {
    background-color: #fff;
    margin: 15px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: calc(25% - 30px); /* Four items per row */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s;
}

.product-item img {
    max-width: 100%;
    height: auto;
    border-bottom: 1px solid #ddd;
    padding-bottom: 15px;
    margin-bottom: 15px;
}

.product-item h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #333;
}

.product-item p {
    font-size: 18px;
    color: #f39c12;
    font-weight: bold;
}

.product-item:hover {
    transform: translateY(-5px);
}

/* Responsive Styles */
@media (max-width: 992px) {
    .product-item {
        width: calc(33.333% - 30px); /* Three items per row */
    }
}

@media (max-width: 768px) {
    .product-item {
        width: calc(50% - 30px); /* Two items per row */
    }
}

@media (max-width: 576px) {
    .product-item {
        width: calc(100% - 30px); /* One item per row */
    }
}

.footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 15px;
    margin-top: 20px;
}
</style>
</head>
<body>
    <header class="header">
        <h1>My E-Commerce Store</h1>
        <nav class="navbar">
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>