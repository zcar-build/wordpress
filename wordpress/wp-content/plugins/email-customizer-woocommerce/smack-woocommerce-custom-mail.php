<?php
/**
 * Plugin Name: Email Customizer Woocommerce Free
 * Plugin URI: www.smackcoders.com
 * Description: Impress your prospects & customers with colorful WooCommerce order emails. Design your own email template easily with drag-and-drop, and social plugins. The plugin menu is listed along with WooCommerce menus.
 * Author: Smackcoders
 * Author URI: www.smackcoders.com
 * Company: Smackcoders Technologies PVT Ltd
 * Version: 1.5
 *
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */
/*
 Text Domain: email-customizer-woocommerce-free
 Domain Path: /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

#smack-woocommerce-custom-mail

/**
 *  Add a custom email to the list of emails WooCommerce should load
 *
 * @since 0.1
 * @param array $email_classes available email classes
 * @return array filtered available email classes
 */

class SWCM_customiser {

        public function swcm_menubar()
        {
                //require_once('templates/SWCM_Menu.php');
        }
}

require_once('includes/SWCM_Actions.php');
require_once('includes/SWCM_change_email_subject.php');
// require_once('fpdf/fpdf.php');
$upload_dir = wp_upload_dir();
define( 'Email_Customizer_Woocommerce_Premium', plugin_dir_path( __FILE__ ) );
define('WP_CONST_EMAIL_CUST_NAME', 'Email Customizer Woocommerce Premium');
define('WP_CONST_EMAIL_CUST_SLUG', 'email-customizer-woocommerce-premium');
define('WP_CONST_EMAIL_CUST_VERSION', '1.5.2');
define('WP_CONST_EMAIL_CUST_DIR', WP_PLUGIN_URL . '/' . WP_CONST_EMAIL_CUST_SLUG . '/');
define('WP_CONST_EMAIL_CUST_DIRECTORY', plugin_dir_path(__FILE__));
define('WP_CONST_EMAIL_CUST_PLUGIN_BASE', WP_CONST_EMAIL_CUST_DIRECTORY);
define('WP_CONST_EMAIL_CUST_PLUG_URL_PRO',site_url().'/wp-admin/admin.php?page=manage-email');
define('WP_CONST_EMAIL_CUST_PRODUCT_URL_PRO',site_url().'/wp-admin/admin.php?page=product-based&mode=product');
// define('WP_CONST_EMAIL_CUST_ADDLIST_URL_PRO',site_url().'/wp-admin/admin.php?page=newlist');
// define('WP_CONST_EMAIL_CUST_ADDTEMPLATE_URL_PRO',site_url().'/wp-admin/admin.php?page=newtemplate');

add_action('admin_menu', 'register_smack_custom_submenu_page');

function register_smack_custom_submenu_page() {
	global $submenu;
	add_menu_page( 'email-customizer-woocommerce-pro' , 'Email Customizer Free','manage_options', 'email-cust-premium' , 'smack_custom_mail_home');
	add_submenu_page( 'email-cust-premium', 'Order Based Template' , 'Order Based Template', 'manage_options', 'manage-email', 'smack_custom_mail_home' );

	add_submenu_page( 'email-cust-premium', 'Product/Category Based Template' , 'Product /Category Based Template', 'manage_options', 'product-based', 'smack_product_based_template' );

	unset( $submenu['email-cust-premium'][0] );
}

function smack_product_based_template()
{
	require_once('includes/SWCM_Product_Category.php');
}

function smack_custom_mail_home()
{  	

	require_once('includes/SWCM_HomePage.php' );
}

function remove_email_cust_sub_menu_page() {
  remove_submenu_page( 'woocommerce', 'product-based' );
}

function Smack_Custom_Mail_Scripts() {
	if(isset($_REQUEST['page']) && (sanitize_text_field($_REQUEST['page']) == 'manage-email' || sanitize_text_field($_REQUEST['page'] == 'product-based') )) { 
		wp_enqueue_script( 'jquery' );
	wp_enqueue_style('smackWCM_bootstrap.css',plugins_url('css/bootstrap.css',__FILE__));
	wp_enqueue_style('smackWCM_texteditor-css',plugins_url('css/jquery-te-1.4.0.css',__FILE__));
	wp_enqueue_style('smackWCM_jQuery-ui-swcm', plugins_url('css/jquery-ui-swcm.css', __FILE__));
	wp_enqueue_style('smackWCM_font-awesome.min-swcm', plugins_url('css/font-awesome.min-swcm.css', __FILE__));
	wp_enqueue_style('smackWCM_font-awesome-swcm', plugins_url('css/font-awesome-swcm.css', __FILE__));
	wp_enqueue_style('smackWCM_main_style' , plugins_url('css/SWCM_mainstyle.css', __FILE__));

	wp_enqueue_style('smackWCM_main_style' , plugins_url('css/SWCM_mainstyle.css', __FILE__));

	wp_enqueue_style('em-mainstyle' , plugins_url('css/em-mainstyle.css', __FILE__));

	wp_enqueue_style('select2-min-css' , plugins_url('css/select2.min.css', __FILE__));
	
	wp_enqueue_script('smackWCM_jquery.min', plugins_url('js/jquery.min.js', __FILE__));
	wp_enqueue_script('select2-min-js', plugins_url('js/select2.min.js', __FILE__));
     wp_enqueue_script('em-customizer-custom-js', plugins_url('js/em-customizer-custom.js', __FILE__));
	wp_enqueue_script('smackWCM_bootstrap.min', plugins_url('js/bootstrap.min.js', __FILE__));
	wp_enqueue_script('smackWCM_jscolor.js', plugins_url('js/jscolor.js', __FILE__));
	wp_enqueue_script('smackWCM_jscolor.min.js', plugins_url('js/jscolor.min.js', __FILE__));
	wp_enqueue_script('smackWCM_jquery-ui-swcm.js', plugins_url('js/jquery-ui-swcm.js', __FILE__));
	wp_enqueue_script('smackWCM_jquery.blockUI-swcm.js', plugins_url('js/jquery.blockUI-swcm.js', __FILE__));
	wp_enqueue_script('smack-woocommerce-custom-mail', plugins_url('js/smack-woocommerce-custom-mail.js', __FILE__));
	wp_enqueue_style('smack_ecw_sign_css', plugins_url('css/jquery.signature.css', __FILE__));
	wp_enqueue_script('smack_ecw_sign_js', plugins_url('js/jquery.signature.js', __FILE__));
	wp_enqueue_script('ckeditor-premium.js', plugins_url('ckeditor-full/ckeditor.js', __FILE__));
	wp_enqueue_script('canvas-min-js', plugins_url('js/html2canvas.min.js', __FILE__));
	}

}
add_action('admin_init','Smack_Custom_Mail_Scripts');

register_activation_hook( __FILE__, array('SWCM_Actions','SWCM_template_info_table'));
register_deactivation_hook(__FILE__, array('SWCM_Actions','SWCM_delete_options'));


function swcm_my_session()
{
    if( !session_id() )
    {
        session_start();
    }
}
add_action('init', 'swcm_my_session');

//code for copying images folder to uploads folder
$swcm_upload_dir = wp_upload_dir();
$destination_folder =  $swcm_upload_dir['basedir'].'/'.WP_CONST_EMAIL_CUST_SLUG;
if (!file_exists($destination_folder)) {     
   mkdir($destination_folder,0777, true);           
}
$plugin_path = plugin_dir_path( __FILE__ );

$src = $plugin_path.'images';
   $dst = $destination_folder;
   $files = glob("$src/*.*");
   foreach($files as $file){
       $file_to_go = str_replace($src,$dst,$file);
       copy($file, $file_to_go);
  }


// include custom status in email class
function add_product_delivered_woocommerce_email( $email_classes ) {
	// include our custom email class
	if (!class_exists('WC_Product_Delivered_Email'))
		require( 'includes/class-wc-product-delivered-email.php' );
	// add the email class to the list of email classes that WooCommerce loads
	$email_classes['WC_Product_Delivered_Email'] = new WC_Product_Delivered_Email();

	return $email_classes;

}
add_filter( 'woocommerce_email_classes', 'add_product_delivered_woocommerce_email' );

add_action('plugins_loaded','EmailcustomizerLoadLanguages');
function EmailcustomizerLoadLanguages(){
	$email_customizer_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
	load_plugin_textdomain( WP_CONST_EMAIL_CUST_SLUG , false, $email_customizer_lang_dir );
}

/**
 * Register new status
 * Tutorial: http://www.sellwithwp.com/woocommerce-custom-order-status-2/
 **/

function register_product_delivered_order_status() {
	register_post_status( 'wc-product-delivered', array(
				'label'                     => 'Product Delivered',
				'public'                    => true,
				'exclude_from_search'       => false,
				'show_in_admin_all_list'    => true,
				'show_in_admin_status_list' => true,
				'label_count'               => _n_noop( 'Product delivered <span class="count">(%s)</span>', 'Product delivered <span class="count">(%s)</span>' )
				) );
}
add_action( 'admin_init', 'register_product_delivered_order_status' );

// if order action is product delivered do the following
add_action('woocommerce_order_action_product_delivered', array('SWCM_Actions' , 'wdm_order_status_product_delivered_callback'));

// Add to list of WC Order statuses
function add_product_delivered_to_order_statuses( $order_statuses ) {

	$new_order_statuses = array();

	// add new order status after processing
	foreach ( $order_statuses as $key => $status ) {

		$new_order_statuses[ $key ] = $status;

		if ( 'wc-processing' === $key ) {
			$new_order_statuses['wc-product-delivered'] = 'Product Delivered ';
		}
	}

	return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_product_delivered_to_order_statuses' );


function myplugin_plugin_path() {
	// gets the absolute path to this plugin directory
	return untrailingslashit( plugin_dir_path( __FILE__ ) );
}
add_filter( 'woocommerce_locate_template', 'myplugin_woocommerce_locate_template', 10, 3 );

function myplugin_woocommerce_locate_template( $template, $template_name, $template_path ) {
	global $woocommerce;
	$_template = wc_clean($template);
	if ( !$template_path ) $template_path = $woocommerce->template_url;
	$plugin_path  = myplugin_plugin_path() . '/templates/woocommerce/';
	// Look within passed path within the theme - this is priority
	$template = locate_template(
			array(
				$template_path . $template_name,
				$template_name
			     )
			);
	Switch($template_name){
		
        case 'emails/customer-new-account.php':
            $email_template = active_template('ON');
            break;
        case 'emails/customer-note.php':
            $email_template = active_template('ON');
            break;
        case 'emails/customer-reset-password.php':
            $email_template = active_template('ON');
            break;
        case 'emails/product-delivered-order.php':
            $email_template = active_template('ON');
            break;                                    
	}
	if(isset($email_template) && ($email_template == "")){
		if ($template && file_exists( $plugin_path . $template_name ) )
		$template = $plugin_path . $template_name;
	} else{

	// Modification: Get the template from this plugin, if it exists
	if ( ! $template && file_exists( $plugin_path . $template_name ) )
		$template = $plugin_path . $template_name;
}
	// Use default template
	if ( ! $template )
		$template = $_template;

	// Return what we found
	return $template;
}

// function to get activated template name from the table for each actions
function active_template($action_name) {
	
	if ($action_name=='ON') {
		return 1;
	}else{
		return 0;	
	}
}

function get_dynamic_mail_content( $email_type  , $order)
{
	global $woocommerce;
	if( class_exists('WC') ) {
		$mailer = WC()->mailer();
		$mails = $mailer->get_emails();
		// Ensure gateways are loaded in case they need to insert data into the emails
		WC()->payment_gateways();
		WC()->shipping();
	}
	else{
		$mailer = $woocommerce->mailer();
		$mails = $mailer->get_emails();
		// Ensure gateways are loaded in case they need to insert data into the emails
		$woocommerce->payment_gateways();
		$woocommerce->shipping();
	}
	/* Get Email to Show */
	//Get the most recent order.
	$order_collection = new WP_Query(array(
		'post_type'             => 'shop_order',
		'post_status'           => array_keys( wc_get_order_statuses() ),
		'posts_per_page'        => 1,

	));

	// $order_collection = $order_collection->posts;
	// $latest_order = current($order_collection)->ID;
	// $order_to_show = $latest_order;

	if ( !empty( $mails ) ) {
		foreach ( $mails as $mail ) {
			if ( $mail->id == $email_type ) {
				$order = new WC_Order( $order_to_show , $order);
				$new_mail = new $mail();
				$new_mail->object = $order;
				$template_content = $new_mail->get_content();
			}
		}
	}
	return $template_content;
}

//PRODUCT DELIVERED Order Status

function ECW_trigger_mail_on_status_changed( $order_id , $old_order_status , $new_order_status )
{	
	global $woocommerce;
	$path  = myplugin_plugin_path() . '/templates/woocommerce/emails/order_table_info.php';
		require_once($path);
	$object = new New_ordertable();
	$mailer = $woocommerce->mailer();
  	$order = new WC_Order( $order_id );
	if($new_order_status === 'product-delivered' ) {
			
		if($order_id != '')
		{
		$content=$object->get_details($order->get_order_number());
		$sm_template_background_color =get_option('sm_template_background_color');
		$sm_template_background_image =get_option('sm_template_background_image');
    	$fullarray .='
    	<html> 
    	<head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> </head>';
    	if (get_option('sm_color')=='sm_color_checked'){
    		$fullarray .='<body style="background:#'.$sm_template_background_color.';">'; 
    	}else{
    		$fullarray .='<body style="background-image: url('.$sm_template_background_image.');">'; 
    	}
    	
	    	$fullarray .='<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%"> 
	    	<tr> 
	    	<td> 
	    	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="custom_template_container" style=" max-width:700px; padding: 10px 10px 0; margin: auto;"> 
	    	<tr> 
	    		<td align="center" valign="top">
	    		'. $content . '
	    	</td> 
	    	</tr> 
	    	</table> 
	    	</td> 
	    	</tr> 
	    	</table> 
    	</body> 
    	</html>';

		}


		$subject = get_option('1_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( 'Your Order %s has been Delivered sucessfully' ), $order->get_order_number() );
		}
		
	
		// Cliente email, email subject and message.
		$mailer->send( $order->billing_email,$subject, $fullarray );

	}
}

//Register User
function ECW_trigger_mail_on_register_user($user)
{
	global $woocommerce;

                $mailer = $woocommerce->mailer();
		$email_type = "customer_new_account";
//CODE Get template

		if( class_exists('WC') ) {
                $mailer = WC()->mailer();
                $mails = $mailer->get_emails();
                // Ensure gateways are loaded in case they need to insert data into the emails
                WC()->payment_gateways();
                WC()->shipping();
        }
        else{
                $mailer = $woocommerce->mailer();
                $mails = $mailer->get_emails();
                // Ensure gateways are loaded in case they need to insert data into the emails
                $woocommerce->payment_gateways();
                $woocommerce->shipping();
        }
        /* Get Email to Show */
        //Get the most recent order.
         if ( !empty( $mails ) ) {

                foreach ( $mails as $mail ) {
                        if ( $mail->id == $email_type ) {
                                $new_mail = new $mail();
                                $mail_template = $new_mail->get_content();
                                }
                        }
                       //print_r($mails); die("new");
        }
        
        $user_details = get_user_by( 'id' , $user );
        include_once('/var/www/html/testing/wp-content/plugins/wordpress-email-customiser-pro/templates/woocommerce/emails/customer-new-account.php');
     

      $blog_name = get_bloginfo();   
        $current_user = wp_get_current_user();   
        $user_login = $current_user->user_login;    
        $regard_details = get_option('swcm_email_regards');
        $disc_laimer = get_option('swcm_email_disclaimer');
        $mail_template = str_replace('{user_name}',$user_details->data->user_login,$mail_template);  
         $mail_template = str_replace('{blog_name}',$blog_name,$mail_template); 
$mail_template = str_replace('{sign_name}',$regard_details,$mail_template);  


         
		$user_details = get_user_by( 'id' , $user );
		
		$user_email = $user_details->data->user_email;

		$template_config = get_option('SWCM_New_Account');

                $subject = $template_config['swcm_email_order_subject'];
                //$mailer->send( $user_email, $subject , $mail_template);
}

add_action( 'woocommerce_order_status_changed' , 'ECW_trigger_mail_on_status_changed' , 10 , 3);
add_action( 'user_register' , 'ECW_trigger_mail_on_register_user' , 10, 2 );

function swcm_delete_signature()
{
	$swcm_get_image_loc = sanitize_text_field($_POST['swcm_location']);
	unlink($swcm_get_image_loc);
	delete_option('sm_email_cust_sign_url');

	die;
}
add_action('wp_ajax_swcm_delete_signature' , 'swcm_delete_signature');

function swcm_save_signature()
{
        $swcm_get_image_code = $_POST['swcm_image'];
        $swcm_upload_dir = wp_upload_dir();
        $destination_folder =  $swcm_upload_dir['basedir'].'/'.WP_CONST_EMAIL_CUST_SLUG;

        file_put_contents( $destination_folder.'/swcm_sign.png' , file_get_contents($swcm_get_image_code));

	$swcm_img_loc = $swcm_upload_dir['baseurl'].'/'.WP_CONST_EMAIL_CUST_SLUG.'/swcm_sign.png';
	//$save_image = "<img src='$swcm_get_image_code' alt='No image' width='417' height='140'>";
	//update_option('sm_email_cust_sign_image',$save_image);	
	update_option('sm_email_cust_sign_url',$swcm_img_loc);	

	print_r($swcm_img_loc);
	die;
}
add_action('wp_ajax_swcm_save_signature' , 'swcm_save_signature');

function swcm_save_regards()
{
	$swcm_name = $_POST['swcm_name'];
	if ($swcm_name == 'sm_regardsarea_ftsize') {
		$swcm_color = $_POST['swcm_location'];
         update_option($swcm_name , $swcm_color);
         print_r($swcm_color);
	}
	else if($swcm_name == 'regfontcolor'){
         $swcm_color = $_POST['swcm_location'];
         update_option($swcm_name , $swcm_color);
         print_r($swcm_color); 
	}else{
	 $swcm_get_regards = $_POST['swcm_location'];
	 update_option('swcm_email_regards',$swcm_get_regards);	
	 print_r($swcm_get_regards);
	}
  die();
}
add_action('wp_ajax_swcm_save_regards' , 'swcm_save_regards');


function swcm_save_foot()
{
 $swcm_get_footname = $_POST['swcm_footname'];
 
 $swcm_get_footvalue = $_POST['swcm_footvalue'];
 update_option($swcm_get_footname,$swcm_get_footvalue);	
 print_r($swcm_get_footvalue); die();
}
add_action('wp_ajax_swcm_save_foot' , 'swcm_save_foot');

function swcm_save_foot_product()
{
 $swcm_get_foot_product = $_POST['swcm_location'];
 update_option('swcm_email_foot_product',$swcm_get_foot_product);
 $swcm_get_foot1_product = $_POST['swcm_location1'];
 update_option('swcm_email_foot1_product',$swcm_get_foot1_product);	
 print_r($swcm_get_foot_product); die();
}
add_action('wp_ajax_swcm_save_foot_product' , 'swcm_save_foot_product');


function sm_template_backcolo()   // save template background color
{
 $swcm_get_backcolo = $_POST['swcm_backcolor'];  // data
 $swcm_get_backcoloname = $_POST['swcm_appearname']; //name

 if ($swcm_get_backcoloname=='sm_image') {
 	delete_option('sm_color');
 } else {
 	delete_option('sm_image');
 }
 

 update_option($swcm_get_backcoloname , $swcm_get_backcolo);
	
 print_r($swcm_get_backcolo); die();
}
add_action('wp_ajax_sm_template_backcolo' , 'sm_template_backcolo');

// UPLOAD ENGINE

function load_wp_media_files() {
    wp_enqueue_media();
}
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );

function swcm_save_backcolo()
{
  $swcm_get_name = $_POST['swcm_name'];
  $swcm_get_value = $_POST['swcm_value'];

  if ($swcm_get_name =='sm_cust_font_family') {
  	$swcm_get_value=save_fonta_family_all($swcm_get_name,$swcm_get_value);
  }else{
  	update_option($swcm_get_name , $swcm_get_value);
  }

 print_r($swcm_get_value); die();
}
add_action('wp_ajax_swcm_save_backcolo' , 'swcm_save_backcolo');

// saving the font to options table
function save_fonta_family_all($name,$value){

	if ($value =='Arial') {
		$a="Arial,'Helvetica Neue',Helvetica,sans-serif";		
	}elseif ($value =='Comic Sans') {
		$a="'Comic Sans MS', 'Marker Felt-Thin', Arial, sans-serif";
	}elseif ($value =='Courier New') {
		$a="'Courier New', Courier, 'Lucida Sans Typewriter', 'Lucida Typewriter', monospace";
	}elseif ($value =='Georgia') {
		$a="Georgia, Times, 'Times New Roman', serif";
	}elseif ($value =='Helvetica') {
		$a="'Helvetica Neue', Helvetica, Arial, Verdana, sans-serif";
	}elseif ($value =='Lucida') {
		$a="'Lucida Sans Unicode', 'Lucida Grande', sans-serif";
	}elseif ($value =='Tahoma') {
		$a="Tahoma, Verdana, Segoe, sans-serif";
	}elseif ($value =='Times New Roman') {
		$a="'Times New Roman', Times, Baskerville, Georgia, serif";
	}elseif ($value =='Trebuchet MS') {
		$a="'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif";
	}elseif ($value =='Verdana') {
		$a="Verdana, Geneva, sans-serif";
	}elseif ($value =='Roboto') {
		$a="'Roboto', 'Helvetica Neue', Helvetica, Arial, sans-serif";
	}elseif ($value =='Open Sans') {
		$a="'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif";
	}
	update_option($name , $a);
	return($a);


}
add_action('wp_ajax_save_fonta_family_all' , 'save_fonta_family_all');

function order_details_table() 				// order details table
{
	$swcm_value = $_POST['swcm_color'];
	$swcm_name = $_POST['swcm_name'];

	if ($swcm_name =='sm_template_font_family') {
		$swcm_value=save_fonta_family_all($swcm_name,$swcm_value);
	}else{
		update_option($swcm_name , $swcm_value);
	}	
	print_r($swcm_value); 
	die();
}
add_action('wp_ajax_order_details_table' , 'order_details_table');

function swcm_save_textblock() 					// working
{
	$swcm_value = $_POST['swcm_value'];
	$swcm_name =$_POST['swcm_name'];

	if ($swcm_name =='sm_txtarea_font') {
		$swcm_value=save_fonta_family_all($swcm_name,$swcm_value);
	}else{
		update_option($swcm_name , $swcm_value);
	}	
	print_r($swcm_value); 
	die();

}
add_action('wp_ajax_swcm_save_textblock' , 'swcm_save_textblock');

function swcm_save_disclaimer() // working
{
	$swcm_name = $_POST['swcm_name'];
	$swcm_value = $_POST['swcm_value'];

	if ($swcm_name =='sm_disclaim_font') {
		$swcm_value=save_fonta_family_all($swcm_name,$swcm_value);
	}else{
		update_option($swcm_name , $swcm_value);
	}	
	print_r($swcm_value); 
	die();

}
add_action('wp_ajax_swcm_save_disclaimer' , 'swcm_save_disclaimer');


function swcm_save_backcolo_prod()
{
 $swcm_get_backcolo_product = $_POST['swcm_backcolor_product'];
 $swcm_get_backcoloname_product = $_POST['swcm_appearname_product'];

 update_option($swcm_get_backcoloname_product , $swcm_get_backcolo_product);
	
 print_r($swcm_get_backcolo_product); die();
}
add_action('wp_ajax_swcm_save_backcolo_prod' , 'swcm_save_backcolo_prod');

function swcm_save_maintext()
{
	$swcm_get_maintext = $_POST['swcm_maintext'];
 $swcm_get_stat1 = $_POST['swcm_stat'];

  $id = $_POST['id'];

 $swcm_get_stat  = $swcm_get_stat1 .'_maintext' ;
 $save_id  = $id .'_maintext' ;

 update_option($save_id , $swcm_get_maintext);

	
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	 global $woocommerce, $post;
                          $order_collection = new WP_Query(array(
                          'post_type'     => 'shop_order',
                          'post_status'   => array_keys( wc_get_order_statuses() ),
                          'posts_per_page'  => 1,
                        ));
                        $order_collection = $order_collection->posts;
                        $latest_order = current($order_collection)->ID;
                        $order_to_show = $latest_order;
                                           
                         $order = new WC_Order($order_to_show);

$address = $order->get_address( 'billing' ); // returns an array
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
$shipping_name = $shipping_first_name.''.$shipping_last_name;
	 $order_no1 = $order->get_order_number();
	 $order_no = '<span id="order_no">'.$order_no1.'</span>'; 
     $var = $order->get_date_created();
     $order_date = $var."date";
     $customer_name1 = $billing_first_name.' '.$billing_last_name;
     $customer_name = '<span id="customer_name">'.$customer_name1.'</span>';
     $orderDate1 = date_i18n( wc_date_format(), strtotime( $order_date ) );
     $order_date = '<span id="order_date">'.$orderDate1.'</span>';
     $current_user = wp_get_current_user();
     $user_login1 = $current_user->user_login;
     $user_login = '<span id="user_login">'.$user_login1.'</span>';
     $blog_name1 = get_bloginfo();
     $blog_name = '<span id="blog_name" >'.$blog_name1.'</span>';

    $swcm_get_maintext = str_replace('{order_no}',$order_no,$swcm_get_maintext); 
	$swcm_get_maintext = str_replace('{customer_name}',$customer_name,$swcm_get_maintext);
	$swcm_get_maintext = str_replace('{order_date}',$order_date,$swcm_get_maintext);
	$swcm_get_maintext = str_replace('{blog_name}',$blog_name,$swcm_get_maintext);
	$swcm_get_maintext = str_replace('{user_name}',$user_login,$swcm_get_maintext);
	
  update_option($swcm_get_stat , $swcm_get_maintext);
	
 print_r(stripslashes($swcm_get_maintext)); die();
}
add_action('wp_ajax_swcm_save_maintext' , 'swcm_save_maintext');

function swcm_save_sociourls()
{

 // $options ='social_url_links';
 // $save_template_name = get_option($options);

	if($_POST['swcm_socioname'] == 'sm_url_bgcolor') {
    $color = $_POST['swcm_sociourl'];
	update_option('sm_url_bgcolor' , $color);
	$sm_url_bgcolor =  get_option('sm_url_bgcolor');
	print_r($sm_url_bgcolor);

 }

 if($_POST['swcm_socioname'] == 'swcm_facebook_uri') {
    $swcm_facebook_uri = $_POST['swcm_sociourl'];
	if (!preg_match('/(http|https):\/\//', $swcm_facebook_uri)) {
		$swcm_facebook_uri = "https://".$swcm_facebook_uri;
	}
	update_option('facebook' , $swcm_facebook_uri );
	print_r($swcm_facebook_uri);
 }
 
 if($_POST['swcm_socioname'] == 'swcm_twitter_uri') {
 	$swcm_twitter_uri = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $swcm_twitter_uri)) {
			$swcm_twitter_uri= "https://".$swcm_twitter_uri;
		}
		update_option('twitter' , $swcm_twitter_uri );
		print_r($swcm_twitter_uri);
 }
 
 if($_POST['swcm_socioname'] == 'swcm_google_plus_uri') {
 	$swcm_google_plus_uri = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $swcm_google_plus_uri)) {
	$swcm_google_plus_uri = "https://".$swcm_google_plus_uri;
		}
		update_option('googleplus' , $swcm_google_plus_uri );
		print_r($swcm_google_plus_uri);
 }
 

 if($_POST['swcm_socioname'] == 'swcm_linkedin_uri') {
 	$swcm_linkedin_uri = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $swcm_linkedin_uri)) {
	  $swcm_linkedin_uri = "https://".$swcm_linkedin_uri;
		}
		update_option('linkedin' , $swcm_linkedin_uri );
		print_r($swcm_linkedin_uri);
 }
 
 if($_POST['swcm_socioname'] == 'swcm_skype_uri') {
 	$swcm_skype_uri = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $swcm_skype_uri)) {
			$swcm_skype_uri = "https://".$swcm_skype_uri;
		}
		update_option('skype' , $swcm_skype_uri );
		print_r($swcm_skype_uri);

 }

  if($_POST['swcm_socioname'] == 'swcm_youtube_uri') {
 	$swcm_youtube_uri = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $swcm_youtube_uri)) {
			$swcm_youtube_uri = "https://".$swcm_youtube_uri;
		}
		update_option('youtube' , $swcm_youtube_uri );
		print_r($swcm_youtube_uri);
 }
 if($_POST['swcm_socioname'] == 'iconspos'){
   $icons_pos = $_POST['swcm_sociourl'];
   update_option('iconspos' , $icons_pos );
 	print_r($icons_pos);
 }
  die();
}
add_action('wp_ajax_swcm_save_sociourls' , 'swcm_save_sociourls');


function swcm_save_sociourls_product()
{

 $options = $_POST['swcm_tempname'];

 $save_template_name = get_option($options);

 if($_POST['swcm_socioname'] == 'swcm_facebook_uri') {
    $save_template_name['swcm_facebook_uri'] = $_POST['swcm_sociourl'];
	if (!preg_match('/(http|https):\/\//', $save_template_name['swcm_facebook_uri'])) {
		$save_template_name['swcm_facebook_uri'] = "https://".$save_template_name['swcm_facebook_uri'];
	}
 }
 
 if($_POST['swcm_socioname'] == 'swcm_twitter_uri') {
 	$save_template_name['swcm_twitter_uri'] = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $save_template_name['swcm_twitter_uri'])) {
			$save_template_name['swcm_twitter_uri'] = "https://".$save_template_name['swcm_twitter_uri'];
		}
 }
 
 if($_POST['swcm_socioname'] == 'swcm_google_plus_uri') {
 	$save_template_name['swcm_google_plus_uri'] = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $save_template_name['swcm_google_plus_uri'])) {
	$save_template_name['swcm_google_plus_uri'] = "https://".$save_template_name['swcm_google_plus_uri'];
		}
 }
 

 if($_POST['swcm_socioname'] == 'swcm_linkedin_uri') {
 	$save_template_name['swcm_linkedin_uri'] = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $save_template_name['swcm_linkedin_uri'])) {
	  $save_template_name['swcm_linkedin_uri'] = "https://".$save_template_name['swcm_linkedin_uri'];
		}
 }
 
 if($_POST['swcm_socioname'] == 'swcm_skype_uri') {
 	$save_template_name['swcm_skype_uri'] = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $save_template_name['swcm_skype_uri'])) {
			$save_template_name['swcm_skype_uri'] = "https://".$save_template_name['swcm_skype_uri'];
		}

 }

  if($_POST['swcm_socioname'] == 'swcm_youtube_uri') {
 	$save_template_name['swcm_youtube_uri'] = $_POST['swcm_sociourl'];
 	if (!preg_match('/(http|https):\/\//', $save_template_name['swcm_youtube_uri'])) {
			$save_template_name['swcm_youtube_uri'] = "https://".$save_template_name['swcm_youtube_uri'];
		}
 }
 




	
update_option($options , $save_template_name );
	
 print_r($save_template_name); die();
}
add_action('wp_ajax_swcm_save_sociourls_product' , 'swcm_save_sociourls_product');




function swcm_save_hrblock()
{
  
 $swcm_get_hrname = $_POST['swcm_hrname'];
 $swcm_get_hrvalue = $_POST['swcm_hrvalue'];

 update_option($swcm_get_hrname , $swcm_get_hrvalue);
 
	
 print_r($swcm_get_hrvalue); die();
}
add_action('wp_ajax_swcm_save_hrblock' , 'swcm_save_hrblock');

function swcm_save_headerdet()
{
  $swcm_get_headername = $_POST['swcm_headername'];
  $swcm_get_headervalue = $_POST['swcm_headervalue'];
 
  update_option($swcm_get_headername , $swcm_get_headervalue);
	$swcm_get_headervalue = stripslashes($swcm_get_headervalue);
  print_r($swcm_get_headervalue); die();
}
add_action('wp_ajax_swcm_save_headerdet' , 'swcm_save_headerdet');

function swcm_save_title_details()
{
  $swcm_get_headername = $_POST['swcm_headername'];
  $swcm_get_headervalue = $_POST['swcm_headervalue'];
 
  update_option($swcm_get_headername , $swcm_get_headervalue);
	$swcm_get_headervalue = stripslashes($swcm_get_headervalue);
  print_r($swcm_get_headervalue); die();
}
add_action('wp_ajax_swcm_save_title_details' , 'swcm_save_title_details');


function swcm_save_headerdet_product()
{
 $swcm_get_headerwid = $_POST['swcm_header'];
 $swcm_get_headermartop = $_POST['swcm_headermartop'];
 $swcm_get_headermarbot_prod = $_POST['swcm_headermarbot_prod'];
 

 update_option('swcm_get_headerwid_product' , $swcm_get_headerwid);
 update_option('swcm_get_headermartop_product' , $swcm_get_headermartop);
 update_option('swcm_get_headermarbot_product' , $swcm_get_headermarbot_prod);
 
	
 print_r($swcm_get_headerwid); die();
}
add_action('wp_ajax_swcm_save_headerdet_product' , 'swcm_save_headerdet_product');






  function swcm_save_templatetype()
{
 $swcm_get_templatetype = $_POST['swcm_template'];


 update_option('swcm_get_templatetype' , $swcm_get_templatetype);
	
 print_r($swcm_get_templatetype); die();
}
add_action('wp_ajax_swcm_save_templatetype' , 'swcm_save_templatetype');

function swcm_save_icontype()
{
 $swcm_get_icontype = $_POST['swcm_icon'];


 update_option('swcm_get_icontype' , $swcm_get_icontype);
	
 print_r($swcm_get_icontype); die();
}
add_action('wp_ajax_swcm_save_icontype' , 'swcm_save_icontype');

function swcm_save_buttonblock()
{
 $swcm_get_buttonvalue = $_POST['swcm_buttonvalue'];
$swcm_get_buttonname = $_POST['swcm_buttonname'];

 update_option($swcm_get_buttonname , $swcm_get_buttonvalue);
	
 print_r($swcm_get_buttonvalue); die();

}
add_action('wp_ajax_swcm_save_buttonblock' , 'swcm_save_buttonblock');

function swcm_show_drag()
{
  include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
                   $dragid =  $_POST['swcm_id'];
                   if ($dragid == 'customer_details1') {
                             
                         global $woocommerce, $post;
$order_collection = new WP_Query(array(
        'post_type'     => 'shop_order',
        'post_status'   => array_keys( wc_get_order_statuses() ),
        'posts_per_page'  => 1,
      ));
      $order_collection = $order_collection->posts;
      $latest_order = current($order_collection)->ID;
      $order_to_show = $latest_order;
                         
                         $order = new WC_Order($order_to_show);
                         $order_id = $order->get_order_number();
                         $items = $order->get_items();
                         
                         $order_table_obj = new SWCM_Order_Table(); 
                        $customer_details = $order_table_obj->fetch_customer_details($order);
                            print_r($customer_details); die();

} else if ($dragid == 'order_details1') {
	global $woocommerce, $post;
                          $order_collection = new WP_Query(array(
                          'post_type'     => 'shop_order',
                          'post_status'   => array_keys( wc_get_order_statuses() ),
                          'posts_per_page'  => 1,
                        ));
                        $order_collection = $order_collection->posts;
                        $latest_order = current($order_collection)->ID;
                        $order_to_show = $latest_order;
                                           
                         $order = new WC_Order($order_to_show);
                         $order_id = $order->get_order_number();
                         //print_r($order);
                         $order_table_obj = new SWCM_Order_Table(); 
                            $order_details = $order_table_obj->swcm_fetch_order_table($order);
                            print_r($order_details); die;
}
 else if ($dragid == 'hr_details1') {
$hrwidth = get_option('hrwidth');
$hrheight = get_option('hrheight');
$hrclr = get_option('swcm_hr_color');
$sm_divider_background_color=get_option('sm_divider_background_color');	 
	 	$hr = '
	 	<div id="hr_details" class="dragelementshowsmenu edit_hover_class" style="overflow:hidden; background-color:#'.$sm_divider_background_color.';"> 
	 	<div id="showiconshr" class="dragelementshowicons"> <i onclick="openhrblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="hr_details" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
	 	</div> <hr onclick="openhrblock()" id="hrblock1" style=" height:'; 
	 $hr .= $hrheight; 
	 $hr.='px;border-width:0;background:#'; 
	 $hr .= $hrclr;
	 $hr .= ';width:';
	 $hr.=$hrwidth; 
	 $hr.='%;text-align:right; padding:0px; margin: 20px auto;"">

      </div>'; 
                              print_r($hr);
                              die;
 } else if ($dragid == 'header_details') { //sm_email_header

	if (isset($header_details)) 

		include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
      $header_details = $order_table_obj->sm_email_header();

		print_r($header_details);
	die;
	 
                             
 }
 else if ($dragid == 'footer_details') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/email-footer.php');
	 if (isset($footer_details)) 
	 	 print_r($footer_details);
                              die;
	 
                             
 }
 else if ($dragid == 'maintext_details') {
	 
	 if (isset($maintext_details))
	 	include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $maintext_details = $order_table_obj->fetch_text_block();
                            print_r($maintext_details); die;
	 	 
                       
	 
                             
 }
 else if ($dragid == 'button_details') {
	 
	 
	 	include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $button_details = $order_table_obj->fetch_button_block();
                            print_r($button_details); die;
	 	 
                             
	 
                             
 }else if ($dragid == 'signatureblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	 $order_table_obj = new SWCM_Order_Table(); 
     $signature_details = $order_table_obj->fetch_signature_block();
     print_r($signature_details); die;                            
	                             
 }
 else if ($dragid == 'disclaimer') {
	 
	 $disclaim =get_option('swcm_email_disclaimer');
	 if($disclaim == false ){
	 	$disclaim = '<span style="text-align:center;color:grey;">Click To Edit Disclaimer</span>';
	 	
	 		 }
	 		
	 $disposition = get_option('dispos');
	 $fontcolor = get_option('disclaimerfontcolor');

	 $sm_disclaim_font = get_option('sm_disclaim_font');
	 $sm_disclaim_ftsize = get_option('sm_disclaim_ftsize');
	 $sm_disclaimer_background_color = get_option('sm_disclaimer_background_color');

     $disclaimer = '
     <div id="disclaimer_order" style="background-color:#'.$sm_disclaimer_background_color.';" class="dragelementshowsmenu edit_hover_class" align="'.$disposition.'"> 
     <div id="showiconsdis" class="dragelementshowicons"> 
     <i onclick="opendisclaimerblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="disclaimer_order" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
     </div>
     <table style="display: table;"  cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
	     <tbody>
	     <tr>
	     <td style="line-height: 22px; padding: 10px 50px;" align="left"> 
	     <p id = "disclaimer1" onclick="opendisclaimerblock()" style="color:#'.$fontcolor.';font-size:'.$sm_disclaim_ftsize.'px;font-family:'.$sm_disclaim_font.';" >'.$disclaim.'
	     </p>
	     </td>
	     </tr>
	     </tbody>
     </table>
     </div>';
    print_r($disclaimer); die;
	 	 
                           
	 
                             
 }
 else if ($dragid == 'regards12') {
	 $fontcolor = get_option('regfontcolor');
	 $sm_regardsarea_ftsize = get_option(' sm_regardsarea_ftsize');
	 $regar =get_option('swcm_email_regards');
	  if($regar == false ){
	 	$regar = '<span style="text-align:center;color:grey;">Click To Edit Regards</span>';
	 		 }
     $dragregards = '<div id="regards_order" class="dragelementshowsmenu edit_hover_class" > 
     <div id="showiconsreg" class="dragelementshowicons"> <i onclick="openregards()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="regards_order" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>  </div>
<table style="display: table;"  cellspacing="0" cellpadding="0" border="0" width="100%" align="center"><tbody><tr><td style="font-size: 13px; line-height: 22px; padding: 10px 50px; font-family:Helvetica,sans-serif;" align="left"> <p  id = "regards1" onclick="openregards()" style="font-size:'.$sm_regardsarea_ftsize.'px;color:#'.$fontcolor.'">'.$regar.'</p></td></tr></tbody></table>


    </div>';
print_r($dragregards); die;
	 	 
                           
	 
                             
 }
 else if ($dragid == 'maindragtext') {
	 $maintext1 = $_POST['swcm_status'];
	 $fontcolor = get_option('swcm_template_font_color');
     $maintext  =  $maintext1 .'_maintext';
	 $maintextdrag =stripslashes(get_option($maintext));
	 $sm_maintext_background_color=get_option('sm_maintext_background_color');
     $maintextdrag = '
     <div id="maintext_order" style="background-color:#'.$sm_maintext_background_color.';" class="dragelementshowsmenu edit_hover_class"> 
     <div id="showiconsmain" class="dragelementshowicons"> 
     <i onclick="openmaintext()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="maintext_order" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> </div>
<table style="display: table;"  cellspacing="0" cellpadding="0" border="0" width="100%" align="center"><tbody><tr><td style="font-size: 13px; color: rgb(0, 0, 0); line-height: 22px; padding: 10px 50px; font-family:Helvetica,sans-serif;" align="left"><div onclick="openmaintext()" style="color:'.$fontcolor.'" id = "maintextdrag1" >'.$maintextdrag.'<span style="text-align:center;color:grey;"></span></div></td></tr></tbody></table>
       </div>';
                            print_r($maintextdrag); die;
	 	 
                            
}
else if ($dragid == 'imageblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $image_details = $order_table_obj->fetch_image_block();
                            print_r($image_details); die;
	                         
                          }
                          
 

else if ($dragid == 'socialblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $social_details = $order_table_obj->fetch_social_links();
                            print_r($social_details); die;
	                         
                          }

                          else if ($dragid == 'titleblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $title_details = $order_table_obj->header_text_block();
                            print_r($title_details); die;
	                         
                          }
                          else if ($dragid == 'footerblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $footer_details = $order_table_obj->fetch_footer();
                            print_r($footer_details); die;
	                         
                          }
                          
 
}


add_action('wp_ajax_swcm_show_drag' , 'swcm_show_drag');

function swcm_show_dragprod()
{
  include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
                   $dragid =  $_POST['swcm_id'];
                   if ($dragid == 'customer_details1') {
                             
                         global $woocommerce, $post;
$order_collection = new WP_Query(array(
        'post_type'     => 'shop_order',
        'post_status'   => array_keys( wc_get_order_statuses() ),
        'posts_per_page'  => 1,
      ));
      $order_collection = $order_collection->posts;
      $latest_order = current($order_collection)->ID;
      $order_to_show = $latest_order;
                         
                         $order = new WC_Order($order_to_show);
                         $order_id = $order->get_order_number();
                         $items = $order->get_items();
                         
                         $order_table_obj = new SWCM_Order_Table(); 
                        $customer_details = $order_table_obj->fetch_customer_details($order);
                            print_r($customer_details); die();

} else if ($dragid == 'order_details1') {
	global $woocommerce, $post;
                          $order_collection = new WP_Query(array(
                          'post_type'     => 'shop_order',
                          'post_status'   => array_keys( wc_get_order_statuses() ),
                          'posts_per_page'  => 1,
                        ));
                        $order_collection = $order_collection->posts;
                        $latest_order = current($order_collection)->ID;
                        $order_to_show = $latest_order;
                                           
                         $order = new WC_Order($order_to_show);
                         $order_id = $order->get_order_number();
                         //print_r($order);
                         $order_table_obj = new SWCM_Order_Table(); 
                            $order_details = $order_table_obj->swcm_fetch_order_table($order);
                            print_r($order_details); die;
}
 else if ($dragid == 'hr_details1') {
$hrwidth = get_option('hrwidth');
$hrheight = get_option('hrheight');
$hrclr = get_option('swcm_hr_color');	 
	 	$hr = '<div> <hr onclick="openhrblock()" id="hrblock1" style="height:'; 
	 $hr .= $hrheight; 
	 $hr.='px;border-width:0;background:#'; 
	 $hr .= $hrclr;
	 $hr .= ';width:';
	 $hr.=$hrwidth; 
	 $hr.='%;text-align:right;">

                         </div>'; 
                              print_r($hr);
                              die;
 } else if ($dragid == 'header_details') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/email-header.php');
	 if (isset($header_details)) 
	 	 print_r($header_details);
                              die;
	 
                             
 }
 else if ($dragid == 'footer_details') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/email-footer.php');
	 if (isset($footer_details)) 
	 	 print_r($footer_details);
                              die;
	 
                             
 }
 else if ($dragid == 'maintext_details') {
	 
	 if (isset($maintext_details))
	 	include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $maintext_details = $order_table_obj->fetch_text_block();
                            print_r($maintext_details); die;
	 	 
                       
	 
                             
 }
 else if ($dragid == 'button_details') {
	 
	 
	 	include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $button_details = $order_table_obj->fetch_button_block();
                            print_r($button_details); die;
	 	 
                             
	 
                             
 }else if ($dragid == 'disclaimer') {
	 
	 $disclaim =get_option('swcm_email_disclaimer');
	 $disposition = get_option('dispos');
	 $fontcolor = get_option('swcm_template_font_color');
     $disclaimer = '<span style="margin-top:2%;" align="'.$disposition.'"><p id = "disclaimer1" onclick="opendisclaimerblock()" style="color:'.$fontcolor.'" >'.$disclaim.'</p></span>';
                            print_r($disclaimer); die;
	 	 
                           
	 
                             
 }
 else if ($dragid == 'regards12') {
	 $fontcolor = get_option('swcm_template_font_color');
	 $regar =get_option('swcm_email_regards');
     $dragregards = '<span style="margin-top:2%;" ><p id = "regards1" onclick="openregards()" style="color:'.$fontcolor.'">'.$regar.'</p></span>';
                            print_r($dragregards); die;
	 	 
                           
	 
                             
 }
 else if ($dragid == 'maindragtext') {
	 $maintext1 = $_POST['swcm_status'];
	 $fontcolor = get_option('swcm_template_font_color');
     $maintext  =  $maintext1 .'_maintext';
	 $maintextdrag =get_option($maintext);
     $maintextdrag = '<div onclick="openmaintext()" style="color:'.$fontcolor.'" id = "maintextdrag1" >'.$maintextdrag.'</div>';
                            print_r($maintextdrag); die;
	 	 
                            
}
else if ($dragid == 'imageblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $image_details = $order_table_obj->fetch_image_block();
                            print_r($image_details); die;
	                         
                          }
                          
 

else if ($dragid == 'socialblockdrag') {
	 include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $social_details = $order_table_obj->fetch_social_links();
                            print_r($social_details); die;
	                         
                          }

 else if ($dragid == 'billingblockdrag') {
	 
	 if (isset($maintext_details))
	 	include_once(WP_CONST_EMAIL_CUST_DIRECTORY.'/templates/woocommerce/emails/order_table_info.php');
	  $order_table_obj = new SWCM_Order_Table(); 
                            $billing_details = $order_table_obj->fetch_billing_block();
                            print_r($billing_details); die;
	 	 
                       
	 
                             
 }
 
}


add_action('wp_ajax_swcm_show_dragprod' , 'swcm_show_dragprod');

function swcm_save_valu()
{
  $dragtemp1 = $_POST['swcm_dragtemplate1'];
  $dragtemp2 = $_POST['swcm_dragtemplate2'];
  $save_template_name = $_POST['swcm_tempnae'];
  // $dargtemp = htmlspecialchars($dargtemp);
   //$dargtemp = htmlspecialchars_decode($dargtemp);
  //$dragtemp = stripslashes($dragtemp);
  $dragtemp2 = stripslashes($dragtemp2);
  $dragtemp2 = preg_replace('/\\\\/', '', $dragtemp2);
  $dragtemp1 = stripslashes($dragtemp1);
  $dragtemp1 = preg_replace('/\\\\/', '', $dragtemp1); 
  update_option($save_template_name.'_prew' , $dragtemp1);
  update_option($save_template_name.'_main' , $dragtemp2);
  $create = get_option($save_template_name.'_createtime');
  if ($create == "") {
  	 $created_time = date("Y-m-d");
  update_option($save_template_name.'_createtime' , $created_time);
  } else {
  	$modified_time = date("Y-m-d");
  	update_option($save_template_name.'_modifytime' , $modified_time);
  }

  // check code to insert into table


global $wpdb;

$table_name = $wpdb->prefix . "email_customiser_sm";
$created_time = date("Y-m-d H:i:s");
$modified_time = date("Y-m-d");

$wpdb->insert( $table_name, array(
    'action_name' 		=> $save_template_name,   
    'template_name' 	=> $save_template_name,     // update template name
    'template_view' 	=> $created_time,			// save html code
    'created_time' 		=> $created_time
   
    
) );

  //end check code
 
  print_r($dragtemp1);
                             die();

}
add_action('wp_ajax_swcm_save_valu' , 'swcm_save_valu');


function swcm_save_valupage()
{
  
  $dragtemp2 = $_POST['swcm_dragtemplate2'];
  $save_template_name = $_POST['swcm_tempnae'];
  
  $dragtemp2 = stripslashes($dragtemp2);
  $dragtemp2 = preg_replace('/\\\\/', '', $dragtemp2);
  
  update_option($save_template_name , $dragtemp2);
 
 
 
  print_r($dragtemp1);
                             die();

}
add_action('wp_ajax_swcm_save_valupage' , 'swcm_save_valupage');

function swcm_save_valuprod()
{
  $dragtemp1 = $_POST['swcm_dragtemplate1'];
  $dragtemp2 = $_POST['swcm_dragtemplate2'];
  $save_template_name = $_POST['swcm_tempnae'];
  // $dargtemp = htmlspecialchars($dargtemp);
   //$dargtemp = htmlspecialchars_decode($dargtemp);
  //$dragtemp = stripslashes($dragtemp);
  $dragtemp2 = stripslashes($dragtemp2);
  $dragtemp2 = preg_replace('/\\\\/', '', $dragtemp2);
  $dragtemp1 = stripslashes($dragtemp1);
  $dragtemp1 = preg_replace('/\\\\/', '', $dragtemp1);
  $prodtemp =  get_option('prev_'.$save_template_name);
  if($prodtemp == ""){
update_option($save_template_name , $dragtemp1);
  }
  update_option('prev_'.$save_template_name , $dragtemp1);
  update_option('main_'.$save_template_name , $dragtemp2);
 
  //print_r($save_template_name);
 print_r($dragtemp1);
                             die();

}
add_action('wp_ajax_swcm_save_valuprod' , 'swcm_save_valuprod');

function swcm_save_imageblock()
{
  $imagename = $_POST['swcm_imagename'];
  $imagevalue = $_POST['swcm_imageurl'];
 
  print_r($imagevalue);
  update_option($imagename , $imagevalue);
                             die();

}
add_action('wp_ajax_swcm_save_imageblock' , 'swcm_save_imageblock');

function swcm_save_mainsubject()
{
  $mainsubvalue = $_POST['swcm_mainsubject'];
  $idsubject = $_POST['swcm_statsub'];

  //$mainstatsubject = trim($mainstatsub).'_subject';

 
  update_option($idsubject , $mainsubvalue);
   print_r($mainsubvalue);
                             die();

}
add_action('wp_ajax_swcm_save_mainsubject' , 'swcm_save_mainsubject');

function swcm_save_radioimg()
{
  $radioimgvalue = $_POST['swcm_radioimg'];
  
  print_r($radioimgvalue);
  update_option('radioimgno', $radioimgvalue);
                             die();

}
add_action('wp_ajax_swcm_save_radioimg' , 'swcm_save_radioimg');

function swcm_save_updatetable()   // save,update details table 
{
	$dragtemp1 = $_POST['swcm_dragtemplate1'];  // value to send mail 
	$dragtemp2 = $_POST['swcm_dragtemplate2'];  // value to show template
	$id = $_POST['id'];

	$dragtemp11 = stripslashes($dragtemp1);
	$dragtemp12 = preg_replace('/\\\\/', '', $dragtemp11); // to send

	update_option('sm_main_send_'.$id , $dragtemp12);

	$dragtemp21 = stripslashes($dragtemp2);          
	$dragtemp22 = preg_replace('/\\\\/', '', $dragtemp21);
	update_option('sm_main_show_'.$id , $dragtemp22);


		delete_option('smpreview_'.$id);     
	   	delete_option('smpreviewsend_'.$id);	
	
		print_r($dragtemp22);

	// //end check code


die();
}
add_action('wp_ajax_swcm_save_updatetable' , 'swcm_save_updatetable');

function swcm_save_updatetablepre()                       //  preview  button click 
{
	$html = $_POST['swcm_html'];
	$dragtemp2 = $_POST['swcm_dragtemplate2'];

	$id = $_POST['id'];

	$dragtemp11 = stripslashes($html);
	$dragtemp12 = preg_replace('/\\\\/', '', $dragtemp11);
	update_option('smpreviewsend_'.$id,$dragtemp12);  // save in options table to send mail

	$dragtemp21 = stripslashes($dragtemp2);
	$dragtemp22 = preg_replace('/\\\\/', '', $dragtemp21);
	update_option('smpreview_'.$id,$dragtemp22); //save in options table to view template
	
	

	die();
}
add_action('wp_ajax_swcm_save_updatetablepre' , 'swcm_save_updatetablepre');

function deletetemplate(){                //to delete template from table.
	
	if (!empty($_POST['deleteid'])) {
		global $wpdb;
		$table_name = $wpdb->prefix . "email_customiser_sm";
		$id = $_POST['deleteid'];
		$result=$wpdb->delete( $table_name, array( 'id' => $id ));
		if ($result) {
			$activate = ['message' => 'deleted'];
		}
	}
	
	echo json_encode($activate);
	die();
}
add_action('wp_ajax_deletetemplate' , 'deletetemplate');


function swcm()
{
  $imagename = $_POST['swcm_imagename'];
  $imagevalue = $_POST['swcm_imageurl'];
 
  print_r($imagevalue);
  update_option($imagename , $imagevalue);
                             die();

}
add_action('wp_ajax_swcm' , 'swcm');

function swcm_savetemp_valu()
{
  $dragtemp1 = $_POST['swcm_dragtemplate1'];
  
  $save_template_name ="temp";
 
  $dragtemp1 = stripslashes($dragtemp1);
  $dragtemp1 = preg_replace('/\\\\/', '', $dragtemp1);
  update_option($save_template_name.'temp' , $dragtemp1);
  
 
  print_r($dragtemp1);
                             die();

}
add_action('wp_ajax_swcm_savetemp_valu' , 'swcm_savetemp_valu');



function swcm_listtable()
{
  $tabl= $_POST['swcm_listarr'];
 $temptab = get_option($tabl);
 $tabll=json_encode($temptab);
  print_r($tabll);
  //update_option('tableaction', $avalue2);
                             die();

}
add_action('wp_ajax_swcm_listtable' , 'swcm_listtable');

function swcm_mytable()
{
  $tab= $_POST['swcm_tab'];
  update_option('table', $tab);
  print_r($tab);
  //update_option('tableaction', $avalue2);
                             die();

}
add_action('wp_ajax_swcm_mytable' , 'swcm_mytable');



function save_list_table()
{
  $swcm_listact = $_POST['swcm_listact'];
  $swcm_listtemp = $_POST['swcm_listtemp'];
  update_option($swcm_listact.'_choose' , $swcm_listtemp );
  print_r($swcm_listact.'_choose');
  print_r($swcm_listtemp);
    die();

}
add_action('wp_ajax_save_list_table' , 'save_list_table');


function swcm_save_footer()                  // working
{
  $swcm_footername = $_POST['swcm_footername'];
  $swcm_footervalue = $_POST['swcm_footervalue'];
  update_option($swcm_footername , $swcm_footervalue );
  print_r($swcm_footervalue);
  
    die();

}
add_action('wp_ajax_swcm_save_footer' , 'swcm_save_footer');

function imageupload(){
	print_r('hai');
	die('hai');
}





?>