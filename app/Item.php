<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
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
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code','name','category_id'];

    /**
     * Get the user that owns the item.
     */

    public static function boot()
    {
        parent::boot();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
    * Get the category that owns the item.
    */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function identifiableName()
    {
        return $this->name;
    }
}
