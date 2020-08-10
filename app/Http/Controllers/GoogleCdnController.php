<?php

namespace App\Http\Controllers;

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
        $portfolios = $this->disk->files('img/portfolio');

        $cdn = $this->disk->url('');

        return view('storage.gcs.index', compact('portfolios','cdn'));
    }
}
