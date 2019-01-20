<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flats extends Model
{
    //
    protected $table = 'flats';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = true;
    
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'headlines',
        'description',
        'address',
        'tags',
        'user_id',
        'tmp_token',
        'path',
        'fee',
    ];
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];
}
