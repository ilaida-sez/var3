<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        footer{
            right: 0;
            position: absolute;
            bottom: 0;
            margin: 0 1vw 1vw 1vw;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border:none;
            color: white;
            background: #0060AC;
            border-radius: 1vw;
        }
        .delete{
            background: #E41613;
        }
        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            position: relative;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: black;
        }


        /* pop-up */
        h1 {
            text-align: center;
        }
        h2 {
            color: #E41613;
            margin-top: 50px;
        }
        h3 {
            width: 350px;
            color: #0060AC;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        #delete {
            background-color: #E41613;
            color: white;
            border: none;
            margin-left: 50px;
        }
        #no {
            color: white;
            background-color: #0060AC;
            border: none;
            margin-left: 150px;
        }

        #open-popup {
            background-color: #E41613;
            color: white;
            border: none;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <footer>
        <button type="submit">добавить</button>
        <button type="submit">изменить</button>
        <button type="submit" class="delete" id="open_delete">удалить</button>

        <div id="popup_delete" class="popup">
        <div class="popup-content">
            <span class="close">&times;</span>
            <h1>УДАЛЕНИЕ ДАННЫХ</h1>
            <h2>Важно: </h2>
            <p>При удалении этой преподавательской нагрузки будут стёрты все модули связанные с ней</p>
            <h3>Уверены что хотите удалить эту преподавательскую нагрузку?</h2>
            <button id="delete">Удалить</button>
            <button id="no">Отмена</button>
        </div>
    </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openPopupButton = document.getElementById('open_delete');
            const popup = document.getElementById('popup_delete');
            const closeButton = document.querySelector('.close');

            openPopupButton.addEventListener('click', function() {
                popup.style.display = 'flex';
            });

            closeButton.addEventListener('click', function() {
                popup.style.display = 'none';
            });

            // Close the popup if clicked outside of the popup content
            popup.addEventListener('click', function(event) {
                if (event.target === popup) {
                    popup.style.display = 'none';
                }
            });
        });
</script>
</body>
</html>