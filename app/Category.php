<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	use SoftDeletes;
	//especificando que el atributo es de tipo fecha
	protected $dates = ['deleted_at'];

     public $transformer = CategoryTransformer::class;

    protected $fillable = [
    	'name',
    	'description',
    ];

    //excluir la información del pivote 
    protected $hidden = [
        'pivot'
    ];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
