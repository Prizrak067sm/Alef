<?php
    class Controller_Main extends Controller
    {
        public function action_default()
        {
            $data_for_view['title'] = 'Задачи от Alef';
            $this->view->generate('main_view.php', $this->base_view, $data_for_view);
        }
    }
?>