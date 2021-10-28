<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserManagement\User;
use App\Models\MoneyManagement\Income;
use App\Models\MoneyManagement\Category;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 20;
        $incomes = Income::orderBy('updated_at', 'DESC')->paginate($pagination);
        return view('incomes.index', compact('incomes'))->with('item', ($request->input('page', 1) -1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        $categories = Category::where('type', 'income')->pluck('name', 'id');
        return view('incomes.create', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_penabung' => 'required',
            'kategori' => 'required',
            'tanggal_menabung' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        $income = new Income();
        $income->user_id = $request->get('nama_penabung');
        $income->category_id = $request->get('kategori');
        $income->income_date = date('Y-m-d', strtotime($request->get('tanggal_menabung')));
        $income->amount = $request->get('jumlah');
        $income->note = $request->get('catatan');
        $income->save();

        return redirect()->route('income.create')->with('success', 'Setoran tabungan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view('incomes.show', compact('income'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        $users = User::pluck('name', 'id');
        $categories = Category::where('type', 'income')->pluck('name', 'id');
        return view('incomes.edit', compact('income', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_penabung' => 'required',
            'kategori' => 'required',
            'tanggal_menabung' => 'required',
            'jumlah' => 'required|numeric'
        ]);

        $income = Income::find($id);
        $income->user_id = $request->get('nama_penabung');
        $income->category_id = $request->get('kategori');
        $income->income_date = date('Y-m-d', strtotime($request->get('tanggal_menabung')));
        $income->amount = $request->get('jumlah');
        $income->note = $request->get('catatan');
        $income->save();

        return redirect()->route('income.edit', $income->id)->with('success', 'Setoran tabungan berhasil diubah');
    }
}
