<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;

/**
 * Class BaseDuskTestCase
 * @package Tests\Browser
 */
class BaseDuskTestCase extends DuskTestCase
{
    /**
     * @var bool
     */
    protected static $migrationRun = false;

    /**
     * @var User
     */
    protected $user;

    /**
     * @void
     */
    public function setUp(): void
    {
        parent::setUp();
        if (!static::$migrationRun) {
            $this->artisan('migrate:fresh --seed');
            static::$migrationRun = true;
        }
//        $this->user = User::factory()->make();
        $this->user = User::find(1);
    }
}
