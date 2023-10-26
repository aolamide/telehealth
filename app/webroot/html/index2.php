<?php 
//session_name("CAKEPHP");
//session_start();

include("includes/config.php");
define('ROOTPATH', dirname(__DIR__));

if(isset($_SESION['appoint_id']) && !empty($_SESSION['appoint_id'])){
	header('location:SITEURL');
	}


function testDet($tstid=''){
	
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

    <link rel="stylesheet" href="libs1/cssgram.min.css">
    <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="css1/responsive-tabs2.css">


  <style>
  
  
  
  
  body{ 
  
background:url(<?php echo BASEURL;?>images/headerbg.jpg) no-repeat center top;
background-attachment:fixed;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;
  }
  .media-box {
    background:none !important;
    border: 0px solid rgb(107, 107, 107) !important;
     margin: 0px !important;
}
#welcome{color: #fff !important;}
.ui-widget-header{ background:none !important; }
.media-container:first-child {height:538px !important;border: 0px solid rgb(107, 107, 107) !important; background:none !important; border-radius:0 !important;}
.media-container:last-child{border: 0px solid rgb(107, 107, 107) !important; background:none !important;}
.jqte_editor, .jqte_source{ height:95px !important;min-height:95px !important;}

.chatboxdiv iframe{ background:rgba(0,0,0,0.2) !important;}  
.chatboxdiv iframe body{ background:rgba(0,0,0,0.2) !important;} 
.news_main {position:relative; z-index:9; padding:50px 0px 50px 0px; background: none !important;}
  

.startconference_btn{ 
	padding:25px 50px 25px 50px;
	margin:0px 0px 0px 0px;
	font-size:22px;line-height:26px;
	color:#ffffff; 
	display:inline-block ;
	text-decoration:none;
	cursor:pointer;
	white-space:nowrap;
	-webkit-transition: all .3s ease;
	-moz-transition: all .3s ease;
	-o-transition: all .3s ease;
	-ms-transition: all .3s ease;
	transition: all .3s ease;
	clear:both; text-align:center;
	border:none;
	text-transform:uppercase;
	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	box-shadow: 0 0 15px rgba(0, 0, 0, 0.6)
	/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f77b21+0,f46804+100 */
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#f48f46+0,ff7518+100 */
background: rgb(244,143,70); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(244,143,70,1) 0%, rgba(255,117,24,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(244,143,70,1) 0%,rgba(255,117,24,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(244,143,70,1) 0%,rgba(255,117,24,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f48f46', endColorstr='#ff7518',GradientType=0 ); /* IE6-9 */

}

.startconference_btn:hover {
	color:#FFFFFF;
	text-decoration:none;
/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#2fb2c4+0,02adc6+100 */
background: rgb(47,178,196); /* Old browsers */
background: -moz-linear-gradient(top,  rgba(47,178,196,1) 0%, rgba(2,173,198,1) 100%); /* FF3.6-15 */
background: -webkit-linear-gradient(top,  rgba(47,178,196,1) 0%,rgba(2,173,198,1) 100%); /* Chrome10-25,Safari5.1-6 */
background: linear-gradient(to bottom,  rgba(47,178,196,1) 0%,rgba(2,173,198,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#2fb2c4', endColorstr='#02adc6',GradientType=0 ); /* IE6-9 */
}  
  #margindel-video{
	float:left; width:100%; text-align:center; margin-top:150px;
	
	}
  
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
               /* border-bottom-left-radius: 0;
                border-top-left-radius: 0;
                font-size: 102%;
                height: 47px;
                margin-left: -9px;
                margin-top: 8px;
                position: absolute;*/
            }
			.media-container{width:100% !important;}
			.media-box video {max-height: auto !important;}
			.media-box video{object-fit: fill;vertical-align: top;width: 100%;/*height: auto !important;*/max-height: auto !important;}
			
			#undefined{ position:relative;}
			.media-container #vid1{  bottom: 100px;position: absolute;right: 20px;width: 150px;}
			/*#usercam { min-height:300px;}*/
			
			#usercam .media-controls{ display:none !important; visibility:hidden !important;}
			#usercam .volume-control{ display:none !important; visibility:hidden !important;}
		@media only screen and (max-device-width: 480px) {

.media-container:first-child {height:220px !important;}
	

.startconference_btn{ padding:15px 20px 15px 20px;font-size:14px;line-height:18px;}

.media-box video{ height:500px !important;}
		
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
       <!-- <script src="js1/getMediaElement-v1.2.js"> </script>-->
        
     <script src="js1/getMediaElement.min.js"> </script>
        


</head>
<body>





<!--===================================Logo Section===================================-->
<header id="header">
    <div class="container">
        <div class="row ">
            <div class="col-md-3 col-sm-3 header_logo"><img src="images/inhealth_logo.png" alt="InHealth"></div>
            
            
            <div class="col-md-8 col-sm-8 header_nav">
            
            
                    <div class="rmm style">
                        <ul>
                            <li><a href="<?php echo SITEURL.'/dashboard';?>">Dashboard</a></li>
                            <li><a href="<?php echo SITEURL.'/pages/about-us';?>">About Us</a></li>
                         <li><a href="#" class="active">Appointments</a></li>
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









<div class="news_main">

	<div class="end_button">
   
   </div>
 
   
    <div class="">
        <div class="row">
                
<div class="col-md-12">
<!--chat content-->

    <div class="wrapper j-wrapper">
       

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
            

          
        
            <!-- just copy this <section> and next script -->
            <section class="experiment">                
                <section id="margindel-video" >
                  
                    <?php if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='P'){
                        $btn_text='CALL DOCTOR';
						$roomValue=$_SESSION['doctorID'];
						$userId=$_SESSION['patientID'];
                    }else if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='D'){
                        $btn_text='START CONFERENCE';
						$roomValue=$_SESSION['patientID'];
						$userId=$_SESSION['doctorID'];
					}
					
					//echo $roomValue;
					?>
                    
                    <input type="hidden" id="conference-name" value="<?php echo $roomValue;?>">
                    
                    <?php // if($_SESSION['loginID']!=44){?>
                    
                    <button id="setup-new-room" class="setup startconference_btn"><?php echo $btn_text;?></button>
                    <?php //}?>
                </section>
                
                <!-- list of all available conferencing rooms -->
                <table style="width: 100%;" id="rooms-list"></table>
                
                <!-- local/remote videos container -->
                <div id="videos-container"></div>
            </section>
        
            <script>
                // Ashok@Maastrix     - https://github.com/Ashok
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
						$('#usercam').css( 'min-height','');
						//document.getElementById('usercam').style.display='none';
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
								'<td align="center"><button class="join startconference_btn" >Join To Start Conference</button></td>';
								console.log(roomsList.firstChild);
								$("#setup-new-room").css('display','none');
								//$('#usercam').css( 'min-height','');
								
								//$('#usercam').removeAttr('style');
								
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
							$('#margindel-video').css('margin-top','0px');
							
							
						
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
					 // console.log('creating video2');
//video.setAttribute('id', 'vid2');

                    getUserMedia({
                        video: video,
                        onsuccess: function(stream) {
                            config.attachStream = stream;
                            callback && callback();

                            video.setAttribute('muted', true);     console.log('creating video1');
				video.setAttribute('id', 'vid1');
                           
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
    
                                <h2>Vital Sign input</h2>
                                <div>
                                    <div class="logininnerpage_right">
                                           
                                            
                                           
                                           		<?php if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='P'){
														$parentTests=mysql_query("select id,test_name from test_masters where parent_id=0 and status=1")or die(mysql_error());
														
													 ?>
                                                <div class="col-md-6 col-sm-6">
                                           		 <div class="row">
                                               
                                                    <form method="post" id="patient_test_result" name="patient_test_result" enctype="multipart/form-data" onsubmit="">
                                                        <div class="register_formbox">
                                                       	 <label class="register_from_name">Temperature</label>
                                                          <input type="text" class="form-control" name="temperature" id="temperature">
                                                        </div>
                                                        <div class="register_formbox">
                                                       	 <label class="register_from_name">Blood pressure</label>
                                                        	<input type="text" class="form-control" name="blood_pressure" id="blood_pressure">
                                                        </div>
                                                        
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">SPO2</label>
                                                            <input type="text" name="spo2" id="spo2" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Heart rate</label>
                                                            <input type="text" name="heart_rate" id="heart_rate" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Blood glucose</label>
                                                            <input type="text" name="blood_glucose" id="blood_glucose" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Body mass</label>
                                                            <input type="text" name="body_mass" id="body_mass" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Height</label>
                                                            <input type="text" name="height" id="height" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Blood group</label>
                                                            <input type="text" name="blood_group" id="blood_group" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Blood type</label>
                                                            <input type="text" name="blood_type" id="blood_type" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">ECG</label>
                                                            <input type="file" name="ecg" id="ecg" class="form-control">
                                                        </div>
                                                        <div class="register_formbox">
                                                         <label class="register_from_name">Symptoms</label>
                                                            <input type="text" name="symptoms" id="symptoms" class="form-control">
                                                        </div>
                                                        
                                                        <div class="register_formbox">
                                                       	 <div id="success1"></div>
                                                        </div>
                                                        
                                                        <div class="register_formbox">
                                                       		<label class="register_from_name"></label>
                                                            <!-- <button type="button" name="submit" id="submit" class="btn btn-primary" >Submit</button>-->
                                                            <button type="submit" class="btn btn-default" id="submit" name="submit" onclick="">Submit</button>
                                                            
                                                        </div>
                                                    </form>
                                                  </div>
                                                </div>  
                                               	<?php }?>
                                                
                                                <?php if(isset($_SESSION['loginType']) && $_SESSION['loginType']=='D'){ 
														$doctorid=$_SESSION['doctorID'];
														$patientid=$_SESSION['patientID'];
                                                        $appoint_id=$_SESSION['appoint_id'];
														$created=date('Y-m-d');
														$patientTestDetailsql="select * from vitalsign_result where doctorid='".$doctorid."' and patientid='".$patientid."' and appoint_type =1 and appoint_id='".$appoint_id."' and date(created)='".$created."'";
														
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
																		Temperature
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                    					<td>
                                                						<?php echo stripslashes($patientTestDetails['temperature']);?>
                                                                        </td>
                                                                    </tr>
                                                                     
                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                    <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
																		
																		Blood Pressure
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                    
                                                    					<td>
                                                						<?php echo stripslashes($patientTestDetails['blood_pressure']);
																		?>
                                                                        </td>
                                                                        
                                                                        
                                                
                                                                    </tr>
                                                                     
                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
																		Spo2
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                    					<td><?php echo stripslashes($patientTestDetails['spo2']);?></td>
                                                
                                                                    </tr>

                                                                     <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                        Heart Rate
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['heart_rate']);?></td>
                                                
                                                                    </tr>

                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                            Blood Gloucse
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['blood_glucose']);?></td>
                                                
                                                                    </tr>

                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                            Body Mass
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['body_mass']);?></td>
                                                
                                                                    </tr>

                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                            Height
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['height']);?></td>
                                                
                                                                    </tr>

                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                            Blood Group
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['blood_group']);?></td>
                                                
                                                                    </tr>

                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                            Blood Type
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['blood_type']);?></td>
                                                
                                                                    </tr>

                                                                    <tr height="5px"><td colspan="3"></td></tr>
                                                                    
                                                                     <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                           ECG
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><a href="<?php echo SITEURL;?>/files/vital_sign_reports/<?php echo stripslashes($patientTestDetails['ecg']);?>" target="_blank">Click Here To view Report</a></td>
                                                
                                                                    </tr>
                                                                     
                                                                   <tr>
                                                    
                                                                        <th width="15%" height="27" align="left">
                                                                            Symptoms
                                                                        </th>
                                                    
                                                                        <td width="1%">:</td>
                                                                        <td><?php echo stripslashes($patientTestDetails['symptoms']);?></td>
                                                
                                                                    </tr>
                                                                  
            															
                                                                
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
    <iframe src="<?php echo SITEURL.'/chat2/';?>" height="590px" width="100%" border=0 scrolling="no"></iframe>
                       
                         </div>
                        
                        
                        
                    </div>

                    <div class="callees j-callees">
                    </div>
                </div>
            </div>
        </main>

     

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

      
    </div>

<script type="text/javascript">

$(document).ready(function(){
			var setendcallbtn = function(){
				var dataVal = "task=set_end_btn";
			  $.ajax({
				method:'POST',
				url:"<?php echo BASEURL; ?>ajax/ajax2.php",
				data:dataVal,
				success:function(data){
				  //console.log(data);
				  	$('.end_button').html(data);
				}
			  });
			}
			setInterval(setendcallbtn,1000);
	});

function end_conversation(){
	var dataVal = "task=end_conversastion";
	$('.end_msg').html('<font color:"#0D4426;">Processing...</font>');
	$.ajax({
			   type:"POST",
			   url:"<?php echo BASEURL;?>ajax/ajax2.php",
			   data:dataVal,
			   success: function(data){
				  if(data==0){
					  <?php if($_SESSION['loginType']=='P'){ ?>
					  	alert('Now you are End With Your appointment');
						window.top.location.href='<?php echo SITEURL."/appdetails/feedback/".$_SESSION['appoint_id'];?>';
					  <?php }else if($_SESSION['loginType']=='D'){?>
					  	alert('Now you are End With Your appointment');
						window.top.location.href='<?php echo SITEURL."/dashboard";?>';
					  <?php }?>
				  }else{
					  $('.end_msg').html('<font color="red">Error in ending conversation !!</font>');
				  }
			   }
		   });
}

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
$("#patient_test_result").on('submit',(function(e) {
e.preventDefault();
var form = document.patient_test_result;

//var formData = new FormData($(this)[0]);
    //alert(formData);
$('#success1').html("<h4 style='color:green;'>Waiting To Save Test Results ....</h4>");   
$.ajax({
url: '<?php echo BASEURL;?>ajax/ajax2.php?task=testformSubmit', // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false

success: function(data)   // A function to be called if request succeeds
{
    if(data ==1){
        $("#temperature").val("");
        $("#blood_pressure").val("");
        $("#spo2").val("");
        $("#heart_rate").val("");
        $("#blood_glucose").val("");
        $("#body_mass").val("");
        $("#height").val("");
        $("#blood_group").val("");
        $("#blood_type").val("");
        $("#ecg").val("");
        $("#symptoms").val("");
      
        
        $('#success1').html("<h4 style='color:#73E086;'>Test Results Saved Successfully !!!</h4>");
    }else{
        $("#success1").html("<h4 style='color:red;'>Error in Saving !!!</h4>");
    }
//$('#loading').hide();
//$("#success").html(data);
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