<?php session_start();  
include 'connection.php'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 

<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <link rel="stylesheet" href="css/reset.css" /> 
    <link rel="stylesheet" href="css/style.css" /> 

	<title>Shopping Cart</title>
	<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

}
#container{
	 width: 700px; 
    margin: 150px auto; 
    background-color: #eee; 
    padding:15px; 
    overflow: hidden; 
}



#header{
	    width: 700px; 
    margin: 100px auto; 
    background-color: #48577D; 
    color: white;
    padding:15px; 
    overflow: hidden; 
}
input[type=submit]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
<div id="header">
	  <h1><b>welcome to e-shop</b></h1>
      <h2 <a href="localhost/index.php"></a>Home</h2>

</div>

<div id="container">
<center>
<p><b>Your Transaction Summary: </b></p>


            <p><?php 
            
			foreach ($_SESSION['cart'] as $result){
			echo "           ".$result['quantity']. " Item (s) @ <br>";
}
             ?></p> 
<?php
//make changes where applicable as directed by the documentation Express_Checkout_API_2.10Jxc.01.pdf
echo "                    \t  KES   ";
echo "                      ". $_SESSION['$totalprice']. "<br>\n\n";

 //echo "$val"; 
?>
</center>
<div style="width: 200; height: 50; align-content: center;">
 <form method="post" action="https://www.jambopay.com/JPExpress.aspx" >
 <p></p><br><br>
 
	 <label for="fname">Name</label>
    <input type="text" id="name" name="name" placeholder="Your name...">
<label for="fname">Email</label>
    <input type="text" id="email" name="email" placeholder="Your email...">	

<input type="hidden" name="jp_item_type" value="cart"/> <!-- merchant item type -->
<input type="hidden" name="jp_item_name" value="test shop"/>  
<input type="hidden" name="order_id" value="<?php
    echo mt_rand(100000,999999);
?>"/>  <!-- merchant's invoice unique number -->
<input type="hidden" name="jp_business" value="demo@webtribe.co.ke"/> 

<input type="hidden" name="jp_amount_1" value="<?php echo $_SESSION['$totalprice']; ?>"/>  <!-- total amount for payment -->

<input type="hidden" name="jp_amount_2" value="0"/> <!-- total amount for shipping -->

<input type="hidden" name="jp_amount_5" value="0"/> <!-- total amount for checkout USD -->

<input type="hidden" name="jp_payee" value="$_POST['email']"/> <!-- customer email address -->
<input type="hidden" name="jp_shipping" value="company name"/> <!-- company's shipping name email address -->
<input type="hidden" name="jp_rurl" value="http://localhost/shopCart/Result.php"/> <!--return url on successful processing-->
<input type="hidden" name="jp_furl" value="http://localhost/shopCart/Fail.php"/><!--return url on failed processing-->
<input type="hidden" name="jp_curl" value="http://localhost/shopCart/testpost/Cancel.php"/><!--return url on transaction cancel-->
<input type="image" src="https://www.jambopay.com/jp_image/paynow.png"/>
</form>
</div>

</body>
</html>

