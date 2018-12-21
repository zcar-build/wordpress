<?php
/**
 * Admin new order email
 *
 * @author WooThemes
 * @package WooCommerce/Templates/Emails/HTML
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>    
<?php 
//Billing details
$address = $order->get_address( 'billing' ); // returns an array
//error_log(print_R($address,TRUE),3,"/var/www/html/error777.log");
$name = $address['first_name'];
$name1 = $address['last_name'];
$billing_first_name = $name;
$billing_last_name = $name1;
$name2 = $address['email'];
$billing_email = $name2;
$name3 = $address['phone'];
$billing_phone = $name3;
$name4 = $address['country'];
$billing_country = $name4;
$name5 = $address['state'];
$billing_state = $name5;
$name6 = $address['city'];
$billing_city = $name6;
$name7 = $address['company'];
$billing_company = $name7;
$name8 = $address['address_1'];
$billing_address_1 = $name8;
$name9 = $address['address_2'];
$billing_address_2 = $name9;
$name9 = $address['postcode'];
$billing_postcode = $name9;

//Shipping Section
$saddress = $order->get_address( 'shipping' ); // returns an array
//error_log(print_R($saddress,TRUE),3,"/var/www/html/error777.log");
$sname = $saddress['first_name'];
$sname1 = $saddress['last_name'];
$shipping_first_name = $sname;
$shipping_last_name = $sname1;
$sname4 = $saddress['country'];
$shipping_country = $sname4;
$sname5 = $saddress['state'];
$shipping_state = $sname5;
$sname6 = $saddress['city'];
$shipping_city = $sname6;
$sname7 = $saddress['company'];
$shipping_company = $sname7;
$sname8 = $saddress['address_1'];
$shipping_address_1 = $sname8;
$sname9 = $saddress['address_2'];
$shipping_address_2 = $sname9;
$sname9 = $saddress['postcode'];
$shipping_postcode = $sname9;


$order_id = $order->get_user_id();
$var = $order->get_date_created();
$order_date = $var."date";

$shipping_name = $shipping_first_name.''.$shipping_last_name;
$customer_name = $billing_first_name.' '.$billing_last_name;


$orderDate = date_i18n( wc_date_format(), strtotime( $order_date ) );
$current_user = wp_get_current_user();
$user_login = $current_user->user_login;

require_once('order_table_info.php');
$order_table_obj = new SWCM_Order_Table(); //ordertable_fetch
$order_table_obj_new= new New_ordertable();
$id=4;
$value = get_option('sm_main_send_'.$id); 


if($customer_name != '')
{
//$new_order_main_text = $template_config["swcm_order_main_text"];
$value = str_replace('{customer_name}',$customer_name,$value);
$value = str_replace('{order_no}',$order->get_order_number(),$value);
$value = str_replace('{order_date}',$orderDate,$value);
$value = str_replace('{blog_name}',get_bloginfo(),$value);
$value = str_replace('{user_name}',$user_login,$value);
$value = str_replace('{order_details}',$order_table_obj_new->ordertable_fetch($order),$value);
$value = str_replace('{customer_details}',$order_table_obj_new->customer_table_fetch($order),$value);
$value = str_replace('{edit}', '', $value); 
$value = str_replace('{order_qty}',$order_table_obj->fetch_order_prod($order , 'product_qty'),$value);
$value = str_replace('{order_name}',$order_table_obj->fetch_order_prod($order , 'name'),$value);
$value = str_replace('{product_price}',$order_table_obj->fetch_order_prod($order , 'total'),$value);
$value = str_replace('{sub_total}',$order_table_obj->fetch_total_prod($order, 'subtotal'),$value);
$value = str_replace('{order_total}',$order_table_obj->fetch_total_prod($order, 'total'),$value);
$value = str_replace('{pay_method}',$order_table_obj->fetch_total_prod($order, 'pay'),$value);
$value = str_replace('{billing_email}',$billing_email,$value);
$value = str_replace('{billing_phone}',$billing_phone,$value);
$value = str_replace('{billing_country}',$billing_country,$value);
$value = str_replace('{billing_state}',$billing_state,$value);
$value = str_replace('{billing_city}',$billing_city,$value);
$value = str_replace('{billing_company}',$billing_company,$value);
$value = str_replace('{billing_address_1}',$billing_address_1,$value);
$value = str_replace('{billing_address_2}',$billing_address_2,$value);
$value = str_replace('{billing_postcode}',$billing_postcode,$value);
$value = str_replace('{shipping_name}',$shipping_name,$value);
$value = str_replace('{shipping_country}',$shipping_country,$value);
$value = str_replace('{shipping_state}',$shipping_state,$value);
$value = str_replace('{shipping_city}',$shipping_city,$value);
$value = str_replace('{shipping_company}',$shipping_company,$value);
$value = str_replace('{shipping_address_1}',$shipping_address_1,$value);
$value = str_replace('{shipping_address_2}',$shipping_address_2,$value);
$value = str_replace('{shipping_postcode}',$shipping_postcode,$value);


}
else
{
$value = get_option('sm_main_send_'.$id); 
}
?>
<?php   $sm_template_background_color =get_option('sm_template_background_color');
    $sm_template_background_image =get_option('sm_template_background_image');
?> 
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  </head>
  <?php if (get_option('sm_color')=='sm_color_checked') { ?>
  <body style="background:#<?php echo $sm_template_background_color?>;">
  <?php } else { ?>
  <body style="background-image: url(<?php echo $sm_template_background_image?>);">
  <?php } ?>
    <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
      <tr>
        <td>
        <table  border="0" cellpadding="0" cellspacing="0" width="100%" id="custom_template_container" style=" max-width:700px; padding: 10px 10px 0; margin: auto;">
          <tr> 
          <td align="center" valign="top">
            <div style="color:black;font-size:18px;">
            <?php echo wpautop( wptexturize( $customer_note ) ) ?>
            </div>
            <?php echo  stripslashes($value); ?>
          </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
  </body>
</html>
<?php do_action( 'woocommerce_email_before_order_table', $order, true, false ); ?>
