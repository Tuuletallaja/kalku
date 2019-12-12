<?php

class PagesController {
    
    public function home() {
        return view('index');
    }

    public function add_material() {
        

        return view('add-material');
    }

    public function feedback() {
        
        $feedback = $app::get['database']->selectAll('feedback');

        return view('feedback');
    }

    public function contact() {

        return view('contact');
    }

    public function about() {
        
        $company = 'Ametikool';

        return view('about', ['company' => $company]);
    }
}