@extends('template')

@section('title')
	Techniques AJAX - Dynamic Script Loading - JSON Dynamique
@stop

@section('content')
	<p id="main">
		<input type="button" value="Récupérer les données" onclick="getInfo();" />
	</p>
@stop

@section('scripts')

<script type="text/javascript">
	<!--
	function sendDSL(sUrl, oParams) {
		for (sName in oParams) {
	 		if (sUrl.indexOf("?") != -1) {
				sUrl += "&";
			}  else {
				sUrl += "?";
			}
			sUrl += encodeURIComponent(sName) + "=" +  encodeURIComponent(oParams[sName]);
		}

		var DSLScript  = document.createElement("script");
		DSLScript.src  = sUrl;
		DSLScript.type = "text/javascript";
		document.body.appendChild(DSLScript);
		//document.body.removeChild(DSLScript);
	}

	function callback(oJson) {
		var tree = "", nbItems;
		
		for(sItem in oJson) { 
			tree   += sItem + "\n";
			nbItems = oJson[sItem].length;
			
			for(var i=0; i<nbItems; i++) {
				tree += "\t" + oSoftwares[sItem][i] + "\n";
			}
		}
		
		alert(tree);
	}

	function getInfo() {
		var oParams = { "callback": "callback" };	
		sendDSL("../../app/views/ajax/DynamicScriptLoading_JSON.php", oParams);
	}
	//-->
</script>

@stop