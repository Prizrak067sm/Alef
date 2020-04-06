<?php
    class Controller_Task2 extends Controller
    {
        // --- Основной метод. Просто рендеринг страницы с изображением схемы БД.
        public function action_default()
        {
            $data_for_view['title'] = 'Задача 2.';   // Массив для вью, элемент которого - title.

            $this->view->generate('task2_view.php', $this->base_view, $data_for_view);
        }

    }
?>