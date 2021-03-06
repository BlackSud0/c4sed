<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalculatedEangle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug',
        'eangle_type',
        'connection_type',
        'designation_id',
        'user_id',
        'grade',
        'D',
        'DL',
        'LL',
        'WL',
        'status',
        'company_name',
        'project_name',
        'connected_to_both_sides',
    ];

    /**
     * The CalculatedEangle Model Relationships.
     *
     */
    public function designation()
    {
        return $this->belongsTo('App\Models\Eangle', 'designation_id', 'id');
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
