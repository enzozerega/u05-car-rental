<?php
    namespace Main;
    class HistoryController {
        public function showHistory($twig) {
            $model = new Model();
            $historyArray = $model->getHistory();
            $totalCost = null;
            foreach ($historyArray as $cost) {
                $totalCost = $cost['cost'] + $totalCost;
            }
            $map = ["historyArray" => $historyArray, "totalCost" => $totalCost];
            return $twig->render("historyView.twig", $map);
        }
    }