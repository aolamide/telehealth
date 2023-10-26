 $(document).ready(function () {

 	$('#btnValidate').click(function() {
 		var	email    = $('#email').val();
 		var password = $('#password').val();

 		

 		if (email == '') {
 			$('#email').focus();
 			$('#email').css('background', 'plum');
 			return false;
 		};

 		if (email!=='') {
 			 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  			email =  regex.test(email);
  			if (!email) {
  					$('#email').focus();
 					$('#email').css('background', 'plum');
 					return false;
  				};

  			
 		};

 		if (password == '') {
 			$('#password').focus();
 			$('#password').css('background', 'plum');
 			return false;
 		};

 	});



 	$('#editValidate').click(function() {
 		var	email    = $('#email').val();
    var name = $('#name').val();
    var cname = $('#cname').val();
 		var avatar = $('#avatar').val();



    if (name == '') {
      $('#name').focus();
      $('#name').css('name', 'name');
      return false;
    };

    
    if (cname == '') {
      $('#cname').focus();
      $('#cname').css('cname', 'name');
      return false;
    };

    
    
    if (avatar == '') {
      $('#avatar').focus();
      $('#avatar').css('avatar', 'name');
      return false;
    };

    

 		

 		if (email == '') {
 			$('#email').focus();
 			$('#email').css('background', 'plum');
 			return false;
 		};

 		if (email!=='') {
 			 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  			email =  regex.test(email);
  			if (!email) {
  					$('#email').focus();
 					$('#email').css('background', 'plum');
 					return false;
  				};

  			
 		};

 		if (password == '') {
 			$('#ename').focus();
 			$('#ename').css('ename', 'ename');
 			return false;
 		};


 		if (password == '') {
 			$('#ecname').focus();
 			$('#ecname').css('ecname', 'ename');
 			return false;
 		};




 	});
 });




