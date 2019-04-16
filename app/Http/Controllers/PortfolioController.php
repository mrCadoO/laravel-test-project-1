<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;

class PortfolioController extends Controller
{
    public function execute(){

        if(view()->exists('admin.portfolio')){
            $portfolio = Portfolio::all();

            $data = [
                    'title' => 'Портфолио',
                    'portfolio' => $portfolio
                    ];
        }
        return view('admin.portfolio', $data);
    }
}
