<?php
    class Controller_Task1 extends Controller
    {
        // --- Основной метод. Просто рендеринг страницы с формой, на основе которой будет
        //     создан двумерный массив(матрица) и посчитана сумма диагонали. ---
        public function action_default()
        {
            $data_for_view['title'] = 'Задача 1.';   // Массив для вью, элемент которого - title.

            $this->view->generate('task1_view.php', $this->base_view, $data_for_view);
        }
        // ----------------------------------------------------------------------

        // --- Получаем данные из формы, формируем массив и считаем сумму. ---
        public function action_fibonachi()
        {
            $data_for_view['title'] = 'Задача 1. Результат.';   // Массив для вью, элемент которого - title.
            $result = "Что-то пошло не так... (((";   // Стандартное сообщение, если не будет поста.
            if (isset($_POST))
            {
                // ------- Формируем массив. -------
                $razmer = $_POST['razmer'];     // Получаем размерность.
                $lastIndex = $razmer-1;   // Номер последнего элемента массива(последняя строка или столбец).

                // Инициализация первых элементов.
                $fibonachi_array[0][0] = 1;
                $fibonachi_array[1][0] = 1;
                // -------------------------------

                // Переменные для значения прошлого элемента последовательности и позапрошлого.
                $temp_1 = $fibonachi_array[1][0];   // n-1.
                $temp_2 = $fibonachi_array[0][0];   // n-2.
                // ----------------------------------------------------------------------------
                // -- Перебираем массив и вложенный массив. По одному элементу в каждом внутреннем. --
                for ($j=0; $j<$razmer; $j++)   // Атрибут (Столбец).
                {
                    for ($i=0; $i<$razmer; $i++)  // Кортеж (Строка).
                    {
                        if (empty($fibonachi_array[$i][$j]))   // Пропускаем первые, заданные элементы.
                        {
                            $fibonachi_array[$i][$j] = $temp_1 + $temp_2;   // Получаем и присваиваем текущему элементу массива значение на основе двух предыдыщуих.
                            if (!($j==$lastIndex && $i==$lastIndex))   // Если текущий элемент не последний последнего массива..
                            {
                                // Подготавливаем для следующего элемента значения прошлых для него элементов.
                                $temp_2 = $temp_1;   // Который до присваивания текущего был прошлым элементом для текущего, теперь позапрошлый для следующего.
                                $temp_1 = $fibonachi_array[$i][$j];   // Текущий элемент для следующего будет прошлым.
                                // ---------------------------------------------------------------------------
                            }
                        }
                    }
                }
                // -- Конец переборов. ---------------------------------------------------------------
                // ----- Массив сформирован. -------
                $data_for_view['fibonachi_array'] = $fibonachi_array;   // Массив для вью, элемент которого - сформированный массив.

                $diagonal = $_POST['diagonal'];   // Получаем значение из формы, которое определяет по какой диагонали нужно считать сумму.

                switch ($diagonal)
                {
                    case 'glavnaya':
                    {
                        // Считаем сумму главной диагонали.
                        $sum = 0;

                        for ($k=0; $k<$razmer; $k++)
                        {
                            $i=($razmer-1) - $k;
                            $j=$k;
                            $sum += $fibonachi_array[$i][$j];
                        }
                        // --------------------------------

                        $result = "Сумма главной диагонали [$lastIndex][0]-[0][$lastIndex]: ".$sum;
                        break;
                    }
                    case 'pobochnaya':
                    {
                        // Считаем сумму побочной диагонали.
                        $sum = 0;

                        for ($k=0; $k<$razmer; $k++)
                        {
                            $sum += $fibonachi_array[$k][$k];
                        }
                        // --------------------------------
                        $result = "Сумма побочной диагонали [0][0]-[$lastIndex][$lastIndex]: ".$sum;
                        break;
                    }
                }
            }

            $data_for_view['result'] = $result;   // Массив для вью, элемент которого - сумма.
            $this->view->generate('task1_result_view.php', $this->base_view, $data_for_view);
        }
        // --- Конец action_fibonachi(). -------------------------------------
    }
?>