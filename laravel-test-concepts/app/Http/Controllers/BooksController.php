<?php

namespace App\Http\Controllers;

use App\Book;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

/**
 * Class BooksController
 * @package App\Http\Controllers
 * @group Books Module
 */
class BooksController extends Controller
{
    /**
     * @return string
     */
    public function store()
    {
        /**

         * @post('/books')
         * @name('')
         * @middlewares(web)
         */
        $book = Book::create($this->validateRequest());
        return redirect($book->path());
    }

    /**
     * @param Book $book
     * @return RedirectResponse
     */
    public function update(Book $book)
    {
        /**

         * @patch('/books/{book}')
         * @name('')
         * @middlewares(web)
         */
        $book->update($this->validateRequest());
        return redirect($book->path());
    }

    /**
     * @param Book $book
     * @return Application|RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Book $book)
    {
        /**

         * @delete('/books/{book}')
         * @name('')
         * @middlewares(web)
         */
        $book->delete();
        return redirect('/books');
    }

    /**
     * @return array
     */
    public function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'author_id' => 'required'
        ]);
    }
}
