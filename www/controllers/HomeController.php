<?php

namespace mvc\controllers;

class HomeController{
    public function buttonsAction(){
		$myView = new View("buttons");
    }

    public function cardsAction(){
      $myView = new View("cards");
    }

    public function colorsAction(){
      $myView = new View("utilities-color");
    }

    public function borderAction(){
      $myView = new View("utilities-border");
    }

    public function otherAction(){
      $myView = new View("utilities-other");
    }

    public function chartsAction(){
      $myView = new View("charts");
    }

    public function tableAction(){
      $myView = new View("table");
    }
}