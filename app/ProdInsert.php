<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdInsert extends Model
{
	protected $table = 'product';
	public $timestamps = false;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'product_name', 'product_brand', 'product_price', 'product_description',
		'product_availability', 'product_category', 'image'
	];
}
