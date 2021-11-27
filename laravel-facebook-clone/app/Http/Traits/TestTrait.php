<?php

namespace App\Http\Traits;

use App\User;

/**
 * Trait TestTrait
 * @package App\Http\Traits
 */
trait TestTrait
{
    /**
     * Returns a fresh user
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|mixed
     */
    public function user()
    {
        return factory(User::class)->create();
    }

    /**
     * @return $this
     */
    public function act()
    {
        $user = $this->user();
        $this->actingAs($user, 'api');
        return $this;
    }
}
