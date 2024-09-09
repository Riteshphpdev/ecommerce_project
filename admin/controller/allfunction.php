<?php
include(__DIR__ . '/../../config.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class allfunction{

    public function productAdd($data,$FILES){
        global $conn;
        $image_name = $FILES['image']['name'];//image name insert in database
        //insert image store in project folder
        $store_dir = '../images/uploaded_images/';
        $target_file = $store_dir.basename($FILES['image']['name']);
        move_uploaded_file($FILES['image']['tmp_name'],$target_file);
        $sql = "INSERT INTO `product` set `name`='".$data['name']."', `model`='".$data['model']."', `description`='".$data['description']."', `price`='".$data['price']."', `qty`='".$data['qty']."', `image`='".$image_name."', `status`='".$data['status']."'";
        mysqli_query($conn, $sql);
    }

    // public function getProducts(){//in list data show
    //     global $conn;
    //     $sql = "SELECT * FROM `product` ORDER BY `product_id` DESC";
    //     $result= mysqli_query($conn,$sql);
    //     return $result;
    // }

    public function getProduct($product_id){// hold value product form for edit
     global $conn;
     $sql="SELECT * FROM `product` where `product_id`=$product_id";
     $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
       $row = mysqli_fetch_assoc($result);
       return $row;
     }
    }

    public function updateProduct($data,$FILES){//update product form 
        global $conn;
        // Fetch the existing product details to retain the current image if no new image is uploaded.
        $product_id = $data['product_id'];
        $current_product = $this->getProduct($product_id);
        $current_image = $current_product['image'];
        // Directory where images are stored
        $store_dir = '../images/uploaded_images/';

        // Step 1: Check if a new image is uploaded
        if (!empty($FILES['image']['name'])) {
        // Step 2: Process the new image
        $new_image_name = $FILES['image']['name'];
        $target_file = $store_dir . basename($new_image_name);

        // Step 3: Delete the old image if it exists and is not the default image
        if (!empty($current_image) && file_exists($store_dir . $current_image)) {
            unlink($store_dir . $current_image); // Delete old image from server
        }

        // Step 4: Upload the new image
        move_uploaded_file($FILES['image']['tmp_name'], $target_file);

        // Use the new image name for the update
        $image_name = $new_image_name;
        } else {
        // If no new image is uploaded, retain the existing image name
        $image_name = $current_image;
        }

        $sql = "UPDATE `product` set `name`='".$data['name']."', `model`='".$data['model']."', `description`='".$data['description']."', `price`='".$data['price']."', `qty`='".$data['qty']."', `image`='".$image_name."', `status`='".$data['status']."' WHERE `product_id`=$product_id";
        mysqli_query($conn, $sql);
    }

    public function productDelete($product_id) {
        global $conn;
    
        // Step 1: Fetch the product details
        $sql = "SELECT image FROM `product` WHERE `product_id` = $product_id";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            // Step 2: Delete the image file if it exists
            if (!empty($product['image'])) {
                $image_path = '../images/uploaded_images/' . $product['image'];
                if (file_exists($image_path)) {
                    if (!unlink($image_path)) {
                        return "Error deleting image: " . $image_path;
                    }
                }
            }
            // Step 3: Proceed with deleting the product from the database
            $delete_sql = "DELETE FROM `product` WHERE `product_id` = $product_id";
            mysqli_query($conn, $delete_sql);
           
        } 
    }

    public function getTotalProducts() { //pagination total number page get
        global $conn;
        $sql = "SELECT COUNT(*) AS total FROM `product`";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        return $data['total'];
    }
    
    //product list mai data get v kar rha h, or limit v per page show kara rha h..
    public function getProductsByPage($offset, $limit) {
        global $conn;
        $sql = "SELECT * FROM `product` ORDER BY `product_id` DESC LIMIT $limit OFFSET $offset";
        return mysqli_query($conn, $sql);
    }
  
    public function loginAdmin($data){//admin login
        global $conn;
        $sql="SELECT * FROM `admin` where `name`='".$data['name']."' AND `password`='".$data['password']."'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num == 1){
           $row = mysqli_fetch_assoc($result);
           $_SESSION['name'] = $row['name'];
           header("Location: view/dashboard.php");
        }
    }

}//class close
?>