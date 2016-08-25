<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use \Venturecraft\Revisionable\RevisionableTrait;
    use SoftDeletes;

    protected $revisionCreationsEnabled = true;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public static function boot()
    {
        parent::boot();
    }

    /**
     * Get all of the items for the user.
     */

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasManyRoles()
    {
        return $this->hasMany(Role::class);
    }

    public function permissions(){
        return $this->hasMany(Permission::class);
    }
   
    public function hasRole($role)
    {
        if(is_string($role)){
            return $this->roles->contains('name',$role);
        }
        
        return !! $role->intersect($this->roles)->count();
    }
    
    public function assign($role) {
        if(is_string($role))
        {
            return $this->roles()->save(
                Role::whereName($role)->firstOrfail()
                );
        }
        
        return $this->roles()->save($role);
    }

    public function unassign($role)
    {
        if(is_string($role))
        {
            return $this->roles()->detach(Role::whereName($role)->firstOrfail()->id);
        }

        return $this->roles()->detach($role->id);
    }

    public function updateRole($role)
    {

        return $this->roles()->sync((array)$role->id);
    }

    public function identifiableName()
    {
        return $this->name;
    }
 
}
