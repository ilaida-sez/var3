<?php 
    if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['log_in'])){
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <style>
        body{
            background-color: #9EA1A2;
        }
        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1vw;
            margin-top: 20vw;
        }
        input{
            border:1px solid #E41613;
            border-radius: 2vw;
            background-color: white;
            font-size: 2vw;
            font-family: Arial;
            padding: 1vw 2vw;
        }
        button{
            border:none;
            border-radius: 2vw;
            background-color: #E41613;
            font-size: 2vw;
            font-family: Arial;
            padding: 1vw 2vw;
            color: white;
        }
    </style>
</head>
<body>
    <form action="auth.php" method="post">
        <input type="text" placeholder="Логин" id="login">
        <input type="password" placeholder="Пароль" id="password">
        <button type="submit" id="log_in">Авторизоваться</button>
    </form>
</body>
</html>