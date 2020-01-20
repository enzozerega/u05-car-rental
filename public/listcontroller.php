<?php
    namespace Main;
    class ListController {
        public function listAll($twig) {
            $model = new Model();
            $personArray = $model->getAll();
            $map = ["personArray" => $personArray];
            return $twig->loadTemplate("ListAllView.twig")->render($map);
        }

        public function listIndex($twig, $index) {
            $model = new Model();
            $person = $model->getIndex($index);
            $map = ["index" => $index, "person" => $person];
            return $twig->loadTemplate("ListIndexView.twig")->render($map);
        }
    }