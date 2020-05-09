<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['created_by', 'name', 'description', 'start_date', 'end_date', 'color', 'assign_to'];

    protected $dates = [
        'start_date',
        'end_date'
    ];


    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = date('Y-m-d', strtotime($value));
    }

    public function setEndtDateAttribute($value)
    {
        $this->attributes['end_date'] = date('Y-m-d', strtotime($value));
    }


    public function getDescriptionAttribute($value)
    {
        return str::limit($value, 20);
    }


}
