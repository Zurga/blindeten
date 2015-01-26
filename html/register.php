<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">

		<form id ="register" name= "register" action='register' method='post' onSubmit="return chkForm()">

			<h1>Registreer</h1><br>
			<br>
			<?php if(isset($register_error)) {
			echo '<p class="error">' . $register_error .'</p>';
			} ?> 
			<br>
			<fieldset id="inputs" method='post'>
				<input id="name" name="input[name]" type="text" placeholder="Voornaam" required>  
				<br>
				<br>
				<input id="surname" name="input[surname]" type="text" placeholder="Achternaam" required>
				<br>
				<br>
				<input id="email" name="input[email]" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input id="city" name="input[city]" type="text" placeholder="Woonplaats" required> 
				<br>
				<br>
				<input id="password" name="input[password]" type="password" placeholder="Wachtwoord" required>
				<br>
				<br>
				<input id="check_password" name="check_password" type="password" placeholder="Herhaal wachtwoord" required>
				<br>
				<br>
				<input id="day" name="input[day]" type="day" size="4" maxlength="2" min="1" max="31" placeholder="Dag" required>
				<input id="month" name="input[month]" type="text" size="6" maxlength="2" min="01" max="12" placeholder="Maand" required>
				<input id="year" name="input[year]" type="year" size="4" maxlength="4" min="1915" max="1997" placeholder="Jaar" required>
				<br>
				<br>
				<select name="input[sex]">
				<option value="0" >Man</option>
				<option value="1" >Vrouw</option>
				</select>
				<br>
			</fieldset>
			<fieldset id="actions">
				<br>
				<br>
				<input type="submit" id="submit" value="Registreer" onClick="return chkForm()">
			</fieldset>
				<br>
				<br>
			<?php include 'freecap.php';?>
			<?php include 'freecap_wrap.php' ; ?>
		</form>
		</div>
	</div>
</div>	

<script>
	function sendMe() {
		return alert("Continue?");
	}

	function chkForm() {
		register = document.getElementById('register');
		pass1 = register.getElementsByName('input[password]')[0];
		pass2 = register.getElementsByName('check_password')[0];
		if(pass1.value != pass2.value){
			alert("Wachtwoorden komen niet overeen");
			pass1.value = '';
			pass2.value = '';
			pass1.focus();
			return false;
		}
	}

</script>





<?php include 'footer.php';?>