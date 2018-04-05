defaultfunc();
function defaultfunc(){
    console.log("Good");
    check();
    load_most_contributed();
    console.log("Bad");
}
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
function search(){
    var query = "" //Make the query here from the search inputs
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //Must add the displaying part here
        }
    };
    xhttp.open("GET", "search.php?query="+query, true);
    xhttp.send();
}
function load_most_contributed() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange=function(){
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            var table = document.getElementById("mc");
            for (var i=0;i<data.length;i++){
                var row = table.insertRow(i+1);
                var cell0 = row.insertCell(0)
                var cell1 = row.insertCell(1);
                var cell2 = row.insertCell(2);
                var atag = document.createElement('a');
                atag.setAttribute('href',"sharestuff.com/profile/"+data[i]['username']);
                atag.innerHTML = data[i]['username'];
                cell0.innerHTML = i+1; 
                cell1.appendChild(atag);
                cell2.innerHTML = data[i]['contribute'];
            }
        };
    }
    xhttp.open("GET", "most_contributed.json", true);
    xhttp.send();
}