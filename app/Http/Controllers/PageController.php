<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class PageController extends Controller
{


    public function execute($alias){
        if(!$alias){
            abort(404);
        }

        if(view()->exists('sait.page')){
            $page = Page::where('alias', $alias)->first();

            $data = [
                    'title'=>$page->name,
                    'page'=>$page
                    ];

            return view('sait.page', $data);
        }
    }




}
