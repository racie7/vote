<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Vote
 * @package App
 * @mixin \Eloquent
 */
class Vote extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'count', 'election_id', 'nominee', 'team_id'
	];

	/**
	 * Find the election the votes belong to
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function election() {
		return $this->belongsTo(Election::class, 'election_id');
	}

	/**
	 * Get the nominee data
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function candidate() {
		return $this->belongsTo(User::class, 'nominee');
	}

	public function team() {
		return $this->belongsTo(Team::class, 'team_id');
	}
}
