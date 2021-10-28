<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoneyManagement\Income;
use App\Models\MoneyManagement\Expense;

class WelcomeController extends Controller
{
    public function index()
    {
        $total_income = Income::sum('amount');
        $total_expense = Expense::sum('amount');
        $total = $total_income - $total_expense;
        return view('welcome.index', compact('total'));
    }

    public function mySaving()
    {
        return view('welcome.my-saving');
    }
}
