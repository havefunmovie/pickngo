<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $fillable = [
        'color_type',
        'paper_type',
        'price_first_page',
        'price_more_page',
        'service_percentage',
        'service_type',
        'service_price',
        'urgent_price',
        'weight_limit',
        'weight_minimum',
        'weight_extra',
        'weight_extra_price',
        'dimensions_limit',
        'dimensions_minimum',
        'dimensions_extra',
        'dimensions_extra_price',
        'distance_limit',
        'distance_minimum',
        'distance_extra',
        'distance_extra_price'
    ];
}