<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServicesController extends Controller
{
    public function execute(){

        if(view()->exists('admin.service')){
            $service = Service::all();
            $data = [
                'title' => 'Сервисы',
                'services' => $service
            ];
            return view('admin.service', $data);
        }

    }
}
