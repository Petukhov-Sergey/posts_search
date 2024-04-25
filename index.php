<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Загрузка данных</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container my-4">
<h1 class="text-center">Загрузка постов и комментариев</h1>
<div class="text-center mb-4">
    <form method="get">
        <button type="submit" name="load_data" class="btn btn-primary">
            Загрузить посты и комментарии
        </button>
    </form>
</div>

<?php
if (isset($_GET['load_data'])) {
    include 'includes/parse.php'; // Запускаем скрипт для загрузки данных
    $num_posts = $_SESSION['num_posts'] ?? 0;
    $num_comments = $_SESSION['num_comments'] ?? 0;
    echo "<p class='text-center'>Загружено $num_posts записей и $num_comments комментариев</p>";
}
?>

<h2 class="text-center">Поиск постов по комментариям</h2>
<div class="text-center">
    <form id="search-form" class="form-inline justify-content-center">
        <!-- Поле ввода для поиска -->
        <input type="text" id="search-input" placeholder="Введите строку для поиска" class="form-control mr-2" required
               minlength="3">
        <!-- Кнопка поиска -->
        <button type="submit" class="btn btn-success">Найти</button>
    </form>
</div>
<div id="search-results" class="mt-4"></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="scripts/search.js"></script>
</body>
</html>
