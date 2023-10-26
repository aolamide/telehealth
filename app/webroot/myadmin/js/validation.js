// JavaScript Document
$(document).ready(function(e) {
	
	$("#addadmnFrm").submit(function(e) {
		var fname=$("#MasterAdmin_fname").val();
		var phone=$("#MasterAdmin_phone").val();
		var email=$("#MasterAdmin_email").val();
		var uname=$("#MasterAdmin_uname").val();
		var pwd=$("#MasterAdmin_pwd").val();
		var filter=/^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
		if(fname==''){
			$("#MasterAdmin_fname").css("background-color", "#FFBCB3");
			$("#MasterAdmin_fname").focus();
			return false;
		}else{
			$("#MasterAdmin_fname").css("background-color", "");
		}
		if(email==''){
			$("#MasterAdmin_email").css("background-color", "#FFBCB3");
			$("#MasterAdmin_email").focus();
			return false;
		}else if(!filter.test(email)){
			$("#MasterAdmin_email").css("background-color", "#FFBCB3");
			$("#MasterAdmin_email").focus();
			return false;
		}else{
			$("#MasterAdmin_email").css("background-color", "");
		}
		if(phone==''){
			$("#MasterAdmin_phone").css("background-color", "#FFBCB3");
			$("#MasterAdmin_phone").focus();
			return false;
		}else{
			$("#MasterAdmin_phone").css("background-color", "");
		}
		
		if(uname==''){
			$("#MasterAdmin_uname").css("background-color", "#FFBCB3");
			$("#MasterAdmin_uname").focus();
			return false;
		}else{
			$("#MasterAdmin_uname").css("background-color", "");
		}
		if(pwd==''){
			$("#MasterAdmin_pwd").css("background-color", "#FFBCB3");
			$("#MasterAdmin_pwd").focus();
			return false;
		}else{
			$("#MasterAdmin_pwd").css("background-color", "");
		}
	});

	$("#MasterUserCountry").change(function(){
		$.ajax({
			type: "POST",
			url: jsBaseUrl+"admin/MasterUsers/getstate",
			data: "countryID="+$(this).val(),
			success: function(data){
				if(data){
					$("#MasterUserState").html(data);
				}
			}
		});
	});
	$("#RegisterCountry").change(function(){
		$.ajax({
			type: "POST",
			url: jsBaseUrl+"Registers/getstate",
			data: "countryID="+$(this).val(),
			success: function(data){
				if(data){
					$("#RegisterState").html(data);
				}
			}
		});
	});
	$(".logoutLink").click(function(){
		$(".logoutLink").html("Processing...");
		$.ajax({
			type: "POST",
			url: jsBaseUrl+"Homes/logout",
			data: "logout=Yes",
			success: function(data){
				if(data==1){
					$(".logoutLink").html("Log Out");
					window.location=jsBaseUrl;
				}else{
					$(".logoutLink").html("Log Out");
				}
			}
		});
	});
});
function isNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		// Added to allow decimal, period, or delete
		//alert(charCode);
		if (charCode !=46 && charCode > 31 && (charCode < 48 || charCode > 57)) 
			return false;
		
		return true;
	}
	function onlyNumberKey(evt) {
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		// Added to allow decimal, period, or delete
		//alert(charCode);
		if (charCode > 31 && (charCode < 48 || charCode > 57)) 
			return false;
		
		return true;
	}
	function loginFunc(){
		var username = $("#username").val();
		var pwd = $("#pwd").val();
		if((username == '') || (pwd == '')){
			if(username == ''){
				$("#username").css('background-color','#FFBCB3');
				$("#username").focus();
				return false;
			}else{
				$("#username").css('background-color','');
			}
			if(pwd == ''){
				$("#pwd").css('background-color','#FFBCB3');
				$("#pwd").focus();
				return false;
			}else{
				$("#pwd").css('background-color','');
			}
		}else{
			$("#pwd").css('background-color','');
			$("#username").css('background-color','');
			$("#errorTR").show(500);
			$("#lErrorMsg").html('<font color="rgba(245, 104, 61, 1)">Login Processing....</font>');
			$.ajax({
				type: "POST",
				url: jsBaseUrl+"Homes/login",
				data: $("#loginFrm").serialize(),
				success: function(data){
					if(data==1){
						window.location=jsBaseUrl+"dashboard";
						$("#lErrorMsg").html('<font color="rgba(245, 104, 61, 1)">Redirecting...</font>');
					}else if(data == 2){
						$("#lErrorMsg").html('<font color="#EC5D06">Incorrect Login / password</font>');
					}else if(data == 3){
						$("#lErrorMsg").html('<font color="#EC5D06">Your Account Is not active. Please contact with admin</font>');
					}
				}
			});
		}
	}



$( document ).ready(function() {
		$('.enterfunc').keypress(function (e) {
		  if (e.which == 13) {
		   loginFunc();
		}
		});
		$('#sitesearch').keypress(function (e) {
		  if (e.which == 13) {
		   searchFunc();
		}
		});
});
function searchFunc(){
	var sitesearch = $('#sitesearch').val();
	if(sitesearch==''){
		$("#sitesearch").focus();
		$("#sitesearch").css('background-color','#FFBCB3');
		return false;
	}else{
		window.location=jsBaseUrl+"search/"+sitesearch;
	}
}
$(document).ready(function() {
        $(".addnewsletter").click(function() {
          var NewsLetterNewsEmail=$("#NewsLetterNewsEmail").val();
          var filter=/^\s*[\w\-\+_]+(\.[\w\-\+_]+)*\@[\w\-\+_]+\.[\w\-\+_]+(\.[\w\-\+_]+)*\s*$/;
          var blanktest=/\S/;
          if((!blanktest.test(NewsLetterNewsEmail)) || (!filter.test(NewsLetterNewsEmail)))
          {
            
            if(!blanktest.test(NewsLetterNewsEmail))
            {
              $("#NewsLetterNewsEmail").focus();
              $("#NewsLetterNewsEmail").css("background-color", "rgb(245, 211, 211)");
              return false;
            }
            else if(!filter.test(NewsLetterNewsEmail))
            {
              $("#NewsLetterNewsEmail").focus();
              $("#NewsLetterNewsEmail").css("background-color", "rgb(245, 211, 211)");
              return false;
            }
            else
            {
              $("#NewsLetterNewsEmail").css("background-color", "");
            }
          }
          else
          {
            $("#newsprocessing").show();
            $("#newsmsg").html('');

            $.ajax(
            {
              type: 'POST',
              url: jsBaseUrl+'Homes/newsletter',
              data: $("#newsletterfrm").serialize(),
              success: function(data) {
                if(data==1)
                {
                  
                  $("#newsmsg").html('<font color="#82C241">News Letter Subscribed successfully. Check your email to confirm </font>');
                  $("#newsprocessing").hide();
                }
                else if(data==2)
                {
                  
                  $("#newsmsg").html('<font color="#F56C43">Error Subscribing NewsLetter!! Please Try Again..</font>');
                  $("#newsprocessing").hide();
                }
                else if(data==3)
                {
                 
                  $("#newsmsg").html('<font color="#F56C43">Email ID Already Exists!</font>');
                  $("#newsprocessing").hide();
                }
              }
            });
          }
        });
});

function check_test_report_form(){
    var fuData = document.getElementById('uploaded_file');
    var FileUploadPath = fuData.value;
    if(FileUploadPath != ''){
       var Extension = FileUploadPath.substring(FileUploadPath.lastIndexOf('.') + 1).toLowerCase();
       //alert(Extension);
        if (Extension == "doc" || Extension == "docx" || Extension == "pdf" || Extension == "txt" || Extension == "jpg" || Extension == "jpeg" || Extension == "png" || Extension == "gif") {
            return true;
        }else{
        	alert("Upload only file types of doc, docx, pdf, txt, jpg, jpeg, png, gif");
            return false;
        	
        }
        
    } 
}

