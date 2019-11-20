<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Election
 * @package App
 * @mixin \Eloquent
 */
class Election extends Model {
	use SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'period', 'is_completed', 'election_type_id', 'is_upcoming'
	];

	/**
	 * Convert the columns to their native types
	 * @var array
	 */
	protected $casts = [
		'is_completed' => true,
		'is_upcoming' => true,
	];

	/**
	 * Get the election type the election belongs to
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function type() {
		return $this->belongsTo(ElectionType::class, 'election_type_id');
	}

	/**
	 * Get the nominees for a particular election
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function nominations() {
		return $this->hasMany(Nomination::class);
	}

	/**
	 * Get the election votes
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function votes() {
		return $this->hasMany(Vote::class);
	}
}
