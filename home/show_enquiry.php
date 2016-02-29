<!DOCTYPE html>
<html lang="en">
<?php   include('include/dbconnection.php');     session_start();     if($_SESSION['user_id'] == ''){     header('Location: ../index.php'); }  ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pharmerz | Panel</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">
    <link href="css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
    <script src="js/jquery.min.js"></script>
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
 <?php include('sidebar.php');?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">                    
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Sent Enquiries</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings"><th>S.No.</th><th>Document No</th><th>Sent To</th><th>Product Name</th> <th>Location</th> <th>Quantity</th><th>Notes </th><th>Action </th></tr></thead>
                                        <tbody id="get_product"></tbody>
                                    </table>
                                </div>
                            </div>
                        </div><br /><br /><br />
                    </div>
                </div>
                 <footer>
                    <div class="">
                        <p class="pull-right">
                             <a href="index.php" class="site_title"><img style="width:150px" class="img-responsive" src="/images/pharmerz_logo2 .png"></a>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
				</div>				
            </div>
		</div> 
        <script src="js/bootstrap.min.js"></script>
        <!-- chart js -->
        <script src="js/chartjs/chart.min.js"></script>
        <!-- bootstrap progress js -->
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <!-- icheck -->
        <script src="js/icheck/icheck.min.js"></script>
        <script src="js/custom.js"></script>
         <!-- Datatables -->
        <script type="text/javascript" src="../js/application/custom.js"></script>
        <script type="text/javascript" src="../js/application/ankcustm.js"></script>
        <script src="http://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/md5.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script>
        <script>
          $(document).ready(function() {
		  var tttt=0; 
		  supplierlist=[];
		  locationlist=[];
		 plist=[];
          notesTable =   $('#example').DataTable();
            var username = "<?php echo $_SESSION['user_email']; ?>";
            var password = "<?php echo $_COOKIE['password']; ?>";
			var people={};
			 var loginToken="";
			 var loginTokenTS="";
            spiderG.getLoginToken(username, function()
            {     
			 $(".se-pre-con").fadeIn("slow"); 
			loginToken = spiderG['loginToken'];
                   loginTokenTS = spiderG['loginTokenTS'];
       $.ajax({type: "GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/rfq?limit=10000&unique=Y",contentType:'application/json',headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data){
					people =data;
					 $(".se-pre-con").fadeOut("slow"); 
  setInterval(function () {
            spiderG.getLoginToken(username, function () {
                loginToken = spiderG['loginToken'];
                loginTokenTS = spiderG['loginTokenTS'];
            });
        }, 100000);					
					 if(people.length>0){ 
					 saveDataInputs();}
                },error: function (err) { console.log(err);  }
        });
        }); 
		var saveDataInputs = function() {
	  customcall(people[tttt],function(){  
        tttt++;   
        if(tttt< people.length) {
		 saveDataInputs(); 
        }
		else
		{  $(".se-pre-con").fadeOut("slow"); 
		}
		 });
		}
function customcall(peoplesingle, callback) {
    var qty = '';
    var notes = '';
    var product = '';  
    for (var k = 0; k < peoplesingle.lineitems.length; k++) {
        qty = peoplesingle.lineitems[k].quantity;
        product = peoplesingle.lineitems[k].product;
        notes = peoplesingle.lineitems[k].notes;
    }	
if($.grep(supplierlist,function (category){return category.id == peoplesingle.bpartner }).length==0){ 				 
    $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/org?orgid=" + peoplesingle.bpartner, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
            people1 = data;
            bpartner = people1.name; 
			supplierlist.push(people1);
            if (peoplesingle.deliverylocation == "null") { 
                notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, "", "", qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                callback();
            } else{
if($.grep(locationlist,function (category){return category.id == peoplesingle.deliverylocation }).length==0){				 
 $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/" + peoplesingle.deliverylocation, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                        people2 = data;
						locationlist.push(people2);
                        Locationfull = people2.city + "," + people2.region;
                        if (product.length > 0) {
							if($.grep(plist,function (category){return category.id ==product}).length==0){				 
                            $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + product, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                                    productlist = data;
									plist.push(productlist);
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();
                                }, error: function (err) {
                                    callback();
                                }
                            });}else{
								    productlist = $.grep(plist,function (category){return category.id ==product})[0]; 
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();  }
                        } else {
                            notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, "", Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                            callback();
                        } }, error: function (err) {
                        callback(); }
});}else{
					people2 = $.grep(locationlist,function (category){return category.id == peoplesingle.deliverylocation })[0]; 
                        Locationfull = people2.city + "," + people2.region;
                        if (product.length > 0) {
							if($.grep(plist,function (category){return category.id ==product}).length==0){
                            $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + product, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                                    productlist = data;
								   plist.push(productlist);
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();
                                }, error: function (err) {
                                    callback();
                                }
                            });}else{
								    productlist = $.grep(plist,function (category){return category.id ==product})[0]; 
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();  }
                        } else {
                            notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, "", Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                            callback();
                        } 
}
	
	}
        }, error: function (err) {
            callback();
        }

});
}
else
{ 
    people1 =$.grep(supplierlist,function (category){return category.id == peoplesingle.bpartner })[0];
	 bpartner = people1.name;  
  if (peoplesingle.deliverylocation == "null") { 
    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, "", "", qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
    callback();
   } else{ 
   if($.grep(locationlist,function (category){return category.id == peoplesingle.deliverylocation }).length==0){
   $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/location/" + peoplesingle.deliverylocation, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                        people2 = data; 
						locationlist.push(people2);
                        Locationfull = people2.city + "," + people2.region;
                        if (product.length > 0) {
							if($.grep(plist,function (category){return category.id ==product}).length==0){
                            $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + product, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                                    productlist = data; 
									plist.push(productlist);
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();
                                }, error: function (err) {
                                    callback();
                                }
                            });}else{
								    productlist = $.grep(plist,function (category){return category.id ==product})[0]; 
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();  }
                        } else {
							
                            notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, "", Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                            callback();
                        }


                    }, error: function (err) {
                        callback();
                    }
   });}else{
	  people2 = $.grep(locationlist,function (category){return category.id == peoplesingle.deliverylocation })[0]; 
				console.log($.grep(locationlist,function (category){return category.id == peoplesingle.deliverylocation }));	
				console.log(people2);	
					Locationfull = people2.city + "," + people2.region;
                        if (product.length > 0) {
							if($.grep(plist,function (category){return category.id ==product}).length==0){
                            $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/" + product, contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (data) {
                                    productlist = data;
									plist.push(productlist);
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();
                                }, error: function (err) {
                                    callback();
                                }
                            });}else{
								    productlist = $.grep(plist,function (category){return category.id ==product})[0]; 
                                    notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, productlist.name, Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                                    callback();  }
                        } else {
							
                            notesTable.row.add([tttt + 1, peoplesingle.documentno, bpartner, "", Locationfull, qty, notes, "<a href='view_enquiry.php?id=" + peoplesingle.id + "'>View</a>"]).draw();
                            callback();
                        } 
                     
   } }
} 
}
}); 
        function deletepro(id)
        {
           var r = confirm('Are you really want to delete this ?');
            if(r==true)
            {    var username = "<?php echo $_SESSION['user_email']; ?>";
                var password = "<?php echo $_COOKIE['password']; ?>";
                spiderG.getLoginToken(username, function()
                { var loginToken = spiderG['loginToken'];
                  var loginTokenTS = spiderG['loginTokenTS'];
                  $.ajax({type:"DELETE",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/product/"+id,headers:{'SPIDERG-API-Key':'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (data ,textStatus){
                        alert('Deleted SuccessFully');
                        location.reload();
                    },
                    error: function (err) {
                      console.log(err); 
                      }});
                });
            }
        }
        </script>
        
    
<?php  include('loader.php');?>   
</body>

</html>