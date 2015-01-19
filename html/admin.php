<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">
		<form action='login.php' method='post'>
			<h1>Administratie</h1>
			<br>
			
			<fieldset id="inputs">
				<input id="email" name="input['email']" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<select>
			    <option value="Owner">Owner</option>
			    <option value="Admin">Admin</option>
			    </select>
				<br>
				<br>
				<input type="submit" id="submit" value="Opslaan">
				<br>
				<br>
				<br>
				<input id="email" name="input['email']" type="text" placeholder="E-mail" required>   
				<br>
				<br>
				<input type="submit" id="submit" value="Account verwijderen">
			</fieldset>
		</form>
	</div>
</div>

<?php include 'footer.php';?>