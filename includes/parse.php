<?php
include 'database_connection.php';
session_start();
$posts = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/posts'), true);
$comments = json_decode(file_get_contents('https://jsonplaceholder.typicode.com/comments'), true);
$postStmt = $mysqli->prepare("INSERT INTO post (userId, title, body) VALUES (?, ?, ?)");
if (!$postStmt) {
    die("Error: " . $mysqli->error);
}
foreach ($posts as $post) {
    $postStmt->bind_param("iss", $post['userId'], $post['title'], $post['body']); // Используем объектный стиль
    $postStmt->execute();
    if ($postStmt->error) {
        die("Error: " . $postStmt->error);
    }
};
$postStmt->close();

$comment_stmt = $mysqli->prepare("INSERT INTO comment (postId, name, email, body) VALUES (?, ?, ?, ?)");
if (!$comment_stmt) {
    die("Error: " . $mysqli->error);
}
foreach ($comments as $comment) {
    $comment_stmt->bind_param("isss", $comment['postId'], $comment['name'], $comment['email'], $comment['body']);
    $comment_stmt->execute();
    if ($comment_stmt->error) {
        die("Error: " . $comment_stmt->error);
    }
}
$comment_stmt->close();

$_SESSION['num_posts'] = count($posts);
$_SESSION['num_comments'] = count($comments);

$mysqli->close();
