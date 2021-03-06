<?php

namespace App;

use App\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    //
    use \Venturecraft\Revisionable\RevisionableTrait;
    use SoftDeletes;

    protected $revisionCreationsEnabled = true;

    protected $dates = ['deleted_at'];

       //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name','label'];

    public static function boot()
    {
        parent::boot();
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function customers()
    {
    	return $this->hasMany(Customer::class);
    }
}
