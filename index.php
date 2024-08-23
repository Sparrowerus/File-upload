<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Загрузите файл</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" accept=".txt" required>
    <label for="delimiter">Символ для разбивки:</label>
    <input type="text" name="delimiter" id="delimiter" required>
    <button type="submit">Загрузить</button>
</form>
<?php if (isset($_GET['status'])): ?>
    <div class="status">
        <?php if ($_GET['status'] === 'success'): ?>
            <div class="circle success"></div>
            <p>Файл успешно загружен!</p>
            <p><a href="process.php">Просмотреть результат</a></p>
        <?php elseif ($_GET['status'] === 'error'): ?>
            <div class="circle error"></div>
            <p>Произошла ошибка при загрузке файла.</p>
        <?php elseif ($_GET['status'] === 'invalid_type'): ?>
            <div class="circle error"></div>
            <p>Неверный тип файла.</p>
        <?php endif; ?>
    </div>
<?php endif; ?>
</body>
</html>
