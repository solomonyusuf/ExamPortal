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
 * Class QuizResponse
 *
 * @property string $id
 * @property string $quiz_id
 * @property string $question_id
 * @property string $users_id
 * @property string $response
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class QuizResponse extends Model
{
    use HasUuids, HasFactory;
	protected $table = 'quiz_response';
	public $incrementing = false;

	protected $fillable = [
		'id',
		'quiz_id',
		'question_id',
		'users_id',
		'response'
	];

    public function quiz()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
}
