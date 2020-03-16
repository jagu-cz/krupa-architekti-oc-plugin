<?php

namespace Jagu\KrupaArchitekti\Controllers;

use Backend\Classes\Controller;
use Backend\Facades\BackendMenu;
use Illuminate\Support\Facades\Lang;

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Jagu.KrupaArchitekti', 'krupaarchitekti', null);
    }

    public function index()
    {
        $this->pageTitle = Lang::get('jagu.krupaarchitekti::lang.plugin.name');
    }
}