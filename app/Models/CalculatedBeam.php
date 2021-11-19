<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatedBeam extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'beam_type',
        'designation_id',
        'user_id',
        'grade',
        'L',
        'DL',
        'LL',
        'WL',
        'buckling',
        'status',
        'company_name',
        'project_name',
        'subject',
    ];

    /**
     * The CalculatedBeam Model Relationships.
     *
     */
    public function designation()
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
