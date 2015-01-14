<?php include 'header.php';?>

<div class="content">

	<div class="maincontent">
		<h1>FAQ</h1><br>
		
		<h2><b><a href="javascript:showtext('cancel');" title="Hoe moet ik cancellen?">Hoe moet ik cancellen?</a></b></h2>
		<br>
		<p id= "cancel" class="hidden">Ga dan naar de pagina "mijn reserveringen" klik op de link waar u reservering staat en vervolgens op cancel.</p>
		
		<br><h2><b><a href="javascript:showtext('need_account');" title="Zonder account reserveren?">Moet ik een account hebben om te reserveren?</a></b></h2>
		<br>
		<p id="need_account" class="hidden">Ja dit is nodig. Zo kunnen wij u een bevestigingsmail sturen en u naam doorgeven voor de reservering.</p>

		<h2><br><b><a href="javascript:showtext('nobody_on_table');" title="Wat als niemand reserveert?">Wat als er niemand op dezelfde tafel als ik reserveer?</a></b></h2>
		<br>
		<p id="nobody_on_table" class="hidden">Dan kunt u gerust alleen eten. U krijgt echter geen tweede bevestigingsmail.</p>

		<h2><br><b><a href="javascript:showtext('add_restaurant');" title="Hoe voeg ik mijn restaurant toe?">Ik wil mijn restaurant ook op het kaartje hebben, hoe moet dat? </a></b></h2>
		<br>
		<p id="add_restaurant" class="hidden">U kunt ons een mailtje sturen en dan zullen wij contact met u opnemen.</p>


		<br>

		<h3>Voor andere vragen kunt u altijd mailen, zie <a href="contact.html" title="contact pagina">contact.</a></h3>

		<script type="text/javascript">
		function showtext(id){
   			
   			if(document.getElementById(id).style.display == 'none'){
      		document.getElementById(id).style.display = 'block';
   			}
   		
   		else{
      	document.getElementById(id).style.display = 'none';      
   		}
		}
		</script><br>

	</div>
<?php include 'footer.php';?>