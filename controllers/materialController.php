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

    public function update() {
        global $app;
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        $material = filter_input(INPUT_POST, 'material_name', FILTER_SANITIZE_STRING);
        $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
        $app['database']->update('materials', $material, $unit, $id);
        
        return redirect('addmaterial');
    }

}