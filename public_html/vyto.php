<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<?php

$servername = "localhost";
$username = "pprelati_oc";
$password = "jusK1tas";
$dbname = "pprelati_oc";


$link = mysqli_connect("localhost", "pprelati_oc", "jusK1tas", "pprelati_oc");
 
$sql = "SELECT model FROM oc_product 
            INNER JOIN oc_product_to_category ON oc_product.product_id = oc_product_to_category.product_id 
            WHERE oc_product_to_category.category_id = 59";

$result = mysqli_query($link, $sql);

while($row = mysqli_fetch_array($result)) {
            $sizes[] = substr($row['model'], -5);
}
            
          
//while($r[]=mysqli_fetch_array($result));
print_r ($sizes);

echo "<br>";

                    $sizes = array(
                        '9x13',
                        '10x15',
                        '13x18',
                        '15x21',
                        '15x23',
                        '21x25',
                        '21x30'
                    );
print_r ($sizes);

// Close connection
mysqli_close($link);




    

?>
  