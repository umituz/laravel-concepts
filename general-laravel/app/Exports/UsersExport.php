<?php

namespace App\Exports;

use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

/**
 * Class UsersExport
 * @package App\Exports
 */
class UsersExport implements
//    FromCollection,
    ShouldAutoSize,
    WithMapping,
    WithHeadings,
    FromQuery
//    Responsable,
//    FromArray,
//    FromView
{
    use Exportable;

    /**
     * @var string
     */
    private $fileName = 'users.xlsx';

//    /**
//     * @return Collection
//     */
//    public function collection()
//    {
//        return User::with('address')->get();
//    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): \Illuminate\Database\Eloquent\Builder
    {
        return User::query()->with('address');
    }

    /**
     * @param mixed $user
     * @return array
     */
    public function map($user): array
    {
        return [
            $user->id,
            $user->email,
            $user->address->country ?? '',
            $user->created_at
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Email',
            'Country',
            'Created At'
        ];
    }

    /**
     * @return string[][]
     */
//    public function array(): array
//    {
//        return [
//           [
//               'Ümit',
//               'Uz'
//           ]
//        ];
//    }

    /**
     * @return Application|Factory|View
     */
//    public function view() : View
//    {
//        return view('exports.users', [
//            'users' => User::all()
//        ]);
//    }
}
