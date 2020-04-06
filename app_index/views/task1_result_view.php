<?php
    include_once "template_task1_view.php";   // Страница с условием.

    echo "<table>";
        // Вывод имен столбцов.
        echo "<tr>";
            echo "<th>  - </th>";
            for ($j=0; $j<count($fibonachi_array[0]);$j++)
            {
                echo "<th>  a$j </th>"; // Номера столбцов.
            }
        echo "</tr>";
        // ----------------------
        // Вывод элементов массива в таблицу (матрица).
        foreach ($fibonachi_array as $row=>$column)
        {
            echo "<tr> <th>  a$row </th>"; // Номера строк.
                foreach ($column as $td)
                {
                    echo "<td>$td</td>";
                }

            echo "</tr>";
        }
        // ----------------------------------------------
    echo "</table>";

    echo $result;
?>
