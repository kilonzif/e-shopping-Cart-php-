<h1><link rel="stylesheet" type="text/css" href="style.css"></h1>
<?php 
  
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM products WHERE productId={$id}"; 
            $query_s=mysqli_query($con,$sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['productId']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    ); 
                  
                  
            }else{ 
                  
                $message="This product id it's invalid!"; 
                  
            } 
              
        } 
          
    } 
  
?> 
    <h1>Product List</h1> 
    <?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
    ?> 
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products ORDER BY productName ASC"; 
        
            $result=mysqli_query($con, $sql);
            echo '$result';
              
           while ($row=mysqli_fetch_array($result)) { 
        
                  
        ?> 
            <tr> 
                <td><?php echo $row['productName'] ?></td> 
                <td><?php echo $row['quantity'] ?></td> 
                <td><?php echo $row['price'] ?>$</td> 
                <td><a href="index.php?page=products&action=add&id=<?php echo $row['productId'] ?>">Add to cart</a></td> 
            </tr>
        <?php 
                  
           } 
          
        ?> 
          
    </table>