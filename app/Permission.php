<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    //

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

    public function roles(){
        return $this->belongsToMany(Role::class);
    }
}
