<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Software</title>
</head>
<body>
<form method="get">
<label>Get Computers Without Quarantii</label>
<input type="button" onclick = "get()" value="ОК">
</form>
<table style="border: 1px solid"><tr><th> Computers </th></tr>
<tbody id = "text"></tbody></table>
<script>
const ajax = new XMLHttpRequest();

function get(){
    ajax.onreadystatechange = update;
    ajax.open("GET", "../php/getComputersWithoutQuarantii.php");
    ajax.send(null);
}
  function update(){
    if(ajax.readyState === 4){
    if(ajax.status === 200){
        var text = document.getElementById('text');
        var res = "";
        let computers = ajax.responseXML.firstChild.children;
        res += "<tr><td>netname</td><td>motherboard</td><td>RAM_capacity</td><td>HDD_capacity</td><td>monitor</td><td>vendor</td></tr>";
        for(var i = 0; i < computers.length; i++){
          res += "<tr> ";
          res += "<td style = 'border: 1px solid'>" + computers[i].children[0].textContent + "</td>";
          res += "<td style = 'border: 1px solid'>" + computers[i].children[1].textContent + "</td>";
          res += "<td style = 'border: 1px solid'>" + computers[i].children[2].textContent + "</td>";
          res += "<td style = 'border: 1px solid'>" + computers[i].children[3].textContent + "</td>";
          res += "<td style = 'border: 1px solid'>" + computers[i].children[4].textContent + "</td>";
          res += "<td style = 'border: 1px solid'>" + computers[i].children[5].textContent + "</td>";
          res += "<tr>";
        }
        text.innerHTML = res;
      }
    }
}
</script>
</body>
</html>



