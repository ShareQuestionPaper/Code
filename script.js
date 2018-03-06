function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
function check(){
	var status = getParameterByName('status');
	if (status == "noquestionpaperfound"){
		alert("No question papers with the given query found ")
	}
}
check();
function search(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //Must add the displaying part here
        }
    };
    xhttp.open("GET", "search.php?query="+query, true);
    xhttp.send();
}