<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{

    use \Venturecraft\Revisionable\RevisionableTrait;
    use SoftDeletes;

    protected $revisionCreationsEnabled = true;

    protected $dates = ['deleted_at'];

    protected $revisionFormattedFields = array(
    'title'  => 'string:<strong>%s</strong>',
    'public' => 'boolean:No|Yes',
    'modified' => 'datetime:m/d/Y g:i A',
    'deleted_at' => 'isEmpty:Active|Deleted'
    );

    protected $fillable = ['name' , 'label'];

    public static function boot()
    {
        parent::boot();
    }
    
    //
    public function permissions(){
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(Users::class);
    }
    
    public function assign(Permission $permission){

        $this->permissions()->save($permission);
    }

    public function unassign(Permission $permission){
        $this->permissions()->detach($permission->id);
    }

    public function identifiableName()
    {
        return $this->name;
    }

}