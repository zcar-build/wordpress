<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
//Common Menu
                // $get_menu = new SWCM_customiser();
                // $get_menu->swcm_menubar();

//Email Status List Menu
//CONDITION 1 - List

if( isset($_REQUEST['page']) && !isset( $_REQUEST['status']) && !isset( $_REQUEST['action'] )) {

	if($_REQUEST['page'] == 'product-based' || isset($_REQUEST['mode']) && $_REQUEST['mode'] == 'product' ){
       	$mode='product';
	}else{
		$newtemplate = WP_CONST_EMAIL_CUST_PLUG_URL_PRO .'&action=addtemplate&mode=order';
	 	$inactive = WP_CONST_EMAIL_CUST_PLUG_URL_PRO .'&action=inactive&mode=order';
	 	$activepage=WP_CONST_EMAIL_CUST_PLUG_URL_PRO .'&mode=order';
	 	$mode='order';
	}
	   
 ?>
 <?php 
    // added edit icon in the list
    $swcm_upload_dir = wp_upload_dir();
    $destination_folder =  $swcm_upload_dir['baseurl'].'/'.WP_CONST_EMAIL_CUST_SLUG;
    $edit = $destination_folder.'/pencil.png'; 
    $delete = $destination_folder.'/delete.png';

    global $wpdb;
    global $name;
    // $result = $wpdb->get_results ( "select id,action_name,template_name,mail_after,mode,created_time,modified_time from wp_email_customiser_sm where status=3"); 
?> 

  <div class="email-customizer-pro">
   <div class="panel em-panel">
      <div class="panel-body em-body">
     <h4> Email Customizer</h4>
         <ul class="nav nav-tabs em em-tabs" role="tablist">
            <li  class="active"><a class="em-table-add-icon">Active Templates</a> </li>

            <li role="presentation"> <a class="em-table-add-icon">In-Active Templates</a> </li>

            <a class="em-table-add-icon"><button type="button" class="embtn embtn-primary embtn-circle">+</button></a>
            
         </ul>
         <input type="hidden" id="hiddenname" name="hiddenname" value="" />
         <!-- actual code start --> 
          <div class="table-responsive">
            <table class="table table-hover em-table">
              <thead>
                  <tr>
                     <th>Id</th>
                     <th>Action</th>
                     <th>Template</th>
                     <th>Status</th>
                     <th>Edit</th>
                     <th>Created Time</th>
                     <th>Modified Time</th>
                  </tr>
               </thead>
               <tbody>
               <tr style="cursor: pointer;background-color: #D7FEE4; font-weight: 500;">
                     <td>1</td>
                     <td>Product Delivered</td>
                     <td>Deliver Template</td>
                     <td>ON</td>
                     <td onclick='editpage("<?php echo 1;?>" , "<?php echo 'Product Delivered'; ?>","<?php echo $mode;?>")' style="cursor: pointer;"><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-success">FREE</span></td>
                  </tr>
                  <tr style="cursor: pointer; background-color: #D7FEE4; font-weight: 500;">
                     <td>2</td>
                     <td>New Account</td>
                     <td>New Account Template</td>
                     <td>ON</td>
                     <td onclick='editpage("<?php echo 2;?>" , "<?php echo 'New Account'; ?>","<?php echo $mode;?>")' style="cursor: pointer;"><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-success">FREE</span></td>
                  </tr>
                  <tr style="cursor: pointer;background-color: #D7FEE4; font-weight: 500;">
                     <td>3</td>
                     <td>Reset Password</td>
                     <td>Reset Password Template</td>
                     <td>ON</td>
                     <td onclick='editpage("<?php echo 3;?>" , "<?php echo 'Reset Password'; ?>","<?php echo $mode;?>")' style="cursor: pointer;"><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-success">FREE</span></td>
                  </tr>
                  <tr style="cursor: pointer;background-color: #D7FEE4; font-weight: 500;">
                     <td>4</td>
                     <td>Customer Note</td>
                     <td>Customer Note Template</td>
                     <td>ON</td>
                     <td onclick='editpage("<?php echo 4;?>" , "<?php echo 'Customer Note'; ?>","<?php echo $mode;?>")' style="cursor: pointer;"><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-success">FREE</span></td>
                  </tr>
                  <tr style="cursor: not-allowed;">
                     <td>5</td>
                     <td>New Order</td>
                     <td>New Order Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
                  
                  <tr style="cursor: not-allowed;">
                     <td>6</td>
                     <td>Failed Order</td>
                     <td>Fail Order Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
                  <tr style="cursor: not-allowed;">
                     <td>7</td>
                     <td>Cancelled Order</td>
                     <td>Cancel Order Template</tdstyle="cursor: pointer;">
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
                  <tr style="cursor: not-allowed;">
                     <td>8</td>
                     <td>Processing Order</td>
                     <td>Process Order Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
                  <tr style="cursor: not-allowed;">
                     <td>9</td>
                     <td>Compeleted Order</td>
                     <td>Complete Order Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
                  <tr style="cursor: not-allowed;">
                     <td>10</td>
                     <td>Refunded Order</td>
                     <td>Refund Order Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
                  <tr style="cursor: not-allowed;">
                     <td>11</td>
                     <td>Customer Invoice</td>
                     <td>Invoice Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>                                   
                  <tr style="cursor: not-allowed;">
                     <td>12</td>
                     <td>On Hold Order</td>
                     <td>Hold Order Template</td>
                     <td>OFF</td>
                     <td><img src="<?php echo $edit?>" width="25" height="25" border="0" ></td>
                     <td>2018-05-01</td>
                     <td>2018-05-01</td>
                     <td><span class="new badge badge-danger">PRO</span></td>
                  </tr>
               </tbody>
            </table>
			<!-- actual code end -->
         </div>
      </div>
   </div>
</div>
<?php }
else { 
  if( isset( $_REQUEST['page']) && isset( $_REQUEST['action']) && $_REQUEST['action'] == 'addtemplate' )
  {
}
//Email Status List Menu
//CONDITION 1 - List
if( isset( $_REQUEST['page']) && isset( $_REQUEST['action']) && $_REQUEST['action'] == 'newlist' ){

  	//deletedcode
  	?>
<?php } 
else { 
  if( isset( $_REQUEST['page']) && isset( $_REQUEST['action']) && $_REQUEST['action'] == 'templates' ){ 
 } } }
if(isset($_REQUEST['page']) && isset( $_REQUEST['action']) && $_REQUEST['action'] == 'inactive' )
{ } 
// END EMAIL template List // END ONE
else  // Action Edit or Preview
{
	if( isset( $_REQUEST['page']) && isset( $_REQUEST['status']) && $_REQUEST['action'] == 'Edit' ){ //Start Edit // Start TWO
?>
<!-- edit page              -->
<?php 
	$swcm_template_body_background_color = get_option('swcm_template_body_background_color'); 
	$swcm_upload_dir = wp_upload_dir();
	$destination_folder =  $swcm_upload_dir['baseurl'].'/'.WP_CONST_EMAIL_CUST_SLUG;
	global $name;
	$name=$_REQUEST['status']; // action_name
	$value=$_REQUEST['value'];// user template id.

    //print_r($name);    

	// code to check preview is saved in the option table
	$show = get_option('smpreview_'.$value);
	$mode= (isset($_REQUEST['mode'])) ? $_REQUEST['mode'] : '';
	
?>   <input type="hidden" id="hiddenname" name="hiddenname" value="<?php echo $name?>" />
	<div style="" class='edit-detail-heading email-customizer-pro'>
		<h4><i class="fa fa-opencart" aria-hidden="true"></i> 
		<?php echo esc_attr__($name, WP_CONST_EMAIL_CUST_SLUG) ?>
		</h4>
	</div>

	<?php if ($show==true) { ?>
	    <button type="button" style="font-size: 15px;font-family: 'Poppins';font-weight: 500;" onclick='previewcheck("<?php echo $name;?>" , "<?php echo $value; ?>","<?php echo $mode;?>")' class="btn btn-link">Use previous cache</button>
	<?php } ?>	    
	<?php $sm_template_background_color =get_option('sm_template_background_color');
		  $sm_template_background_image =get_option('sm_template_background_image');
	?>
<div onload="jsfunctionblock();" class='edit-detail-section' style="margin-top: 58px;">

	<?php if (get_option('sm_color')=='sm_color_checked') { ?>

	<div id="divbackclr" class='edit-template-section' style="overflow-y: auto !important;overflow-x:hidden;height:550px;float:left; background:#<?php echo $sm_template_background_color?>;">
		<?php } else { ?>
		<div  id="divbackclr" class='edit-template-section' style="overflow-y: auto !important;overflow-x:hidden;height:550px;float:left;background-image: url(<?php echo $sm_template_background_image?>);">
			<?php } ?>
		<div  id="trashCan" name="trashcan" style="float: left;width:100%;min-height: 450px;" >
		 	<?php
			global $wpdb;
			global $sta;
			$preavail = (isset($_REQUEST['preavail'])) ? $_REQUEST['preavail'] : '';
            $tempname = (isset($_REQUEST['tempname'])) ? $_REQUEST['tempname'] : '';
			$home = (isset($_REQUEST['home'])) ? $_REQUEST['home'] : '';

		 		if ($home == 'home') {   // edit from the active list
		 			
		 			if ($preavail =="preavail") {
		 				//print_r("preavail home"); echo "<br>";
		 			 	$print = get_option('smpreview_'.$value); 
						print_r(stripslashes($print));              
		 			}else{
		 				//print_r("else home"); echo "<br>";
		 				$print = get_option('sm_main_show_'.$value); 
						print_r(stripslashes($print));
		 			 }		 			 			
		 			
		  		}
		      elseif($tempname =="previewback"){
		      	//print_r("expression");
					$print = get_option('smpreview_'.$value); 
					print_r(stripslashes($print));
					
		        }elseif($home == 'add'){

		      
		       } // end if
		    
		       ?>  
		</div> 
		</div>       
		<div class="email-customizer-pro">
			<div class="em-sidebar-top-section" >
				<div class="col-md-3">
					<input type='button' class="embtn embtn-default"  name='ECW_Home_onEdit' id='ECW_Home_onEdit' value="<?php echo esc_attr__('<< Back',WP_CONST_EMAIL_CUST_SLUG);?>" onclick ="show_homepage('<?php echo $mode?>')" /> 
				</div>
				<div class="col-md-6 col-md-offset-3 pull-right" style="max-width: 240px;">
					<div class='col-md-6'>
					<!-- save the to the table to check image or color for background-->
						<input class="embtn embtn-primary" type="button" onclick="updatetable(<?php echo $value;?>)" value="Save" name="save_drag" id="save_drag"> 
					</div> 
					<div class="col-md-6"> 
						<input type='button' id="preview" class="embtn embtn-secondary" name='swcm_mail_type' value="<?php echo esc_attr__('Preview',WP_CONST_EMAIL_CUST_SLUG);?>" onclick='showpreviewupdatetable("<?php echo $name;?>" , "<?php echo $value?>","<?php echo $mode?>")' /> 
					</div> 
				</div>
        <div class="form-group col-md-12 mt10">            
            
            <div class="em-list-active-section col-md-4 col-md-offset-2 pr0 mt10 pull-right" style="max-width: 120px;">
              <label class="em-label text-right">Activate</label>
              <div class="material-switch pull-right">
                
                <input name="check" id="check" style="margin-left: 10px; margin-top: -5px;" onclick="activecheckbox()" checked="checked" type="checkbox" />
                <label for="check" class="label-success"></label>

              </div>
            </div>
          </div>
          
          <div class="form-group">
          	<div class="col-md-6 pr5 pull-right">
              <input class="btn-link pull-right" style="font-size: 15px;" value="Change Template Background" type="button" name="appear" id="appear" onclick="opentemplatedetails()">
            </div>
          </div>
			</div>
			<div style="" class='em-sidebar-section'>
				<hr>
				<ul class="em-sidebar">
					<li id="customer_details1" style="" class="good">
						<img src="<?php echo $destination_folder.'/customer-details.png'?>"/>
						<div class="sidebar-item-heading">Customer Details</div>
					</li>
					<li id="order_details1" style="" class="good">
						<img src="<?php echo $destination_folder.'/order-details.png'?>"/>
						<div class="sidebar-item-heading">Order Details</div>
					</li>
					<li id="hr_details1" class="good">
						<img src="<?php echo $destination_folder.'/divider.png'?>"/>
						<div class="sidebar-item-heading">Divider</div>
					</li>
					<li id="header_details" class="good">
						<img src="<?php echo $destination_folder.'/header.png'?>"/>
						<div class="sidebar-item-heading">Header</div>
					</li>
					<li id="maintext_details" class="good">
						<img src="<?php echo $destination_folder.'/text.png'?>" />
						<div class="sidebar-item-heading">Textarea</div>
					</li>
					<li id="button_details" class="good">
						<img src="<?php echo $destination_folder.'/button.png'?>" />
						<div class="sidebar-item-heading">Button</div>
					</li>
					<li id="disclaimer" class="good">
						<img src="<?php echo $destination_folder.'/disclaimer.png'?>" />
						<div class="sidebar-item-heading">Disclaimer</div>
					</li>
					<li id="regards12" class="good">
						<img src="<?php echo $destination_folder.'/regards.png'?>"/>
						<div class="sidebar-item-heading">Regards</div>
					</li>
					<li id="maindragtext" class="good">
						<img src="<?php echo $destination_folder.'/main-text.png'?>" />
						<div class="sidebar-item-heading">Maintext</div>
					</li>
					<li id="imageblockdrag" class="good">
						<img src="<?php echo $destination_folder.'/image.png'?>" />
						<div class="sidebar-item-heading">Image</div>
					</li>
					<li id="titleblockdrag" class="good">
						<img src="<?php echo $destination_folder.'/Title.png'?>" />
						<div class="sidebar-item-heading">Title</div>
					</li>
					<li id="socialblockdrag" class="good">
						<img src="<?php echo $destination_folder.'/share.png'?>"/>
						<div class="sidebar-item-heading">Social Links</div>
					</li>
					<li id="footerblockdrag" class="good">
						<img src="<?php echo $destination_folder.'/footer.png'?>"/>
						<div class="sidebar-item-heading">Footer</div>
					</li>
					<li id="signatureblockdrag" class="good">
						<img src="<?php echo $destination_folder.'/signhere.png'?>"/>
						<div class="sidebar-item-heading">Signature</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div><!-- end of edit page -->
	
<?php $status = $_REQUEST['value']?>
<?php $status1 = $_REQUEST['action']?>
<input hidden type="text" value='<?php echo $status1 ?>' id="stat1">
<input hidden type="text" value='<?php echo $status ?>' id="stat2">
<input hidden type="text" value='<?php echo get_option($status."_maintext"); ?>' id="maintext1">


<!-- Start of signature new -->
<div  id="signatureblockinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closesignatureblocknew()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Signature' ,WP_CONST_EMAIL_CUST_SLUG); ?></h4>
	<hr>
	<div class="em-form-section">
		<div class="form-group">
			<div class="appearance-option">
				<label style="color: #6b6b6f;">Signature Position</label>
				<div>
					<?php $sm_pos=get_option('sm_email_signature_image_pos');
					$hr_pos_ar = array( 'Left' ,'Center' ,'Right');?>
					<select class="form-control" id="sm_email_signature_image_pos" onchange="jssignature(this.id,this.value)">
						<?php
						foreach( $hr_pos_ar as $hr_pos ) { ?>
						<option value="<?php echo $hr_pos; ?>" <?php if( $hr_pos == $sm_pos ) {  echo "selected=selected";}?>> <?php echo $hr_pos; ?>
						</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>
		</div>
		<div class="form-group mt20">                
			<div class="eminputtext appearance-option">
			<label>Background Color</label>
			<input type="text" class="jscolor form-control" name='sm_email_signature_background_color' id='sm_email_signature_background_color' onchange="jssignature(this.name , this.value)" value="<?php echo get_option('sm_email_signature_background_color') ;?>" style="border-radius: 6px;width: 100%;">
			</div>
		</div>
		<div class="form-group">
			<div class="appearance-option">
				<label style="color: #6b6b6f;"><?php echo esc_attr__('Logo width' , WP_CONST_EMAIL_CUST_SLUG) ?></label>
				<div style="width:100%;">
					<input type='range'  min="1" max="150" class='slider' id='sm_email_signature_width'  name='sm_email_signature_width' style="width:100%;" onchange="jssignature(this.name , this.value , 'Preview' , this.getAttribute('data-tempname'))" data-tempname ="<?php echo $save_template_name = $_REQUEST['status']; ?>"  value="<?php echo get_option('sm_email_signature_width'); ?>"> 
				</div>
				<span id="svalwidth"><b>Value:</b><?php echo get_option('sm_email_signature_width'); ?></span> 
			</div>  
		</div>
		<div class="form-group">                      
			<div class="appearance-option">
				<label style="color: #6b6b6f;"><?php echo esc_attr__('Logo height' , WP_CONST_EMAIL_CUST_SLUG) ?></label>
				<div style="width:100%;">
					<input type='range'  min="1" max="150" class='slider' id='sm_email_signature_height' style="width:100%;"  onchange="jssignature(this.name , this.value , 'Preview' , this.getAttribute('data-tempname'))" name='sm_email_signature_height'  value="<?php echo get_option('sm_email_signature_height'); ?>">
				</div>    
				<span id="svalheight"><b>Value:</b><?php echo get_option('sm_email_signature_height'); ?></span> 
			</div>
		</div>
		<!-- ./ em form section -->
		<?php
			$swcm_upload_dir = wp_upload_dir(); 
			$swcm_sign_location =  $swcm_upload_dir['basedir'].'/'.WP_CONST_EMAIL_CUST_SLUG.'/swcm_sign.png';
			//print_r($swcm_sign_location);
			if(!file_exists($swcm_sign_location))
			{
			$swcm_sign_button = 'Sign Here';  
			}else {
			$swcm_sign_button = 'Update Your Signature';
			}
			?>
			<!-- <button type="button" class="embtn embtn-primary" data-toggle="modal" data-target="#mapping-modalbox" id="putsign" onclick="swcm_sign();"> -->
			
			<div class="form-group">
				<div class="appearance-option">
				<button type="button" class="embtn embtn-primary" data-toggle="modal" data-target="#mapping-modalbox">
				<?php echo $swcm_sign_button;?></button>
			<?php 
			$swcm_upload_dir = wp_upload_dir();
			$swcm_sign_location =  $swcm_upload_dir['basedir'].'/'.WP_CONST_EMAIL_CUST_SLUG.'/swcm_sign.png';
			$swcm_sign = $swcm_upload_dir['baseurl'].'/'.WP_CONST_EMAIL_CUST_SLUG.'/swcm_sign.png';
			$destination_folder =  $swcm_upload_dir['baseurl'].'/'.WP_CONST_EMAIL_CUST_SLUG;

			$error = $destination_folder.'/err.png';
			echo "<input type='hidden' id='swcm_signature_location' value='$swcm_sign' >";
			if(!file_exists($swcm_sign_location))
			{
			echo "<span><center> Signature Not Found</center> </span>";
			}
			else
			{ ?>
			<table style='width:100%; margin-top: 40px;'>
				<tr>
				<td style='width:100%;'>
					<img id="sign_img_show" src='<?php echo get_option('sm_email_cust_sign_url'); ?>' alt='Signature Not Found'>
					</td>
				<!-- <td>
				<img style='cursor:pointer;' src="<?php echo $error?>" title="Delete Signature" onclick='swcm_delete_sign("<?php echo $swcm_sign_location;?>")' />
				</td> -->
				</tr>
			</table>
			<?php }
			?>
			</div>
		</div>

	</div>   
</div>
<!-- end of signsture new block -->
<!-- Start of buttonblock -->
<div  id="buttonblockinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closebuttonblock()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Button' , WP_CONST_EMAIL_CUST_SLUG) ?> </h4>
		<div class="em-form-section">
			<div class="form-group">
				<div class="eminputtext appearance-option"> 
					<label>Button Link</label>
					<input type="text" class="form-control" onblur="mybutton(this.id,this.value)" name='swcm_button_link' id='swcm_button_link' value="<?php echo get_option('swcm_button_link'); ?>" >
				</div>
			</div>
			<!-- ./ form grp -->
			<div class="form-group"> 
				<div class="eminputtext appearance-option">
					<label>Text</label>
					<input type="text" class="form-control" oninput="mybutton(this.id)" name='swcm_button_text' id='swcm_button_text' value="<?php echo get_option('swcm_button_text'); ?>" >
				</div>
			</div>
			<!-- ./ form grp -->
			<div class="form-group">
				<div class="eminputtext appearance-option">
					<label>Button Color</label>
					<input class="jscolor form-control" onchange="mybutton(this.id,this.value)" name='swcm_button_color' id='swcm_button_color' value="<?php echo get_option('swcm_button_color'); ?>">
				</div>
			</div>
			<!-- ./ form grp -->
				<div class="form-group">
					<div class="appearance-option">
						<label><?php echo esc_attr__('Button Position:' , WP_CONST_EMAIL_CUST_SLUG) ?></label>
						<div>

						<?php $buttonposarr = array( 'Left' , 'Center' ,'Right');
					$buttonpos = get_option('buttonpos'); ?>
					<select class="form-control"  id="buttonpos" onchange="mybutton(this.id , this.value)" >
					<?php
					foreach( $buttonposarr as $dis_pos ) { ?>
					<option value="<?php echo $dis_pos; ?>" <?php if( $dis_pos == $buttonpos ) {  echo "selected=selected";}?>> <?php echo $dis_pos; ?>
					</option>
					<?php
					}
					?>
					</select> 
					</div>
				</div>
			</div>
			<!-- ./ form grp -->
			<div class="form-group">
				<div  class="eminputtext appearance-option">
					<label>Divider Background Color</label>
					<input class="jscolor form-control" type="text" name='sm_button_background_color' id='sm_button_background_color' onchange="mybutton(this.name , this.value)" value="<?php echo get_option('sm_button_background_color'); ?>" style="width: 100%;">
				</div>
			</div><!-- ./ em form section -->
	</div>
</div>
<!-- end of button block -->

<!-- start of header -->
<div  id="headerinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closeHeaderblock()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Header' ,WP_CONST_EMAIL_CUST_SLUG); ?></h4>
	<div class="em-form-section">
		<div class="form-group">
			<div class="appearance-option">
				<label style="color: #6b6b6f;">Header Image Position</label>
				<div>
					<?php $sm_position=get_option('sm_email_header_image_pos');
					$hr_pos_arr = array( 'Left' , 'Center' ,'Right');?>
					<select class="form-control" id="sm_email_header_image_pos" onchange="myHeader(this.id,this.value)">
						<?php
						foreach( $hr_pos_arr as $hr_pos ) { ?>
						<option value="<?php echo $hr_pos; ?>" <?php if( $hr_pos == $sm_position ) {  echo "selected=selected";}?>> <?php echo $hr_pos; ?>
						</option>
						<?php
						}
						?>
					</select>
				</div>
			</div>

		</div>  
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Logo</label>
				<input type="text" value="<?php echo get_option('sm_email_header_image_url'); ?>" name="header_image_url" id="header_image_url" class="regular-text form-control">
				<div class="col-md-6 p0 pt20">
					<input type="button" name="hr-upload-btn" id="hr-upload-btn" class="embtn embtn-default" value="Upload Image">
				</div>
				<div class="col-md-6 p0 pt20">
					<input type="button" name="sm_email_header_image_url" id="sm_email_header_image_url" value="Update" class="embtn embtn-primary" onclick="myHeader(this.name)">
				</div>
			</div>
		</div> 
		<div class="clearfix"></div>
		<div class="form-group mt20">                
			<div class="eminputtext appearance-option">
			<label>Background Color</label>
			<input type="text" class="jscolor form-control" name='sm_email_header_background_color' id='sm_email_header_background_color' onchange="myHeader(this.name , this.value)" value="<?php echo get_option('sm_email_header_background_color') ;?>" style="border-radius: 6px;width: 100%;">
			</div>
		</div>
		<div class="form-group">
			<div class="appearance-option">
				<label style="color: #6b6b6f;"><?php echo esc_attr__('Logo width' , WP_CONST_EMAIL_CUST_SLUG) ?></label>
				<div style="width:100%;">
					<input type='range'  min="1" max="150" class='slider' id='sm_email_header_width'  name='sm_email_header_width' style="width:100%;" onchange="myHeader(this.name , this.value , 'Preview' , this.getAttribute('data-tempname'))" data-tempname ="<?php echo $save_template_name = $_REQUEST['status']; ?>"  value="<?php echo get_option('sm_email_header_width'); ?>"> 
				</div>
				<span id="valwidth"><b>Value:</b><?php echo get_option('sm_email_header_width'); ?></span> 
			</div>  
		</div>
		<div class="form-group">                      
			<div class="appearance-option">
				<label style="color: #6b6b6f;"><?php echo esc_attr__('Logo height' , WP_CONST_EMAIL_CUST_SLUG) ?></label>
				<div style="width:100%;">
					<input type='range'  min="1" max="150" class='slider' id='sm_email_header_height' style="width:100%;"  onchange="myHeader(this.name , this.value , 'Preview' , this.getAttribute('data-tempname'))" name='sm_email_header_height'  value="<?php echo get_option('sm_email_header_height'); ?>">
				</div>    
				<span id="valheight"><b>Value:</b><?php echo get_option('sm_email_header_height'); ?></span> 
			</div>
		</div>
		<!-- ./ em form section -->
	</div>   
</div><!-- end of header -->
<!-- Start of Title -->
<div  id="titleinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closetitlearea()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Tittle Text' , WP_CONST_EMAIL_CUST_SLUG) ?> </h4>
	<hr>
	<div class="em-form-section popup-form-section" >
		<div class="form-group">
			<div class="appearance-option">
					<label>Text Position</label>
				<div>
					<?php $sm_title_text_pos=get_option('sm_title_text_pos');
						$txt_pos_arr = array( 'Left' , 'Center' ,'Right');?>
					<select class="form-control" id="sm_title_text_pos" onchange="title_details(this.id,this.value)" >
					<?php
						foreach( $txt_pos_arr as $tr_pos ) { ?>
						<option value="<?php echo $tr_pos; ?>" <?php if( $tr_pos == $sm_title_text_pos ) {  echo "selected=selected";}?>> <?php echo $tr_pos; ?>
						</option>
						<?php
						}
						?>
					</select> 
				</div>
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Header Text</label>     
				<input type="text" class="form-control" value= "<?php echo get_option('sm_title_text_text'); ?>" oninput="title_details(this.id)" id="sm_title_text_text" required>
			<!-- <span class="bar"></span> -->
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Text Color</label>
				<input class="jscolor form-control" name='sm_title_text_color' id='sm_title_text_color' onchange="title_details(this.name,this.value)" value="<?php echo get_option('sm_title_text_color') ;?>">
			<!-- <span class="bar"></span> -->
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Background Color</label>
				<input class="jscolor form-control" name='sm_title_text_bgcolor' id='sm_title_text_bgcolor' onchange="title_details(this.name , this.value)" value="<?php echo get_option('sm_title_text_bgcolor') ;?>">
			<!-- <span class="bar"></span> -->
			</div>
		</div>
	<!-- ./ form grp -->
	</div> 
</div>
<!-- End of Title -->
<?php // jQuery
// jQuery
wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
wp_enqueue_media(); ?>
<!-- start of template details -->
<div  id="templatedetails" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closetemplatedetails()" style="">&times;</a>

	<h4 class='popup-heading email-customizer-pro text-center'>  <?php echo esc_attr__('Template Appearance' , WP_CONST_EMAIL_CUST_SLUG); ?> </h4>
	<hr>
	<div class="em-form-section">
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<p class="mb20">Choose Background</p>
				<label  class="radio-inline">
				<input type="radio" name="type" class="mt0" value="Color">Color</label>
				<label  class="radio-inline">
				<input type="radio" name="type" class="mt0" value="Image">Image</label>
			</div>
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<div id="tempbgcolor" style="display: none">
					<label>Template Background Color</label>
					<input class="jscolor form-control" type="text" name='sm_template_background_color' id='sm_template_background_color' onchange="templatedatails(this.name , this.value)" value="<?php echo get_option('sm_template_background_color'); ?>" style="width: 100%;">    
				</div>
			</div>
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<div id="tempbgimage" style="display: none">
					<label>Template Background Image</label>
					<input type="text" name="image_url" value="<?php echo get_option('sm_template_background_image'); ?>" id="image_url" class="regular-text form-control mb20">
					<div class="col-md-6 pl0 pr0">
						<input type="button" name="upload-btn" id="upload-btn" class="embtn embtn-primary" value="Upload Image">
					</div>
					<div class="col-md-6 pl0 pr0">
						<input type="button" disabled="true" name="sm_template_background_image" id="sm_template_background_image" value="Save" class="button-secondary" onclick="templatedatails(this.id)">  
					</div>    
				</div>
			</div>
		</div>    
	</div>
	<!-- ./em form section -->
</div>
<!-- end of template details -->
<!-- Start of appearance -->
<div  id="appearanceinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closeappearanceblock()" style="">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'>  <?php echo esc_attr__('Customer Details Appearance' , WP_CONST_EMAIL_CUST_SLUG); ?> </h4>
	<hr>
	<div class="em-form-section">
		<div class="form-group ">
			<div class="appearance-option">
			<?php
			$swcm_template_font_family_arr = array('Arial','Comic Sans','Courier New','Georgia','Helvetica','Lucida','Tahoma','Times New Roman','Trebuchet MS','Verdana','Roboto','Open Sans');
			$swcm_template_font_family_option = get_option('sm_cust_font_family');
			?>
			<label for='sm_cust_font_family' class="template-popup-label"><?php echo esc_attr__('Font Family' , WP_CONST_EMAIL_CUST_SLUG );?></label>
			<select class='form-control' name='sm_cust_font_family' id='sm_cust_font_family' style="width: 100%;"  onchange="myAppearence(this.name , this.value )">
			<?php
			foreach( $swcm_template_font_family_arr as $font_family_val ) { ?>
			<option value="<?php echo $font_family_val; ?>" <?php if( $font_family_val == $swcm_template_font_family_option ) {  echo "selected=selected";}?>> <?php echo $font_family_val; ?></option>
			<?php
			}
			?>
			</select>
			</div>
		</div>

		<div class="form-group">
			<div  class="eminputtext appearance-option">
			<label>Customer Details Background Color</label>
			<input class="jscolor form-control" type="text" name='sm_cust_body_background_color' id='sm_cust_body_background_color' onchange="myAppearence(this.name , this.value)" value="<?php echo get_option('sm_cust_body_background_color'); ?>" style="width: 100%;">
			</div>
		</div>
		<div class="form-group">                   
			<div class="eminputtext appearance-option">
			<label>Customer Details Font Color</label>
			<input type="text" class="jscolor form-control" type="text" name='sm_cust_font_color' id='sm_cust_font_color'  onchange="myAppearence(this.name , this.value)" value="<?php echo get_option('sm_cust_font_color'); ?>" style="width: 90%;">
			</div>
		</div>
	</div>
<!-- ./em form section -->
</div> <!-- end of appearance -->
<!-- Start of order table appearance new--> 
<div  id="appearanceinputnew" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closeappearanceblocknew()" style="">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'>  <?php echo esc_attr__('Order Table Appearance' , WP_CONST_EMAIL_CUST_SLUG); ?> </h4>
	<hr>
	<div class="em-form-section">
		<div class="form-group ">
			<div class="appearance-option">
				<?php
				$swcm_template_font_family_arr = array('Arial','Comic Sans','Courier New','Georgia','Helvetica','Lucida','Tahoma','Times New Roman','Trebuchet MS','Verdana','Roboto','Open Sans');
				$swcm_template_font_family_option = get_option('sm_template_font_family');
				?>
				<label for='swcm_template_font_family' class="template-popup-label"><?php echo esc_attr__('Font Style' , WP_CONST_EMAIL_CUST_SLUG );?></label>
				<select class='form-control' name='sm_template_font_family' id='sm_template_font_family' style="width: 100%;"  onchange="ordertableappearence(this.name , this.value )">
					<?php
					foreach( $swcm_template_font_family_arr as $font_family_val ) { ?>
					<option value="<?php echo $font_family_val; ?>" <?php if( $font_family_val == $swcm_template_font_family_option ) {  echo "selected=selected";}?>> <?php echo $font_family_val; ?></option>
					<?php
					}
					?>
				</select> 
			</div>
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<label>Table Background Color</label>
				<input class="jscolor form-control" type="text" name='sm_table_body_background_color' id='sm_table_body_background_color' onchange="ordertableappearence(this.name , this.value)" value="<?php echo get_option('sm_table_body_background_color'); ?>" style="width: 100%;">
			</div>
		</div>
		<div class="form-group">                   
			<div class="eminputtext appearance-option">
				<label>Font Color</label>
				<input type="text" class="jscolor form-control" type="text" name='sm_template_font_color' id='sm_template_font_color'  onchange="ordertableappearence(this.name , this.value)" value="<?php echo get_option('sm_template_font_color'); ?>" style="width: 90%;">
			</div>
		</div>
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Header Color</label>
				<input type="text" class="jscolor form-control" type="text"  onchange="ordertableappearence(this.name , this.value )" name='sm_table_header' id='sm_table_header' value="<?php echo get_option('sm_table_header'); ?>" style="width: 90%;">
			</div> 
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<label>Background Color</label>
				<input class="jscolor form-control" type="text" name='sm_ordertable_background_color' id='sm_ordertable_background_color' onchange="ordertableappearence(this.name , this.value)" value="<?php echo get_option('sm_ordertable_background_color'); ?>" style="width: 100%;">
			</div>
		</div>
	</div>
<!-- ./em form section -->
</div> <!-- end of order table appreance-->                          
<!-- Start of hrblock -->
<div  id="hrblockinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closehrblock()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Divider.' , WP_CONST_EMAIL_CUST_SLUG) ?> </h4>
	<hr>
	<div class="em-form-section popup-form-section">
		<div class="form-group">
			<div class="appearance-option">
			<label> <?php echo esc_attr__('Divider width' , WP_CONST_EMAIL_CUST_SLUG) ?> </label>
			<input type="range" min="1" max="90" name="hrwidth" value= <?php echo get_option('hrwidth'); ?> onchange="myHr(this.name , this.value )"   class="slider" id="hrwidth" style="width:100%;">
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="appearance-option">
				<label><?php echo esc_attr__('Divider Height' , WP_CONST_EMAIL_CUST_SLUG) ?></label>
				<input type="range" min="1" max="100" name="hrheight" value= <?php echo get_option('hrheight'); ?> onchange="myHr(this.name , this.value )"   class="slider" id="hrheight" style="width:100%;"> 
			</div>
		</div>
		<!-- form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Divider Color</label>
				<input class="jscolor form-control" onchange="myHr(this.name , this.value )" name='swcm_hr_color' id='swcm_hr_color' value="<?php echo get_option('swcm_hr_color'); ?>">
			<!-- <span class="bar"></span> -->
			</div>
		</div>
		<!-- form grp -->
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<label>Divider Background Color</label>
				<input class="jscolor form-control" type="text" name='sm_divider_background_color' id='sm_divider_background_color' onchange="myHr(this.name , this.value)" value="<?php echo get_option('sm_divider_background_color'); ?>" style="width: 100%;">
			</div>
		</div>
	</div> 
</div>
<!-- end of hr block -->
<!-- Start of Maintext -->
<div style="float:right;" id="maintextinput" class="sidenav em-template-sidebar email-customizer-pro">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closemaintext()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Text' , WP_CONST_EMAIL_CUST_SLUG) ?>  </h4>
	<hr>            
	<div  class="eminputtext appearance-option">
		<label>Main text Background Color</label>
		<input class="jscolor form-control" type="text" name='sm_maintext_background_color' id='sm_maintext_background_color' onchange="myHr(this.name , this.value)" value="<?php echo get_option('sm_maintext_background_color'); ?>" style="width: 100%;">
	</div>
	<ul id="mysidenav20" class="em-template-popup">
		<li><a class="embtn embtn-default template-popup-content popupbtn-active" style="text-decoration: none;" onclick="openmaintextcontent()" >Content</a></li>
		<li><a class="embtn embtn-default template-popup-style" style="text-decoration: none;" onclick="openmaintextsubject()">Subject</a></li>
	</ul>
		<div id="maintextsubject" class="em-form-section popup-form-section" style="display:none;">
		<div class="form-group">
			<div class="appearance-option"> 
				<label for='swcm_email_order_subject'> <?php echo esc_attr__('Subject' , WP_CONST_EMAIL_CUST_SLUG);?>:</label>
				<?php $templatestat = $_REQUEST['value'];
				$templatestatus = get_option($templatestat.'_subject'); ?>
				<input hidden type="text" value='<?php echo $templatestat ?>' id="mainsubject1">
				<input type='text' class='form-control' oninput="mymainsubject(this.value)" id='swcm_email_order_subject' name='swcm_email_order_subject' placeholder='email subject' value="<?php echo $templatestatus ; ?>" />
			</div>
		</div>
		<!-- ./form grp -->
	</div>
	<div id="maintextcontent" class="em-form-section popup-form-section" style="display:none;">
		<?php echo template_variables() ; ?>
		<div class="form-group template-popup-select">
			<div class="appearance-option">
				<label for='swcm_order_main_text'><?php echo esc_attr__('Content',WP_CONST_EMAIL_CUST_SLUG);?>:</label>
				<?php
				$templatemain1 = $_REQUEST['status'];
				$templatemaindp = $templatemain1 .'_maintext' ;
				$templatemain = get_option($templatemaindp);
				if(!empty($templatemain)){
					$swcm_order_main_text = $templatemain ;
					$swcm_upload_dir = wp_upload_dir();
					$swcm_sign_location =  $swcm_upload_dir['basedir'].'/'.WP_CONST_EMAIL_CUST_SLUG.'/swcm_sign.png';
					if(file_exists($swcm_sign_location) && preg_match('/logo_sigclub/' , $swcm_order_main_text)) 
					{
					$swcm_order_main_text = str_replace('logo_sigclub' , 'swcm_sign' , $swcm_order_main_text);
					}
				}
				else {
				$swcm_order_main_text = '';
				}
				?>
				<div>
					<textarea  id='swcm_order_main_text' name='swcm_order_main_text' class='area' rows='5' cols='10' >  <?php echo $swcm_order_main_text ?>						
					</textarea>   
				</div> 
			</div>
		</div> 
	</div>
</div>
<div class="tooltip1"> 
	<div style="float:right;padding-bottom: 2%;margin-top: 30%;" id="main">
<!-- <span style="font-size:50px;cursor:pointer" onclick="openmaintext()"><i class="fa fa-buysellads" aria-hidden="true"></i> -->

	</div>
	<span class="tooltiptext1"><?php echo esc_attr__('Maintext' , WP_CONST_EMAIL_CUST_SLUG) ?></span>
</div>
<!-- End of maintext -->
<!-- Start of disclaimer -->
<div  id="disclaimerinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closedisclaimerblock()">&times;</a>

	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Disclaimer' , WP_CONST_EMAIL_CUST_SLUG) ?> </h4>
<hr>
	<div class="em-form-section popup-form-section" >
		<div class="form-group">
			<div class="appearance-option">
			<?php $disclaimer = get_option('swcm_email_disclaimer'); ?>
				<label>Text</label>
				<textarea id="disclamtxtarea" class="form-control" name="swcm_email_disclaimer" oninput="myDisclaimer(this.name , this.value)"><?php echo str_replace('<br>', "\n", $disclaimer); ?></textarea>  
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="appearance-option">
				<label>Disclaimer Position</label> 
				<div>
				<?php $disposarr = array( 'Left' , 'Center' ,'Right','Justify');
					$dispos = get_option('dispos'); ?>
					<select class="form-control"  id="dispos" onchange="myDisclaimer(this.id , this.value)" >
					<?php
					foreach( $disposarr as $dis_pos ) { ?>
					<option value="<?php echo $dis_pos; ?>" <?php if( $dis_pos == $dispos ) {  echo "selected=selected";}?>> <?php echo $dis_pos; ?>
					</option>
					<?php
					}
					?>
					</select> 

				</div>
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Font Color</label>
				<input class="jscolor form-control" onchange="myDisclaimer(this.name , this.value)" name='disclaimerfontcolor' id='disclaimerfontcolor' value="<?php echo get_option('disclaimerfontcolor'); ?>">
			<!-- <span class="bar"></span> -->
			</div>
		</div>
		<!-- ./form grp -->
		<!-- ./ form group -->
		<div class="form-group ">
			<div class="appearance-option">
				<?php
				$disclaim_arr = array('Arial','Comic Sans','Courier New','Georgia','Helvetica','Lucida','Tahoma','Times New Roman','Trebuchet MS','Verdana','Roboto','Open Sans');
				$sm_disclaim_font = get_option('sm_disclaim_font');
				?>
				<label for='sm_disclaim_font' class="template-popup-label"><?php echo esc_attr__('Font Style' , WP_CONST_EMAIL_CUST_SLUG );?></label>
				<select class='form-control' name='sm_disclaim_font' id='sm_disclaim_font' style="width: 100%;"  onchange="myDisclaimer(this.id , this.value )">
				<?php
				foreach( $disclaim_arr as $font_family_dis ) { ?>
					<option value="<?php echo $font_family_dis; ?>" <?php if( $font_family_dis == $sm_disclaim_font ) {  echo "selected=selected";}?>> <?php echo $font_family_dis; ?></option>
				<?php
				}
				?>
				</select> 
			</div>
		</div>
		<!-- ./ form group -->
		<div class="form-group ">
			<div class="appearance-option">
				<?php
				//The list contains font size in points 8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48 and 72
				$disclaim_font_size_arr = array( '8' , '9' ,'10' ,'11' ,'12' ,'14' ,'16' ,'18' ,'20' ,'22' ,'24' ,'26' ,'28' ,'36' ,'48' ,'72');
				$sm_disclaim_ftsize = get_option('sm_disclaim_ftsize');
				?>
				<label for='sm_txtarea_ftsize' class="template-popup-label"><?php echo esc_attr__('Font Size' , WP_CONST_EMAIL_CUST_SLUG );?></label>
				<select class='form-control' name='sm_disclaim_ftsize' id='sm_disclaim_ftsize' style="width: 100%;"  onchange="myDisclaimer(this.id , this.value )">
				<?php
				foreach( $disclaim_font_size_arr as $font_size_val ) { ?>
				<option value="<?php echo $font_size_val; ?>" <?php if( $font_size_val == $sm_disclaim_ftsize ) {  echo "selected=selected";}?>> <?php echo $font_size_val; ?>
				</option>
				<?php
				}
				?>
				</select> 
			</div>
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<label>Disclaimer Background Color</label>
				<input class="jscolor form-control" type="text" name='sm_disclaimer_background_color' id='sm_disclaimer_background_color' onchange="myDisclaimer(this.name , this.value)" value="<?php echo get_option('sm_disclaimer_background_color'); ?>" style="width: 100%;">
			</div>
		</div> 
		<div class="mt30 mb30"></div>
	</div>
</div>
<!-- end of disclaimer -->
<!-- Start of textarea -->
<div  id="textareainput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closetextarea()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Text Area' , WP_CONST_EMAIL_CUST_SLUG) ?> </h4>
	<hr>
	<div class="em-form-section popup-form-section" >
		<div class="form-group">
			<div class="appearance-option">
				<label>Enter text</label>
				<?php $textvalue = get_option('textblock');?>
				<textarea class="form-control" name="textvalue" oninput="textblock(this.id)" id="textblock"><?php echo str_replace('<br>', "\n", $textvalue); ?></textarea>
			</div>
		</div>
		<!-- ./ form group -->
		<div class="form-group">
			<div class="appearance-option">
				<label>Text Position</label> 
				<div>
					<?php $posarr = array( 'Left' , 'Center' ,'Right','Justify');
					$textpos = get_option('textpos'); ?>
					<select class="form-control"  id="textpos" onchange="textblock(this.id , this.value)" >
					<?php
					foreach( $posarr as $txt_pos ) { ?>
					<option value="<?php echo $txt_pos; ?>" <?php if( $txt_pos == $textpos ) {  echo "selected=selected";}?>> <?php echo $txt_pos; ?>
					</option>
					<?php
					}
					?>
					</select> 
				</div>
			</div>
		</div>
		<!-- ./form group -->
		<?php $textfontcolor = get_option('textfontcolor');?>
		<div class="form-group">
			<div class="eminputtext appearance-option">
			<label>Font Color</label>
			<input class="jscolor form-control" onchange="textblock(this.name , this.value)" name='textfontcolor' id='textfontcolor' value="<?php echo $textfontcolor;?>">
			<!-- <span class="bar"></span> -->
			</div>
		</div>
		<!-- ./ form group -->
		<div class="form-group ">
			<div class="appearance-option">
			<?php
			$swcm_template_font_family_arr = array('Arial','Comic Sans','Courier New','Georgia','Helvetica','Lucida','Tahoma','Times New Roman','Trebuchet MS','Verdana','Roboto','Open Sans');
			$sm_txtarea = get_option('sm_txtarea_font');
			?>
			<label for='sm_txtarea_font' class="template-popup-label"><?php echo esc_attr__('Font Style' , WP_CONST_EMAIL_CUST_SLUG );?></label>
			<select class='form-control' name='sm_txtarea_font' id='sm_txtarea_font' style="width: 100%;"  onchange="textblock(this.id , this.value )">
			<?php
			foreach( $swcm_template_font_family_arr as $font_family_val ) { ?>
			<option value="<?php echo $font_family_val; ?>" <?php if( $font_family_val == $sm_txtarea ) {  echo "selected=selected";}?>> <?php echo $font_family_val; ?></option>
			<?php
			}
			?>
			</select> 
			</div>
		</div>
		<!-- ./ form group -->
		<div class="form-group ">
			<div class="appearance-option">
			<?php
			//The list contains font size in points 8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48 and 72
			$swcm_template_font_size_arr = array( '8' , '9' ,'10' ,'11' ,'12' ,'14' ,'16' ,'18' ,'20' ,'22' ,'24' ,'26' ,'28' ,'36' ,'48' ,'72');
			$sm_txtarea_sz = get_option('sm_txtarea_ftsize');
			?>
			<label for='sm_txtarea_ftsize' class="template-popup-label"><?php echo esc_attr__('Font Size' , WP_CONST_EMAIL_CUST_SLUG );?></label>
			<select class='form-control' name='sm_txtarea_ftsize' id='sm_txtarea_ftsize' style="width: 100%;"  onchange="textblock(this.id , this.value )">
			<?php
			foreach( $swcm_template_font_size_arr as $font_size_val ) { ?>
			<option value="<?php echo $font_size_val; ?>" <?php if( $font_size_val == $sm_txtarea_sz ) {  echo "selected=selected";}?>> <?php echo $font_size_val; ?>
			</option>
			<?php
			}
			?>
			</select> 
			</div>
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
			<label>Text Area Background Color</label>
			<input class="jscolor form-control" type="text" name='sm_textarea_background_color' id='sm_textarea_background_color' onchange="textblock(this.name , this.value)" value="<?php echo get_option('sm_textarea_background_color'); ?>" style="width: 100%;">
			</div>
		</div>
		<div class="mt30 mb30"></div>
	</div>
</div>
<!-- end of textarea -->
<!-- Start of footertext -->
<div  id="footerinputtext" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closefootertext()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Footer.' , WP_CONST_EMAIL_CUST_SLUG) ?> </h4>
	<hr>
	<div class="em-form-section popup-form-section" >
		<div class="form-group">
			<div class="eminputtext appearance-option">  
				<label>Text</label>    
				<input type="text" class="form-control" value= "<?php echo get_option('sm_footer_txt1'); ?>" oninput="jsimagecaptionandfooter(this.id)" id="sm_footer_txt1" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Text Link</label>     
				<input type="text" class="form-control" value= "<?php echo get_option('sm_footer_link1'); ?>" onblur="myfooter(this.id , this.value)" id="sm_footer_link1" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<!-- ./form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Text</label>      
				<input type="text" class="form-control" value= "<?php echo get_option('sm_footer_txt2'); ?>" oninput="jsimagecaptionandfooter(this.id)" id="sm_footer_txt2" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Text Link</label>     
				<input type="text" class="form-control" value= "<?php echo get_option('sm_footer_link2'); ?>" onblur="myfooter(this.id , this.value)" id="sm_footer_link2" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Text</label>     
				<input type="text" class="form-control" value= "<?php echo get_option('sm_footer_txt3'); ?>" oninput="jsimagecaptionandfooter(this.id)" id="sm_footer_txt3" required>
			</div>
		</div>
		<!-- form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">  
				<label>Text Link</label>    
				<input type="text" class="form-control" value= "<?php echo get_option('sm_footer_link3'); ?>" oninput="onblur(this.id , this.value)" id="sm_footer_link3" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">       
			<div class="eminputtext appearance-option">
				<label>Text Color</label>
				<input class="jscolor form-control" name='sm_footer_text_color' id='sm_footer_text_color' onchange="myfooter(this.name , this.value)" value="<?php echo get_option('sm_footer_text_color') ;?>">
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">                 
			<div class="eminputtext appearance-option">
				<label>Background Color</label>
				<input class="jscolor form-control" name='sm_footer_back_color' id='sm_footer_back_color' onchange="myfooter(this.name,this.value)" value="<?php echo get_option('sm_footer_back_color') ;?>">
			</div>
		</div>
		<!-- ./ form grp -->
		<!-- ./ form grp -->
		<div class="clearfix"></div>
		<div class="mt30 mb30"></div>
		<!-- <div class="form-group">                 
			<div class="eminputtext appearance-option">
				<label></label>
				<input type="input">
			</div>
		</div> -->
	<!-- ./ form grp -->
	</div> 
</div>
<!-- end of footer -->
<!-- Start of imageblock -->
<div  id="imageblockinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closeimageblock()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Images' , WP_CONST_EMAIL_CUST_SLUG) ?></h4>
	<hr>
	<div class="em-form-section popup-form-section" >
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<label>Image Background Color</label>
				<input class="jscolor form-control" type="text" name='sm_image_bgcolor' id='sm_image_bgcolor' onchange="image(this.name , this.value)" value="<?php echo get_option('sm_image_bgcolor'); ?>" style="width: 100%;">
			</div>
		</div>
		<div class="form-group">
				<div class="eminputtext appearance-option">
					<label>Image Url</label>
					<input type="text" class="form-control" id="input_1" value="<?php echo get_option('sm_image_up_img1') ?>" />
				<div class="row mt20">
					<div class="col-md-6 pl20">
						<input type="button" class="upload-button embtn embtn-default" data-target="#input_1" value="Upload Image" />
					</div>				<!-- save button -->
					<div class="col-md-6 pr20">
						<input type="button" name="sm_image_up_img1" id="sm_image_up_img1" value="Update" class="embtn embtn-secondary" onclick="image(this.name)">
					</div>
				</div>			
			</div>
		</div>
		<!-- ./ from grp -->
		<div class="form-group">        
			<div class="eminputtext appearance-option">
				<label>Image Link</label>
				<input  type="text" class="form-control" id="imagelink1" name="imagelink1" value="<?php echo get_option('imagelink1'); ?>" onblur="image(this.name , this.value)">
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Image Caption</label>
				<input type="text" class="form-control" id="imagecaption1" name="imagecaption1" value="<?php echo get_option('imagecaption1'); ?>" oninput="jsimagecaptionandfooter(this.name)" >
			</div>
		</div>
		<!-- ./ form grp -->
		<hr>
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Image Url</label>
				<input type="text" id="input_2" class="form-control" value="<?php echo get_option('sm_image_up_img2') ?>" />
				<div class="row mt20">
					<div class="col-md-6 pl20">
						<input type="button" class="upload-button embtn embtn-default" data-target="#input_2" value="Upload Image" />
					</div>
					<div class="col-md-6 pr20">				<!-- save button -->
						<input type="button" name="sm_image_up_img2" id="sm_image_up_img2" value="Update" class="embtn embtn-secondary" onclick="image(this.name)">
					</div>
				</div>				
			</div>
		</div>
		<!-- form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Image Link</label>
				<input type="text" class="form-control" id="imagelink2" name="imagelink2" value="<?php echo get_option('imagelink2'); ?>" onblur="image(this.name , this.value)" >
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Image Caption</label>
				<input type="text" class="form-control" id="imagecaption2" name="imagecaption2" value="<?php echo get_option('imagecaption2'); ?>" oninput="jsimagecaptionandfooter(this.name)" >
			</div>
		</div>
		<!-- ./form grp -->
		<hr>		
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Image Url</label>
				<input type="text" id="input_3" class="form-control" value="<?php echo get_option('sm_image_up_img3') ?>" />

				<div class="row mt20">
					<div class="col-md-6 pl20">
						<input type="button" class="upload-button embtn embtn-default" data-target="#input_3" value="Upload Image" />
					</div>
					<div class="col-md-6 pr20">
					<!-- save button -->
						<input type="button" name="sm_image_up_img3" id="sm_image_up_img3" value="Update" class="embtn embtn-secondary" onclick="image(this.name)">
					</div>
				</div>				
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Image Link</label>
				<input type="text" class="form-control" id="imagelink3" name="imagelink3" value="<?php echo get_option('imagelink3'); ?>" onblur="image(this.name , this.value)">
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Image Caption</label>
				<input type="text" class="form-control" id="imagecaption3" name="imagecaption3" value="<?php echo get_option('imagecaption3'); ?>" oninput="jsimagecaptionandfooter(this.name)" >
			</div>
		</div>
		<div class="mb20"></div>	
		<!-- ./ form grp -->
	</div> 
</div>
<!-- end of imageblock -->


	<!-- Start of Regards -->
<div  id="regardsinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closeregards()">&times;</a>

	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Regards' , WP_CONST_EMAIL_CUST_SLUG) ?>  </h4>
	<hr><?php $regard_deta = get_option('swcm_email_regards');
	$regard_details = str_replace('<br>', "\n", $regard_deta);
	?>
		<div class="em-form-section"> 
		<div class="form-group"> 
			<div class="appearance-option">                                  
				<label>Text</label>
				<textarea   id="regards" class="form-control" oninput="myRegards(this.id)"> <?php echo $regard_details; ?> </textarea>
			</div>
		</div>
		<div class="form-group ">
			<div class="appearance-option">
				<?php
				//The list contains font size in points 8, 9, 10, 11, 12, 14, 16, 18, 20, 22, 24, 26, 28, 36, 48 and 72
				$sm_regards_font_size_arr = array( '8' , '9' ,'10' ,'11' ,'12' ,'14' ,'16' ,'18' ,'20' ,'22' ,'24' ,'26' ,'28' ,'36' ,'48' ,'72');
				$sm_regardsarea_sz = get_option('sm_regardsarea_ftsize');
				?>
				<label for='sm_regardsarea_ftsize' class="template-popup-label"><?php echo esc_attr__('Font Size' , WP_CONST_EMAIL_CUST_SLUG );?></label>
				<select class='form-control' name='sm_regardsarea_ftsize' id='sm_regardsarea_ftsize' style="width: 100%;"  onchange="myRegards(this.id , this.value )">
				<?php
				foreach( $sm_regards_font_size_arr as $font_size_val ) { ?>
				<option value="<?php echo $font_size_val; ?>" <?php if( $font_size_val == $sm_regardsarea_sz ) {  echo "selected=selected";}?>> <?php echo $font_size_val; ?>
				</option>sm_regardsarea_sz
				<?php
				}
				?>
				</select> 
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">
				<label>Font Color</label>
				<input class="jscolor form-control" onchange="myRegards(this.name , this.value)" name='regfontcolor' id='regfontcolor' value="<?php echo get_option('regfontcolor'); ?>">
			<!-- <span class="bar"></span> -->
			</div>
		</div><!--./ form grp -->
	</div><!-- ./em form section -->
</div>
<!-- end of regards -->
<!-- Start of Social Links -->
<div  id="socialkinksinput" class="sidenav em-template-sidebar">
	<a href="javascript:void(0)" class="pull-right template-popup-closebtn" onclick="closesocialblock()">&times;</a>
	<h4 class='popup-heading email-customizer-pro text-center'> <?php echo esc_attr__('Links' , WP_CONST_EMAIL_CUST_SLUG) ?></h4>
	<hr>  
	<input type="hidden" id="save_sts" value="<?php echo $save_template_name; ?>">
	<div class="em-form-section">
			<div class="form-group">
				<div class="appearance-option"> 
				<label>Icons position</label>
				<div>
					<?php $posarr = array( 'Left' , 'Center' ,'Right');
					$textpos = get_option('iconspos'); ?>
					<select class="form-control"  id="iconspos" onchange="myurls(this.id , this.value)" >
					<?php
					foreach( $posarr as $txt_pos ) { ?>
					<option value="<?php echo $txt_pos; ?>" <?php if( $txt_pos == $textpos ) {  echo "selected=selected";}?>> <?php echo $txt_pos; ?>
					</option>
					<?php
					}
					?>
					</select> 
				</div>
			</div>
		</div>
		<div class="form-group">
			<div  class="eminputtext appearance-option">
				<label>Link Background Color</label>
				<input class="jscolor form-control" type="text" name='sm_url_bgcolor' id='sm_url_bgcolor' onchange="myurls(this.name , this.value)" value="<?php echo get_option('sm_url_bgcolor'); ?>" style="width: 100%;">
			</div>
		</div>
		<!-- form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">  
				<label>Facebook Link</label>    
				<input type="text" class="form-control" id='swcm_facebook_uri' name='swcm_facebook_uri' placeholder='' oninput="myurls(this.name , this.value)" value="<?php echo get_option('facebook'); ?>" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option">  
				<label>Twitter Link</label>    
				<input type="text" class="form-control" id='swcm_twitter_uri' name='swcm_twitter_uri' placeholder='' oninput="myurls(this.name , this.value)" value="<?php echo get_option('twitter'); ?>" required>
			</div>
		</div>
		<!--./ form grp  -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Google+ Link</label>     
				<input type="text" class="form-control" id='swcm_google_plus_uri' name='swcm_google_plus_uri' placeholder='' oninput="myurls(this.name , this.value)" value="<?php echo get_option('googleplus'); ?>" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Linkedin Link</label>     
				<input type="text" class="form-control" id='swcm_linkedin_uri' name='swcm_linkedin_uri' placeholder='' oninput="myurls(this.name , this.value)" value="<?php echo get_option('linkedin'); ?>" required>
			</div>
		</div>
		<!-- ./form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Skype Link</label>     
				<input type="text" class="form-control" id='swcm_skype_uri' name='swcm_skype_uri' placeholder='' oninput="myurls(this.name , this.value)" value="<?php echo get_option('skype'); ?>" required>
			</div>
		</div>
		<!-- ./ form grp -->
		<div class="form-group">
			<div class="eminputtext appearance-option"> 
				<label>Youtube Link</label>     
				<input type="text" class="form-control" id='swcm_youtube_uri' name='swcm_youtube_uri' placeholder='' oninput="myurls(this.name , this.value)" value="<?php echo get_option('youtube'); ?>" required>
			</div>
		</div>
		<div class="mt30 mb30"></div>
		<!-- ./form grp -->
	</div><!-- ./ em form section -->

</div><!-- End of Social Links -->	
<?php
		
} // END Edit // END TWO
else if( isset( $_REQUEST['page']) && isset( $_REQUEST['status']) && isset( $_REQUEST['action']) && $_REQUEST['action'] == 'Preview' ){ 
// Start Preview // START THREE 
if(isset($_REQUEST['swcm_mail_type']))
{
	echo '<input type="hidden" id="SWCM_mail_type_yes" value="yes">';

	$value=$_REQUEST['value'];

	$template_option_name=$_REQUEST['status'];
	$mode= (isset($_REQUEST['mode'])) ? $_REQUEST['mode'] : '';
	

?>
<form name='swcm_send_test_mail_form' method='post' id='swcm_send_test_mail_form' action=''>
	<div class='template-preview-section'>
		<div style="" class='template-preview-heading email-customizer-pro'>  <h4>  <i class="fa fa-opencart" aria-hidden="true"></i> <?php echo esc_attr__($template_option_name ." - Preview" , WP_CONST_EMAIL_CUST_SLUG) ?></h4> 
		</div>
		<div class='clearfix'></div>
		<div class="col-md-12 template-preview">
		<?php $sm_template_background_color =get_option('sm_template_background_color');
		$sm_template_background_image =get_option('sm_template_background_image');?>
		<?php if (get_option('sm_color')=='sm_color_checked') { ?>
			<div class='col-md-8 col-md-offset-2' style="background:#<?php echo $sm_template_background_color?>;">
				<?php } else { ?>
				<div class='col-md-8 col-md-offset-2' style="background-image: url(<?php echo $sm_template_background_image?>);">
				<?php } ?>

					<div style="padding-bottom: 10px;padding-top: 10px; padding-right: 50px;padding-left: 50px;">
						<?php
						$val = get_option('smpreviewsend_'.$value);
						 echo $val = stripslashes($val);
						$_SESSION['template'] =  $val;  ?> 
					</div>
				</div>
			</div>
		</div>  
	</div> <!-- form inside div close -->
	<div class="clearfix"></div>
	<div class="preview-section" style="margin-top:10%;">
		<div class="email-customizer-pro">
			<div class='em-form-section'>
				<div class="form-group col-md-12 test-mail-section">
					<?php $back_link_option = sanitize_text_field($_REQUEST['ECW_from']);


					if( $back_link_option == 'Home' ) { ?>
					<div style="text-align:left;float:left;clear:right;margin-bottom:-3%;"><input type='button' class="embtn embtn-default"  name='SWCM_Home' id="button_back_home" value='<?php echo esc_attr__('<< Edit',WP_CONST_EMAIL_CUST_SLUG);?>' onclick='show_homepage();' >
					</div>
					<?php
					} else if( $back_link_option == 'Editor' ) {
					$fid="previewback";
					?>
					<div class='pull-left'> 
					<input type=hidden id ="fid" name=fid value="<?php echo $fid ?>">
					<input type="button" class="embtn embtn-default" id="button_back" name="" value="<< Back" onclick='show_edit_view("<?php echo $template_option_name;?>" , "<?php echo $value; ?>","<?php echo $mode; ?>");'>
					</div>
					<?php
					}
					?>
					<div class="col-md-4 col-md-offset-5">
						<input class="form-control" value="" placeholder="Enter email id" name="swcm_target_emailId" id="swcm_target_emailId" type="text">
					</div>
					<div class="">
						<input class="embtn embtn-primary" name="swcm_send_test_mail" value="Send Test Mail" id="swcm_send_test_mail" type="submit">
					</div>
				</div>
			</div>
		</div><!-- ./ email customizer pro -->
	</div><!-- ./ preview section -->
</form>
<div id="throbber" style="display:none;">
    <img src="http://gifimage.net/wp-content/uploads/2017/08/loading-animated-gif-1.gif" />
</div>
			<?php
		}
	} // End Preview // END THREE
}
// Send Test Mail
if(isset($_POST['swcm_send_test_mail']))
{
	global $woocommerce;
	//$email_to = $_POST['emailId'];
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

	$test_mail_to =  $_POST['swcm_target_emailId'];
	$testMail_subject = "Hi.. This is a test mail from Email Customizer Woocommerce Fre plugin";


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
	    		'. $_SESSION['template'] . '
	    	</td> 
	    	</tr> 
	    	</table> 
	    	</td> 
	    	</tr> 
	    	</table> 
    	</body> 
    	</html>';
	
	$mailer->send( $test_mail_to, $testMail_subject, $fullarray);
}

// Template Variables
function template_variables() {
  
	$template_variables =  '<div id = "variable_replacement_note" class="panel-collapse collapse in" style="margin-top:0%;">
                        <div class="panel-body" style="height:auto;">
                        <div class="form-group">
                                <h5><strong>';
	$template_variables .= esc_attr__('Drag and use the variables',WP_CONST_EMAIL_CUST_SLUG) ;

	$template_variables .='</strong></h5><br>
 
                        <div style="float: left;">
                                <span id = "{customer_name}" draggable="true" ondragstart="drag(event)"  style="font-size:12px;cursor:pointer;margin-left:2%;"> <i style="" class="fa fa-hand-grab-o fa-lg" aria-hidden="true"></i> customer_name </span>
                                <span id = "{order_no}" draggable = "true" ondragstart="drag(event)"  style="font-size:12px;cursor:pointer;margin-left:6%;"><i style="" class="fa fa-hand-grab-o fa-lg" aria-hidden="true"></i> order_no</span>
                                <span id = "{order_date}" draggable = "true" ondragstart = "drag(event)"  style="font-size:12px;cursor:pointer;margin-left:11%;"><i style="" class="fa fa-hand-grab-o fa-lg" aria-hidden="true"></i> order_date</span>
                                <span id = "{blog_name}" draggable = "true" ondragstart = "drag(event)" style="font-size:12px;cursor:pointer;margin-left:2%;"><i style="" class="fa fa-hand-grab-o fa-lg" aria-hidden="true"></i> blog_name</span>
                                <span id = "{user_name}" draggable = "true" ondragstart = "drag(event)" style="font-size:12px;cursor:pointer;margin-left:15%;"><i style="" class="fa fa-hand-grab-o fa-lg" aria-hidden="true"></i> user_name</span>
                                 
                        </div>
                       </div>
                        </div>
                </div>';
              
               
	return $template_variables;
}
?>
<div class="clearfix"></div>
<div style="font-size: 15px;text-align: center;padding-top: 20px" class="email-customizer-pro">Powered by <a href="https://www.smackcoders.com/?utm_source=wordpress&utm_medium=plugin&utm_campaign=premium_email_customizer" target="blank">Smackcoders</a>.
</div>

	<!-- Modal -->
						<div class="modal fade" id="mapping-modalbox" role="dialog" style="position: absolute; top: 100px; z-index: 1500;">
						<div class="modal-dialog" >
						<!-- Modal content-->
							<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" id="close_map_modal" data-dismiss="modal" onclick="swcm_close_popup()">&times;</button>
							<!-- <button type="button" class="close"  data-dismiss="modal" >&times;</button> -->
							<h4 class="modal-title" style="text-align:center; font-family: 'Poppins', sans-serif; font-size:18px;"> Draw Your Signature</h4>
							</div>
							<div class="modal-body">
								<div id="clear_contents">
									<p id='show_form_list'>
									<!-- Signature -->
									<div style='border: 1px solid red;'>
										<div id="signature">
									</div>
									</div>
									<!-- Signature Ends Here -->
									</p>							
								</div>
								<div class="modal-footer">
									<button type="button" id="clear" class="embtn embtn-default" data-clear="modal" style='float:left;'>Clear</button>
									<input type="button" class="embtn embtn-primary" name="map_crm_fields" value="submit" id="map_fields" style='float:right;'>
									<button type="button" id="swcm_close" class="btn btn-primary" style='display:none;float:right;' onclick='swcm_close_popup();' >Close</button>
								</div>
								</div>
							</div>
						</div>
					</div>




<!-- Modal -->
<div class="modal fade" id="smack_modal" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<h2 style='text-align:center;color:green; font-family: "Poppins";'>Successfully Saved </h2>
			</div>
		</div>
	</div>
	<?php
	return false;
	?>
</div>



<!-- <head>
				<meta charset="utf-8">
			</head>
			<body> -->
				
					<!-- Trigger the modal with a button -->
				
				
<!-- 			</body> -->



