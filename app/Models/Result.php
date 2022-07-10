<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'publication_id',
        'number'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'number' => 'integer',
        'publication_id' => 'integer',
    ];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

}
