<!DOCTYPE html>
<html lang="en">
<?php 
 include('include/dbconnection.php');
    session_start();
    if($_SESSION['user_id'] == ''){
    header('Location: ../index.php');
 }
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notification | Pharmerz | Panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
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
                            <div class="x_panel" id="dataTabId">
                                <div class="x_title">
                                    <h2>Received Notifications</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>S.No. </th>
												<th>Title</th>
												<th>Message</th>
                                                <th>Received From</th>
                                                <th>Email</th>  
                                                <th>Receive Date</th>  
                                                <th>Action </th>
                                            </tr>
                                        </thead> 
                                        <tbody id="get_product"> 
                                        </tbody> 
                                    </table>
                                </div>
                            </div>
                        </div> 
                        <br />
                        <br />
                        <br /> 
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
        <script src="js/chartjs/chart.min.js"></script>
        <script src="js/progressbar/bootstrap-progressbar.min.js"></script>
        <script src="js/nicescroll/jquery.nicescroll.min.js"></script>
        <script src="js/icheck/icheck.min.js"></script> 
	    <script src="../js/moment.js"></script>
        <script src="js/custom.js"></script>
        <script type="text/javascript" src="../js/application/custom.js"></script>
        <script type="text/javascript" src="../js/application/ankcustm.js"></script>
        <script src="http://pharmerz.com/admin/js/md5.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.9/js/dataTables.bootstrap.min.js"></script> 
        <script> 
$(document).ready(function (e){ 
    var tttt = 0;
    var loginToken = "";
    var loginTokenTS = "";
    var people = {};
    notesTable = $('#example').DataTable();
    var username = "<?php echo $_SESSION['user_email']; ?>";
    var password = "<?php echo $_COOKIE['password']; ?>";
    spiderG.getLoginToken(username, function () {
        loginToken = spiderG['loginToken'];
        loginTokenTS = spiderG['loginTokenTS'];
        $.ajax({type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/notification", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (responsepeople) {
                var flag = 1;
                people = responsepeople;
                if (responsepeople.length > 0) {
					 setInterval(function () {
            spiderG.getLoginToken(username, function () {
                loginToken = spiderG['loginToken'];
                loginTokenTS = spiderG['loginTokenTS'];
            });
        }, 100000);
                    saveDataInputs();
                }
            }
        })

    });
    var saveDataInputs = function () {
        customcall(people[tttt], function () {
            tttt++;
            if (tttt < people.length) {
                saveDataInputs();
            }
            else {
                $(".se-pre-con").fadeOut("slow");
            }
        });
    }
    function customcall(peoplesingle, callback) {
		 $.ajax({type: "GET",url:"http://vpn.spiderg.com:8081/SpiderGAPIServer/api/user/"+peoplesingle.actorid,contentType:'application/json',headers:{'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb','SPIDERG-Authorization': "SPIDERGAUTH "+ createAuthenticationHeader(username,password,loginToken,loginTokenTS)},success: function (userdata){ 
        notesTable.row.add([tttt + 1, peoplesingle.title, peoplesingle.message,userdata.firstname+" "+ userdata.lastname,userdata.username, moment(new Date(peoplesingle.timestamp)).format("DD-MM-YYYY"), "<a id='"+peoplesingle.id+"' alt='"+peoplesingle.seen+"' href='#' onclick='clickhandle(this)' title='"+ (peoplesingle.artifact == "rfq" ? "view_recieve_enquiry.php?id=" : (peoplesingle.artifact == "purchaseorder" ? "view_order.php?id=" : (peoplesingle.artifact == "quotation" ? "view_recieved_quotation.php?id=" : "view_recieved_invoice.php?id="))) + peoplesingle.artifactid + "'>View</a>"]).draw();
	 if(peoplesingle.seen=="N"){
		$(notesTable.row(tttt).nodes()).addClass('highlight_red');
		//notesTable.row[tttt].addClass('lalit'); 
	 }
        callback(); 
    }});
}
});
function clickhandle(control){
	if($(control).attr('alt')=="N"){
    var username = "<?php echo $_SESSION['user_email']; ?>";
    var password = "<?php echo $_COOKIE['password']; ?>";
		$.ajax({url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/notification/" + $(control).attr('id') + "/seen", type: "POST", contentType: 'application/json'
                , headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
                    success: function (data) { 
						window.location=$(control).attr('title');
                    },
                    error: function (err) {
						window.location=$(control).attr('title');
                        /// _cb(err);
                    }
                }); 
	}else{ 
		window.location=$(control).attr('title');
	}	
};

function mySetTableData(param_flag) {
    if (param_flag == 1) {
        location.reload();
        flag = 2;
    }
}
var flag = 1; 
        </script>
        
 
<?php  include('loader.php');?>      
</body>

</html>