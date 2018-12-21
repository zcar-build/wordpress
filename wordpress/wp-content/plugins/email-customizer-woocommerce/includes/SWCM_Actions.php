<?php

class SWCM_Actions{

	//Activation

public static function SWCM_template_info_table()
{
    $deprecated = null;
        $autoload = 'no';
        update_option( 'wordpress_email_customizer_pro_version' , WP_CONST_EMAIL_CUST_VERSION );
        //update_option('','',$deprecated,$autoload);
        // template backbround color
        update_option('sm_template_background_color','EEF0FF',$deprecated,$autoload);

        //header properties.  
        update_option( 'sm_email_header_image_url','http://volumeone.org/themes/buylocal/images/your_logo_here.png',$deprecated,$autoload);
        update_option('swcm_email_header_height','53',$deprecated,$autoload);
        update_option('sm_email_header_width','80',$deprecated,$autoload);
        update_option('sm_email_header_image_pos','center',$deprecated,$autoload);
        update_option('sm_email_header_background_color','2B45AD',$deprecated,$autoload);
        // tittle text..
        update_option('sm_title_text_pos','center',$deprecated,$autoload);
        update_option('sm_title_text_bgcolor','F5F7F8',$deprecated,$autoload);
        update_option('sm_title_text_text','Your order is on the way.',$deprecated,$autoload);
        update_option('sm_title_text_color','2B45AD',$deprecated,$autoload);
        //button
        update_option('swcm_button_link','www.google.com',$deprecated,$autoload);
        update_option('swcm_button_text','TRACK YOUR ORDER',$deprecated,$autoload);
        update_option('swcm_button_color','2B45AD',$deprecated,$autoload);
        update_option('buttonpos','center',$deprecated,$autoload);
        update_option('sm_button_background_color','F5F7F8',$deprecated,$autoload);

        // text...
        update_option('textblock','Your product has been delivered.',$deprecated,$autoload);
        update_option('textpos','center',$deprecated,$autoload);
        update_option('textfontcolor','2B45AD',$deprecated,$autoload);
        update_option('sm_txtarea_font','Arial, Helvetica, sans-serif',$deprecated,$autoload);
        update_option('sm_txtarea_ftsize','20',$deprecated,$autoload);
        update_option('sm_textarea_background_color','F5F7F8',$deprecated,$autoload);

        // customer details;
        update_option('sm_cust_font_family','Arial, Helvetica, sans-serif',$deprecated,$autoload);
        update_option('sm_cust_font_color','2B45AD',$deprecated,$autoload);
        update_option('sm_cust_body_background_color','F5F7F8',$deprecated,$autoload);

        //order details
        update_option('sm_template_font_family','Arial, Helvetica, sans-serif',$deprecated,$autoload);
        update_option('sm_template_font_color','2B45AD',$deprecated,$autoload);
        update_option('sm_table_header','547CFF',$deprecated,$autoload);
        update_option('sm_table_body_background_color','D7D9FF',$deprecated,$autoload);
        update_option('sm_ordertable_background_color','F5F7F8',$deprecated,$autoload);
        //footer.
        update_option('sm_footer_back_color','2B45AD',$deprecated,$autoload);
        update_option('sm_footer_text_color','FFFFFF',$deprecated,$autoload);
        update_option('sm_footer_link1','www.google.com',$deprecated,$autoload);
        update_option('sm_footer_link2','www.google.com',$deprecated,$autoload);
        update_option('sm_footer_link3','www.google.com',$deprecated,$autoload);
        update_option('sm_footer_txt1','Home',$deprecated,$autoload);
        update_option('sm_footer_txt2','Track',$deprecated,$autoload);
        update_option('sm_footer_txt3','Support',$deprecated,$autoload);


        
      update_option('sm_main_send_1','<div id="headerbackclr" class="dragelementshowsmenu edit_hover_class" onclick="openheaderblock()" style="text-align:center; vertical-align:middle;padding-bottom:0px;overflow: hidden; position: relative; background-color:#2B45AD;">

          

        <p style="overflow: hidden;padding: 20px 50px; margin:0;"><img style="padding-left:2%;padding-right:2%;" id="headerimg2" src="http://volumeone.org/themes/buylocal/images/your_logo_here.png" alt="" ;="" width="80" height="42" align="middle"></p>        </div>
        

   
                           
                        
      <div> <div id="order_details" style="background-color:#F5F7F8; font-family:Arial, Helvetica, sans-serif; position:relative; " class="dragelementshowsmenu  edit_hover_class order_number">{order_details}</div>
      
            <div>
        <!--?php do_action( "woocommerce_email_before_order_table", $order, true, false ); ?-->
      </div>   
      
    
  
</div>
       

    <div id="text_area_order" class="dragelementshowsmenu edit_hover_class" onclick="" style="background-color:#F5F7F8;">
     
        <table style="background-color:#F5F7F8; display: table;" width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
            <td id="textposition" align="center">
            <p onclick="textblock(this.id,this.name)" name="textblock1" id="textblock1" style="font-size:20px;font-family:Arial, Helvetica, sans-serif;color:#2B45AD; padding: 10px 50px;">Your product has been delivered.
            </p>
            </td>
            </tr>
        </tbody>
        </table>

    </div>
                
        
<div onclick="openappearanceblock()" id="customer_details" class="dragelementshowsmenu edit_hover_class order_number" style="position:relative;">{customer_details}</div> 
    
   <div id="footer" class="dragelementshowsmenu edit_hover_class" style="position: relative;">
     
    <table id="footerdisp" style="display: table; background:#2B45AD;;height: 65px;" width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td style="font-size: 13px;color: rgb(0, 0, 0); line-height: 22px; padding: 10px 50px; font-family: inherit;" align="left">
                <div style="text-align: center;">
                    <p>
                    <span id="check" style="color: #ffffff; font-size: 11pt;">
                    <span>
                    <a id="footertextonevalue" style="color:#FFFFFF" href="www.google.com">Home</a>
                    </span> | <span>
                    <a id="footertexttwovalue" style="color:#FFFFFF" href="www.google.com">Track                </a>
                    </span> | <span>
                    <a id="footertextthreevalue" style="color: #FFFFFF" href="www.google.com">Support           </a>
                    </span>
                    </span>
                    <br bogus="1">
                    </p>
                </div>
                </td>
            </tr>
        </tbody>
    </table> 
</div>',$deprecated,$autoload);
      update_option('sm_main_show_1','<div id="headerbackclr" class="dragelementshowsmenu edit_hover_class" onclick="openheaderblock()" style="text-align:center; vertical-align:middle;padding-bottom:0px;overflow: hidden; position: relative; background-color:#2B45AD;">

          <div id="showiconshead" class="dragelementshowicons"> <i onclick="openNav6();" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="headerbackclr1" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>
        </div>

        <p style="overflow: hidden;padding: 20px 50px; margin:0;"><img style="padding-left:2%;padding-right:2%;" id="headerimg2" src="http://volumeone.org/themes/buylocal/images/your_logo_here.png" alt="" ;="" width="80" height="42" align="middle"></p>        </div>
        

   
                           
                        
      <div> <div id="order_details" style="background-color:#F5F7F8; font-family:Arial, Helvetica, sans-serif; position:relative; " class="dragelementshowsmenu  edit_hover_class order_number">
<div style="line-height:1.3em;color:#<?php echo $sm_template_font_color; ?>;
font-family:" poppins",="" sans-serif;"="">
<div id="showicons" data-key="appearanceinputnew" class="dragelementshowicons"> 
<i onclick="openappearanceblocknew()" style="position:absolute: width:100%; height:100%; float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i>  <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="order_details" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
</div>
       </div> 
        
            
<h1 style="font-size: larger;font-weight: bolder;padding-left: 11%; margin-top:0; padding-top:20px; color:black; ">Order No: #62 </h1>


    <div id="sm_ordertable" style="font-family:Arial, Helvetica, sans-serif;color:#2B45AD; padding:20px 30px;">

       <table onclick="" id="ordertableedit" style="background:#D7D9FF;margin:auto; border: 1px solid #eee;border-top:1px solid #eee;border-bottom:1px solid #eee;border-left:1px solid #eee;border-right:1px solid #eee; width:100%; max-width:700px;" frame="hsides" rules="rows" cellspacing="10" cellpadding="10" border="1">
        <thead>
        <tr style="text-align:left;border: 1px solid #eee;">
         <th id="swcm_table_color11" style="background:#547CFF;color: #fff; text-transform: uppercase;font-size: 12px;color:black;padding: 12px;border-collapse: collapse;">Product</th>
        <th id="swcm_table_color21" style="background:#547CFF;color: #fff; text-transform: uppercase;font-size: 12px;color:black;text-align:right; padding: 12px;border-collapse: collapse;" width="20%">Quantity</th>
        <th id="swcm_table_color31" style="background:#547CFF;color: #fff; text-transform: uppercase;font-size: 12px;color:black; text-align:right;padding: 12px;border-collapse: collapse;" width="20%">Price</th>
                </tr>
        </thead>
                               
    <tbody id="swcm_template_font_color11" style="color:#2B45AD;border: 1px solid #eee;padding: 12px 35px;border-collapse: collapse; font-family:inherit;">
        <tr class="order_item" style=""> 
        <td class="td" style="text-align:left; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">Dualit Food XL1500 Processor</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">2</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">7,000.00</td> </tr>
        <tr class="order_item" style=""> 
        <td class="td" style="text-align:left; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">Eva Solo My Teapot</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">1</td> 
        <td class="td" style="text-align:right; padding:20px 10px; font-size:15px; border:none; border-bottom:1px solid #eee; color:inherit; vertical-align:middle; font-family: inherit;">300.00</td> </tr>
     </tbody>
                                
    <tfoot id="swcm_template_font_color21" style="color:#2B45AD;border: 1px solid #eee;border-top:1px solid #eee;padding: 12px 35px;border-collapse: collapse; font-size:16px;">
    <tr id="swcm_template_font_color31" style="color:inherit;border:none;outline:none; border-collapse: collapse;"> 

    <td colspan="2" id="swcm_template_font_color41" style="text-align:right;border:none; outline:none; font-size:inherit; font-weight:bold; color:inherit;">Subtotal: 
    </td><td style="border:none; text-align:right; outline:none; font-size:inherit; color:inherit;"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>7,300.00</span></td></tr>
    <tr id="swcm_template_font_color31" style="color:inherit;border:none;outline:none; border-collapse: collapse;"> 

    <td colspan="2" id="swcm_template_font_color41" style="text-align:right;border:none; outline:none; font-size:inherit; font-weight:bold; color:inherit;">Payment method: 
    </td><td style="border:none; text-align:right; outline:none; font-size:inherit; color:inherit;">Cash on delivery</td></tr>
    <tr id="swcm_template_font_color31" style="color:inherit;border:none;outline:none; border-collapse: collapse;"> 

    <td colspan="2" id="swcm_template_font_color41" style="text-align:right;border:none; outline:none; font-size:inherit; font-weight:bold; color:inherit;">Total: 
    </td><td style="border:none; text-align:right; outline:none; font-size:inherit; color:inherit;"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">₹</span>7,300.00</span></td></tr></tfoot>
                        </table> </div></div>
      
            <div>
        <!--?php do_action( "woocommerce_email_before_order_table", $order, true, false ); ?-->
      </div>   
      
    
  
</div>
       

    <div id="text_area_order" class="dragelementshowsmenu edit_hover_class" onclick="" style="background-color:#F5F7F8;">
    <div id="showiconstxt" class="dragelementshowicons"> 
    <i onclick="opentextarea()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i id="text_area_order" style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>
        </div> 
        <table style="background-color:#F5F7F8; display: table;" width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
            <td id="textposition" align="center">
            <p onclick="textblock(this.id,this.name)" name="textblock1" id="textblock1" style="font-size:20px;font-family:Arial, Helvetica, sans-serif;color:#2B45AD; padding: 10px 50px;">Your product has been delivered.
            </p>
            </td>
            </tr>
        </tbody>
        </table>

    </div>
                
        
<div onclick="openappearanceblock()" id="customer_details" class="dragelementshowsmenu edit_hover_class order_number" style="position:relative;"> <div id="showicons1" class="dragelementshowicons" style=" position:absolute; width:100%; height:100%;"> <i onclick="openappearanceblock()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="customer_details" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i> 
    </div>

    <div id="custdetailscol" style="padding:20px 50px; font-size:16px; font-family:Arial, Helvetica, sans-serif;color:#2B45AD;background-color:#F5F7F8">
    

     <h3 style="font-size:18px; color:inherit; font-weight:bolder; font-family:inherit; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;">Customer Details</h3><p> </p><div style="text-align:center"> <strong> Email:</strong> theophilussimeons@smackcoders.com<p></p><p></p><div style="text-align:center"><strong> Telephone:</strong> +1 (415) 666-2978<p></p> </div></div><table style="margin-top: 10px; font-size:16px;" width="100%" cellspacing="0" cellpadding="0" border="0">
    <tbody><tr>
    <td style="  padding:20px 20px 20px 0px;" width="25%" valign="top">
    <p style="font-size:18px; font-weight:bolder; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;"><strong> Billing address:</strong></p>
    <div style="border-style: solid;border:none; font-size:15px;">
      <p style="font-size:inherit;">  JamesBond</p> 
      <p style="font-size:inherit;"> 1750 Prairie City Rd,,Suite 130 #717,</p>
      <p style="font-size:inherit;">Folsom,-CA 95630</p> 
      <p style="font-size:inherit;">CA,US</p> 
                                </div> 
    </td><td style="  padding:20px 0px 20px 20px;" width="25%" valign="top">
        <p style="font-size:18px; font-weight:bolder; padding-bottom: 10px;border-bottom: 1px solid #c5c5c5;"><strong> Shipping address:</strong></p>

       <div style="border-style: solid;border:none; font-size:15px;">
       <p style="">  JamesBond</p><p style="font-size:inherit;"> 1750 Prairie City Rd,,Suite 130 #717,</p> <p style="font-size:inherit;">Folsom,-CA 95630</p><p style="font-size:inherit;">CA,US</p> </div>                        
                </td></tr>
        </tbody></table></div>  </div> 
    
   <div id="footer" class="dragelementshowsmenu edit_hover_class" style="position: relative;">
    <div id="showiconsfooter" class="dragelementshowicons" style="position: absolute; width: 100%; height: 100%;">
    <i onclick="openfootertext()" style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" class="fa fa-pencil" aria-hidden="true"></i> <i style="float:left;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="sort" class="fa fa-arrows" aria-hidden="true"></i> <i style="float:right;color:#f9f3f3;font-size:x-large;background: #78ABC1;width: 5%;height: 37px;text-align: center;padding-top: 1%;" id="footer" class="fa fa-trash order_del" aria-hidden="true" onclick="mydel(this.id)"></i>
    </div> 
    <table id="footerdisp" style="display: table; background:#2B45AD;;height: 65px;" width="100%" align="center" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td style="font-size: 13px;color: rgb(0, 0, 0); line-height: 22px; padding: 10px 50px; font-family: inherit;" align="left">
                <div style="text-align: center;">
                    <p>
                    <span id="check" style="color: #ffffff; font-size: 11pt;">
                    <span>
                    <a id="footertextonevalue" style="color:#FFFFFF" href="www.google.com">Home</a>
                    </span> | <span>
                    <a id="footertexttwovalue" style="color:#FFFFFF" href="www.google.com">Track                </a>
                    </span> | <span>
                    <a id="footertextthreevalue" style="color: #FFFFFF" href="www.google.com">Support           </a>
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
  
',$deprecated,$autoload);
}

public static function SWCM_delete_options()
{
        
}	

}

