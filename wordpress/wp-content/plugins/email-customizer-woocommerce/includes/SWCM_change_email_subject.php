<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class SWCM_Change_Subject
{
	public static function SWCM_replace_subject_variables($subject , $order)
	{
		$address = $order->get_address( 'billing' ); // returns an array
		$name = $address['first_name'];
		$name1 = $address['last_name'];
		$billing_first_name = $name;
		$billing_last_name = $name1;
		$name2 = $address['email'];
		$billing_email = $name2;
		$name3 = $address['phone'];
		$billing_phone = $name3;
		$var = $order->get_date_created();
		$order_date = $var."date";
		$customer_name = $billing_first_name.' '.$billing_last_name;
		$orderDate = date_i18n( wc_date_format(), strtotime( $order_date ) );
		$current_user = wp_get_current_user();
		$user_login = $current_user->user_login;

		$subject = str_replace('{customer_name}',$customer_name,$subject);
		$subject = str_replace('{order_no}',$order->get_order_number(),$subject);
		$subject = str_replace('{order_date}',$orderDate,$subject);
		$subject = str_replace('{blog_name}',get_bloginfo(),$subject);
		$subject = str_replace('{user_name}',$user_login,$subject);
		return $subject;
	}

	function SWCM_change_new_order_subject( $subject, $order ) {
		global $woocommerce;

        $subject =get_option('New Order_subject');

		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( 'You have received an order from %s.', 'woocommerce' ), $order->get_formatted_billing_full_name() ) . "\n\n";
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
	}

	function SWCM_change_on_hold_order_subject( $subject, $order ) {
        global $woocommerce;
        
        $subject =get_option('On Hold Order_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( "Your order is on-hold until we confirm payment has been received. Your order details are shown below for your reference:", 'woocommerce' ));
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_failed_order_subject( $subject, $order ) {
        global $woocommerce;
                
        $subject = get_option('Failed Order_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( 'Payment for order #%1$s from %2$s has failed. The order was as follows:', 'woocommerce' ), $order->get_order_number(), $order->get_formatted_billing_full_name() );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_cancelled_order_subject( $subject, $order ) {
        global $woocommerce;
        $subject = get_option('Cancelled Order_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( 'The order #%1$s from %2$s has been cancelled. The order was as follows:', 'woocommerce' ), $order->get_order_number(), $order->get_formatted_billing_full_name() );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

        

	function SWCM_change_processing_order_subject( $subject, $order ) {
        global $woocommerce;
        $subject = get_option('Processing Order_subject');

		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( 'Your order has been received and is now being processed. Your order details are shown below for your reference:', 'woocommerce' ));
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_completed_order_subject( $subject, $order ) {
        global $woocommerce;
        $subject = get_option('Completed Order_subject');

		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __(  "Hi there. Your recent order on %s has been completed. Your order details are shown below for your reference:", 'woocommerce' ), get_option( 'blogname' ) );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_customer_invoice_subject( $subject, $order ) {
        global $woocommerce;
        $subject = get_option('Customer Invoice_subject');

		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __(  "An order has been created for you on on %s. Your order details are shown below for your reference:", 'woocommerce' ), get_option( 'blogname' ) );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_refunded_order_subject( $subject, $order ) {
        global $woocommerce;
                // $template_config = get_option('SWCM_Refunded_Order');
        $subject = get_option('Refunded Order_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __(  "Hi there. Your order on %s has been refunded.", 'woocommerce' ), get_option( 'blogname' ) );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_customer_note_subject( $subject, $order ) {
        global $woocommerce;
        
        $subject = get_option('4_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __(  "Hello, a note has just been added to your order:", 'woocommerce' ));
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_new_account_subject( $subject, $order ) {
        global $woocommerce;
                
        $subject = get_option('2_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __('Thanks for creating an account on %1$s.', 'woocommerce' ), esc_html( get_option( 'blogname' ) ) );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_reset_password_subject( $subject, $order ) {
        global $woocommerce;
          
        $subject = get_option('3_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __('Request for Reset Password for your account on %1$s.', 'woocommerce' ), esc_html( get_option( 'blogname' ) ) );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }

	function SWCM_change_product_delivered_subject( $subject, $order ) {
        global $woocommerce;
 
        $subject = get_option('Product Delivered_subject');
		if($subject == false){ // no subject available as client added subject.

			$subject = sprintf( __( 'Your Order %s has been Delivered sucessfully' ), $order->get_order_number() );
		}else{
			$subject = self::SWCM_replace_subject_variables($subject , $order);
		}
		return $subject;
        }
}

add_filter('woocommerce_email_subject_new_order', array('SWCM_Change_Subject','SWCM_change_new_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_on_hold_order', array('SWCM_Change_Subject','SWCM_change_on_hold_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_failed_order', array('SWCM_Change_Subject','SWCM_change_failed_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_cancelled_order', array('SWCM_Change_Subject','SWCM_change_cancelled_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_processing_order', array('SWCM_Change_Subject','SWCM_change_processing_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_completed_order', array('SWCM_Change_Subject','SWCM_change_completed_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_invoice_paid', array('SWCM_Change_Subject','SWCM_change_customer_invoice_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_refunded_order', array('SWCM_Change_Subject','SWCM_change_refunded_order_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_note', array('SWCM_Change_Subject','SWCM_change_customer_note_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_new_account', array('SWCM_Change_Subject','SWCM_change_new_account_subject'), 1, 2);
add_filter('woocommerce_email_subject_customer_reset_password', array('SWCM_Change_Subject','SWCM_change_reset_password_subject'), 1, 2);
add_filter('woocommerce_email_subject_product_delivered_order', array('SWCM_Change_Subject','SWCM_change_product_delivered_subject'), 1, 2);

