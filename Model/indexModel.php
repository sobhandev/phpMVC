<?php 

class indexModel extends database{
    public function getAll(string $table , bool $objective = false)
    {
        $statement = $this->db->prepare("SELECT * FROM $table");
        $statement->execute();
        return $objective ? $statement->fetchAll(PDO::FETCH_OBJ) : $statement->fetchAll(PDO::FETCH_ASSOC);
        }
}