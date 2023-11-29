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
 * Class Quiz
 *
 * @property string $id
 * @property string $class_id
 * @property string $name
 * @property int $points
 * @property int $total_point
 * @property int $duration
 * @property bool $open
 * @property Carbon $start_time
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Quiz extends Model
{
    use HasUuids, HasFactory;
	protected $table = 'quiz';
	public $incrementing = false;

	protected $casts = [
		'points' => 'int',
		'total_point' => 'int',
		'duration' => 'int',
		'start_time' => 'datetime'
	];

	protected $fillable = [
		'id',
		'class_id',
		'name',
		'open',
		'points',
		'total_point',
		'duration',
		'start_time'
	];
    public function response()
    {
        return $this->hasMany(QuizResponse::class);
    }
}
