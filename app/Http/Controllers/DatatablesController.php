<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class DatatablesController extends Controller
{
    public function userData()
    {
        $query = User::where('id', '<>', Auth::user()->id)->where('is_admin', 0);
        return DataTables::of($query)->toJson();
    }
    public function destroyedData()
    {
        $query = User::onlyTrashed()->where('id', '<>', Auth::user()->id)->where('is_admin', 0);
        return DataTables::of($query)->toJson();
    }
}
