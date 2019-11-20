<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 * @mixin Eloquent
 */
class User extends Authenticatable {
	use Notifiable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
     *
     * job_description
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password', 'staff_no', 'national_id', 'department_id', 'campus_id',
		'designation', 'appointed_at', 'gender'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Get the votes the user has casted
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function votes() {
		return $this->hasMany(Vote::class, 'nominee');
	}

	/**
	 * Get the user nominations
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function nominations() {
		return $this->hasMany(Nomination::class);
	}

	/**
	 * Get the department the user belongs to
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function department() {
		return $this->belongsTo(Department::class);
	}
}
