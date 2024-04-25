CREATE DATABASE IF NOT EXISTS inline;
USE inline;
CREATE TABLE IF NOT EXISTS post
(
    id     INT AUTO_INCREMENT PRIMARY KEY,
    userId INT,
    title  VARCHAR(255),
    body   TEXT
);
CREATE TABLE IF NOT EXISTS comment
(
    id     INT AUTO_INCREMENT PRIMARY KEY,
    postId INT,
    name   VARCHAR(255),
    email  VARCHAR(255),
    body   TEXT,
    FOREIGN KEY (postId) REFERENCES post (id) ON DELETE CASCADE
);
