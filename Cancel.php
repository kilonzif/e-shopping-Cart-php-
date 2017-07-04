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
<?php


   

//store in db this transaction
   echo "Canceled transaction!";

  // echo $result;
   die;
?>

	
</div>

</body>
</html>