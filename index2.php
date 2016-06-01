<?php 
include('home/include/dbconnection.php');
session_start();

if(isset($_GET['username']))
{
  $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `email`= '".$_GET['username']."'");
  if(mysqli_num_rows($get_user)>0)
  {
    $queRow = mysqli_fetch_array($get_user);
    $_SESSION['user_id'] = $queRow['id'];
    $_SESSION['user_email'] = $queRow['email'];
  }
  else
  { 

   // $q = "INSERT INTO `user`(email,password,loginToken,loginTokenTS) VALUES ('".$_GET['username']."','".$_COOKIE['password']."','".$_GET['lt']."','".$_GET['lts']."')";
    $q = "INSERT INTO `user`(email,password) VALUES ('".$_GET['username']."','".$_COOKIE['password']."')";
    
    $insdata = mysqli_query($conn,$q);
    $user_id = mysqli_insert_id($conn);
    
    $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `id`= '$user_id'");
    if(mysqli_num_rows($get_user)>0)
    {
      $queRow = mysqli_fetch_array($get_user);
      $_SESSION['user_id'] = $queRow['id'];
      $_SESSION['user_email'] = $queRow['email'];
     
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('head.php'); ?> 
   <body class="cms-index-index" bgcolor="#E6E6FA">
   <script src="/js/twitterFetcher_min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/flexdropdown.css" />  
<script>
var LatestTweets = {
    init: function () {
        twitterFetcher.fetch({
            id: '702087656033812480', 
            domId: 'latest-tweets'
        });
    }
}; 
LatestTweets.init();
</script> 
      <div class="page">
          <!--===header start===-->
        <div class="container">
		 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 <br>&nbsp;
		 </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                  <div class="imageo">
                        <a href="/"><img src="/images/pharmerz_logo2 .png" class="img-responsive" width="100%"></a> 
                  </div>
            </div> 
			   <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">&nbsp;&nbsp; </div> 
            <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 gg1">
                  <div class="coco">
                     <div class="input-group wer">
                       <input type="text" class="form-control" placeholder="search product here" aria-describedby="basic-addon2" id="search"> 
                       <span class="input-group-addon" onclick="searchproduct();" id="basic-addon2">&nbsp;&nbsp;&nbsp;<i class="fa fa-search">&nbsp;&nbsp;</i></span>
                     </div>
                  </div>      
            </div>
                               
           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <div class="line">
                     <ul class="list-inline">
                        <li><a href="#">FAQ</a></li> 
                        <?php if($_SESSION['user_id'] != ''){ ?>
                          <li><a href="/home/index.php">Account</a></li>
						  <li><a href="/home/logout.php">Log Out</a></li>
                           <?php }else{?>
						  <li><a href="/signup.php">Account</a></li>
                          <?php } ?> 
                     </ul> 
                </div>
           </div>  
             <div class="clearfix"></div>
        </div> 
        <nav class="index2-menu">
            <div class="container">
               <div class="nav-inner">
                  <!-- mobile-menu -->
                  <div class="hidden-desktop" id="mobile-menu"> 
                     <ul class="navmenu nom1">
                      <li><a  href="javascript:void(0);" class="pull-right flexmenu1"  data-flexmenu="flexmenu1" >
							<i class="fa fa-bars"></i>
						</a>
					  </li>
                        <li>
                           <div class="menutop" >
                              <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                              <h2>Menu</h2>
                           </div>
                           <ul style="display:none;" class="submenu">
                              <li>
                                 <ul class="topnav">
                                    <li class="level0 nav-6 level-top first parent">
                                       <a class="level-top" href="/"> <span>Home</span> </a>
                                    </li>
                                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="/about_us.php"> <span>About Us</span> </a> </li>
                                    <li class="level0 nav-6 level-top">
                                       <a class="level-top" href="/products.php" id="apiLink"> <span>Products</span> </a>                                      
                                    </li>
                                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="#"> <span>Support</span> </a> </li>                                   
                                    <li class="level0 parent drop-menu">
                                       <a href="/blog.php"><span>Blog</span> </a></li>
                                    <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="/contact_us.php"> <span>Contact Us</span> </a> </li>
                                    <?php if($_SESSION['user_id'] == ''){ ?>
                                    <li class="level0 parent drop-menu"><a href="/signup.php" ><span>LogIn</span></a></li> 
                                    <?php }?>
                                 </ul>
                                 <!--menu-right end--> 
                              </li>
                           </ul>
                        </li>
                     </ul>
                     <!--navmenu-->
                  </div>
                  <!--End mobile-menu -->
                 <ul id="nav" class="hidden-xs pull-left nom">
                    <li>  
						<a  href="javascript:void(0);" class="pull-right flexmenu1"  data-flexmenu="flexmenu1" >
							<i class="fa fa-bars"></i>
						</a>			
						<ul id="flexmenu1" class="flexdropdownmenu" style="margin-top:16px;margin-left:-50px;">
							<li style="padding:8px;color:#fff;font-weight:bold;background: #000;">CATEGORIES</li> 
							<li id="mycate"></li>
						</ul> 
					</li>
                 </ul>     
                  <ul id="nav" class="hidden-xs pull-right n1 menu-nav" style="display:block;">
                     <li class="level0 parent drop-menu active">
                        <a href="/"><span>Home</span> </a>
                     </li>
                       <li class="level0 parent drop-menu"> <a href="/about_us.php" class="level-top"> <span>About Us</span> </a></li>
                     <li class="level0 parent drop-menu">
                        <a href="/products.php"><span>Products</span> </a>
                       
                     </li>
                     <li class="level0 parent drop-menu"> <a href="#" class="level-top"> <span>Support</span> </a></li>
                     <li class="level0 parent drop-menu"> <a href="/contact_us.php" class="level-top"> <span>Contact Us</span> </a>
                     <li class="level0 parent drop-menu"><a href="/blog.php"><span>Blog</span> </a></li>
                    <?php if($_SESSION['user_id'] == ''){ ?>
                    <li class="level0 parent drop-menu"><a href="/signup.php"><span>LogIn</span></a></li> 
                    <?php } ?>
                  </ul>
               </div>
            </div> 
         </nav>
		 
         <!-- Navbar -->
         <!-- end nav -->
		 <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden;">
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/slider1.jpg" /> 
            </div>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/slider2.jpg" />
            </div>
            <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/slider3.jpg" />
            </div>
			 <div data-p="225.00" style="display: none;">
                <img data-u="image" src="img/slider4.jpg" />
            </div>  
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>  
<main> 
    <section> 
      <div class="container" >  
		<h3>
		See What's Trending
		<span><a href="/">View All</a></span>
		</h3> 
		<div class="row trending">
          <div class="grid_4">
            <div class="box">
              <div class="">
                <img alt="" width="160" src="http://pharmerz.com/images/API.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Pharmaceutical</h5>
              </div>
            </div>
          </div>
          <div class="grid_4">
            <div class="box">
              <div class="">
                <img alt="" width="160" src="http://pharmerz.com/images/Pellets.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Pellets</h5>
              </div>
            </div>
          </div>  
		  <div class="grid_4">
            <div class="box">
              <div class="">
                <img alt="" width="160" src="http://pharmerz.com/images/Pellets.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Pellets</h5>
              </div>
            </div>
          </div>
		  <div class="grid_4">
            <div class="box">
              <div class="">
                <img alt="" width="160" src="http://pharmerz.com/images/Lab.jpg">
              </div>
              <div class="box_cnt__no-flow">
                <h5>Lab Equipment</h5>
              </div>
            </div>
          </div>
          </div>
        </div> 
    </section>
    <section>
      <div class="container">  
		<h3>What we do.</h3>
		<div class="row row-video"> 
          <div class="col-md-12">
		  <div class="embed-responsive embed-responsive-16by9">
          	<iframe  class="embed-responsive-item" type="text/html" src="http://www.youtube.com/embed/E-3VSZ91Ijs?autoplay=0&rel=0" >
		  </iframe>  
        </div> 
        </div> 
        </div>  
      </div>     
  </section> 
    <section>
      <div class="container">
      <h3>Our Partners</h3> 
      <div class="owl-carousel">
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>Robert Taylor, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/images/partner.jpg" alt="">
                <cite>Lisa Bingo, our patient.</cite>
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                 <img src="/images/partner.jpg" alt="">
                <cite>David Stern, our patient.</cite>
              </blockquote>
            </div>

        </div>  

      </div>
    </section>
 <section>
      <div class="container">
		<h3>Latest From #Pharma</h3>
	 
			<div class="owl-carousel">
				<?php 
				$fileContents= file_get_contents("http://world.einnews.com/rss/MzIQ0GIUIW9cZNc2");
				$fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
				$fileContents = trim(str_replace('"', "'", $fileContents));
				$simpleXml = simplexml_load_string($fileContents);
				$json = json_encode($simpleXml);
				$data = json_decode($json, TRUE);
				foreach($data['channel']['item'] as $item){
				?>
				<div class="item">
                <a href="<?php echo $item['link'];?>"><p><?php echo $item['title'];?></p></a>
				</div>
				<?php } ?>
			</div>
	    </div>
	     
    </section>  
  </main>
    
<!--==section start== 
<div class="container addo">

	<div class="col-md-3">
		<a class="twitter-timeline" href="https://twitter.com/search?q=pharma" height="500px" data-widget-id="702087656033812480">Tweets about pharma</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	 </div>
   <!--==section-1 end== 
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <?php
		$get_user = mysqli_query($conn,"SELECT * FROM `home_advert` WHERE CATID in(SELECT ID FROM `homecategory` WHERE istop=1)");
             if(mysqli_num_rows($get_user)>0)
             { while($queRow = mysqli_fetch_array($get_user))
				{ $base_url = '/';  ?>
           <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <div class="adva">
                   <a href="#"> <img src="<?php echo $base_url.$queRow['image']?>" class="img-responsive" width="100%;"></a> 
               </div>
           </div>
        <?php  }}?> 
      </div>
   <!--==section-1 end== 

   <!--==section-2 start== 
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="auuiu">
               <p>See What's Trending</p>
           </div> 
           <div class="sect-1_slider">
               <div class="main">
            <div id="mi-slider" class="mi-slider">
			 <?php $magesfooter = mysqli_query($conn,"SELECT * FROM `home_advert` WHERE CATID in(SELECT ID FROM `homecategory` WHERE istop=0)");
             if(mysqli_num_rows($magesfooter)>0){ 
			 echo "<ul>";
			 $catid=2;  
			 while($queRow = mysqli_fetch_array($magesfooter)){
			 if($catid != $queRow['CATID'])
			 {
			 $catid =$queRow['CATID'];
			 echo "</ul><ul>";
			 }
			 ?> <li><a title="<?php echo $queRow['Title']; ?>" href="#"><img title="<?php echo $queRow['Title']; ?>" src="<?php echo $base_url.$queRow['image']?>" alt="<?php echo $queRow['Title']; ?>"><h4><?php echo $queRow['Title']; ?></h4></a></li>
				<?php }
			   echo "</ul>";
			   } ?>
                
               <nav class="hu">
			    <?php $categories = mysqli_query($conn,"SELECT * FROM `homecategory` WHERE istop=0");if(mysqli_num_rows($categories)>0){ while($queRow = mysqli_fetch_array($categories)){ ?> <a href="#"><?php echo $queRow['Name']; ?></a> <?php  } } ?></nav>
            </div>
         </div>
           </div>
       </div>  
   <!--==section-2 end== 
</div> -->

<?php include('footer.php');?>



   <!-- Footer -
      <footer class="footer">
         <!-- End of brand-logo -
         <div class="footer-middle container">
            <div class="col-md-4 col-sm-4">
               <div class="footer-logo"><a href="_index.html" title="Logo"><img src="/images/Picture1.png" width="50%" alt="logo"></a></div>
               <div class="payment-accept">
               </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 jki text-center">
              
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 text-center">  
                  <span><a style="color:#000;font-weight:bold;" href="#">Payment</a></span>
               </div>
               <!-- <a href="#" title="How to buy" style="padding-right: 40px;">How to buy</a>
                  <a href="#" title="Payment">Payment</a> -
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
               <h4>Contact us</h4>
               <div class="contacts-info">
                  <address>
                     <i class="add-icon">&nbsp;</i> C – 609, 6th Floor, Raga Building, Shell Colony Road<br>
                     &nbsp;Chembur Mumbai – 400071
                  </address>
                  <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +91 766661980</div>
                  <div class="email-footer"><i class="email-icon">&nbsp;</i><a href="mailto:support@pharmerz.com" style="font-size: 14px;color:#000;">support@pharmerz.com</a> </div>
               </div>
            </div>
         </div>
         <div class="footer-bottom container">
            <div class="col-sm-6 col-xs-12 coppyright"> &copy; 2015 Pharmerz. All Rights Reserved.</div>
            <div class="col-sm-6 col-xs-12 copy text-center"> 
              <ul class="list-inline">
                  <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a href="#"><i class="fa fa-youtube"></i></a></li>
              </ul>
            </div>
         </div>
      </footer>
      <!-- End Footer -->
  
     <!--  <div class="social">
         <ul>
            <li class="fb"><a href="#"></a></li>
            <li class="tw"><a href="#"></a></li>
            <li class="googleplus"><a href="#"></a></li>
            <li class="rss"><a href="#"></a></li>
            <li class="pintrest"><a href="#"></a></li>
            <li class="linkedin"><a href="#"></a></li>
            <li class="youtube"><a href="#"></a></li>
         </ul>
      </div> -->
      <!-- JavaScript -->
      <script type="text/javascript" src="/js/jquery.min.js"></script>
	  <script type="text/javascript" src="js/flexdropdown.js"> 
      </script>
      <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/application/spidergcon.js"></script> <script type="text/javascript" src="/js/application/jquery.steps.js"></script>
    
<script type="text/javascript" src="/js/application/intlTelInput.min.js"></script>  <script type="text/javascript" src="/js/common.js"></script>
      <script type="text/javascript" src="/js/revslider.js"></script> 
      <script type="text/javascript" src="/js/wow.min.js"></script>
      <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
      <script type="text/javascript" src="/js/application/search_proank.js"></script>
      <script type="text/javascript" src="/js/application/custom.js"></script>
        <script type="text/javascript" src="/js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
       <script type="text/javascript">
          $(document).ready(function(){
            $('#nomo').click(function(){
               $('#sido1').slideToggle(1000);
             });
             $('#nomo1').click(function(){
               $('#sido1').slideToggle(1000);
             });
          });  
      </script>
      <script src="/js/jquery.catslider.js"></script>
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
      <!-- Data WOW -->
      <script>
         new WOW().init();
      </script>
      <link rel="stylesheet" href="/css/grid.css" type="text/css">
	  	   <script type="text/javascript" src="js/jssor.slider.mini.js"></script> 
		    <script>
        jQuery(document).ready(function ($) { 
            var jssor_1_SlideoTransitions = [[{b:5500,d:3000,o:-1,r:240,e:{r:2}}],[{b:-1,d:1,o:-1,c:{x:51.0,t:-51.0}},{b:0,d:1000,o:1,c:{x:-51.0,t:51.0},e:{o:7,c:{x:7,t:7}}}],[{b:-1,d:1,o:-1,sX:9,sY:9},{b:1000,d:1000,o:1,sX:-9,sY:-9,e:{sX:2,sY:2}}],[{b:-1,d:1,o:-1,r:-180,sX:9,sY:9},{b:2000,d:1000,o:1,r:180,sX:-9,sY:-9,e:{r:2,sX:2,sY:2}}],[{b:-1,d:1,o:-1},{b:3000,d:2000,y:180,o:1,e:{y:16}}],[{b:-1,d:1,o:-1,r:-150},{b:7500,d:1600,o:1,r:150,e:{r:3}}],[{b:10000,d:2000,x:-379,e:{x:7}}],[{b:10000,d:2000,x:-379,e:{x:7}}],[{b:-1,d:1,o:-1,r:288,sX:9,sY:9},{b:9100,d:900,x:-1400,y:-660,o:1,r:-288,sX:-9,sY:-9,e:{r:6}},{b:10000,d:1600,x:-200,o:-1,e:{x:16}}]];
            var jssor_1_options ={$AutoPlay: true,$SlideDuration: 800,$SlideEasing: $Jease$.$OutQuint,$CaptionSliderOptions: {$Class: $JssorCaptionSlideo$,$Transitions: jssor_1_SlideoTransitions},$ArrowNavigatorOptions: {$Class: $JssorArrowNavigator$},$BulletNavigatorOptions: {$Class: $JssorBulletNavigator$}};
			var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            function ScaleSlider() { var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {refSize = Math.min(refSize, 1920);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //responsive code end
        });
    </script> 
<style> 
        /* jssor slider bullet navigator skin 05 css */
        /*
        .jssorb05 div           (normal)
        .jssorb05 div:hover     (normal mouseover)
        .jssorb05 .av           (active)
        .jssorb05 .av:hover     (active mouseover)
        .jssorb05 .dn           (mousedown)
        */
        .jssorb05 {
            position: absolute;
        }
        .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
            position: absolute;
            /* size of bullet elment */
            width: 16px;
            height: 16px;
            background: url('img/b05.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb05 div { background-position: -7px -7px; }
        .jssorb05 div:hover, .jssorb05 .av:hover { background-position: -37px -7px; }
        .jssorb05 .av { background-position: -67px -7px; }
        .jssorb05 .dn, .jssorb05 .dn:hover { background-position: -97px -7px; }

        /* jssor slider arrow navigator skin 22 css */
        /*
        .jssora22l                  (normal)
        .jssora22r                  (normal)
        .jssora22l:hover            (normal mouseover)
        .jssora22r:hover            (normal mouseover)
        .jssora22l.jssora22ldn      (mousedown)
        .jssora22r.jssora22rdn      (mousedown)
        */
        .jssora22l, .jssora22r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 40px;
            height: 58px;
            cursor: pointer;
            background: url('img/a22.png') center center no-repeat;
            overflow: hidden;
        }
        .jssora22l { background-position: -10px -31px; }
        .jssora22r { background-position: -70px -31px; }
        .jssora22l:hover { background-position: -130px -31px; }
        .jssora22r:hover { background-position: -190px -31px; }
        .jssora22l.jssora22ldn { background-position: -250px -31px; }
        .jssora22r.jssora22rdn { background-position: -310px -31px; }
		.page {position: relative;margin: auto;background: #e1e1e1;width: 100%;}
    </style> 
   </body>
</html>