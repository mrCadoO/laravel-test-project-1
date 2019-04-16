<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Service;

class ServicesEditController extends Controller
{
    public function execute(Request $request, Service $services){

        if($request->isMethod('delete')){
            $services->delete();
            return redirect('admin')->with('status', 'Сервис удален. ');
        }

        //update
        if($request->isMethod('post')){
            $input = $request->except('_token');

            $message = ['required' => 'Поле :attribute обязательно к заполнению. '];

            $validator = Validator::make($input, [
                'name' => 'required|max:255',
                'text' => 'required'
            ], $message);


        if($validator->fails()){
            return redirect()->route('serviceEdit', ['services'=> $input['id']])->withErrors($validator);
        }


        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $file->move(public_path().'/assets/img', $file->getClientOriginalName());
            $input['icon'] = $file->getClientOriginalName();
        } else {
            $input['icon'] = $input['old_icon'];
        }
        unset($input['old_icon']);

        $services->fill($input);
        if($services->update()){
            return redirect('admin')->with('status', 'Обновление прошло успешно. ');
        }
        }

        $old_data = $services->toArray();

        if(view()->exists('admin.service_edit')){
            $data = [
                'title' => 'Сервис' .$old_data['name'],
                'data' => $old_data
                ];
            return view('admin.service_edit', $data);
        }
    }
}
