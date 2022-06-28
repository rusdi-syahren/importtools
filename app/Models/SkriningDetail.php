<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkriningDetail extends Model
{
    use HasFactory;

    protected $table = 'medical.mdc_skrining_details';
    protected $primaryKey = 'mdc_skrining_detail_id';


}
