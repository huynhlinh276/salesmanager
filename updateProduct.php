<?php
header("Content-Type:application/json");
require 'database-config.php';
if (isset($_POST["product_name"]) && isset($_POST["product_code"]) && isset($_POST["price"]) && isset($_POST["description"])) {
    $id = $_POST["id"];
    $name = $_POST["product_name"];
    $code = $_POST["product_code"];
   
    $price= $_POST["price"];
    $description= $_POST["description"];
     $type= $_POST["type"];
    
    $sql = "UPDATE mypham SET product_name='".$name."', product_code='".$code."', price='".$price."', description='".$description."' , type='".$type."' WHERE id = ".$id;
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