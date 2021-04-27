<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Software</title>
</head>
<body>
<?php
include("../php/dbConnect.php");

$softwareSql = 'SELECT DISTINCT `name` FROM `software`';

echo '<form method="get">';

echo "<select id ='name' name='name'><option> Choose the software </option>";

foreach($db->query($softwareSql) as $row) {
    echo "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>";
}

echo "</select>";
echo '<input type="button" value="ОК" onclick = "get()"><br>'
?>


<table style="border: 1px solid"><tr><th>Computers</th></tr>
<tbody id = "text"></tbody>

<script>
const ajax = new XMLHttpRequest();

function get(){
  let name = document.getElementById("name").value;
    ajax.onreadystatechange = update;
    ajax.open("GET", "../php/getComputersBySoftware.php?name=" + name);
    
    ajax.send(null);
}

  function update(){
    if(ajax.readyState === 4){
      if(ajax.status === 200){
        var text = document.getElementById('text');
        text.innerHTML = ajax.responseText;
      }
    }
  }
</script>
</body>
</html>



