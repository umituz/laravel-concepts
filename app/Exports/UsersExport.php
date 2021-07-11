<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

/**
 * Class UsersExport
 * @package App\Exports
 */
class UsersExport implements FromCollection, Responsable
{
    use Exportable;

    /**
     * @var string
     */
    private $fileName = 'users.xlsx';

    /**
     * @return Collection
     */
    public function collection()
    {
        return User::all();
    }
}
