<?php

namespace App\Repositories;

use App\Customer;

/**
 * Class CustomerRepository
 * @package App\Repositories
 */
class CustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @return Customer[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection
     */
    public function all()
    {
        return Customer::with('user')
            ->orderBy('name')
            ->where('active', 1)
            ->get()
            ->map->format();
    }

    /**
     * @param $customerId
     * @return mixed
     */
    public function findById($customerId)
    {
        return Customer::where('id', $customerId)
            ->where('active', 1)
            ->with('user')
            ->firstOrFail()
            ->format();
    }

    /**
     * @param $customerId
     */
    public function update($customerId)
    {
        //
    }

    /**
     * @param $customerId
     */
    public function destroy($customerId)
    {
        $customer = Customer::where('id',$customerId)->firstOrFail();

        $customer->delete();
    }
}
