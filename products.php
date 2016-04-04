
<!DOCTYPE html>
<html lang="en">
  <?php session_start();
 include('head.php'); ?> 
<body class="cms-index-index" >
<style type="text/css">.APILIST {height: 200px;overflow: auto;}</style>
<link rel="stylesheet" type="text/css" href="/css/slidernav.css" media="screen, projection" />
  <div class="page"> 
  <!-- Header -->
    <?php include('inner_menu.php'); ?>
	 <div class="container">
 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 <br>&nbsp;
		 </div>
  <!-- end nav --> 
   <!-- **************************************************************************************************** -->
  <div id="wizard">
    <h1>Select Products</h1>
<div>
<img src="/tinymce/skins/lightgray/img/loader.gif" id="productloader">
<div id="slider"> 
	<div class="slider-content">
	 <ul><li id="a"><a name="a" class="title">A</a>
	 <ul id="API-A"></ul>
			</li>
			<li id="b"><a name="b" class="title">B</a>
				<ul id="API-B"> 
				</ul>
			</li>
			<li id="c"><a name="c" class="title">c</a>
				<ul  id="API-C"> </ul>
			</li>
			<li id="d"><a name="d" class="title">d</a>
				<ul  id="API-D">  </ul>
			</li>
			<li id="e"><a name="e" class="title">E</a>
				<ul  id="API-E"></ul>
			</li>
			<li id="f"><a name="f" class="title">f</a>
				<ul  id="API-F"></ul>
			</li>
			<li id="g"><a name="g" class="title">g</a>
				<ul  id="API-G"></ul>
			</li>
			<li id="h"><a name="h" class="title">h</a>
				<ul  id="API-H"></ul>
			</li>
			<li id="i"><a name="i" class="title">i</a>
				<ul  id="API-I"></ul>
			</li>
			<li id="j"><a name="j" class="title">j</a>
				<ul  id="API-J"></ul>
			</li>
			<li id="k"><a name="k" class="title">k</a>
				<ul  id="API-K"></ul>
			</li>
			<li id="l"><a name="l" class="title">l</a>
				<ul  id="API-L"></ul>
			</li>
			<li id="m"><a name="m" class="title">m</a>
				<ul  id="API-M"></ul>
			</li>
			<li id="n"><a name="n" class="title">n</a>
				<ul id="API-N"></ul>
			</li>
			<li id="o"><a name="o" class="title">o</a>
				<ul  id="API-O"> </ul>
			</li>
			<li id="p"><a name="p" class="title">p</a>
				<ul  id="API-P"></ul>
			</li>
			<li id="q"><a name="q" class="title">q</a>
				<ul  id="API-Q"></ul>
			</li>
			<li id="r"><a name="r" class="title">r</a>
				<ul  id="API-R"></ul>
			</li>
			<li id="s"><a name="s" class="title">s</a>
				<ul  id="API-S"></ul>
			</li>
			<li id="t"><a name="t" class="title">t</a>
				<ul id="API-T"></ul>
			</li>
			<li id="u"><a name="u" class="title">u</a>
				<ul  id="API-U"></ul>
			</li>
			<li id="v"><a name="v" class="title">v</a>
				<ul  id="API-V"></ul>
			</li>
			<li id="w"><a name="w" class="title">w</a>
				<ul  id="API-W"></ul>
			</li>
			<li id="x"><a name="x" class="title">x</a>
				<ul  id="API-X"></ul>
			</li>
			<li id="y"><a name="y" class="title">y</a>
				<ul  id="API-Y"></ul>
			</li>
			<li id="z"><a name="z" class="title">z</a>
				<ul  id="API-Z"></ul>
			</li>
		</ul>
	</div>
</div>  
</div> 
    <h1 style="text-align: centre;">Select Suppliers</h1>
    <div> <div id='div_session_write'> </div>
      <div class="col-md-3"><div class="show_before" id="selectedApi1"></div></div>
      <div class="col-md-3"><div class="show_before" id="selectedApi2"></div></div>
      <div class="col-md-3"><div class="show_before" id="selectedApi3"></div></div>
      <div class="col-md-3"><div class="show_before" id="selectedApi4"></div></div>
    </div> 
    <h1 style="text-align: centre;">Send Enquiry</h1> 
    <div>
      <div id="valuesForm"></div>
    </div> 
  </div>  <!-- End id=wizard --> 
</div> 
</div> 
 <div  role="dialog" tabindex="-1" id="login-modal" class="modal modal-login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title text-center" id="loginModalLabel">Login / Sign Up</h4>
      </div>
      <div class="modal-body">
 <div class="login-form-container">  
      <div class="panel panel-login" > 
	  <div class="col-md-12">
                    <div class="col-xs-6">
                      <a href="#" class="text-primary" class="active" id="login-form-link"><h4 class="modal-title text-center">Login</h4></a>
                    </div>
                    <div class="col-xs-6"> 
                      <a href="/signup.php" class="text-primary" ><h4 class="modal-title text-center">Buyer Registration</h4></a>  </div>
					  </div>
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <form id="login-form" method="get" role="form" style="display: block;">
                        <div class="form-group">
                          <input type="text" name="usernameLogin" id="loginUsername" tabindex="1" class="form-control" placeholder="Username" value="">
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" id="loginPassword" tabindex="2" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group text-center">
                          <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                          <label for="remember"> Remember Me</label>
                        </div>
                        <div class="form-group"> 
                            <div class="col-sm-6 col-sm-offset-3">
                              <input type="button" name="login-submit" id="login-submit" tabindex="4" class="btn btn-primary" 
							  value="Log In" onClick="submitLoginForm()">
                         </div>
                        </div>
						 <div class="form-group"> 
                            <div class="col-sm-6 col-sm-offset-3">
                          <div id="danger" style="display:none;" class="alert alert-danger">
								<span class="alert-danger"></span>
							</div>
                         </div>
                        </div>
                      
                      </form> 
                    </div>
                  </div>
                </div>
				</div>  
				</div>  
				</div> 
				</div>  
				</div> 
				</div>  
 <!-- Footer -->
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 <br>&nbsp;
		 </div></div>   
 <?php include('footer.php'); ?>  
<script>
 $( document ).ready(function() {
  var searchitem = "<?php if(isset($_GET['namelike'])){ echo $_GET['namelike']; }else{echo "";}?>"
  var categoryid = "<?php if(isset($_GET['categoryid'])){ echo $_GET['categoryid']; }else{echo "";}?>"
  getAPIs(searchitem,categoryid,"<?php if(isset($_SESSION['user_email'])){ echo $_SESSION['user_email']; }else{echo "";}
   ?>","<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password']; }else{echo "";}?>");
});
// new WOW().init();
</script> 
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
<script type="text/javascript">
	$(document).ready(function(){
		$('#slider').sliderNav();
		$('#transformers').sliderNav({items:['autobots','decepticons'], debug: true, height: '300', arrows: false});
	});
</script>
</body>
</html>
