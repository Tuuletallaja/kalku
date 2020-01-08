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
}