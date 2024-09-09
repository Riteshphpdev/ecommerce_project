<?php include "sidebar.php"; ?>
<!-- Success message CSS file location -->
<link rel="stylesheet" href="../asset/css/style_succesmsg.css">
<body>
<div class="container">
<?php
//session_start();
include "../controller/allfunction.php";
$obj = new allfunction();

// Set the number of products to display per page
$products_per_page = 3; // You can change this value as per your requirement

// Get the current page number from the URL, default to 1 if not set
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
// Ensure that the page number is at least 1, otherwise redirect to page 1
if ($page < 1) {
    header("Location: product_list.php?page=1");
    exit();
}
$offset = ($page - 1) * $products_per_page;

// Get total number of products for pagination calculation

$total_products = $obj->getTotalProducts();
$total_pages = ceil($total_products / $products_per_page);
// Fetch the products for the current page
$product_datas = $obj->getProductsByPage($offset, $products_per_page); // Modify the getProducts function to accept offset and limit

// Check if there's a success message in the session
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
    // Unset the session message after displaying it
    unset($_SESSION['success_message']);
}

// Handle the form submission (delete selected products)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_ids'])) {
    $product_ids = $_POST['product_ids']; // Array of selected product IDs
    
    foreach ($product_ids as $product_id) {
        $obj->productDelete($product_id); // Call the delete function for each product ID
    }

    // Set a success message and reload the page
    $_SESSION['success_message'] = count($product_ids) . " product(s) deleted successfully.";
    header("Location: product_list.php");
    exit();
}

//$product_datas = $obj->getProducts(); // Fetch all products
?>

    <div class="header">
        <div class="breadcrumb">
            <a href="#">Home</a> / <a href="#">Products</a>
        </div>
        <div class="header-buttons">
            <button><i class="fas fa-plus"></i><a style="color: white" href="product_form.php"> Add New</a></button>
            <!-- Delete button to submit the form and delete selected products -->
            <button style="background-color: red;" type="submit" form="form-product" id="delete-all"><i class="fas fa-trash-alt"></i> Delete</button>
        </div>
    </div>

    <h1>Product List</h1>
    <div class="filter-section">
        <input type="text" placeholder="Product Name">
        <input type="text" placeholder="Price">
        <select>
            <option value="">Status</option>
            <option value="enabled">Enabled</option>
            <option value="disabled">Disabled</option>
        </select>
        <input type="text" placeholder="Model">
        <input type="text" placeholder="Quantity">
        <button><i class="fas fa-filter"></i> Filter</button>
    </div>

    <!-- Form to handle product deletion -->
    <form action="product_list.php" method="POST" enctype="multipart/form-data" id="form-product">
        <table>
            <thead>
                <style>
                    .checkbox {
                        width: 40px;
                        height: 20px;
                    }
                </style>
                <tr>
                    <th style="text-align:center"><input id="select-all" class="checkbox" type="checkbox"></th>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(mysqli_num_rows($product_datas)>0){ ?>
                <?php foreach ($product_datas as $value) { ?>
                <tr>
                    <!-- Checkbox to select the product -->
                    <td style="text-align:center">
                        <input class="checkbox" name="product_ids[]" value="<?php echo $value['product_id']; ?>" type="checkbox">
                    </td>
                    <td class="product-image">
                       <?php if ($value['image'] == "") { ?>
                           <img id="img_url" src="../images/dumy_image.jpg" alt="dumy image">
                       <?php } else { ?>
                           <img id="img_url" src="../images/uploaded_images/<?php echo $value['image']; ?>" alt="<?php echo $value['image']; ?>">
                       <?php } ?>
                    </td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['model']; ?></td>
                    <td><?php echo $value['price']; ?>Rs</td>
                    <td class="quantity"><?php echo $value['qty']; ?></td>
                    <td class="status"><?php echo $value['status'] == 1 ? '<p class="enable-color">Enabled</p>' : '<p class="disabled-color">Disabled</p>'; ?></td>
                    <td class="action-buttons">
                        <button class="edit"><i class="fas fa-edit"></i><a href="product_form.php?product_id=<?php echo $value['product_id']; ?>"> Edit</a></button>
                    </td>
                </tr>
                <?php } ?>
                <?php  }else{ ?>
                    <td style="text-align: center" colspan="8">No recode</td>
               <?php } ?>
            </tbody>
        </table>
    </form>
     <!-- Pagination Links -->
      <style>
        .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin: 4px;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}
      </style>
    <div class="pagination">
        <?php if($page>1){ ?>
          <a href="?page=<?php echo $page-1 ?>">Prev</a>
        <?php } ?>
        
        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
            <a href="?page=<?php echo $i; ?>" class="<?php if ($page == $i) echo 'active'; ?>"><?php echo $i; ?></a>
        <?php } ?>
        <?php if($total_pages>$page){ ?>
          <a href="?page=<?php echo $page+1 ?>">Next</a>
        <?php } ?>

        
    </div>
</div>

<!-- JavaScript to handle 'Select All' checkbox functionality -->
<script>
    // Select or Deselect all checkboxes when the master checkbox is clicked
    document.getElementById('select-all').onclick = function() {
        var checkboxes = document.getElementsByName('product_ids[]');
        for (var checkbox of checkboxes) {
            checkbox.checked = this.checked;
        }
    };
</script>
</body>
</html>
