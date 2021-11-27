<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;

/**
 * Class LazyCollectionController
 * @package App\Http\Controllers
 */
class LazyCollectionController extends Controller
{
    /**
     * @return string
     */
    public function collection()
    {
        // 1.000.000 => Allowed memory size of 134217728 bytes exhausted (tried to allocate 33554440 bytes)
        Collection::times(1000000)
            ->map(function ($number) {
                return pow(2, $number);
            })
            ->all();

        return 'done!';
    }

    /**
     * @return string
     */
    public function lazyCollection()
    {
        // 10.000.000 => Allowed memory size of 134217728 bytes exhausted (tried to allocate 33554440 bytes)
        LazyCollection::times(10000000)
            ->map(function ($number) {
                return pow(2, $number);
            })
            ->all();

        return 'done!';
    }

    /**
     * @return mixed
     */
    public function cursor()
    {
        // cursor() is alternative to all()
        return User::cursor();
    }

    /**
     * @return string
     */
    public function generator1()
    {
        function happyFunction($string)
        {
            yield $string;
        }

        return get_class(happyFunction('super happy'));
    }

    /**
     * @return array
     */
    public function generator2()
    {
        function happyFunction($string)
        {
            yield $string;
        }

        return get_class_methods(happyFunction('super happy'));
    }

    /**
     * @return \Generator
     */
    public function generator3()
    {
        function happyFunction()
        {
            dump(1);
            yield 'One';
            dump(2);

            dump(3);
            yield 'Two';
            dump(4);

            dump(5);
            yield 'Three';
            dump(6);
        }

        $return = happyFunction();

        dump($return->current());

        $return->next();

        dump($return->current());

        $return->next();

        dump($return->current());

        $return->next();

        dump($return->current());

        return $return;
    }

    /**
     * @return \Generator|void
     */
    public function generator4()
    {
        function happyFunction()
        {
            dump(1);
            yield 'One';
            dump(2);

            dump(3);
            yield 'Two';
            dump(4);

            dump(5);
            yield 'Three';
            dump(6);
        }

        foreach (happyFunction() as $result) {

            if ($result == 'Two') {
                return;
            }

            dump($result);
        }

        return happyFunction();
    }

    /**
     * @return \Generator|void
     */
    public function generator5()
    {
        function happyFunction($strings)
        {
            foreach ($strings as $string) {
                dump('start');
                yield $string;
                dump('end');
            }
        }

        foreach (happyFunction(['One', 'Two', 'Three']) as $result) {

//            if ($result == 'Two') {
//                return;
//            }

            dump($result);
        }

    }

    public function generator6()
    {
        function notHappyFunction($number)
        {
            $return = [];

            for ($i = 1; $i < $number; $i++) {
                $return[] = $i;
            }

            return $return;
        }

        // 10.000.000 => Allowed memory size of 134217728 bytes exhausted (tried to allocate 134217736 bytes)
        foreach (notHappyFunction(10000000) as $number) {

            if ($number % 1000 == 0) {

                dump($number . ' says hello');

            }

        }
    }

    public function generator7()
    {
        function happyFunction($number)
        {
            for ($i = 1; $i < $number; $i++) {
                yield $i;
            }
        }

        // 10.000.000 => Allowed memory size of 134217728 bytes exhausted (tried to allocate 134217736 bytes)
        foreach (happyFunction(10000000000000000000000000000000000000000) as $number) {

            if ($number % 1000 == 0) {

                dump($number . ' says hello');

            }

        }
    }


}
