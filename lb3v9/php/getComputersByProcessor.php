<?php 
include("dbConnect.php");

$name = $_GET['name'];

$stmt = $db->prepare("select c.* from computer c join processor p on c.fid_processor = p.id_processor where p.name = ?");
$stmt -> bindValue(1,$name);
$stmt->execute();
$result = [];

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push ($result, $row);
}
echo json_encode($result);
?>