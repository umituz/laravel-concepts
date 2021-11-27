<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

/**
 * Class MongoDBTest
 * @package App
 */
class MongoDBTest extends Model
{
    protected $guarded = [];

    protected $primaryKey = 'id';

//    protected $collection = 'mongo_db_tests';
}
