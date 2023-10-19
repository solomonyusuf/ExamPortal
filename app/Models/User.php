<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/**
 * Class User
 *
 * @property string $id
 * @property string|null $image
 * @property string $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property string|null $exam_access
 * @property string $class_id
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $role
 * @property bool $locked
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class User extends Model
{
    use HasApiTokens, HasFactory, HasUuids, Notifiable;
	protected $table = 'users';
	protected $primaryKey = 'email';
	public $incrementing = false;

	protected $casts = [
		'email_verified_at' => 'datetime',
		'locked' => 'bool'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'id',
		'image',
		'first_name',
		'last_name',
		'middle_name',
		'exam_access',
		'class_id',
		'email_verified_at',
		'password',
		'role',
		'locked',
		'remember_token'
	];
}
