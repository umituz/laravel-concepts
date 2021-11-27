<?php

namespace Gallery\Entities;

use Gallery\Contracts\FileContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class File
 * @package Gallery\Entities
 */
class File extends Model implements FileContract
{
	// @todo IT WILL BE INCLUDED LATER FOR TRASH BIN FILES
//	use SoftDeletes;
	
	/**
	 * Specifies which fields are not mass assignable
	 *
	 * @var array
	 */
	protected $guarded = [];
	
	/**
	 * Specifies the table of the model
	 *
	 * @var string
	 */
	protected $table;
	
	/**
	 * File constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		$this->table = config('gallery.database.gallery.baseTable');
	}
	
	/**
	 * @return HasMany
	 */
	public function fileables()
	{
		return $this->hasMany(Fileable::class);
	}
}
