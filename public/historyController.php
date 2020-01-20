<?php
    namespace Main;
    class HistoryController {
        public function showHistory($twig) {
            $model = new Model();
            $historyArray = $model->getUnavailableCars();
            $map = ["historyArray" => $historyArray];
            return $twig->render("historyView.twig", $map);
        }
    }