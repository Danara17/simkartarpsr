<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    use HasFactory;

    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string'; // Set the primary key type to string

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            // Ensure the model's type and date attributes are set
            if (!$model->id) {
                $model->id = $model->generatePrimaryKey();
            }
        });
    }

    public function generatePrimaryKey()
    {
        $type = $this->type;
        $date = $this->date->format('dmy'); // Format the date to 'ddmmy'

        return $type . $date;
    }

    protected $fillable = [
        'id',
        'meeting_title',
        'meeting_description',
        'meeting_date',
        'start_time',
        'end_time',
        'status',
        'location',
    ];

}
