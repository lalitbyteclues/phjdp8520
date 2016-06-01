<style type="text/css">
    .footer {background-color: #00090b;}
    .foot_1 h2 {color: #fff;font-family: 'Raleway', sans-serif;/*padding: 26px 36px;*/}
    .foot_1 p {text-align: justify;}
    .foot_1 ul li {list-style-type: none;text-align: left;line-height: 2;}
    .foot_1 ul li a {text-decoration: none;color: #fff;font-family: 'Raleway', sans-serif;}
    .foot_1 ul li a:hover {-webkit-transform: scale(1.1);-moz-transform: scale(1.1);-o-transform: scale(1.1);transform: scale(1.1);color: #1F94BF;transition:all 350ms linear 0s;}
    .foo_p {padding-top: 20px;padding-bottom: 20px;}
    .foo_p_1 {padding-top: 20px;padding-bottom: 20px;}
    .foo_p_2 {padding-top: 20px;padding-bottom: 20px;}
    .foo_p p {color: #fff;font-family: 'Raleway', sans-serif;font-size: 13px;}
    .foo_p_2 p {color: #888;font-family: 'Raleway', sans-serif;}
    .foo_p_1 ul li {padding-left: 0px;padding-right: 0px;}
    .foo_p_1 ul li a img:hover {transform:scale(1.1);transition:all 350ms linear 0s;} 
    .social {position: fixed;z-index: 10;right: 0px;bottom: 0;}
    .social ul {float: left;margin: 0px;list-style: none;padding: 0px;}
    .social ul li {margin: -10px 0px 0px 0px;display: block;}
    .social ul li a  {    /* background: #131110; */width: 47px;height: 47px;text-align: center;}
    .social ul li a img{margin-top :10px;}
    .social_1 {position: fixed;z-index: 10;right: 0px;bottom: 0;}
    .social_1 ul {float: left;margin: -5px 21px;list-style: none;padding: 0px;}
    .social_1 ul li {margin: -10px 0px 0px 0px;display: inline-block;}
    .social_1 ul li a  {/* background: #131110; */width: 47px;height: 47px;text-align: center;}
    .social_1 ul li a img{margin-top :10px;}
</style>
 <div class="social">
         <ul>
            <li class="fb"><a href="https://www.facebook.com/pharmerzz" target="_blank" ></a></li>
            <li class="tw"><a href="https://twitter.com/PharmerzT" target="_blank" ></a></li>
            <li class="googleplus"><a href="#" target="_blank" ></a></li>
            <li class="rss"><a href="#" target="_blank" ></a></li>
            <li class="pintrest"><a href="#" target="_blank" ></a></li>
            <li class="linkedin"><a href="https://www.linkedin.com/company/pharmerz" target="_blank" ></a></li>
            <li class="youtube"><a href="https://www.youtube.com/channel/UC6C1uwIbZEziq8rfN-qW0-A" target="_blank" ></a></li>
         </ul>
      </div>
	
<footer class="footer index2-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>App</h2>
                        <p>Download App from</p>
							<div class="footer-logo">
								<a href="/" title="Logo"><img src="/images/Google_play.png" width="40%" alt="logo"></a>
								<a title="Logo" href="/"><img width="40%" alt="logo" src="/images/apple.PNG"></a>
							</div>					 
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>About us</h2>
                        <ul>
                           <!-- <li><a href="#">Company</a></li><li><a href="#">Core Values</a></li><li><a href="#">Careers</a></li>-->
                            <li><a href="/contact_us.php">Contact us</a></li>
                            <li><a href="blog.php">Blog</a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>Useful Links</h2>
                        <ul>
                           <?PHP	$footerpages= mysqli_query($conn,"SELECT * FROM `pages`");
						if(mysqli_num_rows($footerpages)>0){ 
								while($queRow = mysqli_fetch_array($footerpages)){
							echo '<li><a href="/pages/'.$queRow['Slug'].'">'.$queRow['ShortDescription'].'</a></li>'; 
							}} 
							?>   
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="foot_1">
                        <h2>Stay Connected</h2>
                      
						<ul class="index2-social">
						<li>
						<a href="https://www.facebook.com/pharmerzz" target="_blank" ><img src="/images/fb.PNG"/></a>
						<a href="https://twitter.com/PharmerzT" target="_blank" ><img src="/images/twitter.PNG"/></a>
						<a href="https://www.linkedin.com/company/pharmerz" target="_blank" ><img src="/images/linked-in.PNG"/></a>
						<a href="https://www.youtube.com/channel/UC6C1uwIbZEziq8rfN-qW0-A" target="_blank" ><img src="/images/youtube.PNG"/></a>
						</li>
						</ul>
						
                    </div>
                    <!--======social button start========-->

                </div>
            </div>
        </div>
    </div> 
	<div>
	  <div class="copyright">
		  <p>Copyright &copy; Pharmaz 2015 All Rights Reserved.</p>
	  </div>
	</div>	
</footer> 

<div class="se-pre-con"></div> 
     <script type="text/javascript" src="/js/jquery.min.js"></script>
	  <script type="text/javascript" src="js/flexdropdown.js"></script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/application/spidergcon.js"></script>
	<script type="text/javascript" src="/js/application/jquery.steps.js"></script>
      <script type="text/javascript" src="/js/application/intlTelInput.min.js"></script> 
	  <script type="text/javascript" src="/js/common.js"></script>
      <script type="text/javascript" src="/js/revslider.js"></script> 
      <script type="text/javascript" src="/js/wow.min.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/application/search_proank.js"></script>
      <script type="text/javascript" src="/js/application/custom.js"></script>
        <script type="text/javascript" src="/js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/async/1.4.0/async.js"></script>  
<script type="text/javascript" src="/js/application/sweetalert.min.js"></script>
<script type="text/javascript" src="/js/application/buyers.js"></script>  
<script type="text/javascript" src="/js/application/loginForm.js"></script>
<script type="text/javascript" src="/js/jquery-ui.min.js"></script>   
<script type="text/javascript" src="/js/application/modernizr.js"></script>   
<script src="/js/superfish.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="/js/application/jquery.validate.js"></script>
<script type="text/javascript" src="/js/application/popup.js"></script>
<script type="text/javascript" src="/js/slidernav.js"></script>    
 <script type="text/javascript" src="/js/application/suppliers.js"></script>  
       <script type="text/javascript">
          $(document).ready(function(){
            $('#nomo').click(function(){$('#sido1').slideToggle(1000);}); $('#nomo1').click(function(){
               $('#sido1').slideToggle(1000);
             });
          });  
      </script>
      <script src="/js/jquery.catslider.js"></script>
	     <script>
         new WOW().init();
      </script>
	    <script>
         $(function() {
            $( '#mi-slider' ).catslider();            
         });
      </script>
      <script type='text/javascript'>
         jQuery(document).ready(function(){
           jQuery('#rev_slider_4').show().revolution({
             dottedOverlay: 'none',delay: 5000,startwidth: 1170,startheight: 580,hideThumbs: 200,thumbWidth: 200,thumbHeight: 50,thumbAmount: 2,navigationType: 'thumb',navigationArrows: 'solo',navigationStyle: 'round',touchenabled: 'on',onHoverStop: 'on',swipe_velocity: 0.7,swipe_min_touches: 1,swipe_max_touches: 1,drag_block_vertical: false,spinner: 'spinner0',keyboardNavigation: 'off',navigationHAlign: 'center',navigationVAlign: 'bottom',navigationHOffset: 0,navigationVOffset: 20,soloArrowLeftHalign: 'left',soloArrowLeftValign: 'center',soloArrowLeftHOffset: 20,soloArrowLeftVOffset: 0,soloArrowRightHalign: 'right',soloArrowRightValign: 'center',soloArrowRightHOffset: 20,soloArrowRightVOffset: 0,shadow: 0,fullWidth: 'on',fullScreen: 'off',stopLoop: 'off',stopAfterLoops: -1,stopAtSlide: -1,shuffle: 'off',autoHeight: 'off',forceFullWidth: 'on',fullScreenAlignForce: 'off',minFullScreenHeight: 0,hideNavDelayOnMobile: 1500,hideThumbsOnMobile: 'off',hideBulletsOnMobile: 'off',hideArrowsOnMobile: 'off',hideThumbsUnderResolution: 0,hideSliderAtLimit: 0,hideCaptionAtLimit: 0,hideAllCaptionAtLilmit: 0,startWithSlide: 0,fullScreenOffsetContainer: ''
           });
         });
      </script>