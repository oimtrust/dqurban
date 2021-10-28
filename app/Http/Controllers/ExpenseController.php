<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoneyManagement\Expense;
use App\Models\MoneyManagement\Category;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 20;
        $expenses = Expense::orderBy('updated_at', 'DESC')->paginate($pagination);
        return view('expenses.index', compact('expenses'))->with('item', ($request->input('page', 1) -1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('type', 'expense')->pluck('name', 'id');
        return view('expenses.create', compact('categories'));
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
            'jumlah' => 'required|numeric',
            'kategori' => 'required',
            'tanggal_transaksi' => 'required'
        ]);

        $expense = new Expense();
        $expense->amount = $request->get('jumlah');
        $expense->category_id = $request->get('kategori');
        $expense->expense_date = date('Y-m-d', strtotime($request->get('tanggal_transaksi')));
        $expense->note = $request->get('catatan');
        $expense->save();

        return redirect()->route('expense.create')->with('success', 'Transaksi pengeluaran berhasil dibuat');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $categories = Category::where('type', 'expense')->pluck('name', 'id');
        return view('expenses.edit', compact('expense', 'categories'));
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
            'jumlah' => 'required|numeric',
            'kategori' => 'required',
            'tanggal_transaksi' => 'required'
        ]);

        $expense = Expense::find($id);
        $expense->amount = $request->get('jumlah');
        $expense->category_id = $request->get('kategori');
        $expense->expense_date = date('Y-m-d', strtotime($request->get('tanggal_transaksi')));
        $expense->note = $request->get('catatan');
        $expense->save();

        return redirect()->route('expense.edit', $expense->id)->with('success', 'Transaksi pengeluaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
