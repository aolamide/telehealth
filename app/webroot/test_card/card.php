<?php include_once("../../config/session.php");
include_once("../../config/config.php");
if($_SESSION["uemail"]==""){
	header("Location:account.php?page=sign-in&rurl=user-dashboard");
	}?>
	<form action="cardRedirect.php" method="post" name="frmPaymentRedirect" id="frmPaymentRedirect" style="display:none;" >
    <input name="service_id" type="hidden" id="service_id" value="<?php echo $_POST["service_id"];?>"/>
<!-- 	If you want the values in the payment page to be prefilled, you need to request them from the customer and POST them to the payment gateway. If not, the customer will have to fill them in the secure page on mobilpay.ro -->
<fieldset>
		<legend>Completeaza datele pentru facturare</legend>
		<label>Tip cumparator:</label><select name="billing_type" style="width: 200px;">
			<option value="person" <?php if($_GET["is_person"]==1){echo 'selected="selected"';}?>>Persoana Fizica</option>
			<option value="company" <?php if($_GET["is_person"]==0){echo 'selected="selected"';}?>>Persoana juridica</option>
		</select><br/>
		<label id="labelFirstName">Prenume:</label><input type="text" name="billing_first_name" id="idFirstName" style="width: 200px;" value="<?php echo $_POST["idFirstName"];?>"/>
		<br/>
		<label id="labelLastName">Nume:</label><input type="text" name="billing_last_name" id="idLastName" style="width: 200px;" value="<?php echo $_POST["idLastName"];?>"/><br/>
		<label id="labelFiscalNumber">CNP:</label><input type="text" name="billing_fiscal_number" id="idFiscalNumber" style="width: 200px;" value="<?php echo $_POST["idFiscalNumber"];?>"/><br/>
		<label id="labelIdentityNumber">CI:</label><input type="text" name="billing_identity_number" id="idIdentityNumber" style="width: 200px;" value="<?php echo $_POST["idIdentityNumber"];?>"/><br/>
		<label>Tara:</label><input type="text" name="billing_country" style="width: 200px;" value="<?php echo $_POST["country"];?>"/><br/>
		<label>Judet/Sector:</label><input type="text" name="billing_county" style="width: 200px;" value="<?php echo $_POST["judet"];?>"/><br/>
		<label>Localitate:</label><input type="text" name="billing_city" style="width: 200px;" value="<?php echo $_POST["city"];?>"/><br/>
		<label>Cod postal:</label><input type="text" name="billing_zip_code" style="width: 200px;" value="<?php echo $_POST["zip_code"];?>"/><br/>
		<label>Adresa:</label><textarea type="text" name="billing_address" style="width: 200px; height: 150px;"><?php echo $_POST["address"];?></textarea><br/>
		<label>E-mail:</label><input type="text" name="billing_email" style="width: 200px;" value="<?php echo $_POST["email"];?>"/><br/>
		<label>Telefon mobil:</label><input type="text" name="billing_mobile_phone" style="width: 200px;" value="<?php echo $_POST["mobile_phone"];?>"/><br/>
		<label>Banca:</label><input type="text" name="billing_bank" style="width: 200px;" value="<?php echo $_POST["bank"];?>"/><br/>
		<label>IBAN:</label><input type="text" name="billing_iban" style="width: 200px;" value="<?php echo $_POST["iban"];?>"/><br/>
	</fieldset>
	<fieldset>
		<legend>Completeaza datele pentru livrare</legend>
		<label>Tip cumparator:</label><select name="shipping_type" style="width: 200px;">
			<option value="person"  <?php if($_GET["is_person"]==1){echo 'selected="selected"';}?>>Persoana Fizica</option>
			<option value="company"  <?php if($_GET["is_person"]==0){echo 'selected="selected"';}?>>Persoana juridica</option>
		</select><br/>
		<label id="labelFirstName">Prenume:</label><input type="text" name="shipping_first_name" id="idFirstName" style="width: 200px;" value="<?php echo $_POST["idFirstName"];?>"/><br/>
		<label id="labelLastName">Nume:</label><input type="text" name="shipping_last_name" id="idLastName" style="width: 200px;" value="<?php echo $_POST["idLastName"];?>"/><br/>
		<label id="labelFiscalNumber">CNP:</label><input type="text" name="shipping_fiscal_number" id="idFiscalNumber" style="width: 200px;" value="<?php echo $_POST["idFiscalNumber"];?>"/><br/>
		<label id="labelIdentityNumber">CI:</label><input type="text" name="shipping_identity_number" id="idIdentityNumber" style="width: 200px;" value="<?php echo $_POST["idIdentityNumber"];?>"/><br/>
		<label>Tara:</label><input type="text" name="shipping_country" style="width: 200px;" value="<?php echo $_POST["country"];?>"/><br/>
		<label>Judet/Sector:</label><input type="text" name="shipping_county" style="width: 200px;" value="<?php echo $_POST["judet"];?>"/><br/>
		<label>Localitate:</label><input type="text" name="shipping_city" style="width: 200px;" value="<?php echo $_POST["city"];?>"/><br/>
		<label>Cod postal:</label><input type="text" name="shipping_zip_code" style="width: 200px;" value="<?php echo $_POST["zip_code"];?>"/><br/>
		<label>Adresa:</label><textarea type="text" name="shipping_address" style="width: 200px; height: 150px;"><?php echo $_POST["address"];?></textarea><br/>
		<label>E-mail:</label><input type="text" name="shipping_email" style="width: 200px;" value="<?php echo $_POST["email"];?>"/><br/>
		<label>Telefon mobil:</label><input type="text" name="shipping_mobile_phone" style="width: 200px;" value="<?php echo $_POST["mobile_phone"];?>"/><br/>
		<label>Banca:</label><input type="text" name="shipping_bank" style="width: 200px;" value="<?php echo $_POST["bank"];?>"/><br/>
		<label>IBAN:</label><input type="text" name="shipping_iban" style="width: 200px;" value="<?php echo $_POST["iban"];?>"/><br/>
	</fieldset>
	<input type="submit" value="Plateste">
	</form>
<script type="text/javascript">
	document.getElementById('frmPaymentRedirect').submit();</script>
