<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
    //
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'label'];

    public static function boot()
    {
        parent::boot();
    }
    /**
     * Get the user that owns the category.
     */

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function items(){
    	return $this->hasMany(Item::class);
    }
}
