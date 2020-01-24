<?php

    namespace Main;
    
    class MainController {
        public function mainMenu($twig) {
            return $twig->render("MainMenuView.twig");
        }
    }