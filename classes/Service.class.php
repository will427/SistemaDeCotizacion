<?php

    class Service {
        private $id;
        private $title;
        private $subtitle;
        private $price;
        private $description;
        private $category;

        public function __construct($id, $title, $subtitle, $price, $description, $category) {
            $this->id = $id;
            $this->title = $title;
            $this->subtitle = $subtitle;
            $this->price = $price;
            $this->description = $description;
            $this->category = $category;
        }

        public function getId() {
            return $this->id;
        }

        public function getTitle() {
            return $this->title;
        }
        public function getSubtitle() {
            return $this->subtitle;
        }
        
        public function getPrice() {
            return $this->price;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getCategory() {
            return $this->category;
        }
    }

?>