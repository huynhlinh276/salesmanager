<?php
include'header.php';
?>
<link rel="stylesheet" type="text/css" href="style.css">
<div>
<?php

        require 'database-config.php';
        
        if (isset($_GET['search'])){
            $searchq = $_GET['search'];
            $searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);
            $sql = "SELECT  id, product_name, product_code, description, status, image , price FROM mypham WHERE product_name LIKE '%".$searchq."%'";
        }else{ 
            $sql = "SELECT  id, product_name, product_code, description, status, image , price FROM mypham";
        }
        $result = mysqli_query($conn, $sql);
        if(!$result){
        //Kiểm tra xem bị lỗi j
            die("Can't query data. Error occure.".mysqli_error($conn));
        }
        if (mysqli_num_rows($result) > 0) {
             echo "<div class='timkiem'style='padding :40px 40px 40px 40px'>";
             echo "<div class='row'>";
            $a=0;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<div class='col-lg-3 col-md-4 '>";
                echo "<a href='products.php?id=".$row["id"]."'>";
                // echo "<div class='product-container thumbnail'>";
                echo "<img class='img-responsive' style='width:250px' src='".$row["image"]."' >";
                echo "<h3><center>".$row["product_name"]."</center></h3>";
                echo "<h3><center>".$row["product_code"]."</center></h3>";
                 echo "<h3><center>".$row["description"]."</center></h3>";
               
           echo "<h3><center>".$row["status"]."</center></h3>";
              
                 echo "<h3><center>".$row["price"]."</center></h3>";
               
                // echo "</div>";
                echo "</a>";
                echo "</div>";


                

                $a=$a+1;
            }
            
             echo "</div>";  
             echo "</div>";
            // echo "<div><b></t> $a products have been found... </b></div><br>";  
        }else{
                // echo "<div class='containter'>";
                // echo "<div class='row'>";
                echo "No results to search";
                echo"Location: index.php";
                // echo "</div>";
                // echo "</div>";
        }
        
            mysqli_close($conn);
            ?>
            
</div>

<?php
include'footer.php';
?>