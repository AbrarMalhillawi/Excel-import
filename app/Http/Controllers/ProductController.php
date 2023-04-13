<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;

class ProductController extends Controller
{


    /**
    * @return \Illuminate\Support\Collection
    */

    public function index()
    {
        $products = Product::get();
        return view('products', compact('products'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */


    


    public function export() 
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }


    /**
    * @return \Illuminate\Support\Collection
    */

    public function import() 
    {
        $import=new ProductImport;
        Excel::import($import,request()->file('file'));
        return back()->with('success','file imported successfully !');
    }

}





