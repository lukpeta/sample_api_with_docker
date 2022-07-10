<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTimeInterface;

class Publication extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'date'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'date'
    ];

    protected $casts = [
        'date'  => 'date:Y-m-d'
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d');
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

}
