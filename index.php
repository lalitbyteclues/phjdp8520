<?php 
include('home/include/dbconnection.php');
session_start();
if(isset($_GET['username']))
{ $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `email`= '".$_GET['username']."'");
  if(mysqli_num_rows($get_user)>0)
  { $queRow = mysqli_fetch_array($get_user);
    $_SESSION['user_id'] = $queRow['id'];
    $_SESSION['user_email'] = $queRow['email'];
  }
  else
  {  $q = "INSERT INTO `user`(email,password) VALUES ('".$_GET['username']."','".$_COOKIE['password']."')";
     $insdata = mysqli_query($conn,$q);
    $user_id = mysqli_insert_id($conn);
    $get_user = mysqli_query($conn,"SELECT * FROM `user` WHERE `id`= '$user_id'");
    if(mysqli_num_rows($get_user)>0)
    { $queRow = mysqli_fetch_array($get_user);
      $_SESSION['user_id'] = $queRow['id'];
      $_SESSION['user_email'] = $queRow['email'];
    }}}
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('head.php'); ?> 
   <body class="cms-index-index" bgcolor="#E6E6FA">
   <script src="/js/twitterFetcher_min.js"></script> 
<script>
var LatestTweets = {init: function () { twitterFetcher.fetch({      id: '702087656033812480',     domId: 'latest-tweets'   }); }}; 
LatestTweets.init();
</script> 
      <div class="page">
          <!--===header start===-->
        <?php include('inner_menu.php'); ?> 
		 <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1300px; height: 500px; overflow: hidden; visibility: hidden;">
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
        <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1"> 
            <div data-u="prototype" style="width:16px;height:16px;"></div>
        </div> 
        <span data-u="arrowleft" class="jssora22l" style="top:0px;left:12px;width:40px;height:58px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora22r" style="top:0px;right:12px;width:40px;height:58px;" data-autocenter="2"></span>
    </div>  
<main> 
    <section> 
      <div class="container" >  
		<h3>
		See What's Trending
		<span><a href="/products.php">View All</a></span>
		</h3> 
		<div class="row trending">
		 <?php $magesfooter = mysqli_query($conn,"SELECT * FROM `home_advert` WHERE CATID in(SELECT ID FROM `homecategory` WHERE istop=0)");
             if(mysqli_num_rows($magesfooter)>0){  
			 $catid=2;  
			 while($queRow = mysqli_fetch_array($magesfooter)){ 
			 $base_url = '/';
			 ?>
           <div class="grid_4">
            <div class="box">
              <div class="">
                <img title="<?php echo $queRow['Title']; ?>" alt="<?php echo $queRow['Title']; ?>" width="160" src="<?php echo $base_url.$queRow['image']?>">
              </div>
              <div class="box_cnt__no-flow">
                <h5><?php echo $queRow['Title']; ?></h5>
              </div>
            </div>
          </div> 
 <?php }} ?>  
          </div>
        </div> 
    </section>
    <section>
      <div class="container">  
		<h3>What we do.</h3>
		<div class="row row-video"> 
          <div class="col-md-12">
		  <div class="embed-responsive embed-responsive-16by9">
		  <div class='youtube_codegena' id='E-3VSZ91Ijs' data-params='?&theme=light&autoplay=1&color=white&autohide=2&cc_load_policy=1&modestbranding=1&rel=0&iv_load_policy=3' src='http://pharmerz.com/images/youtubethumbnail.png'style='width:850; height:500;'></div><script src='http://codegena.com/assets/js/youtube-embedv1.1.js'></script>
          <!--	<iframe  class="embed-responsive-item" type="text/html" src="http://www.youtube.com/embed/E-3VSZ91Ijs?autoplay=0&rel=0" >
		  </iframe>  -->
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
                  <img src="/img/acme.png" alt="">
                <!--<cite>ACME</cite>-->
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/img/acumen.png" alt="">
                <!--<cite>ACUMEN Pharmaceuticals</cite>-->
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/img/avra_lab.png" alt="">
                <!--<cite>AVRA</cite>-->
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/img/bdr.png" alt="">
                <!--<cite>BDR</cite>-->
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/img/dk_pharmachem.png" alt="">
                <!--<cite>Lisa Bingo, our patient.</cite>-->
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                  <img src="/img/evrest_organics_ltd.png" alt="">
                <!--<cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/img/fullife.png" alt="">
                <!--<cite>Robert Taylor, our patient.</cite>-->
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/img/gennex_laboratories_ltd.png" alt="">
                <!--<cite>Lisa Bingo, our patient.</cite>-->
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                 <img src="/img/jpn_pharma.png" alt="">
                <!--<cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                  <img src="/img/kreative_organics.png" alt="">
                <!--<cite>Robert Taylor, our patient.</cite>-->
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/img/krish_chemicals.png" alt="">
                <!--<cite>Lisa Bingo, our patient.</cite>-->
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/img/optimus.png" alt="">
                <!--<cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/img/optus_pharma.png" alt="">
                <!--<cite>Robert Taylor, our patient.</cite>-->
              </blockquote>
            </div>
            
            <div class="item">
              <blockquote>
                  <img src="/img/phalanx.png" alt="">
                <!--<cite>Lisa Bingo, our patient.</cite>-->
              </blockquote>
            </div>

            <div class="item">
              <blockquote>
                  <img src="/img/rajasthan_antiboitics_ltd.png" alt="">
                <!--<cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			 <div class="item">
              <blockquote>
                 <img src="/img/rani_life_science.png" alt="">
                <!--<cite>Robert Taylor, our patient.</cite>-->
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                  <img src="/img/rashmi_pharma_pvt.png" alt="">
                <!--<cite>Lisa Bingo, our patient.</cite>-->
              </blockquote>
            </div> 
            <div class="item">
              <blockquote>
                 <img src="/img/rhydburg.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                 <img src="/img/scoat_pharma.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                 <img src="/img/shree_pharma.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                 <img src="/img/shreepathi.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                 <img src="/img/sms_pharmaceuticals.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                 <img src="/img/srijan_pharma_search.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
              </blockquote>
            </div>
			<div class="item">
              <blockquote>
                 <img src="/img/threx.png" alt="">
               <!-- <cite>David Stern, our patient.</cite>-->
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
  <?php include('footer.php');?>  
     
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
});
    </script>  
   </body>
</html>