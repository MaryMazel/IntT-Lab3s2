<?php 
include("dbConnect.php");

$name = $_GET['name'];

$stmt = $db->prepare("select c.* from computer c join computer_software cs on c.id_computer = cs. fid_computer join software s on s.id_software = cs.fid_software where s.name = ?");
$stmt -> bindValue(1,$name);
$stmt->execute();

print "<tr><td>netname</td><td>motherboard</td><td>RAM_capacity</td><td>HDD_capacity</td><td>monitor</td><td>vendor</td></tr>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<tr><td style = 'border: 1px solid'>$row[netname]</td><td style = 'border: 1px solid'>$row[motherboard]</td><td style = 'border: 1px solid'>$row[ram_capacity]</td><td style = 'border: 1px solid'>$row[hdd_capacity]</td><td style = 'border: 1px solid'>$row[monitor]</td><td style = 'border: 1px solid'>$row[vendor]</td></tr>";
}
?>