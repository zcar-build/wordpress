jQuery(document).ready(function() {
jsfunctionblock();
		jQuery('#swcm_send_test_mail').click(function() {
        //jQuery.blockUI.defaults.message ="<img src='https://i.redd.it/ounq1mw5kdxy.gif'/><h4> Your Test Mail is sending..."; 
				jQuery.blockUI.defaults.message ="<h4> Your Test Mail is sending..."; 
				jQuery.blockUI({ overlayCSS: { backgroundColor: '' } });
                  
				//  $.blockUI({ message: '<img src="busy.gif"/> <h4> Email is Sending...</h4>' } ); 
				}); 
		jQuery('.collapse').on('shown.bs.collapse', function(){
				jQuery(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
				}).on('hidden.bs.collapse', function(){
					jQuery(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
					});
		//jQuery(".editor").jqte({height:'500px'});

		var SWCM_view = jQuery( "#SWCM_mail_type_yes" ).val();
		if( SWCM_view == "yes" )
		{
			jQuery("#SWCM_main_panel" ).hide();
			jQuery("#swcm_main_title" ).hide();
		}

var editor = CKEDITOR.replace( 'swcm_order_main_text', {
        height: 200,
	    } );
CKEDITOR.editorConfig = function( config )
{
   config.height = '700px';
   CKEDITOR.disableAutoInline = true;
};
editor.on('change',function(){
	var timeoutId;
    var editorText = CKEDITOR.instances['swcm_order_main_text'].getData();
    document.getElementById('maintextdrag1').innerHTML = editorText;
    clearTimeout(timeoutId);
    timeoutId = setTimeout(function() {
        // Runs 3 second (3000 ms) after the last change    
        mymaintext(editorText);
    }, 3000);
    $("#maintext1").val(editorText);

   });
// for choosing background image or color.
$(function() {
    $('input[name="type"]').on('click', function() {
        if ($(this).val() == 'Image') {
            $('#tempbgimage').show();
            $('#tempbgcolor').hide();
            var tmpname='sm_image';
            var data='sm_image_checked';
     
        }
        else {
            $('#tempbgcolor').show();
            $('#tempbgimage').hide();
            var tmpname='sm_color';
            var data='sm_color_checked';
        }
        // to save in options table.
        jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'sm_template_backcolo',
                    'swcm_backcolor' : data, //data
                    'swcm_appearname' : tmpname, //name
                },
                success:function(data)
                {
                 //window.location='admin.php?page=manage-email&status='+ status +'&action=Preview&swcm_mail_type='+status +'&ECW_from=Editor&save='+id;

                },
                error:function(errorThrown)
                {
                    console.log( errorThrown );
                }
        });

    });
});
// opening wp-media library to upload images for background image of template
$('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            //console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
            document.getElementById("sm_template_background_image").disabled = false;
        });
    });
// opening wp-media library to upload images for header image of template
$('#hr-upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            //console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            //$('#header_image_url').val(image_url);
            //document.getElementById("sm_email_header_image_url").disabled = false;
        });
    });


// code for image upload in for image drag start.
var mediaUploader;

            // we can now use a single class name to reference all upload buttons
            $('.wp-admin').on('click', '.upload-button', function(e) {

                e.preventDefault();                

                // store the element that was clicked for use later
                trigger = $(this);
               // alert(trigger[0]->input);
                //console.log(trigger);

                if( mediaUploader ){
                    mediaUploader.open();
                    return;
                }

                mediaUploader = wp.media.frames.file_frame = wp.media({
                    title: 'Upload', 
                    button: {
                        text: 'Upload'
                    },
                    multiple: false
                });

                mediaUploader.on('select', function() {

                    attachment = mediaUploader.state().get('selection').first().toJSON();

                    // we're replacing this line:
                    //$('#preview-fav, #preview-grav, #preview-thumb').val(attachment.url);

                    // assign the value of attachment to an input based on the data-target value
                    // of the button that was clicked to launch the media browser
                   // console.log(trigger.data('target'));
                    $(trigger.data('target')).val(attachment.url);
                    //alert(trigger.data('target'));
                    //$(trigger.data('target')).prop('disabled', false);

                    //$(".save_button1,.save_button2,.save_button3").prop('disabled', false);

                    //$('.favicon-preview, .gravatar-preview, .thumbnail-preview').css('background','url(' + attachment.url + ')');
                });

                mediaUploader.open();

            }); 
            // code for image upload in for image drag end.

//copied js from home page start
$(function () {             // code used
  $(".good").draggable({
    helper: 'clone',    
  });
$("#trashCan").droppable({
    activeClass:"ui-state-active",
    hoverClass: "rotate",
    accept:".good",
    placeholder:"drophere",
    drop: function(event,ui) {
    //console.log(id);      
      var id = ui.draggable.attr("id");     
      var stat = document.getElementById('stat1').value;
      //console.log(id);console.log(stat);
      mydragg(id , stat);
      }
});
$("#trashCan").sortable({
    activeClass:"ui-state-active",
    hoverClass: "rotate",
    accept:".good",    
	});
});

var stsval = document.getElementById('save_sts').value;
//mytempl('preview', stsval);
jQuery( ".mapping-modalbox" ).hide();     
//copied js from home page end
});
            jQuery(function() {
              jQuery('#signature').signature();
              jQuery('#signature').signature({thickness: 3});
              jQuery('#clear').click(function() {
              jQuery('#signature').signature('clear');
              });
                            

        jQuery('#map_fields').click(function() {

          var swcm_check_empty = jQuery('#signature').signature('isEmpty');
          if( swcm_check_empty == true )
          {
            alert('Please Provide signature');
          }
          else {
            // console.log(document.getElementById('signature'));
            // return;
          html2canvas([document.getElementById('signature')], {
              onrendered: function(canvas) {
               // console.log(canvas);

                 var data = canvas.toDataURL('image/png');
                  //console.log(data);

                  //return;          
            jQuery.ajax({
            type: 'POST',
            url : ajaxurl,
            data : {
                'action' : 'swcm_save_signature',
                'swcm_image' : data,
            },

            success:function(data)
            { //console.log(data);
              alert( 'Saved Successfully' );

              jQuery('#mapping-modalbox').hide();
              jQuery(".modal-backdrop").hide(); 

                 // console.log(data);
                // return;
              document.getElementById('signimage').src = data ;
              document.getElementById('sign_img_show').src = data ; 
              // jQuery('#clear').hide();  
              // jQuery('#signature').html(data);
              
              // jQuery('#map_fields').hide();
              // jQuery('#swcm_close').show();
              // //window.location.reload();


            },
            error:function(errorThrown)
            {
              console.log( errorThrown );
            }
          });

              }
            });

          } //End else

          });
        
            });

function jsfunctionblock(){
    
    var elem=document.getElementById("hiddenname").value;
    //console.log(elem);
    if (elem=='') {
        
    } else {

        if (elem=='Product Delivered' || elem=='Customer Note') {
        document.getElementById("order_details1").style.display = "block";
        document.getElementById("customer_details1").style.display = "block";
        } else {
            document.getElementById("order_details1").style.display = "none";
            document.getElementById("customer_details1").style.display = "none";
        }

    }
    

}           
function show_homepage(mode)   //to redirect to main page
{ if (mode=='product') {
        var dirpage='product-based';
    } else {

        var dirpage='manage-email';
    }
  	window.location='admin.php?page='+dirpage+'&mode='+mode;

}
 
function show_edit_view(status,id,mode) // working
{ if (mode=='product') {
        var dirpage='product-based';
    } else {

        var dirpage='manage-email';
    }
 
  var postId=document.getElementById("fid").value; // get preview value from page
  window.location='admin.php?page='+dirpage+'&status='+status+'&action=Edit&tempname='+postId+'&value='+id+'&mode='+mode;
}

function new_order()
{
	jQuery(window).scrollTop(0);
	jQuery( '#Edit_New_Order' ).trigger('click');

}


function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev , id ) {
    ev.dataTransfer.setData("text", ev.target.id);
    document.getElementById("swcm_new_order_heading").focus();
}

function swcm_delete_sign(image_location) {
	jQuery.ajax({
		type: 'POST',
		url : ajaxurl,
		data : {
                    'action' : 'swcm_delete_signature',
                    'swcm_location' : image_location,
                },

        	success:function(data)
                {
                        alert( 'Deleted Successfully' );
			             //window.location.reload();
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function mynoimages(id)
{
if (document.getElementById('checkimg1').checked) {
  var radio_value = document.getElementById('checkimg1').value;
}
if (document.getElementById('checkimg2').checked) {
  var radio_value = document.getElementById('checkimg2').value;
}
if (document.getElementById('checkimg3').checked) {
  var radio_value = document.getElementById('checkimg3').value;
}
  //alert(radio_value);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_radioimg',
                    'swcm_radioimg' : radio_value,
                },
                success:function(data)
                {
                  //alert(data);    
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}
function mytemplate()
{
      var e = document.getElementById("droptemp");
var template = e.options[e.selectedIndex].value;
//alert(template);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_templatetype',
                    'swcm_template' : template,
                },
                success:function(data)
                {
                  //alert(data);    
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}
function mymaintext(editorText){
   var stat = document.getElementById('stat1').value;
   var id = document.getElementById('stat2').value;
   //var text = document.getElementById('swcm_order_main_text').value;
   //alert(stat);
   jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_maintext',
                    'swcm_maintext' : editorText,
                    'swcm_stat' : stat,
                    'id' : id,
                },
                success:function(data)
                {
                    //alert(data);
                   
                     
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}
function mymainsubject(value){
   var statsub = document.getElementById('mainsubject1').value;
   
   //console.log(statsub);
   //console.log(value);
   jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_mainsubject',
                    'swcm_mainsubject' : value,
                    'swcm_statsub' : statsub,
                },
                success:function(data)
                {
                    //console.log(data);
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function jsimagecaptionandfooter(name){
     var timeoutId;
    if (name=='imagecaption1') {
        value = document.getElementById('imagecaption1').value; 
        document.getElementById('imgcap1').innerHTML= value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
         timeoutId = setTimeout(function() {
            // Runs 3 second (3000 ms) after the last change    
            saveToDB(name,val);
        }, 3000); 

    }else if (name=='imagecaption2') {
        value = document.getElementById('imagecaption2').value; 
        document.getElementById('imgcap2').innerHTML= value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
         timeoutId = setTimeout(function() {
            // Runs 3 second (3000 ms) after the last change    
            saveToDB(name,val);
        }, 3000); 

    }else if (name=='imagecaption3') {
        value = document.getElementById('imagecaption3').value; 
        document.getElementById('imgcap3').innerHTML= value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
         timeoutId = setTimeout(function() {
            // Runs 3 second (3000 ms) after the last change    
            saveToDB(name,val);
        }, 3000); 

    }else if (name =='sm_footer_txt1') {
        value = document.getElementById('sm_footer_txt1').value; 
        document.getElementById('footertextonevalue').innerHTML= value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
         timeoutId = setTimeout(function() {
            // Runs 3 second (3000 ms) after the last change    
            saveToDB(name,val);
        }, 3000); 

    }else if (name =='sm_footer_txt2') {
        value = document.getElementById('sm_footer_txt2').value; 
        document.getElementById('footertexttwovalue').innerHTML= value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
         timeoutId = setTimeout(function() {
            // Runs 3 second (3000 ms) after the last change    
            saveToDB(name,val);
        }, 3000); 

    }else if (name =='sm_footer_txt3') {
        value = document.getElementById('sm_footer_txt3').value; 
        document.getElementById('footertextthreevalue').innerHTML= value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
         timeoutId = setTimeout(function() {
            // Runs 3 second (3000 ms) after the last change    
            saveToDB(name,val);
        }, 3000); 

    }

}

function myfooter(name,value)                      // working code
{
   //alert(value);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_footer',
                    'swcm_footername' : name,
                    'swcm_footervalue' : value,
                },
            success:function(data)
                { // alert(name);
                   //alert(data);
                   
                  if (name == 'sm_footer_link1') {
                    document.getElementById('footertexttwovalue').href = data;

                  }if (name == 'sm_footer_link2') {
                    document.getElementById('footertexttwovalue').href = data;

                  }if (name == 'sm_footer_link3') {
                    document.getElementById('footertextthreevalue').href = data;

                  }
                  if (name == 'sm_footer_back_color') {
                    document.getElementById('footerdisp').style.background ='#'+ data;

                  }
                  if (name == 'sm_footer_text_color') {
                    document.getElementById('footertextonevalue').style.color ='#'+ data;
                    document.getElementById('footertexttwovalue').style.color ='#'+ data;
                    document.getElementById('footertextthreevalue').style.color ='#'+ data;

                  }

                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function image(name ,value){
    console.log(name); console.log(value);
    if (name =='sm_image_up_img1') {
    value = document.getElementById('input_1').value;    
    }
    if (name =='sm_image_up_img2') {
    value = document.getElementById('input_2').value;    
    }
    if (name =='sm_image_up_img3') {
    value = document.getElementById('input_3').value;    
    }
       
     jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_imageblock',
                    'swcm_imagename' : name,
                    'swcm_imageurl' : value,
                },
                success:function(data)
                {
                    //alert(data);
                  if (name == 'sm_image_bgcolor') {
                    document.getElementById('image_bgcolor').style.background = '#'+data;
                  }
                  if (name == 'sm_image_up_img1') {
                    document.getElementById('image1').src= data;
                  }
                  if (name == 'sm_image_up_img2') {
                    document.getElementById('image2').src= data;
                  }
                  if (name == 'sm_image_up_img3') {
                    document.getElementById('image3').src= data;
                  }
                  if (name == 'imagelink1') {
                    document.getElementById('imglink1').href= data;
                  }
                  if (name == 'imagelink2') {
                    document.getElementById('imglink2').href= data;
                  }
                  if (name == 'imagelink3') {
                    document.getElementById('imglink3').href= data;
                  }
                  // document.getElementById('trashCan').innerHTML= data;    
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}


function myalert(){
  document.getElementById('editInline').style.display = 'none' ;
}
function mydragg(id,stat){
    //alert(id);
    //alert(stat);
    //console.log(id); console.log(stat);
   jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_show_drag',
                    'swcm_id' : id,
                    'swcm_status' : stat,
                },
                success:function(data)
                {
                  //alert(data);
                  var dragval = document.getElementById('trashCan').innerHTML ;
                  //alert(dragval);
                  document.getElementById('trashCan').innerHTML = data + dragval;
                  
                },
                error:function(errorThrown)
               {
                        console.log( errorThrown );
                }
        });
}

function myicons(preview , temptype)
{
      // var icon = document.getElementById("icons").value;
if (document.getElementById('icon1').checked) {
  var icon = document.getElementById('icon1').value;
}
if (document.getElementById('icon2').checked) {
   icon = document.getElementById('icon2').value;
}


    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_icontype',
                    'swcm_icon' : icon,
                },
                success:function(data)
                {
                  //alert(data);
                  

                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function mydel(id) {
  if(id == 'order_details'){
 $("#order_details").remove();
}
if(id == 'customer_details'){
 $("#customer_details").remove();
}
if(id == 'hr_details'){
 $("#hr_details").remove();
}
if(id == 'headerbackclr1'){
 $("#headerbackclr").remove();
}
if(id == 'text_area_order'){
 $("#text_area_order").remove();
}
if(id == 'button_block_order'){
 $("#button_block_order").remove();
}
if(id == 'signature_block_order'){
 $("#signature_block_order").remove();
}
if(id == 'disclaimer_order'){
 $("#disclaimer_order").remove();
}
if(id == 'regards_order'){
 $("#regards_order").remove();
}
  if(id == 'image_order'){
 $("#image_order").remove();
}
if(id == 'maintext_order'){
 $("#maintext_order").remove();
}
if(id == 'header_text'){
 $("#header_text").remove();
}
if(id == 'socil'){
 $("#socil").remove();
}
if(id == 'footer'){
 $("#footer").remove();
}

}
//Start of Regards in Order based Template
function myRegards(name,value)
{	
	//console.log(name);
	var timeoutId;
	if (name == 'regards') {

	var reg = document.getElementById('regards').value;
	document.getElementById('regards1').innerHTML= reg;
	value = reg.replace(/(\r\n|\n|\r)/gm, '<br>');
	clearTimeout(timeoutId);
    	timeoutId = setTimeout(function() {
        // Runs 3 second (3000 ms) after the last change    
        saveToDB(name,value);
    	}, 3000);
	}else{
		reg = value;
	}   

	jQuery.ajax({
		type: 'POST',
		url : ajaxurl,
		data : {
                    'action' : 'swcm_save_regards',
                    'swcm_location' : reg,
                    'swcm_name' : name,
                },
                success:function(data)
                {
                    //alert(data);
                  if(name == 'sm_regardsarea_ftsize'){
                        document.getElementById('regards1').style.fontSize=data+'px';
                    }
                  else if(name == 'regfontcolor'){
                        document.getElementById('regards1').style.color = '#'+ data;
                  }else{
                    
                  }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

//End of Regards in Order based Template

// save template details like bg color, bg image
function templatedatails(name,color){
//alert(name);
//alert(color);
	if (name =='sm_template_background_image') {
		var temp = document.getElementById('image_url').value;
		//alert(temp);
		color=temp;
	}
 jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'sm_template_backcolo',
                    'swcm_backcolor' : color,
                    'swcm_appearname' : name,
                },
                success:function(data)
                {
                  //alert(data);

                if(name == 'sm_template_background_color'){ // change font family
                document.getElementById('divbackclr').style.background = '#'+data;
                }
                if(name == 'sm_template_background_image'){ // change font color
                  //document.getElementById('divbackclr').style.background-image = 'url('.data.')'; 
                    document.getElementById('divbackclr').style.backgroundImage='url('+data+')';                  
                }
                //if(name == 'sm_cust_body_background_color'){ // change bacground color
      
                //     document.getElementById('custdetailscol').style.background = '#'+data;
                //   }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

//Start of Appearence in Order based Template 
function myAppearence(name,value)
{ 
    //alert(name);
    //alert(value);
    //alert(name);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_backcolo',
                    'swcm_value' : value,
                    'swcm_name' : name,
                },
                success:function(data)
                {
                //alert(data);
                if(name == 'sm_cust_font_family'){ // change font family
               	document.getElementById('custdetailscol').style.fontFamily=data;
                }
                if(name == 'sm_cust_font_color'){ // change font color
                	document.getElementById('custdetailscol').style.color = '#'+data;
                                     
                }if(name == 'sm_cust_body_background_color'){ // change bacground color
      
                    document.getElementById('custdetailscol').style.background = '#'+data;
                  }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}
//End of Appearence in Order based Template


//Start of Appearence in Order based Template  new -theo
function ordertableappearence(name,color,)
{	
	//alert(name);
	//alert(color);
	jQuery.ajax({
	type: 'POST',
	url : ajaxurl,
	data : {
	'action' : 'order_details_table',
	'swcm_color' : color,
	'swcm_name' : name,
	},
	success:function(data)
	{
		if(name == 'sm_template_font_family'){ // change font family
            document.getElementById('order_details').style.fontFamily=data;
           	document.getElementById('sm_ordertable').style.fontFamily=data;
            document.getElementsByClassName("td").style.fontFamily = data;
            }
            if(name == 'sm_template_font_color'){ // change font color
            	document.getElementById('swcm_template_font_color11').style.color = '#'+data; 
                document.getElementById('swcm_template_font_color21').style.color = '#'+data; 
                document.getElementById('swcm_template_font_color31').style.color = '#'+data; 
                document.getElementById('swcm_template_font_color41').style.color = '#'+data;
                                 
            }if(name == 'sm_table_header'){ // change bacground color
  
                document.getElementById('swcm_table_color11').style.background = '#'+data;
                document.getElementById('swcm_table_color21').style.background = '#'+data;
                document.getElementById('swcm_table_color31').style.background = '#'+data;
            }
            else if(name == 'sm_table_body_background_color'){
			 document.getElementById('ordertableedit').style.background = '#'+data;
			 }
             else if(name == 'sm_ordertable_background_color'){
             document.getElementById('order_details').style.background = '#'+data;
             }

	},
	error:function(errorThrown)
	{
	console.log( errorThrown );
	}
	});
}
//End of Appearence in Order based Template

function myurls(name,urls)
{
   //alert(name);
  //alert(urls);    
      jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_sociourls',
                    'swcm_sociourl' : urls,
                    'swcm_socioname' : name,

                },
                success:function(data)
                {
                  
				if(name == 'sm_url_bgcolor'){

				//document.getElementById('emsocial').bgcolor = '#'+data;
				document.getElementById('emsocial').style.background = '#'+data;
				}
                  if(name == 'iconspos'){
                    // alert(data);
                    document.getElementById('emsocial').align = data;
                  }
                  if(name == 'swcm_facebook_uri'){
                    if(data == "https://"){
                   document.getElementById('facebook').href = "";
                   document.getElementById('facebook').style.display = 'none';
                 } else {
                  document.getElementById('facebook').href = data;
                   document.getElementById('facebook').style.display = 'inline';
                 }
                  }if(name == 'swcm_twitter_uri'){
                    if(data == "https://"){
                   document.getElementById('twitter').href = "";
                   document.getElementById('twitter').style.display = 'none';
                 } else {
                  document.getElementById('twitter').href = data;
                   document.getElementById('twitter').style.display = 'inline';
                 }
                  }
                  if(name == 'swcm_google_plus_uri'){
                    if(data == "https://"){
                   document.getElementById('googleplus').href = "";
                   document.getElementById('googleplus').style.display = 'none';
                 } else {
                  document.getElementById('googleplus').href = data;
                   document.getElementById('googleplus').style.display = 'inline';
                 }
                  }
                   if(name == 'swcm_linkedin_uri'){
                    if(data == "https://"){
                   document.getElementById('linkedin').href = "";
                   document.getElementById('linkedin').style.display = 'none';
                 } else {
                  document.getElementById('linkedin').href = data;
                   document.getElementById('linkedin').style.display = 'inline';
                 }
                  } 
                   if(name == 'swcm_skype_uri'){
                    if(data == "https://"){
                   document.getElementById('skype').href = "";
                   document.getElementById('skype').style.display = 'none';
                 } else {
                  document.getElementById('skype').href = data;
                   document.getElementById('skype').style.display = 'inline';
                 }
                  }
                  if(name == 'swcm_youtube_uri'){
                    if(data == "https://"){
                   document.getElementById('youtube').href = "";
                   document.getElementById('youtube').style.display = 'none';
                 } else {
                  document.getElementById('youtube').href = data;
                   document.getElementById('youtube').style.display = 'inline';
                 }
                  } 

                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function mymailbody(name , value , tempname)
{
    //alert(value);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_bodyemail',
                    'swcm_bodyvalue' : value,
                    'swcm_bodyname' : name,
                    'swcm_tempname' : tempname,
                },
                success:function(data)
                {
                    //alert(data);
                        //alert("Signature saved");
            //window.location.reload();
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function myHr(name,value)
{    
     
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_hrblock',
                     'swcm_hrname' : name,
                     'swcm_hrvalue' : value,
                    
                },
                success:function(data)
                {
                    // alert(data);
                    // alert(name);
                    if(name == 'hrwidth'){
                      document.getElementById('hrblock1').style.width = data + '%';
                      
                    } if(name == 'hrheight'){
                            document.getElementById('hrblock1').style.height = data + 'px';
                          // alert(data);
                    } if(name == 'swcm_hr_color'){
                            document.getElementById('hrblock1').style.background = '#' + data;;
                          // alert(data);
                    }
                    if(name == 'sm_divider_background_color'){
                            document.getElementById('hr_details').style.background = '#' + data;;
                          // alert(data);
                    }
                    if(name == 'sm_maintext_background_color'){
                            document.getElementById('maintext_order').style.background = '#' + data;;
                          // alert(data);
                    }
                        
                },  
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });

   

}
function activecheckbox(){
alert('Feature available in pro version');
document.getElementById("check").checked = true; 

}

function showpreviewupdatetable(name,id,mode){  //working  // funtion to add preview to table status 1
    if (mode=='product') {
        var dirpage='product-based';
    } else {

        var dirpage='manage-email';
    }
	//alert(name);
	//alert(id);
	//alert(mode);
    var dragtemplate1 = document.getElementById('trashCan').innerHTML;
    var dragtemplate2 = document.getElementById('trashCan').innerHTML;

    var jHtmlObject = jQuery(dragtemplate1);
    var editor = jQuery("<p>").append(jHtmlObject);
    editor.find(".dragelementshowicons").remove();
    var html = editor.html();

    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_updatetablepre',
                    'swcm_html' : html,
                    'swcm_dragtemplate2' : dragtemplate2,
                    'id' 	: id,                    
                },
                success:function(data)
                {	
                	
                    window.location='admin.php?page='+dirpage+'&status='+ name +'&action=Preview&swcm_mail_type='+name +'&ECW_from=Editor&save=&value='+id+'&mode='+mode;
                  
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function previewcheck(name,id,mode){ //works for preview page
    if (mode=='product') {
        var dirpage='product-based';
    } else {

        var dirpage='manage-email';
    }

	window.location='admin.php?page='+dirpage+'&status='+name+'&action=Edit&value='+id+'&home=home'+'&preavail=preavail&mode='+mode;
}

function editpage(id,name,mode){  //works to edit the template.
    
    if (mode=='product') {
        var dirpage='product-based';
    } else {

        var dirpage='manage-email';
    }
	window.location='admin.php?page='+dirpage+'&status='+name+'&action=Edit&value='+id+'&home=home&mode='+mode;
     
}
function draftpage(id,name,mode){  // works to edit the template from in active page
    if (mode=='product') {
        var dirpage='product-based';
    } else {

        var dirpage='manage-email';
    }
	window.location='admin.php?page='+dirpage +'&status='+name+'&action=Edit&value='+id+'&home=draftpage&mode='+mode;
                  
}

function updatetable(id){//works to update and  save details in the table
	//alert(id);
	//alert(sta); 
    var dragtemplate2 = document.getElementById('trashCan').innerHTML;
    var dragtemplate1 = document.getElementById('trashCan').innerHTML;
    var dragtemp = dragtemplate1.indexOf('id="order_details"');
    var dragcus = dragtemplate1.indexOf('id="customer_details"');
    var draguser = dragtemplate1.indexOf('id="user_login"');
    var dragblog = dragtemplate1.indexOf('id="blog_name"');
    var dragdate = dragtemplate1.indexOf('id="order_date"');
    var dragno = dragtemplate1.indexOf('id="order_no"');
    var dragcusname = dragtemplate1.indexOf('id="customer_name"');
    if (dragtemp == -1 && dragcus == -1 && draguser == -1 && dragblog == -1 && dragdate == -1 && dragno == -1 && dragcusname == -1) {
         var dragtemplate = document.getElementById('trashCan').innerHTML;  
    }if(dragcus != -1) {
        document.getElementById('customer_details').innerHTML = '{customer_details}';
    }if(dragtemp != -1) {
        document.getElementById('order_details').innerHTML = '{order_details}';
        
    }if(draguser != -1) {
        document.getElementById('user_login').innerHTML = '{user_login}';
        
    }if(dragblog != -1) {
        document.getElementById('blog_name').innerHTML = '{blog_name}';
        
    } if(dragdate != -1) {
        document.getElementById('order_date').innerHTML = '{order_date}';
        
    } if(dragno != -1) {
        document.getElementById('order_no').innerHTML = '{order_no}';
        
    } if(dragcusname != -1) {
        document.getElementById('customer_name').innerHTML = '{customer_name}';
        
    }
    
    var dragtemplate1 = document.getElementById('trashCan').innerHTML;
//alert(dragtemplate1);
    var jHtmlObject = jQuery(dragtemplate1);
    var editor = jQuery("<p>").append(jHtmlObject);
    editor.find(".dragelementshowicons").remove();
    var html = editor.html();

    //alert(html);

   jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_updatetable',
                    'swcm_dragtemplate1' : html,         // to send
                    'swcm_dragtemplate2' : dragtemplate2,// to show
                    'id' 	: id,
                },
                success:function(data)
                {	
 					data = data.replace(/\\\//g, "");
                  document.getElementById('trashCan').innerHTML= data;
                 
                        $('#smack_modal').modal('show'); 
                        // $("#smack_modal").fadeOut('1000');
                        setTimeout(function(){
                        $('#smack_modal').modal('hide')
                              }, 2000);
				
                    
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function mytable(){
  //alert('mytable');
var table = document.getElementById("tbl_id").rows.length;
var tvalue = document.getElementById('tabval').value;

// alert(table);
if(table != '1'){
for (var k=1; k <= table; k++ ){
  //alert(k);
  var tr = document.getElementById("tbl_id").getElementsByTagName("tr")[k];
   //alert(tr.innerHTML);
  

 // var tdl = tr.getElementsByTagName("td").length;
 //  alert(tdl);
 //  for(j=0;j<tdl;j++){
    var td = tr.getElementsByTagName("td")[1];
    //alert(td);
     var tdval = td.innerHTML;
     //alert(tdval);
     //alert(tvalue);
  if(tdval != tvalue ){
  addMoreRows();
  // alert('r');
  return true;
//}
  }
  }
 
} else {
  addMoreRows();
  // alert('else');
}
// if(tdval == tvalue ){
//   addMoreRows();
//   alert('r');
// }
  // alert('finish');
}

function addMoreRows() {
         var rowsAdded = document.getElementById('tabval').value;
var value2 = document.getElementById('tabact').value;
        
          var newRow = document.getElementById('tbl_id').insertRow();
         var newCell = newRow.insertCell();
           newCell.innerHTML="<tr><td>4</td></tr>";
          
newCell = newRow.insertCell();
          newCell.innerHTML="<tr><td>"+ rowsAdded +"</td></tr>";

          newCell = newRow.insertCell();
          newCell.innerHTML="<tr><td>"+ value2 +"</td></tr>";

          

          newCell = newRow.insertCell();
          newCell.innerHTML="<tr><td>three</td></tr>";
          var newCell = newRow.insertCell();
          newCell.innerHTML="<tr><td>five</td></tr>";

          var myt =  document.getElementById('tbl_id').outerHTML;
          jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_mytable',
                    'swcm_tab' : myt,
                    
                },
                success:function(data)
                {
                    // alert(data);

                },
                error:function(errorThrown)
                {
                        console.log( errodrown );
                }
        });
          }


function mybutton(name,value){
     //console.log(name);console.log(value);
     var timeoutId;
     if(name =='swcm_button_text'){

        var value = document.getElementById('swcm_button_text').value;
        document.getElementById("buttonblock1").innerHTML = value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function() {
        // Runs 3 second (3000 ms) after the last change    
        saveToDB(name,val);
         }, 3000);

     }else{
    
     jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_buttonblock',
                    'swcm_buttonvalue' : value,
                    'swcm_buttonname' : name,
                },
                success:function(data)
                {
                    if(name == 'swcm_button_color'){
                    document.getElementById('buttonblock1').style.background = '#' + data;
                }
                else if (name == 'swcm_button_link') {
                    document.getElementById('buttonblock1').href = data;
                }
                else if (name == 'swcm_button_para') {
                    document.getElementById('textblock2').innerHTML = data;
                }
                else if (name == 'buttonwidth') {
                    document.getElementById('buttonblock1').style.width = data + '%';
                }
                else if (name == 'buttonpos') {
                    document.getElementById('buttonpos').align = data ;
                }
                else if (name == 'sm_button_background_color') {
                    document.getElementById('button_block_order').style.background = '#' + data;
                }


                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
     }
}

function saveToDB(name,value)
{     
  //console.log('saving to db');
   //console.log(name);
   //console.log(value);
     jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_textblock',
                     'swcm_name' : name,
                     'swcm_value' : value,
                    
                },
                success:function(data)
                {
                	//console.log(data);
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });

}

function textblock(name,value)
{   
	var timeoutId;
    if(name == 'textblock'){
        var value = document.getElementById('textblock').value;
        document.getElementById("textblock1").innerHTML = value;
        val = value.replace(/(\r\n|\n|\r)/gm, '<br>');
        clearTimeout(timeoutId);
    	timeoutId = setTimeout(function() {
        // Runs 3 second (3000 ms) after the last change    
        saveToDB(name,val);
   		 }, 3000);

    }
    else{
      
    //alert(name); alert(value);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_textblock',
                     'swcm_name' : name,
                     'swcm_value' : value,
                    
                },
                success:function(data)
                {
                // alert(name);
                 //alert(data); //sm_txtarea_ftsize
                  if(name == 'textpos'){                    
                    document.getElementById('textposition').align = data;
                  }if(name == 'textfontcolor'){
                    document.getElementById('textblock1').style.color = '#'+data;
                  }
                  if(name == 'sm_txtarea_font'){ // change font family
                  document.getElementById('textblock1').style.fontFamily=data;
                  }
                  if(name == 'sm_txtarea_ftsize'){ // change font size
                  document.getElementById('textblock1').style.fontSize=data+'px';
                  }
                  if(name == 'sm_textarea_background_color'){ // change font size
                  document.getElementById('text_area_order1').style.background = '#' + data;;
                  }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });

}
       
   
}

function jssignature(name,value)
{     
       jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_textblock',
                     'swcm_name' : name,
                     'swcm_value' : value,
                    
                },
                success:function(data)
                {
                    //console.log(data);
                    if (name=='sm_email_signature_image_pos') {
                        document.getElementById('signimagepara').style.textAlign =  data;

                    }
                    else if(name=='sm_email_signature_background_color'){
                        document.getElementById('signature_block_order').style.background = '#'+ data ; 
                    }
                    else if(name == 'sm_email_signature_width') {
                     document.getElementById('signimage').width = data ;
                     document.getElementById('svalwidth').innerHTML = '<b>Value :</b>' + data ; 
                        
                    }
                    else if(name == 'sm_email_signature_height') {
                     document.getElementById('signimage').height = data ;
                     document.getElementById('svalheight').innerHTML = '<b>Value :</b>' + data ; 
                        
                    }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });

}

function myHeader(name,value )  // working.
{
    //alert(name);
    //alert(value);
    if (name =='sm_email_header_image_url') {
        var temp = document.getElementById('header_image_url').value;
        //alert(temp);
        value=temp;
    }else{
        value=value;
    }
   
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_headerdet',
                    'swcm_headername' : name,
                    'swcm_headervalue' : value,                 

                },
                success:function(data)
                {//alert(data);

                if(name == 'sm_email_header_width') {
                     document.getElementById('headerimg2').width = data ;
                 }
                 else if (name == 'sm_email_header_height') {
                     document.getElementById('headerimg2').height = data ;
                 }
                 else if (name == 'sm_email_header_image_pos') {
                     document.getElementById('headerimg2').align =  data;
                 }
                 else if (name == 'sm_email_header_background_color') {
                     document.getElementById('headerbackclr').style.background = '#'+ data ; 
                 }
                 else if (name == 'sm_email_header_image_url') {
                     document.getElementById('headerimg2').src = data ; 
                 }


                        if (name === 'swcm_email_header_width') {
                         document.getElementById('valwidth').innerHTML = '<b>Value :</b>' + data ; 
                        }
                        if (name === 'swcm_email_header_height') {
                         document.getElementById('valheight').innerHTML = '<b>Value :</b>' + data ; 
                        }

                     
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        }); 
}

function title_details(name,value )  // working.
{	var timeoutId;
	if (name=='sm_title_text_text') {
		var x = document.getElementById("sm_title_text_text").value;
    	document.getElementById("headertext").innerHTML = x;
    	value = x.replace(/(\r\n|\n|\r)/gm, '<br>');
    	clearTimeout(timeoutId);
   		 timeoutId = setTimeout(function() {
        // Runs 3 second (3000 ms) after the last change    
        saveToDB(name,value);
    	}, 3000);

	}else{  
   
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_title_details',
                    'swcm_headername' : name,
                    'swcm_headervalue' : value,                 

                },
                success:function(data)
                {//alert(data);

                if (name == 'sm_title_text_color') {
                     document.getElementById('headertext').style.color = '#'+ data ;
                 }
                 else if (name == 'sm_title_text_pos') {
                     document.getElementById('headertext').align =  data;
                 }
                 else if (name == 'sm_title_text_bgcolor') {
                     document.getElementById('headertext').style.background = '#'+ data ; 
                 }
                    
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        }); 
    } 
}

function myDisclaimer(name,value)
{	var timeoutId;
    if (name =="swcm_email_disclaimer") {
      var value = document.getElementById('disclamtxtarea').value;
      document.getElementById("disclaimer1").innerHTML = value;
      value = value.replace(/(\r\n|\n|\r)/gm, '<br>');

      clearTimeout(timeoutId);
   	 timeoutId = setTimeout(function() {
        // Runs 3 second (3000 ms) after the last change    
        saveToDB(name,value);
    }, 3000);

    }else{
      value=value;
    }

    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_disclaimer',
                    'swcm_name' : name,
                    'swcm_value' :value,
                },
                success:function(data)//sm_disclaimer_background_color
                {
                  if (name == 'dispos') {
                    document.getElementById('disclaimer1').align = data;
                  }
                  else if(name == 'disclaimerfontcolor'){
                    document.getElementById('disclaimer1').style.color = '#'+data;
                  }
                  else if(name == 'sm_disclaim_ftsize'){
                    document.getElementById('disclaimer1').style.fontSize=data+'px';

                  }else if(name == 'sm_disclaim_font'){
                    document.getElementById('disclaimer1').style.fontFamily=data;
                  }
                  else if(name == 'sm_disclaimer_background_color'){
                    document.getElementById('disclaimer_order').style.background = '#' + data;
 
                  }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}


function myFoot(name , value)
{
   //alert(value);
    jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_foot',
                    'swcm_footname' : name,
                    'swcm_footvalue' : value,
                },
            success:function(data)
                {
                   //alert(data);
                   //alert(name);
                  if (name == 'swcm_email_foot') {
                    document.getElementById('foottext').innerHTML = data;

                  } else if (name == 'swcm_email_foot1'){
                    document.getElementById('foottext1').innerHTML = data;
                  }
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}

function mypag(num , value){
  // alert(num);
  if(num == '1'){
    var val =  document.getElementById('tdvalue1').innerHTML;
  } else if(num == '2'){
    val = document.getElementById('tdvalue2').innerHTML;
  } else if(num == '3'){
    val = document.getElementById('tdvalue3').innerHTML;
  }  else if(num == '4'){
    val = document.getElementById('tdvalue4').innerHTML;
  }  else if(num == '5'){
    val = document.getElementById('tdvalue5').innerHTML;
  }  else if(num == '6'){
    val = document.getElementById('tdvalue6').innerHTML;
  }  else if(num == '7'){
    val = document.getElementById('tdvalue7').innerHTML;
  }  else if(num == '8'){
    val = document.getElementById('tdvalue8').innerHTML;
  }  else if(num == '9'){
    val = document.getElementById('tdvalue9').innerHTML;
  }  else if(num == '10'){
    val = document.getElementById('tdvalue10').innerHTML;
  }  else if(num == '11'){
    val = document.getElementById('tdvalue11').innerHTML;
  }  else if(num == '12'){
    val = document.getElementById('tdvalue12').innerHTML;
  } 
  // alert(val);

  jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'show_link',
                    'swcm_num' : num,
                    'swcm_value' : val,
                },
            success:function(data)
                {
                  value = val.trim()
                   // alert(data + value);
                   //alert(name);
                 window.location = data + value;
                 

                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });
}
function mysel(){
  var e = document.getElementById("dropof");
var strUser = e.options[e.selectedIndex].text;
// alert(strUser);
   var value1 = document.getElementById('emchooselist');
   value1 = value1.options[value1.selectedIndex].text;
   // alert(value1);
   jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'save_list_table',
                    'swcm_listact' : strUser,
                    'swcm_listtemp' : value1,
                },
            success:function(data)
                {
                  // alert(data);
                  //alert(name);
                  
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });

}
function swcm_close_popup()  //working
{
 // alert('one');
	jQuery('#mapping-modalbox').hide();
  jQuery(".modal-backdrop").hide(); 
	jQuery('.save_content').click();	
 
  //document.getElementById("signatureinput").style.width = "0";
  //window.location.reload();
}
function swcm_sign() {
  jQuery("#mapping-modalbox").show();
  jQuery( "#clear_contents" ).show();      

  }

function myaler(tempname , name){
  if(tempname == 'new_order_change'){
 var dragtemplate1 = document.getElementById('newvalue').innerHTML;
}if(tempname == 'complete_order_change'){
    dragtemplate1 = document.getElementById('completevalue').innerHTML;
}if(tempname == 'invoice_order_change'){
  dragtemplate1 = document.getElementById('invoicevalue').innerHTML;
}if(tempname == 'cancelled_order_change'){
    dragtemplate1 = document.getElementById('cancelvalue').innerHTML;
}if(tempname == 'failed_order_change'){
    dragtemplate1 = document.getElementById('failvalue').innerHTML;
} if(tempname == 'account_order_change'){
    dragtemplate1 = document.getElementById('accountvalue').innerHTML;
} if(tempname == 'note_order_change'){
    dragtemplate1 = document.getElementById('notevalue').innerHTML;
}if(tempname == 'hold_order_change'){
    dragtemplate1 = document.getElementById('holdvalue').innerHTML;
}if(tempname == 'process_order_change'){
    dragtemplate1 = document.getElementById('processvalue').innerHTML;
}if(tempname == 'refund_order_change'){
    dragtemplate1 = document.getElementById('refundvalue').innerHTML;
}if(tempname == 'reset_order_change'){
    dragtemplate1 = document.getElementById('resetvalue').innerHTML;
}if(tempname == 'deliver_order_change'){
    dragtemplate1 = document.getElementById('delivervalue').innerHTML;
}
var dragtemp = dragtemplate1.indexOf('id="order_details"');
    var dragcus = dragtemplate1.indexOf('id="customer_details"');
    var draguser = dragtemplate1.indexOf('id="user_login"');
    var dragblog = dragtemplate1.indexOf('id="blog_name"');
    var dragdate = dragtemplate1.indexOf('id="order_date"');
    var dragno = dragtemplate1.indexOf('id="order_no"');
    var dragcusname = dragtemplate1.indexOf('id="customer_name"');
    if (dragtemp == -1 && dragcus == -1 && draguser == -1 && dragblog == -1 && dragdate == -1 && dragno == -1 && dragcusname == -1) {
         var dragtemplate = document.getElementById('newvalue').innerHTML;  
    }
    if(dragcus != -1) {
        document.getElementById('customer_details').innerHTML = '{customer_details}';
    }
    if(dragtemp != -1) {
        document.getElementById('order_details').innerHTML = '{order_details}';
        
    }if(draguser != -1) {
        document.getElementById('user_login').innerHTML = '{user_login}';
        
    }if(dragblog != -1) {
        document.getElementById('blog_name').innerHTML = '{blog_name}';
        
    } if(dragdate != -1) {
        document.getElementById('order_date').innerHTML = '{order_date}';
        
    } if(dragno != -1) {
        document.getElementById('order_no').innerHTML = '{order_no}';
        
    } if(dragcusname != -1) {
        document.getElementById('customer_name').innerHTML = '{customer_name}';
        
    }
    

    var dragtemplate2 = document.getElementById(name).innerHTML;
    // alert(dragtemplate2);
     jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {
                    'action' : 'swcm_save_valupage',
                    'swcm_dragtemplate2' : dragtemplate2,
                    'swcm_tempnae' : tempname,
                },
                success:function(data)
                {
                  //location.reload();
                },
                error:function(errorThrown)
                {
                        console.log( errorThrown );
                }
        });


}

jQuery(document).ready(function() {



    jQuery('.dragelementshowicons').click(function(){


        //alert(jQuery(this).attr('data-key'));

        //alert('asas');



    });




});

function openappearanceblock() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#appearanceinput').addClass('active');
    
    //document.getElementById("appearanceinput").style.width = "473px";
    //document.getElementById("appearanceinput").style.width = "0";
    
 }
function openappearanceblocknew() {
    jQuery('.sidenav').removeClass("active");

    jQuery('#appearanceinputnew').addClass('active');
  
    //document.getElementById("appearanceinputnew").style.width = "473px";
    //document.getElementById("appearanceinput").style.width = "0";
    
}
function opentemplatedetails() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#templatedetails').addClass('active');
    //document.getElementById("templatedetails").style.width = "473px";  
}
function closetemplatedetails() {
    jQuery('#templatedetails').removeClass('active');
    //document.getElementById("templatedetails").style.width = "0";
    // document.getElementById("main3").style.marginLeft= "0";
}

function closeappearanceblock() {
    jQuery('#appearanceinput').removeClass('active');
    //document.getElementById("appearanceinput").style.width = "0";
    // document.getElementById("main3").style.marginLeft= "0";
}

function closeappearanceblocknew() {
    jQuery('#appearanceinputnew').removeClass('active');
    //document.getElementById("appearanceinputnew").style.width = "0";
    // document.getElementById("main3").style.marginLeft= "0";
}


// function openheadercontent(){
//     document.getElementById('headerstyle').style.display = "none";
//     document.getElementById('headercontent').style.display = "block";
//   }
//   function openheaderstyle(){
//     document.getElementById('headercontent').style.display = "none";
//     document.getElementById('headerstyle').style.display = "block";
//   }
  function openheaderblock() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#headerinput').addClass('active');
      //document.getElementById("headerinput").style.width = "473px";
      
       
  }

  function closeHeaderblock() {
    jQuery('#headerinput').removeClass('active');
      //document.getElementById("headerinput").style.width = "0";

      // document.getElementById("main6").style.marginLeft= "0";
  }
   
   function openhrblock() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#hrblockinput').addClass('active');
    //document.getElementById("hrblockinput").style.width = "473px";
    
    }

function closehrblock() {
    jQuery('#hrblockinput').removeClass('active');
    //document.getElementById("hrblockinput").style.width = "0";
    // document.getElementById("main1").style.marginLeft= "0";
}             


// function opensocialcontent(){
//   document.getElementById('socialstyle').style.display = "none";
//   document.getElementById('socialcontent').style.display = "block";
// }
// function opensocialstyle(){
//   document.getElementById('socialcontent').style.display = "none";
//   document.getElementById('socialstyle').style.display = "block";
// }
function opensocialblock() {
    jQuery('.sidenav').removeClass("active");
     jQuery('#socialkinksinput').addClass('active');

    
}

function closesocialblock() {
    jQuery('#socialkinksinput').removeClass('active');

}


function openregards() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#regardsinput').addClass('active');
    
}

function closeregards() {
    jQuery('#regardsinput').removeClass('active');

}

function opendisclaimerblock() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#disclaimerinput').addClass('active');
    //document.getElementById("disclaimerinput").style.width = "473px";
   
}

function closedisclaimerblock() {
    jQuery('#disclaimerinput').removeClass('active');
    
}

function opentextarea() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#textareainput').addClass('active');
    
   
}

function closetextarea() {
    jQuery('#textareainput').removeClass('active');
    
}

function openimageblock() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#imageblockinput').addClass('active');
}

function closeimageblock() {
    jQuery('#imageblockinput').removeClass('active');
    
}

function openfootertext() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#footerinputtext').addClass('active');
    
   
}

function closefootertext() {
    jQuery('#footerinputtext').removeClass('active');
    
}

function openbuttonblock() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#buttonblockinput').addClass('active');
   
}

function closebuttonblock() {
    jQuery('#buttonblockinput').removeClass('active');
    
}
function opensignatureblocknew() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#signatureblockinput').addClass('active');
   
}

function closesignatureblocknew() {
    jQuery('#signatureblockinput').removeClass('active');
    
}

function opentitlearea() {
    jQuery('.sidenav').removeClass("active");
    jQuery('#titleinput').addClass('active');
}

function closetitlearea() {
    jQuery('#titleinput').removeClass('active');
}
function openmaintextcontent(){
                   //document.getElementById('maintextstyle').style.display = "none";
                   document.getElementById('maintextcontent').style.display = "block";
                   document.getElementById('maintextsubject').style.display = "none";
                   $(".template-popup-style").removeClass("popupbtn-active");
                   $(".template-popup-content").addClass("popupbtn-active");
}
          function openmaintextsubject(){
                   //document.getElementById('maintextstyle').style.display = "none";
                   document.getElementById('maintextcontent').style.display = "none";
                   document.getElementById('maintextsubject').style.display = "block";
                   $(".template-popup-content").removeClass("popupbtn-active");
                   $(".template-popup-style").addClass("popupbtn-active");
}
    
          function openmaintext() {
            jQuery('.sidenav').removeClass("active");
            jQuery('#maintextinput').addClass('active');
             //document.getElementById("maintextinput").style.width = "380px";
             openmaintextcontent();
             CKEDITOR.instances['swcm_order_main_text'].setData($("#maintext1").val());
             
             
              
          }

         function closemaintext() {
             jQuery('#maintextinput').removeClass('active');
             //ocument.getElementById("maintextinput").style.width = "0";
            
          }
          function opensignatureblock() {
                jQuery('#signatureinput').addClass('active');
                //document.getElementById("signatureinput").style.width = "250px";
 
            }

            function closesignatureblock() {
                jQuery('#signatureinput').removeClass('active');
                //document.getElementById("signatureinput").style.width = "0";
                // document.getElementById("main7").style.marginLeft= "0";
            }