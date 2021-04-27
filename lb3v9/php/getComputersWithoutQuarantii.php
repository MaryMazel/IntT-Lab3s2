<?php 
header("Content-Type: text/xml");
header("Cache-Control: no-cahe, must-revalidate");

include("dbConnect.php");

$stmt = $db->prepare("SELECT * FROM computer where quarantii = 'NO'");
$stmt->execute();


echo "<?xml version='1.0' encoding='utf-8'?>";
echo "<computers>";

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    print "<computer><netname>".$row['netname']."</netname><motherboard>".$row['motherboard']."</motherboard><RAM_capacity>".$row['ram_capacity']."</RAM_capacity><HDD_capacity>".$row['hdd_capacity']."</HDD_capacity><monitor>".$row['monitor']."</monitor><vendor>".$row['vendor']."</vendor></computer>";
}
echo "</computers>";
?>