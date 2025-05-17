<?php
    $menuItems = [
        'Дисциплина' => "pages/index.php",
        'Программа дисциплин' => "pages/index.php",
        'Нагрузка' => "pages/index.php",
        'Занятия' => "pages/index.php",
        'Преподаватели' => "pages/index.php",
        'Консультации' => "pages/index.php",
        'Студенты' => "pages/index.php",
        'Группы' => "pages/index.php",
        'Оценки' => "pages/index.php"
    ];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <button class="menu-toggle" id="menuToggle">
            <img src="img/menu_burger.png" alt="Menu" class="menu-icon">
        </button>
        <nav class="main-nav" id="mainNav">
            <?php
            foreach ($menuItems as $item => $href) {
                echo "<h1><a href=".$href.">" . htmlspecialchars($item) . '</a></h1>';
            }
            ?>
        </nav>
    </header>
    <script src="script.js"></script>
</body>
</html>
