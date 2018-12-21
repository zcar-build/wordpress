<?php
/**
 * Customer new account email
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) 
exit; // Exit if accessed directly

$template_config = get_option( 'SWCM_New_Account');
?>
<?php //do_action( 'woocommerce_email_header', $email_heading ); 
$swcm_template_font_color = get_option('swcm_template_font_color');
$blog_name = get_bloginfo();   
if(isset($user_details)){  
   $current_user = wp_get_current_user();   
$user_login = $current_user->user_login; 
} else {   
$current_user = wp_get_current_user();   
$user_login = $current_user->user_login;
}

$id=2;
$value = get_option('sm_main_send_'.$id);  

if($user_login != '')
{   
     
$value = str_replace('{user_name}',$user_login,$value);  
$value = str_replace('{blog_name}',$blog_name,$value); 
}  
else
{
$value = get_option('sm_main_send_'.$id);  
$value = str_replace('{user_name}',$user_login,$value);  
$value = str_replace('{blog_name}',$blog_name,$value);
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
            <?php echo  stripslashes($value); ?>
            <div>
                <?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

                <p><?php printf( __( 'Your password has been automatically generated: %s', 'woocommerce' ), '<strong>' . esc_html( $user_pass ) . '</strong>' ); ?></p>

                <?php endif; ?>

                <p><?php printf( __( 'You can access your account area to view your orders and change your password here: %s.', 'woocommerce' ), make_clickable( esc_url( wc_get_page_permalink( 'myaccount' ) ) ) ); ?></p>

            </div>
          </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
  </body>
</html>
<?php do_action( 'woocommerce_email_before_order_table', $order, true, false ); ?>

