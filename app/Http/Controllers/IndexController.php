<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use DB;
use Auth;
use Mail;



class IndexController extends Controller
{
    public function execute(Request $request){

            if ($request->isMethod('post')) {

                $messages = [
                    'required' => "Поле :attribute обязательно должно быть заполнено!",
                    'email' => "Поле :attribute должно соответствовать email адресу!",
                ];

                $this->validate($request, [
                    'name' => 'required|max:255',
                    'email' => 'required|email',
                    'text' => 'required'
                ], $messages);


              /*  $data = $request->all();
                $result = Mail::send(['text'=>'sait.email'], ['name'=>'bla  bla bla'], function($message) use ($data) {
                    $message->to('petrovichd.8080@gmail.com', 'To bla bla bla')->subject('Test email');
                    $message->from('petrovichd.8080@gmail.com','bla bla bla');
                    //$mail_admin = env('MAIL_ADMIN');

                });

                if($result){
                    return redirect()->route('home')->with('status', 'Email is send');
                } */

            }


        $pages = Page::all();
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));
        $services = Service::where('id','<',20)->get();
        $peoples = People::take(3)->get();
        $tags = DB::table('portfolios')->distinct()->pluck('filter');




        $menu = array();
        foreach ($pages as $page){
            $item = array('title'=>$page->name,'alias'=>$page->alias);
            array_push($menu,$item);
        }

        $item = array('title'=>'Services', 'alias'=>'service');
        array_push($menu,$item);

        $item = array('title'=>'Portfolio', 'alias'=>'Portfolio');
        array_push($menu,$item);

        $item = array('title'=>'Team', 'alias'=>'team');
        array_push($menu,$item);

        $item = array('title'=>'Contact', 'alias'=>'contact');
        array_push($menu,$item);


        return view('sait.index', array(
                                        'menu'=>$menu,
                                        'pages'=>$pages,
                                        'services'=>$services,
                                        'peoples'=>$peoples,
                                        'portfolios'=>$portfolios,
                                        'tags'=>$tags
                                        ));
    }
}
