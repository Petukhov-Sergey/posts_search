<?php
include '../includes/database_connection.php';
$query = $_GET['query'] ?? '';
if (strlen($query) < 3) {
    die("Query too short.");
}
$sql = "
    SELECT 
        p.title AS postTitle, 
        c.body AS commentBody 
    FROM 
        comment c 
    INNER JOIN 
        post p 
    ON 
        c.postId = p.id 
    WHERE 
        c.body LIKE ?
";
$stmt = $mysqli->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();

$result = $stmt->get_result();
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);

$stmt->close();
$mysqli->close();
