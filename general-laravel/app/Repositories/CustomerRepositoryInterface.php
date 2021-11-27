<?php

namespace App\Repositories;

/**
 * Interface CustomerRepositoryInterface
 * @package App\Repositories
 */
interface CustomerRepositoryInterface
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $customerId
     * @return mixed
     */
    public function findById($customerId);

    /**
     * @param $customerId
     * @return mixed
     */
    public function update($customerId);

    /**
     * @param $customerId
     * @return mixed
     */
    public function destroy($customerId);
}
