<?php

class SWCM_Order_Table{
	public function swcm_fetch_order_table($order = "")
	{
    
    //BILLING SECTION
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

//Payment total
$order_no = $order->get_order_number();
$taddress = $order->get_order_item_totals();

//print_r($order->get_items());
$subtotal = $taddress['cart_subtotal'];
$sub = $subtotal['value'];
$stotal = $taddress['order_total'];
$su = $subtotal['value'];

//promo section
$pro_m = get_option('swcm_email_promo');
 $pro_mo = explode( ',', $pro_m );
 
 $ln= sizeof($pro_mo);
for($i=0;$i<$ln;$i++){
if(preg_match('~[a-zA-Z]~', $pro_mo[$i])){
    $produ = get_page_by_title( $pro_mo[$i], OBJECT, 'product' );
    $url = get_permalink( $produ->ID );
    $image = wp_get_attachment_image_src( get_post_thumbnail_id($produ->ID), 'single-post-thumbnail' );
    
    $namep = $pro_mo[$i];
}else{
  $image = wp_get_attachment_image_src( get_post_thumbnail_id($pro_mo[$i]), 'single-post-thumbnail' );

   
    $url = get_permalink($pro_mo[$i]);
    $namep = get_the_title($pro_mo[$i]);

}

if(!isset($mop))
  $mop="";
$mop .= '<div><img src '.$image[0]. '><a href="'.$url.'" target="blank">'.$namep.'</a>'."&nbsp;&nbsp;&nbsp;</div>";
 }

?>

 <?php
//Payment Method
$pri = get_post_meta( $order->get_order_number(), '_payment_method_title', true );

$order_id = $order->get_user_id();
 
 

$var = $order->get_date_created();
$order_date = $var."date";

 // font-family:'.$sm_cust_font_color.'; 

$sm_template_font_color = get_option('sm_template_font_color');
$sm_template_font_family = get_option('sm_template_font_family');
$sm_table_header = get_option('sm_table_header');
$sm_table_body_background_color = get_option('sm_table_body_background_color');
$sm_ordertable_background_color=get_option('sm_ordertable_background_color');
$swcm_template_body_background_color=get_option('swcm_template_body_background_color');
if(!isset($order_details))
  $order_details="";
    $order_details .= '
      <div  > <div id="order_details" style="background-color:#'.$sm_ordertable_background_color.'; font-family:'.$sm_template_font_family.'; position:relative; " class="dragelementshowsmenu  edit_hover_class order_number" >
<div style="line-height:1.3em;color:#<?php echo $sm_template_font_color; ?>;
font-family:"Poppins", sans-serif;">
<div id="showicons" data-key="appearanceinputnew" class="dragelementshowicons"> 
<i onclick="openappearanceblocknew()" style="position:absolute: width:100%; height:100%; float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i>  <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="order_details" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
</div>
       </div> 
       <tr> 
       <td>     
<h1 style="font-size: larger;font-weight: bolder;padding-left: 11%; margin-top:0; padding-top:20px; color:black; ">Order No: #'.$order_no .' </h1>


    <div id="sm_ordertable" style="font-family:'.$sm_template_font_family.';color:#'.$sm_template_font_color.'; padding:20px 30px;">

       <table onclick="" id="ordertableedit" style="background:#'.$sm_table_body_background_color.';margin:auto; border: 1px solid #eee;border-top:1px solid #eee;border-bottom:1px solid #eee;border-left:1px solid #eee;border-right:1px solid #eee; width:100%; max-width:700px;" cellspacing="10" cellpadding="10" border="1" frame=hsides rules=rows>
        <thead>
        <tr style="text-align:left;border: 1px solid #eee;">
         <th id="swcm_table_color11" style="background:#' . $sm_table_header . ';color: #fff; text-transform: uppercase;font-size: 12px;color:black;padding: 12px;border-collapse: collapse;">';?> <?php $order_details .= esc_html__( 'Product' , WP_CONST_EMAIL_CUST_SLUG ); ?> <?php $order_details .='</th>
        <th width="20%" id="swcm_table_color21" style="background:#'. $sm_table_header .';color: #fff; text-transform: uppercase;font-size: 12px;color:black;text-align:right; padding: 12px;border-collapse: collapse;">';?><?php $order_details .= esc_html__( 'Quantity', WP_CONST_EMAIL_CUST_SLUG ); $order_details .= '</th>
        <th width="20%" id="swcm_table_color31" style="background:#'. $sm_table_header .';color: #fff; text-transform: uppercase;font-size: 12px;color:black; text-align:right;padding: 12px;border-collapse: collapse;">';?><?php $order_details .= esc_html__( 'Price', WP_CONST_EMAIL_CUST_SLUG ); $order_details .='</th>
                </tr>
        </thead>
                               
    <tbody id="swcm_template_font_color11" style="color:#'.$sm_template_font_color.';border: 1px solid #eee;padding: 12px 35px;border-collapse: collapse; font-family:inherit;">';?>

        <?php 
        $order_data = $order->get_data(); // The Order data

        foreach ($order->get_items() as $item_id => $item_data) {

        // Get an instance of corresponding the WC_Product object
        $product = $item_data->get_product();
        $product_name = $product->get_name(); // Get the product name

        $item_quantity = $item_data->get_quantity(); // Get the item quantity

        $item_total = $item_data->get_total(); // Get the item line total
        $order_details .='
        <tr class="order_item" style=""> 
        <td class="td" style="text-align:left; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">'.$product_name.'</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">'.$item_quantity.'</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">'. number_format( $item_total, 2 ).'</td> </tr>';
        }
        ?>
         <?php $order_details .='
     </tbody>
                                
    <tfoot id="swcm_template_font_color21" style="color:#'.$sm_template_font_color.';border: 1px solid #eee;border-top:1px solid #eee;padding: 12px 35px;border-collapse: collapse; font-size:16px;">';?> <?php if ( $totals = $order->get_order_item_totals() ) { $i = 0; foreach ( $totals as $total ) { $i++;?> <?php $order_details .= '
    <tr id="swcm_template_font_color31" style="color:inherit;border:none;outline:none; border-collapse: collapse;"> 

    <td colspan="2" id="swcm_template_font_color41" style="text-align:right;border:none; outline:none; font-size:inherit; font-weight:bold; color:inherit;">';?> <?php $order_details .= esc_html__($total['label'],WP_CONST_EMAIL_CUST_SLUG); $order_details .= '</th> 
    <td style="border:none; text-align:right; outline:none; font-size:inherit; color:inherit;">';?><?php $order_details .= $total['value'];$order_details .='</td></tr>';?> <?php } } $order_details .= '</tfoot>
                        </table>';?>

                        <?php do_action( 'woocommerce_email_after_order_table', $order, true, false ); 

                $order_details .= ' </div></div>
      
            <div>
        <?php do_action( "woocommerce_email_before_order_table", $order, true, false ); ?>
      </div>   
      
    </td>
  </tr>
</table></div>
       
';
 //print_r($order_details);
	return $order_details;
}
public function fetch_order_prod($order, $mode)
  {
    $items = $order->get_items();
    foreach ( $items as $item ) {
      if($mode == 'product_id'){
        $prod = $item['product_id'];
    }
       if($mode == 'product_qty'){
        $prod = $item['quantity'];
       }
       if($mode == 'name'){
            $prod = $item['name'];

       }
       if($mode == 'total'){
        $prod =  $item['total'];
       }
       
       if(!isset($order_prod))
  $order_prod="";
     $order_prod .='<table  cellpadding="0" cellspacing="0" border="0" width="100%" >
        <tr>
               
                    
                                
                                ';?>
                                        <?php $order_prod .= $prod; ?>
                                <?php $order_prod .='
                                
                        ';?>

                        <?php do_action( 'woocommerce_email_after_order_table', $order, true, false ); 

                $order_prod .= '
        </tr>
</table>';

}

  return $order_prod;
  }
public function sm_email_header(){
    $swcm_email_heading = get_option('swcm_email_heading'); 
    $swcm_header_img_position = get_option('sm_email_header_image_');
    $sm_email_header_background_color = get_option('sm_email_header_background_color');
    $imagepos = get_option('sm_email_header_image_pos');
    $imgurl = get_option( 'sm_email_header_image_url' );
    ?>
    <td valign="top" align="center" style="background-color:#<?php echo $sm_email_header_background_color; ?>; padding-top:40px;padding-bottom:20px;" >

    <div id="headerbackclr" class="dragelementshowsmenu edit_hover_class" onclick="openheaderblock()" style="text-align:center; vertical-align:middle;padding-bottom:0px;overflow: hidden; position: relative; background-color:#<?php echo $sm_email_header_background_color; ?>;">

          <div id="showiconshead" class="dragelementshowicons"> <i onclick="openNav6();" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="headerbackclr1"  style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>
        </div>

        <?php
        
        echo '<p  style="overflow: hidden;padding: 20px 50px; margin:0;"><img style="padding-left:2%;padding-right:2%;" id="headerimg2" align="'.$imagepos.'" src="' . esc_url( $imgurl ) . '" alt="" width="' .get_option("sm_email_header_width").'" height="'.get_option("sm_email_header_height").'" ; /></p>';
        ?>
        </div>
        </td>
<?php }
  public function fetch_total_prod($order, $mode){
      
     $taddress = $order->get_order_item_totals();
     if($mode == 'subtotal'){
     $subtotal = $taddress['cart_subtotal'];
     $tot = $subtotal['value'];
   }
     if($mode == 'total'){
     $stotal = $taddress['order_total'];
     $tot = $stotal['value'];
}
     if($mode == 'pay'){
      $tot = get_post_meta( $order->get_order_number(), '_payment_method_title', true );
    }
       $order_tot = $tot;

       return $order_tot;

  }

  
  
public function fetch_text_block(){							// working textposition
	$font_color = get_option('textfontcolor');
	$textvalue = get_option('textblock');
	$textposition=get_option('textpos');
	$sm_txtarea_font=get_option('sm_txtarea_font');
	$sm_txtarea_ftsize=get_option('sm_txtarea_ftsize');
  $sm_textarea_background_color= get_option('sm_textarea_background_color');
	if($textvalue == "" ){
	$textvalue = '<span style="text-align:center;color:grey;">Click To Edit Text</span>';
	}
	$text_block = '
	<div id="text_area_order" class="dragelementshowsmenu edit_hover_class" onclick="" style="background-color:#'.$sm_textarea_background_color.';">
	<div id="showiconstxt" class="dragelementshowicons"> 
	<i onclick="opentextarea()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="text_area_order" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>
		</div> 
		<table id="text_area_order1" style="background-color:#'.$sm_textarea_background_color.'; display: table;"  cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
		<tbody>
			<tr>
			<td id="textposition" align="'.$textposition.'">
			<p onclick="textblock(this.id,this.name)" name="textblock1" id="textblock1" style="font-size:'.$sm_txtarea_ftsize.'px;font-family:'.$sm_txtarea_font.';color:#'.$font_color.'; padding: 10px 50px;">'.$textvalue.'
			</p>
			</td>
			</tr>
		</tbody>
		</table>

	</div>';
	return $text_block;
}

  public function fetch_button_block(){
    $buttonpara = get_option('swcm_button_para');
      $buttonclr = get_option('swcm_button_color');
      $buttontext = get_option('swcm_button_text');
      $buttonlink = get_option('swcm_button_link');
      $buttonwidth = get_option('buttonwidth');
      $buttonposition = get_option('buttonpos');
      $sm_button_background_color =get_option('sm_button_background_color');
     ?>
     <div id="button_block_order" class="dragelementshowsmenu edit_hover_class" style="background-color:#<?php echo $sm_button_background_color; ?>;"
 >  <div id="showiconsbutton" class="dragelementshowicons"> <i onclick="openbuttonblock()"  style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="button_block_order" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> </div> <table style="display: table;" cellspacing="0" cellpadding="0" border="0" background="#ffffff" width="100%" align="center"><tbody><tr><td style="padding: 15px 50px;"><table id="buttonpos" cellspacing="0" cellpadding="0" border="0" align="<?php echo $buttonposition; ?>"><tbody><tr><td style="margin: 10px;"><a id="buttonblock1" href="<?php echo $buttonlink; ?>" style="line-height: 21px; border-radius: 6px; text-align: center; text-decoration: none; display: block; margin: 0px; padding: 12px 20px; background:#<?php echo $buttonclr; ?>; color: rgb(255, 255, 255); font-size: 15px; font-family: inherit; font-weight: normal;"><?php echo $buttontext; ?></a></td></tr></tbody></table></td></tr></tbody></table></div>

    
     <?php

  }

public function fetch_signature_block(){
    $sm_email_signature_background_color =get_option('sm_email_signature_background_color');
    ?>
    <div id="signature_block_order" class="dragelementshowsmenu edit_hover_class" style="background-color:#<?php echo $sm_email_signature_background_color; ?>;">  
        <div id="showiconssignature" class="dragelementshowicons"> 
	        <i onclick="opensignatureblocknew()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true">
	        </i>
	        <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true">
	        </i>
	        <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="signature_block_order" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)">
	        </i>
        </div>





    	<?php

$imagepos = get_option('sm_email_signature_image_pos');
$imgurl = get_option('sm_email_cust_sign_url');

echo '<p id="signimagepara"  style="overflow: hidden;padding: 20px 50px; margin:0; text-align:'.$imagepos.'; "><img style="padding-left:2%;padding-right:2%;" id="signimage"  src="' . esc_url( $imgurl ) . '" alt="" width="' .get_option("sm_email_signature_width").'" height="'.get_option("sm_email_signature_height").'" ; /></p>';

?>
</div>
    <?php

}

  public function fetch_image_block(){    //sm_image_bgcolor
  	$sm_image_bgcolor = get_option('sm_image_bgcolor');	
     
     $imageupload1 = get_option('sm_image_up_img1');
     $imagelink1 = get_option('imagelink1'); 
     $imageupload2 = get_option('sm_image_up_img2');
     $imagelink2 = get_option('imagelink1'); 
     $imageupload3 = get_option('sm_image_up_img3');
     $imagelink3 = get_option('imagelink1'); 
     $imagecaption1 = get_option('imagecaption1');
     $imagecaption2 = get_option('imagecaption2');
     $imagecaption3 = get_option('imagecaption3');
     $imagenum = get_option('radioimgno');
       $image_block = '
<div id="image_order" class="dragelementshowsmenu edit_hover_class" style="position:relative;" > 
<div id="showiconsimg" class="dragelementshowicons" style=" position:absolute; width:100%; height:100%;">
        <i onclick="openimageblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> 
        <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i>
         <i id="image_order" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> </div> <table style="display: table; background-color: rgb(237, 241, 228);" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
		<tbody>
			<tr>
				<td id="image_bgcolor" style="background:#'.$sm_image_bgcolor.';padding: 40px 50px;" align="center">

				<span style="display:inline-block;float:left">
				
				</span>

				<span style="display:inline-block;float:left">
				<a  id="imglink1"  href="'.$imagelink1.'">
				<img src="'.$imageupload1.'" name="image1" id="image1" width="100" height="100">
				<figcaption id="imgcap1" style="text-align: center;text-decoration:none;">'.$imagecaption1.'</figcaption> 
				</a></span>
				<span style="display:inline-block;float:center"><a id="imglink1" href="'.$imagelink2.'">
				<img src="'.$imageupload2.'" name="image2" id="image2" width="100" height="100"> 
				<figcaption id="imgcap2"  style="text-align: center;text-decoration:none;">'.$imagecaption2.'</figcaption> 
				</a> </span><span style="float:right;display:inline-block;"><a id="imglink1" href="'.$imagelink3.'">
				<img src="'.$imageupload3.'" name="image3" id="image3" width="100" height="100"> 
				<figcaption id="imgcap3" style="text-align: center;text-decoration:none;">'.$imagecaption3.'</figcaption> 
				</a> </span>
				</td>
			</tr>
		</tbody>
	</table> 

</div> ';
    
       return $image_block;

  }

 public function header_text_block(){

    $sm_title_text_text 	 	= get_option('sm_title_text_text');
    $sm_title_text_color 		= get_option('sm_title_text_color');
    $sm_title_text_bgcolor 		= get_option('sm_title_text_bgcolor');
    $sm_title_text_pos			= get_option('sm_title_text_pos');
   $header_text = '
   <div id="header_text" class="dragelementshowsmenu edit_hover_class" onclick="opentitlearea()">
   <div id="showiconstitle" class="dragelementshowicons">
        <i onclick="opentitlearea()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> 
        <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i>
 <i id="header_text" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
 </div>
 <h4 id="headertext" align="'.$sm_title_text_pos.'"; style="font-weight: bolder;margin-top: 0px;margin-bottom: 0px;font-size: 39px; background:#'.$sm_title_text_bgcolor.';color:#'.$sm_title_text_color.';padding: 25px 50px;">'.$sm_title_text_text.'</h4>
 </div>';
   return $header_text;  
}

public function fetch_billing_block(){
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

$swcm_template_font_color = get_option('swcm_template_font_color');
$swcm_background_color = get_option('swcm_template_body_background_color');
     ?>
     <div id="button_block_order dragelementshowsmenu" onclick="openbuttonblock()" >  
     <div id="showiconsbutton" class="dragelementshowicons"> <i onclick="openbuttonblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="button_block_order" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> </div> <table style="display: table;" cellspacing="0" cellpadding="0" border="0" background="#ffffff" width="100%" align="center"><tbody><tr><td style="padding: 15px 50px;"><table id="buttonpos" cellspacing="0" cellpadding="0" border="0" align="<?php echo $buttonposition; ?>"><tbody><tr><td style="margin: 10px;">
     <p style="margin-left: 21%;"><strong>Billing address </strong></p>
      <div style="border-style: solid;margin-left: 30%;border:none">
      <p style="margin-bottom: 1%;"><?php echo $billing_first_name . $billing_last_name; ?> </p> 
      <p style="margin-bottom: 0%;"><?php echo $billing_address_1 . ',' . $billing_address_2; ?></p>
      <p style="margin-bottom: 0%;"><?php echo $billing_city .'-'.$billing_postcode;?> </p> 
      <p style="margin-bottom: 0%;"><?php echo $billing_country; ?> </p> 
                                </div></td></tr></tbody></table></td></tr></tbody></table>
    </div>

    
     <?php

  }
  public function fetch_customer_details($order)
	{
     //BILLING SECTION
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

$sm_cust_font_color =  get_option('sm_cust_font_color');
$sm_cust_body_background_color = get_option('sm_cust_body_background_color');
$sm_cust_font_family = get_option('sm_cust_font_family');

    if(!isset($customer_details))
      $customer_details="";
	$customer_details .= '
<div onclick="openappearanceblock()" id="customer_details" class="dragelementshowsmenu edit_hover_class order_number" style="position:relative;';

    $customer_details.='" > <div id="showicons1"class="dragelementshowicons" style=" position:absolute; width:100%; height:100%;"> <i onclick="openappearanceblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="customer_details"  class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
    </div>

    <div id="custdetailscol" style="padding:20px 50px; font-size:16px; font-family:'.$sm_cust_font_family.';color:#'.$sm_cust_font_color.';background-color:#'.$sm_cust_body_background_color.'">
    

     <h3 style="font-size:18px; color:inherit; font-weight:bolder; font-family:inherit; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;">';$customer_details .=  esc_html__("Customer Details",WP_CONST_EMAIL_CUST_SLUG); $customer_details .= '</h3>';?>

    <?php if ( isset($billing_email) ) : 
    $customer_details .= '<p> <div style="text-align:center"> <strong> '; $customer_details .= esc_html__( "Email",WP_CONST_EMAIL_CUST_SLUG); 
	  $customer_details .= ':</strong> '; $customer_details .=  $billing_email;
    $customer_details .= '</p>';?>
    <?php endif; ?>
	    <?php if (isset($billing_phone) ) :
	    $customer_details .= '<p><div style="text-align:center"><strong> ';
		$customer_details .= esc_html__( 'Telephone',WP_CONST_EMAIL_CUST_SLUG ); 
		$customer_details .= ':</strong> '; $customer_details .= $billing_phone; 
		$customer_details .= '</p> </div></div>';
	    endif; ?>

        <?php /*$customer_details .= wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); */

	if ( $order->get_formatted_billing_address() || $order->get_formatted_shipping_address() ) : 

    $customer_details .= '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top: 10px; font-size:16px;">
    <tr>
    <td width="25%" valign="top" style="  padding:20px 20px 20px 0px;">
	<p style="font-size:18px; font-weight:bolder; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;"><strong> ';  $customer_details .= esc_attr__("Billing address",WP_CONST_EMAIL_CUST_SLUG); 
				$customer_details .= ':</strong></p>
    <div style="border-style: solid;border:none; font-size:15px;">
      <p style="font-size:inherit;">  '; $customer_details .= $billing_first_name . $billing_last_name; $customer_details .= '</p> 
      <p style="font-size:inherit;"> '; $customer_details .= $billing_address_1; $customer_details.= ','; $customer_details .= $billing_address_2; $customer_details .= '</p>
      <p style="font-size:inherit;">'; $customer_details .= $billing_city; $customer_details.= '-'; $customer_details .= $billing_postcode; $customer_details .= '</p> 
      <p style="font-size:inherit;">'; $customer_details .= $billing_state; $customer_details.= ','; $customer_details .= $billing_country; $customer_details .= '</p> 
                                </div> 
	</td>';
        $customer_details .= '<td width="25%" valign="top" style="  padding:20px 0px 20px 20px;">
        <p style="font-size:18px; font-weight:bolder; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;"><strong> '; $customer_details .= esc_attr__("Shipping address",WP_CONST_EMAIL_CUST_SLUG); $customer_details .= ':</strong></p>

       <div style="border-style: solid;border:none; font-size:15px;">
       <p style="">  '; $customer_details .= $shipping_first_name . $shipping_last_name; $customer_details .= '</p>'; 
       if(!empty($shipping_address_1)) {  
        $customer_details.= '<p style="font-size:inherit;"> ';
       $customer_details .= $shipping_address_1; 
       $customer_details.= ','; 
       $customer_details .= $shipping_address_2; 
       $customer_details .= '</p>'; }
       if(!empty($shipping_city)) {
     $customer_details.=' <p style="font-size:inherit;">'; $customer_details .= $shipping_city; $customer_details.= '-'; $customer_details .= $shipping_postcode; $customer_details .= '</p>'; }
      if(!empty($shipping_state)) {
     $customer_details .= '<p style="font-size:inherit;">'; $customer_details .= $shipping_state; $customer_details.= ','; $customer_details .= $shipping_country; $customer_details .= '</p> '; }

                                
$customer_details .= '</div>                        
                </tr>
        </table></div> ';
 endif; 
                $customer_details .= ' </div> ';

		return $customer_details;
	}

public function fetch_social_links(){




$swcm_upload_dir = wp_upload_dir();
$destination_folder =  $swcm_upload_dir['baseurl'].'/'.WP_CONST_EMAIL_CUST_SLUG;



$facebook = $destination_folder.'/facebook.png';
$twitter =  $destination_folder.'/twitter.png';
$googleplus =  $destination_folder.'/googleplus.png';
$linkedin = $destination_folder.'/linkedin.png' ;
$skype =  $destination_folder.'/skype.png';
$youtube = $destination_folder.'/youtube.png' ;

$swcm_facebook_uri = get_option('facebook');
$swcm_twitter_uri = get_option('twitter');
$swcm_google_plus_uri = get_option('googleplus');
$swcm_linkedin_uri = get_option('linkedin');
$swcm_skype_uri =  get_option('skype');
$swcm_youtube_uri = get_option('youtube');
$sm_url_bgcolor =  get_option('sm_url_bgcolor');
$iconspos =  get_option('iconspos');

 ?>
 
<?php $foot = get_option('swcm_email_foot'); ?>

<div id="socil" class="dragelementshowsmenu edit_hover_class" style="position: relative;">
<div id="showiconssocil" class="dragelementshowicons" style="position: absolute; width: 100%; height: 100%;"> <i onclick="opensocialblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="socil"  class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> </div>
<table  style="display: table; background-color:#<?php echo $sm_url_bgcolor; ?>;; padding: 20px 0;" cellspacing="0" cellpadding="0" border="0" width="100%" align="<?php echo $iconspos;?>">
   <tbody>
    <tr>
  
    <td id="emsocial" style=" background-color:#<?php echo $sm_url_bgcolor; ?>; padding: 10px 50px;" align="<?php echo $iconspos; ?>"> 
   
       <span style="display: inline-block;"> 
       <a id="facebook" href="<?php echo $swcm_facebook_uri; ?>" target="_blank" class="em-facebook" style="border: medium none;display:none; text-decoration: none;">

       <img src="<?php echo $facebook?>" width="35" height="35" border="0"></a>

       </span>

       <span style="display: inline-block;margin-left: 1%;"><a id="twitter" href="<?php echo $swcm_twitter_uri; ?>" target="_blank" class="em-twitter" style="border: medium none; display:none;text-decoration: none;">
       <img src="<?php echo $twitter?>" width="35" height="35" border="0"></a></span><span style="display: inline-block;margin-left: 1%;"><a id="googleplus" href="<?php echo $swcm_google_plus_uri; ?>" target="_blank" class="em-youtube" style="border: medium none;display:none; text-decoration: none;"><img src="<?php echo $googleplus?>" width="35" height="35" border="0"></a></span><span style="display: inline-block;margin-left: 1%;"><a id="linkedin" href="<?php echo $swcm_linkedin_uri; ?>" target="_blank" class="em-youtube" style="border: medium none;display:none; text-decoration: none;"><img src="<?php echo $linkedin?>" width="35" height="35" border="0"></a></span><span style="display: inline-block;margin-left: 1%;"><a id="skype" href="<?php echo $swcm_skype_uri; ?>" target="_blank" class="em-youtube" style="border: medium none;display:none; text-decoration: none;"><img src="<?php echo $skype?>" width="35" height="35" border="0"></a></span><span style="display: inline-block;margin-left: 1%;"><a id="youtube" href="<?php echo $swcm_youtube_uri; ?>" target="_blank" class="em-youtube" style="border: medium none;display:none; text-decoration: none;"><img src="<?php echo $youtube?>" width="35" height="35" border="0"></a></span>

         </td></tr></tbody></table> </div>

<?php
}

public function fetch_footer(){

$myaccount_page_id = get_option( 'woocommerce_myaccount_page_id' );
if($myaccount_page_id){
  $myaccount_page_url = get_permalink( $myaccount_page_id );
}
$sm_footer_txt1 		= get_option('sm_footer_txt1');
$sm_footer_link1 		= get_option('sm_footer_link1');

$sm_footer_txt2 		= get_option('sm_footer_txt2');
$sm_footer_link2 		= get_option('sm_footer_link2');

$sm_footer_txt3 		= get_option('sm_footer_txt3');
$sm_footer_link3 		= get_option('sm_footer_link3');

$sm_footer_text_color 		= get_option('sm_footer_text_color') ;
$sm_footer_back_color 		= get_option('sm_footer_back_color') ;

?>
<div id="footer" class="dragelementshowsmenu edit_hover_class" style="position: relative;">
	<div id="showiconsfooter" class="dragelementshowicons" style="position: absolute; width: 100%; height: 100%;">
	<i onclick="openfootertext()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="footer"  class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>
	</div> 
	<table id="footerdisp" style="display: table; background:#<?php echo $sm_footer_back_color; ?>;;height: 65px;" cellspacing="0" cellpadding="0" border="0" width="100%" align="center">
		<tbody>
			<tr>
				<td style="font-size: 13px;color: rgb(0, 0, 0); line-height: 22px; padding: 10px 50px; font-family: inherit;" align="left">
				<div style="text-align: center;" style="text-align: center;">
					<p>
					<span id="check" style="color: #ffffff; font-size: 11pt;" style="color: #ffffff; font-size: 11pt;">
					<span>
					<a id="footertextonevalue" style="color:#<?php echo $sm_footer_text_color;?>" href="<?php echo $sm_footer_link1; ?>"><?php echo $sm_footer_txt1; ?></a>
					</span> | <span>
					<a id="footertexttwovalue" style="color:#<?php echo $sm_footer_text_color;?>" href="<?php echo $sm_footer_link2; ?>"><?php echo $sm_footer_txt2; ?>
					</a>
					</span> | <span>
					<a id="footertextthreevalue" style="color: #<?php echo $sm_footer_text_color;?>" href="<?php echo $sm_footer_link3; ?>" ><?php echo $sm_footer_txt3; ?>
					</a>
					</span>
					</span>
					<br bogus="1">
					</p>
				</div>
				</td>
			</tr>
		</tbody>
	</table> 
</div>
  
<?php }
	public function fetch_order_info_table($swcm_product_name,$user_email,$orderDate)
	{
		$info_table .= '<tr>
                                         <td align="left" valign="top" bgcolor="#ffffff" style="padding-left:24px;padding-right:24px;padding-bottom:24px;padding-top:24px;">

                                            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ddd; font-size:12px;">
                                                  <tr>
                                                      <td align="left" valign="top" style="padding:10px; font-size:14px;font-weight:bold;">';
						$info_table .=  esc_html__('Product Name',WP_CONST_EMAIL_CUST_SLUG);
						$info_table .= '</td>
                                                      <td align="right" valign="top" style="padding:10px;color:#988c00;text-decoration:none;">';
						$info_table .= $swcm_product_name; 
						$info_table .= '</td>
                                                  </tr>
                                                  <tr>
                                                      <td bgcolor="#f9f9f9" align="left" valign="top" style="padding:10px; font-size:14px;font-weight:bold;">';
						$info_table .=  esc_html__("Email Address",WP_CONST_EMAIL_CUST_SLUG);
						$info_table .= '</td>
                                                      <td bgcolor="#f9f9f9" align="right" valign="top" style="padding:10px;">'; 
							$info_table .= $user_email;
						$info_table .= '</td>
                                                  </tr>
                                                   <tr>
                                                      <td bgcolor="#f9f9f9" align="left" valign="top" style="padding:10px; font-size:14px;font-weight:bold;">';
						$info_table .=  esc_html__("Order Date",WP_CONST_EMAIL_CUST_SLUG); 
						$info_table .= '</td>';
                                                      $info_table .='<td bgcolor="#f9f9f9" align="right" valign="top" style="padding:10px;">';
						      $info_table .=  $orderDate; 
							$info_table .= '</td>
                                                  </tr>
                                             </table>

                                          </td>
                                      </tr>';
			return $info_table;
	}
}

/**
* To get the order detail and replace with the template  details for 
	product deleivered status.
*/
class New_ordertable
{

	public function get_details($orderno){


		$order = wc_get_order($orderno);
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
		$order_id1 = $order->get_user_id();
		$var = $order->get_date_created();
		$order_date = $var."date";
		$shipping_name = $shipping_first_name.''.$shipping_last_name;
		$customer_name = $billing_first_name.' '.$billing_last_name;

		$orderDate = date_i18n( wc_date_format(), strtotime( $order_date ) );
		$current_user = wp_get_current_user();
		$user_login = $current_user->user_login;

		//////////////////////////////////////////////////////
        $obj = new SWCM_Order_Table();
		$id=1;
        $value = get_option('sm_main_send_'.$id);  
		
		$value =str_replace('{order_no}',$orderno,$value); 
		$value =str_replace('{order_date}',$order_date,$value);
		$value = str_replace('{blog_name}',get_bloginfo(),$value);
		$value = str_replace('{user_name}',$user_login,$value);
		$value = str_replace('{customer_name}',$customer_name,$value);
		$value = str_replace('{order_details}',$this->ordertable_fetch($orderno),$value);
		$value = str_replace('{customer_details}',$this->customer_table_fetch($orderno),$value);
		 $value = str_replace('{order_name}',$obj->fetch_order_prod($order , 'name'),$value);
		 $value = str_replace('{order_qty}',$obj->fetch_order_prod($order , 'product_qty'),$value);
		 $value = str_replace('{product_price}',$obj->fetch_order_prod($order , 'total'),$value);
		 $value = str_replace('{sub_total}',$obj->fetch_total_prod($order, 'subtotal'),$value);
		 $value = str_replace('{order_total}',$obj->fetch_total_prod($order, 'total'),$value);
		 $value = str_replace('{pay_method}',$obj->fetch_total_prod($order, 'pay'),$value);
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


		//print_r($value);
		//die('new function');
		return $value;
	}
	// helper function for getdetails function
	public function ordertable_fetch($orderno){

		$order = wc_get_order($orderno);
		// Get the order ID
		$order_no = $order->get_id();
	$sm_template_font_color = get_option('sm_template_font_color');
	$sm_template_font_family = get_option('sm_template_font_family');
	$sm_table_header = get_option('sm_table_header');
	$sm_table_body_background_color = get_option('sm_table_body_background_color');
	$sm_ordertable_background_color=get_option('sm_ordertable_background_color');
	$swcm_template_body_background_color=get_option('swcm_template_body_background_color');
	if(!isset($order_details))
	 	  $order_details="";
$order_details .= '
<div  > <div id="order_details" style="background-color:#'.$sm_ordertable_background_color.'; font-family:'.$sm_template_font_family.'; position:relative; " class="dragelementshowsmenu  edit_hover_class order_number" >
<div style="line-height:1.3em;color:#<?php echo $sm_template_font_color; ?>;
font-family:"Poppins", sans-serif;">

</div> 
<tr style="background:#'.$sm_ordertable_background_color.';"> 
<td>     
<h1 style="font-size: larger;font-weight: bolder;padding-left: 11%; margin-top:0; padding-top:20px; color:black; background-color:#'.$sm_ordertable_background_color.'; ">Order No: #'.$order_no .' 
</h1>
<div id="sm_ordertable" style="background-color:#'.$sm_ordertable_background_color.';font-family:'.$sm_template_font_family.';color:#'.$sm_template_font_color.'; padding:20px 30px;">

<table onclick="" id="ordertableedit" style="background:#'.$sm_table_body_background_color.';margin:auto; border: 1px solid #eee;border-top:1px solid #eee;border-bottom:1px solid #eee;border-left:1px solid #eee;border-right:1px solid #eee; width:100%; max-width:700px;" cellspacing="10" cellpadding="10" border="1" frame=hsides rules=rows>
        <thead>
        <tr style="text-align:left;border: 1px solid #eee;">
         <th id="swcm_table_color11" style="background:#' . $sm_table_header . ';color: #fff; text-transform: uppercase;font-size: 12px;color:black;padding: 12px;border-collapse: collapse;">';?> <?php $order_details .= esc_html__( 'Product' , WP_CONST_EMAIL_CUST_SLUG ); ?> <?php $order_details .='</th>
        <th width="20%" id="swcm_table_color21" style="background:#'. $sm_table_header .';color: #fff; text-transform: uppercase;font-size: 12px;color:black;text-align:right; padding: 12px;border-collapse: collapse;">';?><?php $order_details .= esc_html__( 'Quantity', WP_CONST_EMAIL_CUST_SLUG ); $order_details .= '</th>
        <th width="20%" id="swcm_table_color31" style="background:#'. $sm_table_header .';color: #fff; text-transform: uppercase;font-size: 12px;color:black; text-align:right;padding: 12px;border-collapse: collapse;">';?><?php $order_details .= esc_html__( 'Price', WP_CONST_EMAIL_CUST_SLUG ); $order_details .='</th>
                </tr>
        </thead>
                               
    <tbody id="swcm_template_font_color11" style="color:#'.$sm_template_font_color.';border: 1px solid #eee;padding: 12px 35px;border-collapse: collapse; font-family:inherit;">';?>

        <?php 
        $order_data = $order->get_data(); // The Order data

        foreach ($order->get_items() as $item_id => $item_data) {

        // Get an instance of corresponding the WC_Product object
        $product = $item_data->get_product();
        $product_name = $product->get_name(); // Get the product name

        $item_quantity = $item_data->get_quantity(); // Get the item quantity

        $item_total = $item_data->get_total(); // Get the item line total
        $order_details .='
        <tr class="order_item" style=""> 
        <td class="td" style="text-align:left; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">'.$product_name.'</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">'.$item_quantity.'</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">'. number_format( $item_total, 2 ).'</td> </tr>';
        }
        ?>
         <?php $order_details .='
     </tbody>
                                
    <tfoot id="swcm_template_font_color21" style="color:#'.$sm_template_font_color.';border: 1px solid #eee;border-top:1px solid #eee;padding: 12px 35px;border-collapse: collapse; font-size:16px;">';?> <?php if ( $totals = $order->get_order_item_totals() ) { $i = 0; foreach ( $totals as $total ) { $i++;?> <?php $order_details .= '
    <tr id="swcm_template_font_color31" style="color:inherit;border:none;outline:none; border-collapse: collapse;"> 

    <td colspan="2" id="swcm_template_font_color41" style="text-align:right;border:none; outline:none; font-size:inherit; font-weight:bold; color:inherit;">';?> <?php $order_details .= esc_html__($total['label'],WP_CONST_EMAIL_CUST_SLUG); $order_details .= '</th> 
    <td style="border:none; text-align:right; outline:none; font-size:inherit; color:inherit;">';?><?php $order_details .= $total['value'];$order_details .='</td></tr>';?> <?php } } $order_details .= '</tfoot>
                        ';?>

                        <?php do_action( 'woocommerce_email_after_order_table', $order, true, false ); 

                $order_details .= ' </div></div>
      
            <div>
        <?php do_action( "woocommerce_email_before_order_table", $order, true, false ); ?>
      </div>   
      
    </td>
  </tr>
</table></div>
';
 //print_r($order_details);
    return $order_details;
	}
	// helper function for getdetails function
	public function customer_table_fetch($orderno){

	$order = wc_get_order($orderno);

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
	$saddress = $order->get_address( 'shipping' );
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

$sm_cust_font_color =  get_option('sm_cust_font_color');
$sm_cust_body_background_color = get_option('sm_cust_body_background_color');
$sm_cust_font_family = get_option('sm_cust_font_family');

    if(!isset($customer_details))
      $customer_details="";
	$customer_details .= '
<div onclick="openappearanceblock()" id="customer_details" class="dragelementshowsmenu edit_hover_class order_number" style="position:relative;';

    $customer_details.='" >

    <div id="custdetailscol" style="padding:20px 50px; font-size:16px; font-family:'.$sm_cust_font_family.';color:#'.$sm_cust_font_color.';background-color:#'.$sm_cust_body_background_color.'">
    

     <h3 style="font-size:18px; color:#'.$sm_cust_font_color.'; font-weight:bolder; font-family:inherit; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;">';$customer_details .=  esc_html__("Customer Details",WP_CONST_EMAIL_CUST_SLUG); $customer_details .= '</h3>';?>

    <?php if ( isset($billing_email) ) : 
    $customer_details .= '<p> <div> <strong> '; $customer_details .= esc_html__( "Email",WP_CONST_EMAIL_CUST_SLUG); 
	  $customer_details .= ':</strong> '; $customer_details .=  $billing_email;
    $customer_details .= '</p>';?>
    <?php endif; ?>
	    <?php if (isset($billing_phone) ) :
	    $customer_details .= '<p><div><strong> ';
		$customer_details .= esc_html__( 'Telephone',WP_CONST_EMAIL_CUST_SLUG ); 
		$customer_details .= ':</strong> '; $customer_details .= $billing_phone; 
		$customer_details .= '</p> </div></div>';
	    endif; ?>

        <?php /*$customer_details .= wc_get_template( 'emails/email-addresses.php', array( 'order' => $order ) ); */

	if ( $order->get_formatted_billing_address() || $order->get_formatted_shipping_address() ) : 

    $customer_details .= '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="margin-top: 50px; font-size:16px;">
    <tr>
    <td width="25%" valign="top" style="  padding:20px 20px 20px 0px;">
	<p style="font-size:18px; font-weight:bolder; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;"><strong> ';  $customer_details .= esc_attr__("Billing address",WP_CONST_EMAIL_CUST_SLUG); 
				$customer_details .= ':</strong></p>
    <div style="border-style: solid;border:none; font-size:15px;">
      <p style="font-size:inherit;">  '; $customer_details .= $billing_first_name . $billing_last_name; $customer_details .= '</p> 
      <p style="font-size:inherit;"> '; $customer_details .= $billing_address_1; $customer_details.= ','; $customer_details .= $billing_address_2; $customer_details .= '</p>
      <p style="font-size:inherit;">'; $customer_details .= $billing_city; $customer_details.= '-'; $customer_details .= $billing_postcode; $customer_details .= '</p> 
      <p style="font-size:inherit;">'; $customer_details .= $billing_state; $customer_details.= ','; $customer_details .= $billing_country; $customer_details .= '</p> 
                                </div> <br>
	</td>';
        $customer_details .= '<td width="25%" valign="top" style="  padding:20px 0px 20px 20px;">
        <p style="font-size:18px; font-weight:bolder; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;"><strong> '; $customer_details .= esc_attr__("Shipping address",WP_CONST_EMAIL_CUST_SLUG); $customer_details .= ':</strong></p>

       <div style="border-style: solid;border:none; font-size:15px;">
       <p style="">  '; $customer_details .= $shipping_first_name . $shipping_last_name; $customer_details .= '</p>'; 
       if(!empty($shipping_address_1)) {  
        $customer_details.= '<p style="font-size:inherit;"> ';
       $customer_details .= $shipping_address_1; 
       $customer_details.= ','; 
       $customer_details .= $shipping_address_2; 
       $customer_details .= '</p>'; }
       if(!empty($shipping_city)) {
     $customer_details.=' <p style="font-size:inherit;">'; $customer_details .= $shipping_city; $customer_details.= '-'; $customer_details .= $shipping_postcode; $customer_details .= '</p>'; }
      if(!empty($shipping_state)) {
     $customer_details .= '<p style="font-size:inherit;">'; $customer_details .= $shipping_state; $customer_details.= ','; $customer_details .= $shipping_country; $customer_details .= '</p> '; }

                                
$customer_details .= '</div>                        
                </tr>
        </table></div> ';
 endif; 
                $customer_details .= ' </div> ';

		return $customer_details;
	}
}// class end

