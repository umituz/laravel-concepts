<?php

namespace App\Http\Controllers;

use App\Helpers\PerformanceHelper;
use Illuminate\Support\Facades\Storage;

/**
 * Class GoogleCdnController
 * @package App\Http\Controllers
 */
class GoogleCdnController extends Controller
{
    /**
     * @var Filesystem
     */
    private $disk;

    /**
     * StorageController constructor.
     */
    public function __construct()
    {
        $this->disk = Storage::disk('gcs');
    }

    /**
     * @return Factory|View
     */
    public function index()
    {

        $startTime = microtime(TRUE);

        $portfolios = $this->disk->files('img/portfolio');

//        $directories = $this->disk->directories('/img');
//        $directories = $this->disk->files('/img');

        $endTime = microtime(TRUE);

        $a = PerformanceHelper::pageLoadTime($startTime, $endTime);

        dd(
            "here",
            $a,
            $portfolios
        );

        $cdn = $this->disk->url('');

        return view('storage.gcs.index', compact('portfolios', 'cdn'));
    }
}
