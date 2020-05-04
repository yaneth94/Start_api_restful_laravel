<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SellerBuyerController extends ApiController
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
    public function index(Seller $seller)
    {
        $buyers = $seller->products()
                        ->whereHas('transactions')
                        ->with('transactions.buyer')
                        ->get()
                        ->pluck('transactions')
                        ->collapse()
                        ->pluck('buyer') // esto es para juntar todas las listas en una sola
                        ->unique('id') // para eliminar repetidos
                        ->values(); // esto es para eliminar vacios

        return $this->showAll($buyers);
    }

   
}
