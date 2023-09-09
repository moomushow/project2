<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $data = [
            'categories' => $categories
        ];
        return view('admin.category.index', $data);
    }

    public function show()
    {
        //
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function edit($id)
    {
        return view('admin.category.edit');
    }

    public function store(Request $request)
    {
        $message = ['name.requied' => 'โปรดกรอกชื่อหมวดหมู่'];

        $request->validate(
            [
                'name' => 'required'
            ],
            $message
        );

        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.category.index')->with('success', 'เพิ่มข้อมูลสำเร็จ');
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
