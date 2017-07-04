    <?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  
?> 
  
<h1>View cart</h1> 
<a href="index.php?page=products">Go back to the products page.</a> 
<h1><link rel="stylesheet" type="text/css" href="style.css"></h1>
<form method="post" action="index.php?page=cart"> 
      
    <table> 
          
        <tr> 
            <th>Name</th> 
            <th>Quantity</th> 
            <th>Price</th> 
            <th>Items Price</th> 
        </tr> 
          
        <?php 
          
            $sql="SELECT * FROM products WHERE productId IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY productName ASC"; 
                    $query=mysqli_query($con,$sql); 
                    //$totalprice=0; 
                    $_SESSION['$totalprice']=0;
                    while($row=mysqli_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['productId']]['quantity']*$row['price']; 
                        $_SESSION['$totalprice']+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><?php echo $row['productName'] ?></td> 
                            <td><input type="text" name="quantity[<?php echo $row['productId'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['productId']]['quantity'] ?>" /></td> 
                            <td> KES <?php echo $row['price'] ?> </td> 
                            <td> KES <?php echo $_SESSION['cart'][$row['productId']]['quantity']*$row['price'] ?></td> 
                        </tr> 
                    <?php 
                          
                    } 
        ?> 
                    <tr> 
                        <td colspan="4">Total Price: <?php echo $_SESSION['$totalprice']; ?></td> 
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit">Update Cart</button>
    <p><?php echo $_SESSION['$totalprice']; ?></p>
   
</form> 
<br /> 
<button type="pay" name="pay" Onclick="window.open('jambopay_express.php')" style="margin-left:400px;">Checkout</button> 

<p>To remove an item set its quantity to 0. </p>