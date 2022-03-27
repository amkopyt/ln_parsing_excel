<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    const TYPE_OF_VALUE_QLIQ = 1;
    const TYPE_OF_VALUE_QOIL = 2;
    const TYPE_OF_DICISION_FACT = 1;
    const TYPE_OF_DICISION_FORECAST = 2;

    protected $fillable  = ['company_id', 'date', 'type_of_value', 'type_of_decision', 'value'];
}
