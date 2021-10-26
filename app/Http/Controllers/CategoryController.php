<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MoneyManagement\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 20;
        $categories = Category::orderBy('updated_at', 'DESC')->paginate($pagination);
        return view('categories.index', compact('categories'))->with('item', ($request->input('page', 1) -1) * $pagination);
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
            'nama_kategori' => ['required', 'unique:categories,name'],
            'tipe' => ['required']
        ]);

        $category = new Category();
        $category->name = $request->get('nama_kategori');
        $category->slug = Str::slug($request->get('nama_kategori'));
        $category->type = $request->get('tipe');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Kategori baru berhasil ditambahkan');
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
            'nama_kategori' => 'required|unique:categories,name,'.$id.',id',
            'tipe' => 'required'
        ]);

        $category = Category::find($id);
        $category->name = $request->get('nama_kategori');
        $category->slug = Str::slug($request->get('nama_kategori'));
        $category->type = $request->get('tipe');
        $category->save();

        return redirect()->route('category.index')->with('success', 'Perubahan data berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::whereId($id)->delete();
        return redirect()->back()->with('success', 'Data kategori berhasil dihapus');
    }
}
