<?php
if(isset($_GET["id"])){
    require 'database-config.php';
    $id = $_GET["id"];
    $sql = "DELETE FROM dangki WHERE id =" .$id;
    $result = mysqli_query($conn, $sql);
    if($result){
        echo header("location: users.php");
        die();
    }else{
        echo "Delete error:".mysqli_error($conn);
    }
}
else{
    echo "No Users ID";
}

?>