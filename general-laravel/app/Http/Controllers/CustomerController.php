<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Repositories\CustomerRepositoryInterface;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    /**
     * CustomerController constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return Customer[]|Collection
     */
    public function index()
    {
        return $this->customerRepository->all();
    }

    /**
     * @param Customer $customer
     * @return mixed
     */
    public function show(Customer $customer)
    {
        return $customer;
    }

    /**
     * @param $customerId
     * @return RedirectResponse|Redirector
     * @throws AuthorizationException
     */
    public function update($customerId)
    {
        $customer = Customer::where('id', $customerId)->firstOrFail();

        $this->authorize('update', $customer);

        $customer->update(request()->only('name'));

        return redirect('/customers/' . $customerId);
    }

    /**
     * @param $customerId
     * @return RedirectResponse|Redirector
     */
    public function destroy($customerId)
    {
        $this->customerRepository->destroy($customerId);

        return redirect('/customers');
    }
}
