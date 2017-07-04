<?php
session_start(); 
    require("connection.php"); 

?>

<!Doctype>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	<style type="text/css">
		#header { 
    width: 700px; 
    margin: 150px auto; 
    background-color: #48577D; 
    color: white;
    padding:15px; 
    overflow: hidden; 
} 
  
#container { 
    width: 700px; 
    margin: 150px auto; 
    background-color: #eee; 
    padding:15px; 
    overflow: hidden; 
} 
  
		


	</style>
</head>
<body>
<div id="header">
	 <h1><b>Welcome to e-shop</b></h1>	
	 <h2 <a href="localhost/index.php"></a>Home</h2>
</div>
<div id="container">
<center><img src="jpImg.jpg" /><br><br></center>
<?php

		
$post_data = array('jp_item_type' =>'cart','jp_item_name'=>'test shop','order_id'=>'<?php
    echo mt_rand(100000,999999);
?>','jp_business'=>'demo@webtribe.co.ke','jp_amount_1'=>'<?php echo "$_SESSION[($totalprice)]"; ?>','jp_amount_2'=>'0','jp_amount_5'=>'0','jp_payee'=>'email@yourcustomer.com','jp_shipping'=>'company name','jp_rurl'=>'http://localhost/shopCart/Result.php?ii=0','jp_furl'=>'http://localhost/shopCart/index.php"','jp_curl'=>'http://localhost/shopCart/testpost/Result.php?ii=2');
	
	   $url="https://www.jambopay.com/JPExpress.aspx";
   $ch = curl_init($url);
   curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
   curl_setopt($ch, CURLOPT_POST, true);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
   curl_setopt($ch, CURLOPT_HTTPHEADER, array(
       'DeveloperKey: 084049D0-AB72-4EE2-9EDE-0C25C1D1268C',
       
       'Password: '.hash('sha256', 'Pass@1234')
   ));
   $result = curl_exec($ch);
   

//store in db this transaction

   echo "Successful transaction!";

  // echo $result;
   //die;
?>
<p><b>Thank you for using JP Services</b></p>

	
</div>

</body>
</html>