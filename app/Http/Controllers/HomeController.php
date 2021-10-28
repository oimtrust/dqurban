<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoneyManagement\Income;
use App\Models\MoneyManagement\Expense;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_income = Income::sum('amount');
        $total_expense = Expense::sum('amount');
        $total = $total_income - $total_expense;
        return view('home', compact('total'));
    }
}
