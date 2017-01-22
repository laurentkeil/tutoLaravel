@extends('template')

@section('title')
	Techniques AJAX - XMLHttpRequest
@stop

@section('content')

	<fieldset>
		<legend>Programmes</legend>
		<div id="programBox">
			<p id="editors">
				<select id="editorsSelect" onchange="request3(this);">
					<option value="none">Selection</option>
					<?php	
						try{
							$bdd = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
						}catch (Exception $e){
						        die('Erreur : ' . $e->getMessage());
						}
						
						$reponse = $bdd->query("SELECT * FROM ajax_example_editors ORDER BY name");
						while ($donnees = $reponse->fetch()) {
							echo "\t\t\t\t<option value=\"" . $donnees["id"] . "\">" . $donnees["name"] . "</option>\n";
						}

						$reponse->closeCursor();
					?>			
				</select>
				<span id="loader" style="display: none;"><img src="../../app/views/ajax/ajax-loader.gif" alt="loading" /></span>
			</p>
			<p id="softwares">
				<select id="softwaresSelect"></select>
			</p>
		</div>
	</fieldset>

	<form>
		<p>
			<label for="sleep">Temps de sommeil :</label>
			<input type="text" id="sleep" />
		</p>
		<p>
			<input type="button" onclick="request2(readData2);" value="Exécuter" />
			<span id="loader" style="display: none;"><img src="../../app/views/ajax/ajax-loader.gif" alt="loading" /></span>
		</p>
	</form>

	<form>
		<p>
			<label for="nick">Pseudo :</label>
			<input type="text" id="nick" /><br />
			<label for="name">Prénom :</label>
			<input type="text" id="name" />
		</p>
		<p>
			<input type="button" onclick="request1(readData1);" value="Exécuter" />
		</p>
	</form>

	<p>
		<button onclick="request(readData);">Afficher le fichier XML</button>
		<div id="output"></div>
	</p>
@stop

@section('scripts')
	<script type="text/javascript" src="../../app/views/ajax/oXHR.js"></script>
	<script type="text/javascript">
	 <!--
		var xhr = null;

		function request3(oSelect) {
			var value = oSelect.options[oSelect.selectedIndex].value;
			xhr   = getXMLHttpRequest();
			
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					readData3(xhr.responseXML);
					document.getElementById("loader").style.display = "none";
				} else if (xhr.readyState < 4) {
					document.getElementById("loader").style.display = "inline";
				}
			};
			
			xhr.open("POST", "../../app/views/ajax/XMLHttpRequest_getListData.php", true);
			xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xhr.send("IdEditor=" + value);
		}

		function readData3(oData) {
			var nodes   = oData.getElementsByTagName("item");
			var oSelect = document.getElementById("softwaresSelect");
			var oOption, oInner;
			
			oSelect.innerHTML = "";
			for (var i=0, c=nodes.length; i<c; i++) {
				oOption = document.createElement("option");
				oInner  = document.createTextNode(nodes[i].getAttribute("name"));
				oOption.value = nodes[i].getAttribute("id");
				
				oOption.appendChild(oInner);
				oSelect.appendChild(oOption);
			}
		}

		function request2(callback) {
			var sleep = document.getElementById("sleep").value;
			if (isNaN(parseInt(sleep))) {
				alert(sleep + " n'est pas un nombre valide !");
				return;
			}

			if (xhr && xhr.readyState != 0) {
				//xhr.abort(); // On annule la requête en cours !

				alert("Attendez que la requête ait abouti avant de faire joujou");
				return;
			}

			xhr = getXMLHttpRequest();
			
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					callback(xhr.responseText);
					document.getElementById("loader").style.display = "none";
				} else if (xhr.readyState < 4) {
					document.getElementById("loader").style.display = "inline";
				}
			};
			
			xhr.open("GET", "../../app/views/ajax/XMLHttpRequest_getSleep.php?Sleep=" + sleep, true);
			xhr.send(null);
		}
 
		function readData2(sData) {
			alert(sData);
		}

		function request1(callback) {
			xhr = getXMLHttpRequest();
			
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					callback(xhr.responseText);
				}
			};

			var nick = encodeURIComponent(document.getElementById("nick").value);
			var name = encodeURIComponent(document.getElementById("name").value);
			
			xhr.open("GET", "../../app/views/ajax/XMLHttpRequest_getString.php?Nick=" + nick + "&Name=" + name, true);
			xhr.send(null);
		}

		function readData1(sData) {
			alert(sData);
		}

		function request(callback) {
			xhr = getXMLHttpRequest();
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
					callback(xhr.responseXML);
				}
			};
			
			xhr.open("GET", "../../app/views/ajax/XMLHttpRequest_getXML.xml", true);
			xhr.send(null);
		}

		function readData(oData) {
			var nodes = oData.getElementsByTagName("soft");
			var ol = document.createElement("ol"), li, cn;
			
			for (var i=0, c=nodes.length; i<c; i++) {
				li = document.createElement("li");
				cn = document.createTextNode(nodes[i].getAttribute("name"));
				
				li.appendChild(cn);
				ol.appendChild(li);
			}
			
			document.getElementById("output").appendChild(ol);
		}
	// -->
	</script>
@stop