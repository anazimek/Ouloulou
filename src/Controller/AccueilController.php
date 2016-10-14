<?php

namespace App\Controller;

use App\Controller\AppController;


class AccueilController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow('index');
    }

    public function index()
    {

    }
}