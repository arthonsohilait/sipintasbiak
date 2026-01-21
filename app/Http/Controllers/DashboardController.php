<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\News;
use App\Models\MapProject;
use App\Models\Sector;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'news_count' => News::count(),
            'map_count' => MapProject::count(),
            'sector_count' => Sector::count(),
        ];

        return view('dashboard', compact('stats'));
    }
}
