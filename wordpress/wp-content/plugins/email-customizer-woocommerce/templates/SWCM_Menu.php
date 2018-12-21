<?php

if ( ! defined( 'ABSPATH' ) ) {
        exit; // Exit if accessed directly
}

?>

<?php if( (sanitize_text_field($_REQUEST['page'])=='single-email' ) ){ 
	echo "<script>functionName();</script>";
}
?>
        
<!-- for third party plugin settings -->
 <?php if( sanitize_text_field($_REQUEST['page']) =='product-based' )
 { 
 	//header("location: " .$url);
}
?>
