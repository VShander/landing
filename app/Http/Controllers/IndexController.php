<?php

namespace App\Http\Controllers;

use App\People;
use App\Portfolio;
use App\Service;
use Illuminate\Http\Request;
use App\Page;

class IndexController extends Controller {

    public function execute(Request $request) {

        $pages = Page::all();
        $portfolios = Portfolio::get(array('name', 'filter', 'images'));
        $services = Service::where('id', '<', 20)->get();
        $peoples = People::take(3)->get();


        return view('site.index');
    }
}
