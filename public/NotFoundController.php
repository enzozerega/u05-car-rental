<?php

    namespace Main;
    
    class NotFoundController {
        public function notFound($twig) {
            return $twig->render("notFound.twig");
        }
    }