<?php
    namespace Main;
    class Request {
        private $path, $form;

        public function __construct() {
            $this->path = $_SERVER["REQUEST_URI"];
            $this->pathCount = strlen($this->path);
            $this->path = substr($this->path, 0, $this->pathCount);
            $this->form = $_POST;
        }

        public function getPath() {
            return $this->path;
        }

        public function getForm() {
            return $this->form;
        }
    }