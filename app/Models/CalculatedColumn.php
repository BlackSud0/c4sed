<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatedColumn extends Model
{
    use HasFactory;
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'column_type',
        'element_type',
        'designation_id',
        'user_id',
        'grade',
        'L',
        'DL',
        'LL',
        'WL',
        'status',
        'company_name',
        'project_name',
    ];

    /**
     * The CalculatedColumn Model Relationships.
     *
     */
    public function HSection()
    {
        return $this->belongsTo('App\Models\Column', 'designation_id', 'id');
    }
    public function ISection()
    {
        return $this->belongsTo('App\Models\Beam', 'designation_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function Grades()
    {
        return $this->hasMany('App\Models\Grade', 'grade', 'grade');
    }

}
