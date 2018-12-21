<?php  
/**
 * Customer Reset Password email
 *
 * @author    WooThemes
 * @package   WooCommerce/Templates/Emails
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}
?>

<?php
// $current_user = wp_get_current_user();
// $user_login = $current_user->user_login;

$id=3;
$value = get_option('sm_main_send_'.$id); 
 
//$value = str_replace('{user_name}',$user_login,$value); 


  
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
            <div style="background-color: #e1e0e0" >
            <p>      
                <p><?php _e( 'Someone requested that the password be reset for the following account:', 'woocommerce' ); ?></p>
                <p><?php printf( __( 'Username: %s', 'woocommerce' ), $user_login ); ?></p>
                <p><?php _e( 'If this was a mistake, just ignore this email and nothing will happen.', 'woocommerce' ); ?></p>
                <p><?php _e( 'To reset your password, visit the following address:', 'woocommerce' ); ?></p>
                <p>
                <a class="link" href="<?php echo esc_url( add_query_arg( array( 'key' => $reset_key, 'login' => rawurlencode( $user_login ) ), wc_get_endpoint_url( 'lost-password', '', wc_get_page_permalink( 'myaccount' ) ) ) ); ?>">
                <?php _e( 'Click here to reset your password', 'woocommerce' ); ?></a>
                </p>
            </p>

            <?php do_action( 'woocommerce_email_footer', $email ); ?>
            </div>
          </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
  </body>
</html>




