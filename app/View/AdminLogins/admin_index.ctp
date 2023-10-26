<script type="text/javascript">
function validateLogin()
{
	var userid=$("#userid").val();
	var password=$("#password").val();
	var blanktest=/\S/;
	if(!blanktest.test(userid))
	{
		$("#userid").focus();
		$("#userid").css("background-color","rgb(237, 144, 144)");
		return false;
	}
	else
	{
		$("#userid").css("background-color","");
	}
	if(!blanktest.test(password))
	{
		$("#password").focus();
		$("#password").css("background-color","rgb(237, 144, 144)");
		return false;
	}
	else
	{
		$("#password").css("background-color","");
	}
}
</script>
<form action="" method="post" name="adminloginform" id="adminloginform" onsubmit="return validateLogin();">
                <div class="body bg-gray">
                    <div class="form-group">
                        <input type="text" name="userid" id="userid" class="form-control" placeholder="User ID"/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                    </div>
                   <!-- <div class="form-group">
                        <input type="checkbox" name="remember_me"/> Remember me
                    </div>-->
                </div>
                <div class="footer">
                    <button type="submit"  name="login" class="btn bg-olive btn-block">Sign in</button>

                    <!--<p><a href="#">I forgot my password</a></p>-->

                    <!--<a href="register.html" class="text-center">Register a new membership</a>-->
                </div>
            </form>