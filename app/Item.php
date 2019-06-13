<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
		'title', 'description', 'image_url'
	];

	/**
	 * Get the author of the item.
	 */
	public function user()
	{
		return $this->belongsTo('App\User');
	}
}
