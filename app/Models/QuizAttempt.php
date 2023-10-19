<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class QuizAttempt
 *
 * @property string $id
 * @property string $quiz_id
 * @property string $users_id
 * @property bool $locked
 * @property Carbon $start_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class QuizAttempt extends Model
{ use HasUuids, HasFactory;
	protected $table = 'quiz_attempt';
	public $incrementing = false;

	protected $casts = [
		'locked' => 'bool',
		'start_time' => 'datetime'
	];

	protected $fillable = [
		'id',
		'quiz_id',
		'users_id',
		'locked',
		'start_time'
	];
}
