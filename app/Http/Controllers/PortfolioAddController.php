<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;
use Validator;

class PortfolioAddController extends Controller
{
    public function execute(Request $request){


        //validate to POST request
        if($request->isMethod('post')){
            $input = $request->except('_token');

            $message = [
                'required'  => 'Поле :attribute обязательно к заполнению. ',
                'required' => 'Поле :attribute должно быть уникальным. '
            ];

            $validator = Validator::make($input,
                [
                    'name'   => 'required|max:255',
                    'filter' => 'required'
                ], $message);

            if($validator->fails()){
                return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('images')){
                $file = $request->file('images');
                $input['images'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['images']);
            }

            $portfolio = new Portfolio();
            $portfolio->fill($input);
            if($portfolio->save()){
                return redirect('admin')->with('status', 'Объект в раздел Портфолио был успешно добавлена. ');
            }
        }




        //view
        if(view()->exists('admin.portfolio_add')){
            $data = ['title' => 'New Portfolio'];
            return view('admin.portfolio_add', $data);
        }

    }
}
