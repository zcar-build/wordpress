<?php
/**
 * Email Footer
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
															</div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- End Content -->
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- End Body -->
                                </td>
                            </tr>
			<?php
						$footer_text	= get_option("swcm_email_footer_text");
						$footer_image	= get_option('swcm_email_footer_image');	
	 				         $swcm_template_font_color = get_option('swcm_template_font_color');					
						// if ( $footer_image &&  $footer_text && (get_option('swcm_email_footer_image_position') != get_option('swcm_email_footer_text_position'))  ) 
							?>
                        	<!-- <tr valign="top" >
<td style="padding:10px;color:red">
 <div  style="background: black;height:40px;float: center">
<img style='cursor:pointer;' src="http://www.iconninja.com/files/245/45/195/facebook-media-social-like-network-fb-icon.svg" width="30" height="30"> <img style='cursor:pointer;' src="https://cdn1.iconfinder.com/data/icons/iconza-circle-social/64/697029-twitter-256.png" width="30" height="30">
<p style="color:white;float:right;">Footer</p> 
                         </div> 
</td>                       	
                                </tr> -->
 


	
                        </table>

                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>
