//Here we will use the webcam.js file for the webcam functions to take the snap and save it.

<script type="text/javascript" src="webcam.js"></script>

// We will make a form with the 1 textfield and 1 button.

<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

<input type="text" name="myname" id="myname">

<input type="submit" name="send" id="send">

</form>

//Below the form we will put our webcam window to show the webcam Screen

<script language="JavaScript">

 document.write( webcam.get_html(320, 240) );

</script>

//Now below the webcam screen we will use the buttons for configure webcam and take snapshot

<form>

<input type=button value="Configure..." onClick="webcam.configure()">

&nbsp;&nbsp;

<input type=button value="Take Snapshot" onClick="take_snapshot()">

</form>