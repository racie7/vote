<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Nomination
 * @package App
 * @mixin \Eloquent
 */
class Nomination extends Model {
	use  SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'type', 'nominee', 'nominated_by', 'election_id', 'results'
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'results' => 'array',
	];


	/**
	 * Get the user who was nominated
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function nominee() {
		return $this->belongsTo(User::class, 'nominee');
	}

	/**
	 * Get the user who nominated a candidate
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function nominatedBy() {
		return $this->belongsTo(User::class, 'nominated_by');
	}

	public function election() {
		return $this->belongsTo(Election::class);
	}
}
