<?php
header("Content-Type:application/json");
require 'database-config.php';
if (isset($_POST["product_name"]) && isset($_POST["product_code"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["status"])) {
    $id = $_POST["id"];
    $name = $_POST["product_name"];
    $code = $_POST["product_code"];
   $description= $_POST["description"];
    $price= $_POST["price"];
     // $image = trim($_POST['image']);
    $target_dir = "img/";
    $image = $target_dir .date("Y-m-d_H_i_s"). basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $image);
    
      $status= $_POST["status"];
    $sql = "UPDATE mypham SET product_name='".$name."', product_code='".$code."',description='".$description."' ,  price='".$price."', status='".$status."', image='".$image."'  WHERE id = ".$id;
    $result = mysqli_query($conn,$sql);
    if ($result) {
        $data["result"] = true;
        $data["message"]  ="Edit product successfully";
        // echo header("location: index.php");
    }else{
        $data["result"] = false;
        $data["message"]  ="Cannot edit product. Error: ".mysqli_error($conn);
    }
}else{
    $data["result"] = false;
    $data["message"]  ="Invalid";
}
echo json_encode($data)
?>