<html>
    <head>
        <title><?php echo $title ?> </title>
        <link href="/aleftasks.ru/css/style.css" rel="stylesheet" type="text/css">

    </head>

    <body >
        <h1 align="center">(⹁'') Тестовые задачи от Alef Developement ('',)</h1>

        <div class = 'Menu'>
            <ul>
                <li> <a href="/aleftasks.ru"> Главная </a> </li>
                <li> <a href="/aleftasks.ru/index/task1"> Задача 1</a> </li>
                <li> <a href="/aleftasks.ru/index/task2"> Задача 2</a> </li>
                <li> <a href="/aleftasks.ru/index/task3"> Задача 3</a> </li>
            </ul>
        </div>

        <div class="Content">
            <?php
                eval($content_view);
            ?>
        </div>

        <div id = 'footer'>
            © Колюсь А. Н.
        </div>


    </body>
</html>
