<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = auth()->user()->categories;
        return view('categories.index', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        auth()->user()->categories()->create($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index');
    }
}

