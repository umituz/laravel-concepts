<?php

namespace Gallery\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Fileable
 * @package Gallery\Entities
 */
class Fileable extends Model
{
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
		$this->table = config('gallery.database.gallery.relationshipTable');
	}
	
	/**
	 * @return BelongsTo
	 */
	public function file()
	{
		return $this->belongsTo(File::class);
	}
}
