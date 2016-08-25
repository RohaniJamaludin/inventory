<?php

namespace App;

use App\Customer;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
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
    protected $fillable = ['customer_id','name','email', 'phone', 'address', 'city' , 'zip', 'state_id', 'status_id'];

    public static function boot()
    {
        parent::boot();
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function user()
    {
    	return $this->belongTo(User::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }


}
