<?php 

	$footer_style = ot_get_option('footer_style');
	
?>	


	<!-- Footer -->
	<div id="footer" class="container animationStart <?php echo (!$footer_style ? 'footer_light' : '');?>">
		<div class="row footer_inside">
		
		  <div class="six columns" style="display:inline-flex;">
		  	<img src="http://kouponmedia.frycle.com/wp-content/uploads/2014/07/KP_footer_logo.png" style="height: 100%;" /> <span style="vertical-align:top;padding:8px;"><a href="mailto:info@kouponmedia.com" style="font-size:16px;color:#fff">GET IN TOUCH</a> </span> 
		  </div>
		  <div class="four columns" style="display:inline-flex; margin-left:130px;">
		  	<img src="http://kouponmedia.frycle.com/wp-content/uploads/2014/07/question_icon.png" style="height: 100%;" /><span style="vertical-align:top;padding:8px;"> <a href="tel:214.377.1280" style="font-size:16px;color:#fff;">(214) 377-1280</a>  </span>		  </div> 
          <div class="four columns" style="display:inline-flex;">
          <img src="http://kouponmedia.frycle.com/wp-content/uploads/2014/07/email_icon.png" style="height:100%;" /><span style="vertical-align:top;padding:8px;"><a href="mailto:info@kouponmedia.com" style="font-size:16px;color:#39b94a;">info@kouponmedia.com</a></span>
          </div>
	  </div> 
	  <div class="clear"></div>
      <hr class="footerLine" />
	    <div class="footer_btm">
	  	<div class="footer_btm_inner">
	  	
	  	<?php 	if(is_array($footer_icons = ot_get_option('footer_icons'))){
					$footer_icons = array_reverse($footer_icons);							
					foreach($footer_icons as $footer_icon){
						echo "<a target='_blank' href='". $footer_icon['icons_url_footer']."' class='icon_". $footer_icon['icons_service_footer'] ."' title='". $footer_icon['title'] ."'>". $footer_icon['icons_service_footer'] ."</a>";			
					}
				}
		?>
	  	
		  	<div id="powered"><?php echo ot_get_option('copyrights');?></div>
              <div class="termLink">Privacy Policy</a>&nbsp; &nbsp; <a href="#">Terms of Use</a></div>
		</div>	
	  </div>
	</div>
	<!-- Footer::END -->
	
  </div>
  
  <?php wp_footer(); ?>
  
  
</body>
</html>