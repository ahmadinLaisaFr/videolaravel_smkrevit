<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    protected $mydata = [];

    public function index()
    {
        $this->mydata['title'] = 'homepage';
        $this->mydata['categories'] = category::all();
        return view('home', $this->mydata);
    }

    public function insert(Request $request)
    {
        $name = $request->input('name');
        $slug = $request->input('slug');
        // var_dump($result);die;

        DB::table('categories')
        ->updateOrInsert(
            [
                'name' => $name,
                'slug' => $slug
            ],
            [
                'name' => $name,
                'slug' => $slug,
            ]
        );

        return redirect()->back();
    }

    public function populate(category $category)
    {
        // var_dump($category->slug);
        // var_dump($category->name);
        return redirect()->back()->with('populate', $category);
    }

    public function delete(Request $request)
    {
        // var_dump($category->slug);
        // var_dump($category->name);
        DB::table('categories')->where('slug', $request->slug)->delete();
        return redirect()->back();
    }
}
