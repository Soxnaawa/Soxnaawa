<?php
include 'database.php';

header('Content-Type: application/json');

$sql = "SELECT * FROM questions";
$result = $conn->query($sql);

$questions = [];

while ($row = $result->fetch_assoc()) {
    $questions[] = $row;
}

echo json_encode($questions);

$conn->close();
?>
