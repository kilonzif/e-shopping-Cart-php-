    <?php 
    session_start(); 
    require("connection.php");  //for database connection 
    if(isset($_GET['page'])){  //getting pages to to be called in this file
          
        $pages=array("products", "cart","jambopay_express"); 
          
        if(in_array($_GET['page'], $pages)) { 
              
            $_page=$_GET['page']; 
              
        }else{ 
              
            $_page="products"; 
              
        } 
          
    }else{ 
          
        $_page="products"; 
          
    } 
  
?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
      
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/reset.css" /> 
    <link rel="stylesheet" href="css/style.css" /> 
      
  
    <title>Shopping Cart</title> 
  
  
</head> 
  
<body>
<div id="header">
  <h1><b>welcome to e-shop</b></h1>
  <h2 <a href="localhost/index.php"></a>Home</h2>
    
</div> 
      
    <div id="container"> 
  
        <div id="main"> 
              
            <?php require($_page.".php"); ?> 
  
        </div><!--end of main--> 
          
        <div id="sidebar"> 
            <h1>Cart</h1> 
<?php 
  
  //getting all the products from the database n displaying them on the table
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM products WHERE productId IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY productName ASC"; 
        $query=mysqli_query($con,$sql); 
        
        while($row=mysqli_fetch_array($query)){ 
              
        ?> 

            <p><?php 
            echo $row['productName'] ?> x <?php echo $_SESSION['cart'][$row['productId']]['quantity']
             ?></p> 
        <?php 
              
        } 
    ?> 
        <hr /> 
        <a href="index.php?page=cart">Go to cart</a> 
    <?php 
          
    }else{ 
          
        echo "<p>Your Cart is empty. Please add some products.</p>"; 
          }
          ?>
              
        </div><!--end of sidebar--> 
  
    </div><!--end container--> 
  
</body> 
</html>
