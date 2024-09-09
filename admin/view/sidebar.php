<?php 
session_start();
if(!isset($_SESSION['name'])){
 header('location:../index.php');
 exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-commerce Dashboard</title>
    <link rel="stylesheet" href="../asset/css/style_sidebar.css">
    
    <!-- product list strat -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- product list end -->
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <h2><a style="color: white;" href="dashboard.php">Dashboard</a></h2>
            <ul>
                <li><a href="product_list.php">Products</a></li>
                <li><a href="#">Overview</a></li>
                <li><a href="#">Orders</a></li>
                <li><a href="#">Customers</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>