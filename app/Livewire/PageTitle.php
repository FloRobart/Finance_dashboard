<?php
namespace App\Livewire;

/*
 * Ce fichier fait partie du projet Finance Dashboard
 * Copyright (C) 2024 Floris Robart <florisrobart.pro@gmail.com>
 */

use Livewire\Component;

class PageTitle extends Component
{
    public $title;

    public function render()
    {
        return view('livewire.page-title');
    }
}
