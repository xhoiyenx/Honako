<?php
/**
 * HONAKO APPLICATION
 * By: Hoiyen
 * Ver: 0.0.1
 * Last Update: 05/03/2016
 *
 * Domain: 
 * Global
 * 
 * Type: 
 * Model
 * 
 * Description:
 * Administrators model
 */

namespace Library\Models;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
	protected $table = 'user_eav';
	public $timestamps = false;

	public function user()
	{
		return $this->belongsTo('Libray\Models\User');
	}
}