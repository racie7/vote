<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 * @package App
 * @mixin \Eloquent
 */
class Department extends Model {
	use SoftDeletes;


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'team_id'
	];

	/**
	 * Get the team the department belongs to
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function team() {
		return $this->belongsTo(Team::class);
	}
}
