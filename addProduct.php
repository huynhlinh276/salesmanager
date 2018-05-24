<?php 
header("Content-Type:application/json");
require 'database-config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
   if(isset($_POST["product_name"]) && isset($_POST["product_code"])  && isset($_POST["price"])&& isset($_POST["description"])){
       
        // $product_id = $_POST["id"];
        $name = $_POST["product_name"];
        $code = $_POST["product_code"];
    
        $price = $_POST["price"];
        $description = $_POST["description"];
        $tyype = $_POST["type"];
        // $image = $target_file;
        $target_dir = "img/";
        $target_file = $target_dir .date("YmdHis"). basename($_FILES["fileToUpload"]["name"]);
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
       $sql = "INSERT INTO mypham(product_code, product_name, price, description, image, type) VALUES('".$code."','".$name."','".$price."','".$description."','".$target_file."','".$type."')";


        $result = mysqli_query($conn, $sql);
        if($result){
            $data["result"] = true;
            $data["message"] =  "Add product successfully";
            // echo header("location: index.php");
            // die();
        }else{
            $data["result"] = false;
            $data["message"] =  "Can not add product. Error: ".mysqli_error($conn);
        }
    }else{
        $data["result"] = false;
        $data["message"] = "Invalid product information";
    }
    echo json_encode($data);
}
 ?>