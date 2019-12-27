<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kantor;
use App\Pembina;

class DashboardController extends Controller
{
    public function index()
    {
    	$data_user = User::all();
    	$data_kantor = Kantor::all();
    	$data_pembina = Pembina::all();
    	return view('dashboard.index',compact('data_user','data_kantor','data_pembina'));
    }
}
