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
 * Class QuizQuestion
 *
 * @property string $id
 * @property string $quiz_id
 * @property string $title
 * @property string $correct
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property int $point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class QuizQuestion extends Model
{
    use HasUuids, HasFactory;
	protected $table = 'quiz_question';
	public $incrementing = false;

	protected $casts = [
		'point' => 'int'
	];

	protected $fillable = [
		'id',
		'quiz_id',
		'title',
		'correct',
		'a',
		'b',
		'c',
		'd',
		'point'
	];
    public function response()
    {
        return $this->hasMany(QuizResponse::class, 'question_id');
    }
}
