var xmlHttp;

function creatXMLHttpRequest() {
	if (window.ActiveXObject) {
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	else if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
	}
}

function get(str) {
	creatXMLHttpRequest();
	xmlHttp.onreadystatechange = handleStateChange;
	xmlHttp.open("GET","chkusernc.php?nc="+str,true);
	xmlHttp.send(null);
	document.getElementById("usernc").value=document.getElementById("usernc").value.replace(/[\W]/g,''); 
}
function handleStateChange() {
	if (xmlHttp.readyState == 4) {
		if (xmlHttp.status == 200) {
                 document.getElementById("usercheck").innerHTML=xmlHttp.responseText;  
                 }		
	}
}