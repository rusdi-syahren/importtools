<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skrining extends Model
{
    use HasFactory;

    protected $primaryKey = 'mdc_skrining_id';
    protected $table = 'medical.mdc_skrinings';

   
}
