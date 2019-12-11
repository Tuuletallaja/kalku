<?php

class MaterialController {

    
    public function index() {
        global $app;
        $materials = $app['database']->selectAll('materials');
        
        return view('add-material', compact('materials'));
    }

    public function store() {
        global $app;
        $app['database']->insert('materials', [
            'name' => $_POST['material_name'],
            'unit' => $_POST['unit']
        ]);
        
        return redirect('addmaterial');
    }

}