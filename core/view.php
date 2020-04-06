<?php
    class View
    {
        private $catalog_views;   // Каталог с вьюшками.
        function __construct($_dir_app)
        {
            $this->catalog_views=$_dir_app."/views/";
        }

        function generate($content_view, $template_view=null, $data_for_view=null)
        {
            if ($data_for_view)   // Если с контроллера переданы данные для вью, распаковываем их из массива в переменные.
                extract($data_for_view);

            // --- В базовой вьюшке $base_view будет включаться страница с контентом - $content_view. Если контроллер передает имя
            //     страницы, то добавляем префикс с каталогом вьюшек и инструкцию включения - include. В базовой вью $base_view
            //     будет выполнена строка переменной $content_view. Таким образом, если нужен только шаблон без контента,
            //     будет передано значение null - файла не существует. Переменной $content_view присваиваем null. ---
            if ($content_view && file_exists($this->catalog_views.$content_view))
                $content_view = "include " . "'" . $this->catalog_views . $content_view . "';";
            else
                $content_view = null;
            // ------------------------------------------------------------------------------------------------------

            // Ситуация, когда базовой вью нет, нужна просто страница контента.
            if ($template_view)
                include $this->catalog_views.$template_view;   // Включаем шаблон.
            else
                eval($content_view);
            // ----------------------------------------------------------------
        }
    }
?>