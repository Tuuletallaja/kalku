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

    public function delete_material() {

        global $app;
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        //die(print_r($id));
        $app['database'] -> delete('materials', $id);


        header('Location: /addmaterial?message=Rida kustutatud');
    }

}