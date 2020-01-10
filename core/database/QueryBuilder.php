<?php

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($table)
    {
        $statement = $this->pdo->prepare("select * from {$table}");
        
        $statement->execute();
        
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }
    
    public function getUserByUsername($table, $username)
    {
        $statement = $this->pdo->prepare("select * from {$table} where username = :username limit 1;");
        
        $statement->execute([':username' => $username]);
        
        //die(print_r($statement));
        

        $result = $statement->fetchAll(PDO::FETCH_CLASS);
        return empty($result) ? [] : reset($result);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s);',
            $table,
            implode(', ',array_keys($parameters)),
            ':' . implode(', :',array_keys($parameters))
            
        );
        try {
            $statement = $this->pdo->prepare($sql);
            //die(print_r($statement));
            $statement ->execute($parameters);
        } catch (Exception $e) {
            die('Oopse, midagi läks nihu!!!!11!!!1!!!1');
        }

        //die(var_dump($sql));
    }

    public function delete($table, $id) {

        $sql = "delete from {$table} where idmaterials=:id;";
        //die(print_r($sql));

        try {
            
            $statement = $this->pdo->prepare($sql);
            
            $statement ->execute([':id' => $id]);
            //die(print_r($statement));
        } catch (Exception $e) {
            die('Oopse, midagi läks nihu!!!!11!!!1!!!1');
        }

    }

    public function update($table, $material, $unit, $id) {
        $parameters2 = [];
        
        $sql = sprintf( 
            "update {$table} set name=:material, unit=:unit where idmaterials={$id};");

        try {
            $statement = $this->pdo->prepare($sql);
            $statement ->execute([':material' => $material, ':unit' => $unit]);
        } catch (Exception $e) {
            die('Oopse, midagi läks nihu!!!!11!!!1!!!1');
        }
    }
}