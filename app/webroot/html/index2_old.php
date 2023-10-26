<?php 
//session_name("CAKEPHP");
//session_start();

include("includes/config.php");



//$parentTestlists=mysql_fetch_assoc($parentTests);
//print_r($parentTestlists);exit;

/*===========================set Patient id====================*/

if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='D'){ 
		$doctorid=$_SESSION['loginID'];
		$curdate= date('Y-m-d');
        $curtime= date("H:i:s");
        $curDay= date("D");
        $curday= strtolower($curDay);
		$appointDetsql="select * from regular_appointments where doctorid='".$doctorid."' and is_conv !=2 and status=1 and is_connected=1 and is_available=1 and DATE(`created`)='".$curdate."'";
		$appointDetails=mysql_query($appointDetsql)or die(mysql_error());
        if(mysql_num_rows($appointDetails)>0){
            $appointDetail = mysql_fetch_assoc($appointDetails);
            $patienid = $appointDetail['patientid'];
        }

		$_SESSION['patientID']=$patienid;
		$_SESSION['doctorID']=$doctorid;
}



/*===========================set Patient id====================*/

/*===========================set Doctor id====================*/

if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='P'){
	$patientid=$_SESSION['loginID'];
	$cur_date=date('Y-m-d');
	$appointPatientDetsql="select * from regular_appointments where patientid='".$patientid."' and is_conv !=2 and status=1 and is_connected=1 and is_available=1 and DATE(`created`)='".$cur_date."'";
    //echo $appointDetsql;
    $appointPatientDetails=mysql_query($appointPatientDetsql)or die(mysql_error());
    if(mysql_num_rows($appointPatientDetails)>0){
            $appointPatientDetail = mysql_fetch_assoc($appointPatientDetails);
           // print_r($appointDetail);
            $doctorId = $appointPatientDetail['doctorid'];
        }

	$_SESSION['patientID']=$patientid;

	$_SESSION['doctorID']=$doctorId;
}

/*===========================set Doctor id====================*/
//print_r($_SESSION);
function testDet($tstid=''){
	//echo "select * from test_masters where id='".$tstid."'" ."<br>";
	$testDets=mysql_query("select * from test_masters where id='".$tstid."'")or die(mysql_error());
	if(mysql_num_rows($testDets)>0){
		$testDet=mysql_fetch_assoc($testDets);
		return $testDet['test_name'];
	}
}


?>

<!DOCTYPE html>
<html lang="en"><head>
<title>InHealth</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<link href="css/font-awesome.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="css/tabpanel.css" /> 
<link type="text/css" rel="stylesheet" href="css/responsive-tabs.css" /> 
<!--<link rel="stylesheet" href="css/menu.css" type="text/css" media="screen">-->
<link rel="stylesheet" href="css/latestnews_slider.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/search.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/responsivemultimenu.css" type="text/css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script>



<script type="text/javascript" src="js/jquery.flexisel.js"></script>
<script type="text/javascript" src="js/responsivemultimenu.js"></script>




<script src="js/jquery-scrolltofixed.js" type="text/javascript"></script>
<script>
$(document).ready(function() {

	$('header').scrollToFixed();

	var summaries = $('.summary');
	summaries.each(function(i) {
		var summary = $(summaries[i]);
		var next = summaries[i + 1];

		summary.scrollToFixed({
			marginTop: $('header').outerHeight(true) + 10,
			limit: function() {

				var limit = 0;
				if (next) {
					limit = $(next).offset().top - $(this).outerHeight(true) - 10;
				} else {
					limit = $('.footer').offset().top - $(this).outerHeight(true) - 10;
				}
				return limit;
			},
			zIndex: 9999
		});
	});
});
</script>


<!--chat stylesheet-->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <!-- use http://una.im/CSSgram/ for filters -->
    <link rel="stylesheet" href="libs1/cssgram.min.css">
    <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="css1/responsive-tabs.css">

<!--chat stylesheet End -->
<!-- <link rel="stylesheet" href="//cdn.webrtc-experiment.com/style.css">-->
  <style>
            audio, video {
                -moz-transition: all 1s ease;
                -ms-transition: all 1s ease;
                
                -o-transition: all 1s ease;
                -webkit-transition: all 1s ease;
                transition: all 1s ease;
                vertical-align: top;
            }

            input {
                border: 1px solid #d9d9d9;
                border-radius: 1px;
                font-size: 2em;
                margin: .2em;
                width: 30%;
            }

            .setup {
                border-bottom-left-radius: 0;
                border-top-left-radius: 0;
                font-size: 102%;
                height: 47px;
                margin-left: -9px;
                margin-top: 8px;
                position: absolute;
            }

            p { padding: 1em; }

            li {
                border-bottom: 1px solid rgb(189, 189, 189);
                border-left: 1px solid rgb(189, 189, 189);
                padding: .5em;
            }
        </style>
        <script>
            document.createElement('article');
            document.createElement('footer');
        </script>
        
            
          <script src="js1/firebase.js"> </script>
        <script src="js1/RTCPeerConnection-v1.5.js"> </script>
        <script src="js1/conference.js"> </script>
        
        <!-- script used to stylize video element -->
        <script src="js1/getMediaElement.min.js"> </script>
        
        <!-- scripts used for video-conferencing -->
       <!-- <script src="//cdn.webrtc-experiment.com/firebase.js"> </script>
        <script src="//cdn.webrtc-experiment.com/RTCPeerConnection-v1.5.js"> </script>
        <script src="//cdn.webrtc-experiment.com/video-conferencing/conference.js"> </script>
       
        <script src="//cdn.webrtc-experiment.com/getMediaElement.min.js"> </script>-->
        <!-- script used to stylize video element -->
        


</head>
<body>





<!--===================================Logo Section===================================-->
<header>
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-3 header_logo"><img src="images/inhealth_logo.png" alt="InHealth"></div>
            
            
            <div class="col-md-8 col-sm-8 header_nav">
            
            
                    <div class="rmm style">
                        <ul>
                            <li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/inhealth/dashboard';?>">Dashboard</a></li>
                            <li><a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/inhealth/pages/about-us';?>">About Us</a></li>
                            <li><a href="news.html" class="active">Appointments</a></li>
                            <!--<li><a href="product.html">Products</a>
                                <ul>
                                    <li><a href="product.html">Products1</a></li>
                                    <li><a href="product.html">Products2</a></li>
                                    <li><a href="product.html">Products3</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Telehealth Solutions</a></li>
                            <li><a href="contact.html">Contact Us</a></li>-->
                        </ul>
                    </div>
                
                
            </div>
            
            <div class="col-md-1 col-sm-1 header_search">
                <div class="searchpanel">
                    	<form>
                        	<input type="text" placeholder="Search..." class="form-control searchField">
                            <btton type="submit" value="" class="btn searchBtn"  onclick="showsearchpan();"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                        </form>
                    </div>
            </div>
            
            
            
            
        </div>
    </div>
</header>






<!--===================================Banner Section===================================-->
<!--<div class="innerpage_banner"><div class="innerpage_banner_bgcolor">
    <div class="container">
        <div class="row">

				<h2>WHAT’S NEW IN MEDICALPRO</h2>
                <p>Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.</p>

       </div>
    </div>
</div></div>-->



<!--===================================Contact Form===================================-->


<div class="news_main">
    <!--<div class="container">-->
    <div class="">
        <div class="row">
                
<div class="col-md-12">
<!--chat content-->

    <div class="wrapper j-wrapper">
        <!--<header class="header">
            <div class="fw-inner clearfix">
                <div class="header__logo">
                  <img class="header__logo_img" src="images/Logo_qb.svg">
                    </img>
                </div>

                <h2 class="header__title">Video Chat</h2>
            </div>
        </header>-->

    

        <main class="main j-main">
            <div class="fw-inner">
               
<!--<div class="pl j-pl hidden">-->
                <div class="pl j-pl ">
                    <div class="clearfix">
                      	<div class="videoboxdiv">
                        	<div class="responsive-tabs">

                                <h2>Key features</h2>
                                <div>
                                <article>
            

            <!--<div class="github-stargazers"></div>-->
        
            <!-- just copy this <section> and next script -->
            <section class="experiment">                
                <section>
                  
                    <?php if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='P'){
						$roomValue=$_SESSION['doctorID'];
						$userId=$_SESSION['patientID'];
                    }else if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='D'){
						$roomValue=$_SESSION['patientID'];
						$userId=$_SESSION['doctorID'];
					}
					
					//echo $roomValue;
					?>
                    
                    <input type="hidden" id="conference-name" value="<?php echo $roomValue;?>">
                    
                    <?php // if($_SESSION['loginID']!=44){?>
                    
                    <button id="setup-new-room" class="setup btn-primary">Start Conference</button>
                    <?php //}?>
                </section>
                
                <!-- list of all available conferencing rooms -->
                <table style="width: 100%;" id="rooms-list"></table>
                
                <!-- local/remote videos container -->
                <div id="videos-container"></div>
            </section>
        
            <script>
                // Muaz Khan     - https://github.com/muaz-khan
                // MIT License   - https://www.webrtc-experiment.com/licence/
                // Documentation - https://github.com/muaz-khan/WebRTC-Experiment/tree/master/video-conferencing

                var config = {
                    openSocket: function(config) {
                        var channel = config.channel || location.href.replace( /\/|:|#|%|\.|\[|\]/g , '');
                        var socket = new Firebase('https://webrtc.firebaseIO.com/' + channel);
                        socket.channel = channel;
						console.log('Channel- '+channel);

                        socket.on("child_added", function(data) {
                            config.onmessage && config.onmessage(data.val());
                        });
                        socket.send = function(data) {
                            this.push(data);
							console.log(data);
                        };
                        config.onopen && setTimeout(config.onopen, 1);
                        socket.onDisconnect().remove();
                        return socket;
                    },
                    onRemoteStream: function(media) {
                        var mediaElement = getMediaElement(media.video, {
                            width: (videosContainer.clientWidth / 2) - 50,
                            buttons: ['mute-audio', 'mute-video', 'full-screen', 'volume-slider']
                        });
                        mediaElement.id = media.streamid;
                        videosContainer.insertBefore(mediaElement, videosContainer.firstChild);
                    },
                    onRemoteStreamEnded: function(stream, video) {
                        if (video.parentNode && video.parentNode.parentNode && video.parentNode.parentNode.parentNode) {
                            video.parentNode.parentNode.parentNode.removeChild(video.parentNode.parentNode);
                        }
                    },
                    onRoomFound: function(room) {
                        var alreadyExist = document.querySelector('button[data-broadcaster="' + room.broadcaster + '"]');
                        if (alreadyExist) return;

                        if (typeof roomsList === 'undefined') roomsList = document.body;
						
                        var tr = document.createElement('tr');
					
						if(room.roomName==<?php echo $_SESSION['loginID'];?>){
							tr.innerHTML = '<!--<td><strong>' + room.roomName + '</strong> shared a conferencing room with you!</td>-->' +
								'<td><button class="join btn btn-primary" >Join To Start Conference</button></td>';
								console.log(roomsList.firstChild);
								$("#setup-new-room").css('display','none');
							roomsList.insertBefore(tr, roomsList.firstChild);
							console.log('<?php echo $_SESSION['loginID'];?>');
						}
					
                        var joinRoomButton = tr.querySelector('.join');
                        joinRoomButton.setAttribute('data-broadcaster', room.broadcaster);
                        joinRoomButton.setAttribute('data-roomToken', room.roomToken);
						
						joinRoomButton.setAttribute('room-name', '<?php echo $roomValue;?>');
						
                        joinRoomButton.onclick = function() {
                            this.disabled = true;
							$("#setup-new-room").css('display','none');
							$(".join").css('display','none');
                            var broadcaster = this.getAttribute('data-broadcaster');
                            var roomToken = this.getAttribute('data-roomToken');
                            captureUserMedia(function() {
                                conferenceUI.joinRoom({
                                    roomToken: roomToken,
                                    joinUser: broadcaster
                                });
                            }, function() {
                                joinRoomButton.disabled = false;
                            });
                        };
                    },
                    onRoomClosed: function(room) {
                        var joinButton = document.querySelector('button[data-roomToken="' + room.roomToken + '"]');
                        if (joinButton) {
                            // joinButton.parentNode === <li>
                            // joinButton.parentNode.parentNode === <td>
                            // joinButton.parentNode.parentNode.parentNode === <tr>
                            // joinButton.parentNode.parentNode.parentNode.parentNode === <table>
                            joinButton.parentNode.parentNode.parentNode.parentNode.removeChild(joinButton.parentNode.parentNode.parentNode);
                        }
                    }
                };

                function setupNewRoomButtonClickHandler() {
                    btnSetupNewRoom.disabled = true;
					//btnSetupNewRoom.visible = false;
					$("#setup-new-room").css('display','none');
                    document.getElementById('conference-name').disabled = true;
                    captureUserMedia(function() {
                        conferenceUI.createRoom({
                            roomName: (document.getElementById('conference-name') || { }).value || 'Anonymous'
                        });
                    }, function() {
                        btnSetupNewRoom.disabled = document.getElementById('conference-name').disabled = false;
                    });
                }

                function captureUserMedia(callback, failure_callback) {
                    var video = document.createElement('video');

                    getUserMedia({
                        video: video,
                        onsuccess: function(stream) {
                            config.attachStream = stream;
                            callback && callback();

                            video.setAttribute('muted', true);
                            
                            var mediaElement = getMediaElement(video, {
                                width: (videosContainer.clientWidth / 2) - 50,
                                buttons: ['mute-audio', 'mute-video', 'full-screen', 'volume-slider']
                            });
                            mediaElement.toggle('mute-audio');
                            videosContainer.insertBefore(mediaElement, videosContainer.firstChild);
                        },
                        onerror: function() {
                            alert('unable to get access to your webcam');
							$("#setup-new-room").css('display','block');
							$("#setup-new-room").prop('disabled', false);
                            callback && callback();
                        }
                    });
                }

                var conferenceUI = conference(config);

                /* UI specific */
                var videosContainer = document.getElementById('videos-container') || document.body;
                var btnSetupNewRoom = document.getElementById('setup-new-room');
                var roomsList = document.getElementById('rooms-list');

                if (btnSetupNewRoom) btnSetupNewRoom.onclick = setupNewRoomButtonClickHandler;

                function rotateVideo(video) {
                    video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(0deg)';
                    setTimeout(function() {
                        video.style[navigator.mozGetUserMedia ? 'transform' : '-webkit-transform'] = 'rotate(360deg)';
                    }, 1000);
                }

                (function() {
                    var uniqueToken = document.getElementById('unique-token');
                    if (uniqueToken)
                        if (location.hash.length > 2) uniqueToken.parentNode.parentNode.parentNode.innerHTML = '<h2 style="text-align:center;"><a href="' + location.href + '" target="_blank">Share this link</a></h2>';
                        else uniqueToken.innerHTML = uniqueToken.parentNode.parentNode.href = '#' + (Math.random() * new Date().getTime()).toString(36).toUpperCase().replace( /\./g , '-');
                })();

                function scaleVideos() {
                    var videos = document.querySelectorAll('video'),
                        length = videos.length, video;

                    var minus = 130;
                    var windowHeight = 700;
                    var windowWidth = 600;
                    var windowAspectRatio = windowWidth / windowHeight;
                    var videoAspectRatio = 4 / 3;
                    var blockAspectRatio;
                    var tempVideoWidth = 0;
                    var maxVideoWidth = 0;

                    for (var i = length; i > 0; i--) {
                        blockAspectRatio = i * videoAspectRatio / Math.ceil(length / i);
                        if (blockAspectRatio <= windowAspectRatio) {
                            tempVideoWidth = videoAspectRatio * windowHeight / Math.ceil(length / i);
                        } else {
                            tempVideoWidth = windowWidth / i;
                        }
                        if (tempVideoWidth > maxVideoWidth)
                            maxVideoWidth = tempVideoWidth;
                    }
                    for (var i = 0; i < length; i++) {
                        video = videos[i];
                        if (video)
                            video.width = maxVideoWidth - minus;
                    }
                }

                window.onresize = scaleVideos;

            </script>
            
          
        </article>
                                
                                
                                
                     <script src="js1/commits.js" async> </script>  
                                
                                
                                </div>
    
                                <h2>Test Results</h2>
                                <div>
                                    <div class="logininnerpage_right">
                                           
                                            
                                           
                                           		<?php if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='P'){
														$parentTests=mysql_query("select id,test_name from test_masters where parent_id=0 and status=1")or die(mysql_error());
														
													 ?>
                                                <div class="col-md-6 col-sm-6">
                                           		 <div class="row">
                                               
                                                    <form method="post" id="patient_test_result" name="patient_test_result">
                                                        <div class="register_formbox">
                                                       	 <label class="register_from_name">Select Test</label>
                                                        	<select name="test_type" id="test_type" class="form-control" required="required">
                                                            	<option value="">Select Test</option>
                                                               <?php
															  while($parentTestlists = mysql_fetch_assoc($parentTests)){?>
                                                               	<option value="<?php echo $parentTestlists['id'];?>"><?php echo $parentTestlists['test_name'];?></option>
                                                             <?php }?>       
                                                            </select>
                                                        </div>
                                                        <div class="register_formbox">
                                                       	 <label class="register_from_name">Select Sub Test</label>
                                                        	<select name="sub_test_type" id="sub_test_type" class="form-control">
                                                            	<option value="">Select</option>
                                                            </select>
                                                        </div>
                                                        
                                                        <div class="register_formbox">
                                                       	 <label class="register_from_name">Result</label>
                                                        	<input type="text" name="test_result" id="test_result" class="form-control" required>
                                                        </div>
                                                        
                                                        <div class="register_formbox">
                                                       	 <div id="success1"></div>
                                                        </div>
                                                        
                                                        <div class="register_formbox">
                                                       		<label class="register_from_name"></label>
                                                        	<button type="button" name="submit" id="submit" class="btn btn-primary" >Submit</button>
                                                            <!--<button type="submit" class="btn btn-default" id="submit" name="submit" onclick="">Submit</button>-->
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>  
                                               	<?php }?>
                                                
                                                <?php if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='D'){ 
														$doctorid=$_SESSION['doctorID'];
														$patientid=$_SESSION['patientID'];
														$created=date('Y-m-d');
														$patientTestDetailsql="select * from patienttest_reports where doctorid='".$doctorid."' and patientid='".$patientid."' and date(created)='".$created."'";
														
														$patientTestDet=mysql_query($patientTestDetailsql)or die(mysql_error());
														
												?>
                                                <div class="col-md-12 col-sm-12" >
                                                    <table width="100%" style="height:auto;overflow:hidden;" id="test_result_patient">
                                                        
                                                            <?php 
																if(mysql_num_rows($patientTestDet)>0){
																	while($patientTestDetails = mysql_fetch_assoc($patientTestDet)){
																		//print_r($patientTestDetails);
														
															?>
                                                               
                                                                    <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
																		Test Type
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                    					<td>
                                                						<?php $testid=$patientTestDetails['test_type'];
																		echo testDet($testid);
																		?>
                                                                        </td>
                                                                    </tr>
                                                                     
                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                    <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
																		
																		Sub Test Type
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                    
                                                    					<td>
                                                						<?php $subtestID=$patientTestDetails['sub_test_type'];
																		echo testDet($subtestID);
																		?>
                                                                        </td>
                                                                        
                                                                        
                                                
                                                                    </tr>
                                                                     
                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
																		Test Result
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                    					<td><?php echo $patientTestDetails['test_result'];?></td>
                                                
                                                                    </tr>
                                                                     
                                                                   <?php if(mysql_num_rows($patientTestDet)>1){ ?>
                                                                   <tr height="5px"><td colspan="3"><hr></td></tr>
            														<?php }?>	
                                                                
                                                                <?php }?>
																<?php }?>
                                                           
                                                    </table>
                                                     </div>
                                                <?php }?>
                                          
                                    </div>
                                </div>
                
                                <!--<h2>Download</h2>
                                <div>
                                    dddddd
                                </div>-->
							</div>
                        </div>


                        
                        <div class="chatboxdiv">
                        <iframe src="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/inhealth/chat2/';?>" height="646px" width="100%" border=0 scrolling="no"></iframe>
                       
                         </div>
                        
                        
                        
                    </div>

                    <div class="callees j-callees">
                    </div>
                </div>
            </div>
        </main>

       <!-- <footer class="footer j-footer invisible">
            <div class="footer__inner">
                <h4>
                    <a class="fw-link" href="http://www.maastrixsolutions.com">
                        Powered By MaastrixSolution Pvt LTD
                    </a>
                </h4>
            </div>
        </footer>-->

        <!-- MODALS -->
        <div class="modal fade" id="error_no_calles" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Error</h4>
                    </div>

                    <div class="modal-body">
                        <p class="text-danger">Please choose users to call</p>
                    </div>
                </div>
            </div>
        </div>

        <!--<div class="modal fade" id="income_call" tabindex="-1">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Call from user with id: <strong class="j-ic_initiator"></strong></h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default j-decline">Decline</button>
                        <button type="button" class="btn btn-primary j-accept">Accept</button>
                    </div>
                </div>
            </div>
        </div>-->

        <!-- SOUNDS -->
      <!--  <audio id="callingSignal" loop preload="auto">
            <source src="audio/calling.ogg"></source>
            <source src="audio/calling.mp3"></source>
        </audio>

        <audio id="ringtoneSignal" loop preload="auto">
            <source src="audio/ringtone.ogg"></source>
            <source src="audio/ringtone.mp3"></source>
        </audio>

        <audio id="endCallSignal" preload="auto">
            <source src="audio/end_of_call.ogg"></source>
            <source src="audio/end_of_call.mp3"></source>
        </audio>-->
    </div>

<script type="text/javascript">
	$(function() {
	
	$('#test_type').change(function() {
        var test_type=$(this).val();
        var dataVal = "task=getSubtest&test_type="+test_type;  
        $.ajax({
                   type:"POST",
                   url:"<?php echo BASEURL;?>ajax/ajax2.php",
                   data:dataVal,
                   success: function(data){
                      $('#sub_test_type').html(data);
                      // console.log(data);
                   }
               });
    }); 	
});
$(document).ready(function (e) {
	$("#submit").on('click',(function(e) {
		//e.preventDefault();
		//var form = document.patient_test_result;
	  //alert(1);
	  if($("#test_type").val() == '')
	  {
		   $("#test_type").css('border-color','#F00');
		   $("#test_type").focus();
		   return false;
	  }else{
		  $("#test_type").css('border-color','#8FC939');
	  }
	  
	   if($("#test_result").val().trim() == '')
	  {
		   $("#test_result").css('border-color','#F00');
		   $("#test_result").focus();
		   return false;
	  }else{
		  $("#test_result").css('border-color','#8FC939');
	  }
	  
	  var test_type=$("#test_type").val();
	  var sub_test_type = $("#sub_test_type").val();
	  var test_result = $("#test_result").val();
	  
	   var dataVal = "task=testformSubmit&test_type="+test_type+"&sub_test_type="+sub_test_type+"&test_result="+test_result; 
		$('#success1').html("<h4 style='color:green;'>Waiting To Save Test Results ....</h4>");  
        $.ajax({
                   type:"POST",
                   url:"<?php echo BASEURL;?>ajax/ajax2.php",
                   data:dataVal,
                   success: function(data){
                      if(data ==1){
							$('#success1').html("<h4 style='color:green;'>Test Results Saved Successfully !!!</h4>");
							$("#test_type").val("");
							$("#sub_test_type").val('');
							$("#test_result").val('');
							}else{
								$("#success1").html("<h4 style='color:red;'>Error in Saving !!!</h4>");
							}
                   	 }
               });
	}));
});
</script>
<?php if($_SESSION['loginType']=='D'){?>
<script type="text/javascript">
$(document).ready(function(){
			var checkPatientTestresult = function(){
			   var dataVal = "task=getTestresult";
			  $.ajax({
				method:'POST',
				 url:"<?php echo BASEURL;?>ajax/ajax2.php",
				 data:dataVal,
				success:function(data){
				 // console.log(data);
				  $('#test_result_patient').html(data);
				}
			  });
			}
			setInterval(checkPatientTestresult,10000);
	});
	

</script>
<?php }?>

<script src="js1/responsiveTabs.js"></script>
<script>
$(document).ready(function() {
RESPONSIVEUI.responsiveTabs();
})
</script>
 
    

<!--chat content end-->
</div>



       </div>
    </div>
</div>







<div class="footerbarbtm">
	<div class="container">
    	<div class="row">
            <div class="col-md-6 col-sm-6">
            	<p>Copyrights &copy; 2015 <span style="color:#ffffff;">InHealth</span>. All Rights Reserved</p>            </div>
            <div class="col-md-6 col-sm-6 ">
            	<ul>
                    <li><a  href="#">Terms &amp; Conditions</a></li>
                    <li><a  href="#">Contact</a></li>
                    <li><a  href="#">Privacy</a></li>
                </ul>
            </div>
		</div>
	</div>
</div>




</body>
</html>