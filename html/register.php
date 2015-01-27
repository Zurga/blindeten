<?php include 'header.php';?>
<script>
function checkPass()
{
  var password = document.getElementById("password");
  var check_password = document.getElementById("check_password");
  var goodColor= "#66cc66";
  var badColor= "#ff6666";
  
  if(password.value == check_password.value){
	check_password.style.backgroundColor = goodColor;
	message.style.color = goodColor;
}else{
	check_password.style.backgroundColor = badColor;
	message.style.color = badColor;
	}
}
</script>
<div class="content">
	<div class="maincontent">

		<form id ="form" name= "register" action='register' method='post'>

			<h1>Registreer</h1>
			<br>
			<?php if(isset($register_error)) {
					echo '<p class="error">' . $register_error .'</p>';
					} 
					if (isset($_POST["submit"]) && $_POST["submit"]=='Submit') {
					$name=$_POST["name"];
					$surname=$_POST["surname"];
					$email=$_POST["email"];
					$city=$_POST["city"];
					$day=$_POST["day"];
					$month=$_POST["month"];
					$year=$_POST["year"];
					$sex=$_POST["sex"];
					}
			?> 
			<br>
			<fieldset id="inputs" method='post'>
				<input id="name" name="input[name]" type="text" placeholder="Voornaam" value="<? echo $name?>" required>  
				<br>
				<br>
				<input id="surname" name="input[surname]" type="text" placeholder="Achternaam" value="<? echo $surname?>" required>
				<br>
				<br>
				<input id="email" name="input[email]" type="text" placeholder="E-mail" value="<? echo $email?>" required>   
				<br>
				<br>
				<input id="city" name="input[city]" type="text" placeholder="Woonplaats" value="<? echo $city?>" required> 
				<br>
				<br>
				<input id="password" name="input[password]" type="password" placeholder="Wachtwoord" required>
				<br>
				<br>
				<input id="check_password" name="input[check_password]" type="password" onkeyup="checkPass(); return false;" placeholder="Herhaal wachtwoord" required>
				<span id="confirmMessage" class="confirmMessage"></span>
				<br>
				<br>
				<input id="day" name="input[day]" type="day" size="4" maxlength="2" min="1" max="31" placeholder="Dag" value="<? echo $day?>" required>
				<input id="month" name="input[month]" type="text" size="6" maxlength="2" min="01" max="12" placeholder="Maand" value="<? echo $month?>" required>
				<input id="year" name="input[year]" type="year" size="4" maxlength="4" min="1915" max="1997" placeholder="Jaar" value="<? echo $year?>" required>
				<br>
				<br>
				<select name="input[sex]">
				<option value="0" >Man</option>
				<option value="1" >Vrouw</option>
				</select>
				<br>
				<br>
				<input type="submit" id="submit" value="Registreer" >
			</fieldset>
				<br>
				<br>
		</form>
		</div>
	</div>
</div>	







<?php include 'footer.php';?>