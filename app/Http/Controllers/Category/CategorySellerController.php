<?php

namespace App\Http\Controllers\Category;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class CategorySellerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        //iger loading
        $sellers = $category->products()
                    ->with('seller')
                    ->get()
                    ->pluck('seller')
                    ->unique('id')
                    ->values();
        

        return $this->showAll($sellers);
    }

   
}
