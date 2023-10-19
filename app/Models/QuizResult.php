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
 * Class QuizResult
 *
 * @property string $id
 * @property string $quiz_id
 * @property string $users_id
 * @property int $score
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class QuizResult extends Model
{ use HasUuids, HasFactory;
	protected $table = 'quiz_result';
	public $incrementing = false;

	protected $casts = [
		'score' => 'int'
	];

	protected $fillable = [
		'id',
		'quiz_id',
		'users_id',
		'score'
	];
}
