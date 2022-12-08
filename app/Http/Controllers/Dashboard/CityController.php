<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\CityDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(CityDataTable $myDataTable)
    {
        return $myDataTable->render('dashboard.citytable');
    }
}
