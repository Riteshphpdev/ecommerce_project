<?php include "sidebar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap.min.css">
</head>
<?php
 include "../controller/allfunction.php";

 $obj = new allfunction();
  $product_id = $name = $model = $description = $price =  $qty = $status = $image="";
 if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_GET['product_id'])){
       $obj->updateProduct($_POST,$_FILES);
       header("location: product_list.php");
       $_SESSION['success_message'] = "Product Updated successfully!";
       
    }else{
        $obj->productAdd($_POST, $_FILES);
        $_SESSION['success_message'] = "Product added successfully!";
        header("location: product_list.php");
       
    }
 }
?>
<?php
//for update process product id get
if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
    $result = $obj->getProduct($product_id);
    $name = $result['name'];
    $model = $result['model'];
    $description = $result['description'];
    $price = $result['price'];
    $qty = $result['qty'];
    $status = $result['status'];
    $image = $result['image'];
  //echo "<pre>"; print_r($image); die();

}

?>
<body>
<div class="container mt-5">
    <?php if(isset($_GET['product_id'])){ ?>
        <h1 class="text-primary">Products <small class="text-secondary">/ Edit Product</small></h1>
   <?php }else{ ?>
    <h1 class="text-primary">Products <small class="text-secondary">/ Form Product</small></h1>
  <?php } ?>
    <div class="form-container">
        <form method="POST" action="" enctype="multipart/form-data">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <!-- Aligning buttons to the right -->
            <div class="d-flex justify-content-end mb-3">
                <?php if(isset($_GET['product_id'])){ ?>
                <button type="submit" class="btn btn-primary">Update</button>
              <?php  }else{ ?>
                <button type="submit" class="btn btn-primary">Save</button>
             <?php } ?>
                <a href="product_list.php" class="btn btn-secondary ml-2">Cancel</a>
            </div>

            <!-- Tabs for different sections of the form -->
            <ul class="nav nav-tabs" id="productFormTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab">Data</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab">Image</a>
                </li>
               
            </ul>

            <div class="tab-content mt-3" id="productFormTabContent">
                <!-- General Tab Content -->
                <div class="tab-pane fade show active" id="general" role="tabpanel">
                    <div class="form-group">
                        <label for="productName">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="name" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="model">Model</label>
                        <input type="text" class="form-control" id="model" name="model" value="<?php echo $model; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="10" class="form-control" id="description" name="description" required><?php echo $description; ?></textarea>
                    </div>
                </div>
                <!-- Data Tab Content -->
                <div class="tab-pane fade" id="data" role="tabpanel">
                   
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo $price; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="qty" value="<?php echo $qty; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option <?php if($status == 1){ echo "selected";} ?> value="1" selected>Enabled</option>
                            <option <?php if($status == 0){ echo "selected";} ?> value="0">Disabled</option>
                        </select>
                    </div>
                </div>
                
                <!-- Image Tab Content -->
                <div class="tab-pane fade" id="image" role="tabpanel">
                    <style>
                        #img_url {
                            background: #ddd;
                            width:100px;
                            height: 90px;
                            display: block;
                        }
                        </style>
                    
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script>
                        function img_pathUrl(input){
                            $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
                        }
                        </script>
                        <?php if(!empty($image)){ ?>
                            <img src="../images/uploaded_images/<?php echo $image; ?>" id="img_url" alt="your image">
                            <input type="hidden" name="image" value="<?php echo $image; ?>">
                      <?php }else{ ?>
                        <img src="../images/dumy_image.jpg" id="img_url" alt="your image">
                     <?php } ?>
                    <br>
                    <input type="file" name="image" id="img_file" onChange="img_pathUrl(this);">
                    
                    
                </div>

                <!-- Image Tab Content end -->
                
            </div>
        </form>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>

</body>
</html>
