<?php include 'header.php';?>

<div class="content">
	<div class="maincontent">

		<form id ="form" name= "register" action='register' method='post'>

			<h1>Registreer</h1>
			<br>
			<?php if(isset($register_error)) {
					echo '<p class="error">' . $register_error .'</p>';
				}
			?>
			<br>
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
				<input id="password" name="input[password]" type="password" placeholder="Wachtwoord" pattern=".{6,}" title="Minimaal 6 tekens." required>
				<br>
				<br>
				<input id="check_password" name="input[check_password]" type="password" onkeyup="checkPass();" placeholder="Herhaal wachtwoord" required>
				<br>
				<p id="error" class="error"></p>
				<br>
				<select id="day" name="input[day]">
				<option value="01" >01</option>
				<option value="02" >02</option>
				<option value="03" >03</option>
				<option value="04" >04</option>
				<option value="05" >05</option>
				<option value="06" >06</option>
				<option value="07" >07</option>
				<option value="08" >08</option>
				<option value="09" >09</option>
				<option value="10" >10</option>
				<option value="11" >11</option>
				<option value="12" >12</option>
				<option value="10" >10</option>
				<option value="11" >11</option>
				<option value="12" >12</option>
				<option value="13" >13</option>
				<option value="14" >14</option>
				<option value="15" >15</option>
				<option value="16" >16</option>
				<option value="17" >17</option>
				<option value="18" >18</option>
				<option value="19" >19</option>
				<option value="20" >20</option>
				<option value="21" >21</option>
				<option value="22" >22</option>
				<option value="23" >23</option>
				<option value="24" >24</option>
				<option value="25" >25</option>
				<option value="26" >26</option>
				<option value="27" >27</option>
				<option value="28" >28</option>
				<option value="29" >29</option>
				<option value="30" >30</option>
				<option value="31" >31</option>
				</select>
				<select id="month" name="input[month]">
				<option value="01" >Januari</option>
				<option value="02" >Februari</option>
				<option value="03" >Maart</option>
				<option value="04" >April</option>
				<option value="05" >Mei</option>
				<option value="06" >Juni</option>
				<option value="07" >Juli</option>
				<option value="08" >Augustus</option>
				<option value="09" >September</option>
				<option value="10" >Oktober</option>
				<option value="11" >November</option>
				<option value="12" >December</option>
				</select>
				<select id="year" name="input[year]">
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
				<option value="1946">1946</option>
				<option value="1945">1945</option>
				<option value="1944">1944</option>
				<option value="1943">1943</option>
				<option value="1942">1942</option>
				<option value="1941">1941</option>
				<option value="1940">1940</option>
				<option value="1939">1939</option>
				<option value="1938">1938</option>
				<option value="1937">1937</option>
				<option value="1936">1936</option>
				<option value="1935">1935</option>
				<option value="1934">1934</option>
				<option value="1933">1933</option>
				<option value="1932">1932</option>
				<option value="1931">1931</option>
				<option value="1930">1930</option>
				<option value="1929">1929</option>
				<option value="1928">1928</option>
				<option value="1927">1927</option>
				<option value="1926">1926</option>
				<option value="1925">1925</option>
				<option value="1924">1924</option>
				<option value="1923">1923</option>
				<option value="1922">1922</option>
				<option value="1921">1921</option>
				<option value="1920">1920</option>
				</select>
				<br>
				<br>
				<select id="sex" name="input[sex]">
				<option value="0" >Man</option>
				<option value="1" >Vrouw</option>
				</select>
				<br>
				<br>
				<input type="submit" id="submit" value="Registreer" OnClick="return match;" >
			</fieldset>
				<br>
				<br>
		</form>
		</div>
	</div>
</div>	

<script>
  var data = <?php echo json_encode($last_input);?>;

	document.getElementById("name").value = data["name"];

	document.getElementById("surname").value = data["surname"];
	
	document.getElementById("email").value = data["email"];
	
	document.getElementById("city").value = data["city"];

	document.getElementById("day").value = data["day"];

	document.getElementById("month").value = data["month"];

	document.getElementById("year").value = data["year"];

	document.getElementById("sex").value = data["sex"];

</script>

<?php include 'footer.php';?>