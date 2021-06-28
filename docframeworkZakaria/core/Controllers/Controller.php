<?php

namespace Controllers;

// Abstract = on peut pas instancier

abstract class Controller
{

     protected $model;

     protected $modelName;

        public function __construct(){

            $this->model = new $this->modelName(); // La propriété model permet d'instancier une classe qui porte le nom fixée par la propriété modelName.
        }



}