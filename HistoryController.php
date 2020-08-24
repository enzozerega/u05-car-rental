<?php
    namespace Main;
    /* Comments:

    ###Functions###
    showHistory: queries history and calculates costs of rented cars.
    
    */

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