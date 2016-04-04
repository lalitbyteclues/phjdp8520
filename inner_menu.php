 <?php 
   include('home/include/dbconnection.php'); 
?>
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
                     <li id="a1" class="level0 parent drop-menu">
                        <a href="/"><span>Home</span> </a>
                     </li>
                    <li id="a2"  class="level0 parent drop-menu"> <a href="/about_us.php" class="level-top"> <span>About Us</span> </a></li>
                     <li id="a3"  class="level0 parent drop-menu">
                        <a href="/products.php"><span>Products</span> </a> 
                     </li>
                     <li id="a4"  class="level0 parent drop-menu"> <a href="#" class="level-top"> <span>Support</span> </a></li>
                     <li  id="a5" class="level0 parent drop-menu"> <a href="/contact_us.php" class="level-top"> <span>Contact Us</span> </a></li>
                     <li  id="a6" class="level0 parent drop-menu"><a href="/blog.php"><span>Blog</span> </a></li>
                    <?php if($_SESSION['user_id'] == ''){ ?>
                    <li id="a7"  class="level0 parent drop-menu"><a href="/signup.php"><span>LogIn</span></a></li> 
                    <?php } ?>
                  </ul>
				  <script type="text/javascript">
        function setMenu(menuId) {   document.getElementById(menuId).setAttribute("class", "active"); } 
     var mx = window.location.href; 
     name = mx.substring(mx.lastIndexOf("/") + 1, mx.length);
     if (name.indexOf("index.php") != -1) {
         setMenu("a1");
     }
     else if (name.indexOf("about_us.php") != -1) {
         setMenu("a2");
     }
     else if (name.indexOf("products.php") != -1) {
         setMenu("a3");
     }
     else if (name.indexOf("support.php") != -1) {
         setMenu("a4");
     }
     else if (name.indexOf("contact_us.php") != -1) {
         setMenu("a5");
     }  
     else if (name.indexOf("blog.php") != -1) {
         setMenu("a6");
     }    
	else if (name.indexOf("signup.php") != -1) {
         setMenu("a7");
     }else{ setMenu("a1");} 	 
                 
</script>
               </div>
            </div> 
         </nav> 