<?php
    include_once "template_task1_view.php";   // Страница с условием.
?>
<form action="/aleftasks.ru/index/task1/fibonachi" method="POST" id="formfibonachi">
    <p> Введите размерность: <input type="number" name="razmer" max="9" min="2" value="2"> </p>

    <p> Сумма главной диагонали <input type="radio" name="diagonal" value="glavnaya" checked> </p>
    <p> Сумма побочной диагонали <input type="radio" name="diagonal" value="pobochnaya" > </p>
    <input type="submit" value="Получить сумму элементов">
</form>