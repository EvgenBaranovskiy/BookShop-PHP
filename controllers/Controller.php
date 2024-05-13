<?php
    abstract class Controller 
    {
        protected $view_path = "./templates/";
    
        public function __construct()
        {
            session_start();
            session_regenerate_id();
        }

        abstract public function index();
    }