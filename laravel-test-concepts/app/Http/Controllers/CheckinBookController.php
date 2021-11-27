<?php

namespace App\Http\Controllers;

use App\Book;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class CheckinBookController
 * @package App\Http\Controllers
 * @group CheckinBook Module
 */
class CheckinBookController extends Controller
{
    /**
     * CheckinBookController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Book $book
     * @return ResponseFactory|Response
     */
    public function store(Book $book)
    {
        /**

         * @post('/checkin/{book}')
         * @name('')
         * @middlewares(web, auth)
         */
        try {
            $book->checkin(auth()->user());
        } catch (Exception $e) {
            return response([], JsonResponse::HTTP_NOT_FOUND);
        }
    }
}
