<?php
namespace App\Models;

/*
 * Ce fichier fait partie du projet Finance Dashboard
 * Copyright (C) 2024 Floris Robart <florobart.github@gmail.com>
 */

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epargne extends Model
{
    use HasFactory;

    protected $connection = 'finance_dashboard';
    protected $table = 'epargnes';

    protected $fillable = [
        'date_transaction',
        'montant_transaction',
        'banque',
        'compte'
    ];
}
