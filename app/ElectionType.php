<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ElectionType extends Model {
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'type', 'slug',
	];

	/**
	 * Get the elections the type has
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function elections() {
		return $this->hasMany(Election::class);
	}
}
