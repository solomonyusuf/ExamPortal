<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Instruction
 *
 * @property string $id
 * @property string $content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Instruction extends Model
{
    use HasUuids;

	protected $table = 'instruction';
	public $incrementing = false;

	protected $fillable = [
		'id',
		'content'
	];
}
