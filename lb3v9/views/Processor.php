<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Processor</title>
</head>
<body>
<?php
include("../php/dbConnect.php");

$softwareSql = 'SELECT DISTINCT `name` FROM `processor`';

echo '<form method="get">';

echo "<select id ='name' name='name'><option> Choose the processor </option>";

foreach($db->query($softwareSql) as $row) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}

echo "</select>";
echo '<input type="button" value="ОК" onclick="get()"><br>'
?>
<table style="border: 1px solid"><tr><th> Computers </th></tr>
<tbody id = "text"></tbody></table>
<script>
const ajax = new XMLHttpRequest();

function get(){
    let name = document.getElementById("name").value;
    ajax.onreadystatechange = update;
    ajax.open("GET", "../php/getComputersByProcessor.php?name="+ name);
    
    ajax.send(null);
}

  function update(){
    if(ajax.readyState === 4){
      if(ajax.status === 200){
        var text = document.getElementById('text');
        var res = ajax.responseText;
        var resHtml ="";
        res = JSON.parse(res);
        resHtml += "<tr><td>netname</td><td>motherboard</td><td>RAM_capacity</td><td>HDD_capacity</td><td>monitor</td><td>vendor</td></tr>";
        res.forEach(computer =>{
         resHtml += "<tr><td style = 'border: 1px solid'>" + computer["netname"] +"</td><td style = 'border: 1px solid'>" + computer["motherboard"] +"</td><td style = 'border: 1px solid'>" + computer["ram_capacity"] +"</td><td style = 'border: 1px solid'>" + computer["hdd_capacity"] +"</td><td style = 'border: 1px solid'>" + computer["monitor"] +"</td><td style = 'border: 1px solid'>" + computer["vendor"] +"</td></tr>"
        });
        
      text.innerHTML = resHtml;
      }
    }
  }
</script>
</body>
</html>



