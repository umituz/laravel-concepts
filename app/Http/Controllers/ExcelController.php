<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class ExcelController
 * @package App\Http\Controllers
 */
class ExcelController extends Controller
{
    /**
     * @return BinaryFileResponse
     */
    public function userCollectionMethod1(): BinaryFileResponse
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    /**
     * @return UsersExport
     */
    public function userCollectionMethod2(): UsersExport
    {
        return new UsersExport;
    }

    /**
     * @return BinaryFileResponse
     */
    public function userCollectionMethod3(\Maatwebsite\Excel\Excel $excel): BinaryFileResponse
    {
//        return $excel->download(new UsersExport(), 'users.xlsx');
//        return $excel->download(new UsersExport(), 'users.csv',\Maatwebsite\Excel\Excel::CSV);
        return $excel->download(new UsersExport(), 'users.pdf',\Maatwebsite\Excel\Excel::DOMPDF);
    }


}
