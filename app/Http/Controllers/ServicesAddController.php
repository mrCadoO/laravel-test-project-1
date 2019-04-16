<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;

class ServicesAddController extends Controller
{
    public function execute(Request $request){


        if($request->isMethod('post')){
            $input = $request->except('_token');

            $message = [
                'required' => 'Поле :attribute обязательно к заполнению.'
            ];

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required',
            ], $message);

            if($validator->fails()){
                return redirect()->route('serviceAdd')->withErrors($validator)->withInput();
            }

            if($request->hasFile('icon')){
                $file = $request->file('icon');
                $input['icon'] = $file->getClientOriginalName();
                $file->move(public_path().'/assets/img', $input['icon']);
            }

            $service = new Service();
            $service->fill($input);
            if($service->save()){
                return redirect('admin')->with('status', 'Объект страницы Сервисы был успешно добавлен. ');
            }
        }


        //view
        if(view()->exists('admin.service_add')){
            $data = ['title' => 'Добавление объектов в раздел Серивисы'];
            return view('admin.service_add', $data);
        }
    }
}
