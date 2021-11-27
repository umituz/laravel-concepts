<?php

namespace App\Http\Controllers;

use App\Book;

/**
 * Class CheckoutBookController
 * @package App\Http\Controllers
 * @group CheckoutBook
 */
class CheckoutBookController extends Controller
{
    /**
     * CheckoutBookController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Book $book
     */
    public function store(Book $book)
    {
        /**

         * @post('/checkout/{book}')
         * @name('')
         * @middlewares(web, auth)
         */
        $book->checkout(auth()->user());
    }
}
