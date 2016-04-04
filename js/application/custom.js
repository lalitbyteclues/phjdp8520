password = "";
var loginToken = '';
var loginTokenTS = -1;
var regStep = -1;
var basepath = '/SpiderGAPIServer/api';
//host: 'localhost',
var host = 'http://vpn.spiderg.com:';
var spiderGEndpoint = "/login";
var port = 8081;
var loginAddress = host + port + basepath + spiderGEndpoint;
var resendaddress = host + port + basepath + "/register/resendverify";
var path = '';
var spiderG = {};
spiderG.csecret = 'PHARMERZPSECRET';
spiderG.createAuthenticationHeader = function (username, password, logintoken, logintokents) {
    var b64string = "";
    if (password) {
        var passwordmd5 = CryptoJS.MD5(password);
        // console.log(passwordmd5);
        // console.log("creating b64: "+passwordmd5+":"+csecret+":"+logintokents);
        b64string = window.btoa(passwordmd5 + ":" + spiderG.csecret + ":" + logintokents);
        // console.log("authHeader: "+username+":"+b64string+":"+logintoken);
        return username + ":" + b64string + ":" + logintoken;
    }
    else {
        return username;
    }
}
spiderG.getLoginToken = function (username, cb) {
    $.ajax({
        url: loginAddress, headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, null, "", "") },
        success: function (response) {
            people = response;
            spiderG.loginToken = people.loginToken;
            spiderG.loginTokenTS = people.loginTokenTS;
        },
        error: function (err) {
            //console.log("Login token request fail..."); 
        }
    }).done(function (response) {
        loginToken = response.loginToken;
        loginTokenTS = response.loginTokenTS;
        authheader = spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS);
        // console.log(authheader);
        cb(null, authheader);
    });
};
var getAuthHeader = function () {
    spiderG.getLoginToken();
    return authheader;
}
$(document).ready(function (e) {
    loginToken = "";
    loginTokenTS = ""; 
   var username = localStorage.getItem('username');
   var password = localStorage.getItem('password');
	setInterval(function () {
            spiderG.getLoginToken(username, function () {
                loginToken = spiderG['loginToken'];
                loginTokenTS = spiderG['loginTokenTS'];
            });
        }, 100000);
    function getnotifications() { 
        document.addEventListener('DOMContentLoaded', function () {
            if (Notification.permission !== "granted")
                Notification.requestPermission();
        }); 
        spiderG.getLoginToken(username, function () {
            loginToken = spiderG['loginToken'];
            loginTokenTS = spiderG['loginTokenTS'];
            $.ajax({
                type: "GET", url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/notification", contentType: 'application/json', headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + createAuthenticationHeader(username, password, loginToken, loginTokenTS) }, success: function (responsepeople) {
                    peoplenotifications = responsepeople;
                    var notificationcount = 0;
                    for (i = 0; i < responsepeople.length; i++) {
                        if (responsepeople[i].seen == "N") {
                            notificationcount += 1;
                        }
                        var miliseconds = (new Date() - new Date(responsepeople[i].timestamp));
                        if (miliseconds <= 60000 && responsepeople[i].seen == "N") {
                            if (!Notification) {
                                alert('Desktop notifications not available in your browser. Try Chromium.');
                                return;
                            }
                            if (Notification.permission !== "granted") {
                                Notification.requestPermission().then(function (result) {
                                    if (result === 'denied') {
                                        console.log('Permission wasn\'t granted. Allow a retry.');
                                        return;
                                    }
                                    if (result === 'default') {
                                        console.log('The permission request was dismissed.');
                                        return;
                                    }
                                });
                            }
                            else { 
							var type=responsepeople[i].artifact == "rfq" ? " Enquiry " : (responsepeople[i].artifact == "purchaseorder" ? "Purchase Order" : (responsepeople[i].artifact == "quotation" ? " Quotation " : " Invoice "));
							console.log(type);
                                var notification = new Notification('Notification title', {
                                    icon: 'http://pharmerz.com/images/pharmerz_logo2%20.png',
                                    body: "Hey there! You've a new " + type + "!",
                                });
                                notification.onclick = function () {
                                    for (i = 0; i < responsepeople.length; i++) {
									var miliseconds = (new Date() - new Date(responsepeople[i].timestamp));
           if (miliseconds <= 60000 && responsepeople[i].seen == "N") {  
                $.ajax({
                    url: "http://vpn.spiderg.com:8081/SpiderGAPIServer/api/notification/" + responsepeople[i].id + "/seen", type: "POST", contentType: 'application/json'
                , headers: { 'SPIDERG-API-Key': 'e5e3b300-31e9-4ad2-a705-4f8935218fcb', 'SPIDERG-Authorization': "SPIDERGAUTH " + spiderG.createAuthenticationHeader(username, password, loginToken, loginTokenTS) },
                    success: function (data) { 
                    },
                    error: function (err) {
                        /// _cb(err);
                    }
                });   
           
					if (responsepeople[i].artifact == "rfq") {
                            window.open("http://pharmerz.com/home/view_recieve_enquiry.php?id=" + responsepeople[i].artifactid);
                        } else
                            if (responsepeople[i].artifact == "purchaseorder") {
                                window.open("http://pharmerz.com/home/view_order.php?id=" + responsepeople[i].artifactid);
                            }
                            else
                                if (responsepeople[i].artifact == "quotation") {
                                    window.open("http://pharmerz.com/home/view_recieved_quotation.php?id=" + responsepeople[i].artifactid);
                                } else {
                                    window.open("http://pharmerz.com/home/view_recieved_invoice.php?id=" + responsepeople[i].artifactid);
                                }			
        }
		}
                                };
                            }
                        }
                        $(".badge-notify").html(notificationcount);
                    }
                }
            })
        });
    }
    getnotifications();
   setInterval(function () { getnotifications(); },60000);  
});