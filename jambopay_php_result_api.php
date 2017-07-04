 <?php
// put your code here

//************************ CHECK IF VALUES HAVE BEEN SET *****************
        if (isset($_POST['JP_PASSWORD'])) {

            $JP_TRANID = $_POST['JP_TRANID'];
            $JP_MERCHANT_ORDERID = $_POST['JP_MERCHANT_ORDERID'];
            $JP_ITEM_NAME = $_POST['JP_ITEM_NAME'];
            $JP_AMOUNT = $_POST['JP_AMOUNT'];
            $JP_CURRENCY = $_POST['JP_CURRENCY'];
            $JP_TIMESTAMP = $_POST['JP_TIMESTAMP'];
            $JP_PASSWORD = $_POST['JP_PASSWORD'];
            $JP_CHANNEL = $_POST['JP_CHANNEL'];

//$sharedkey, IS ONLY SHARED BETWEEN THE MERCHANT AND JAMBOPAY. THE KEY SHOULD BE SECRET ********************

//Make sure you get the key from JamboPay Support team
            $sharedkey = 'BF025795-6927-464C-B0FC-93F108B153E9';

            $str = $JP_MERCHANT_ORDERID . $JP_AMOUNT . $JP_CURRENCY . $sharedkey . $JP_TIMESTAMP;


//**************** VERIFY *************************
            if (md5(utf8_encode($str)) == $JP_PASSWORD) {

                //VALID
                //if valid, mark order as paid

            } else{

                //INVALID TRANSACTION
        }
}
?>
