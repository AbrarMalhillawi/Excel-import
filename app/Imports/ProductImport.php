<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
    //   check if the productcd exist 
        $checkproducts = Product::where('name',$row['name'])->first();
        if($checkproducts)
        {
            // if true just update the price 
            $checkproducts->update([
                "price"=>$row['price']
            ]);
         
        }
        
        else{

            // if false create new product 

            return new Product([
                'name'     => $row['name'],
                'desc'    => $row['desc'], 
                'price' => $row['price'],
                'sale_price' => $row['sale_price'],
            ]);
    
    }
}
}