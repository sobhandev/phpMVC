<?php

class indexModel extends database
{
    public function getAll(string $table, bool $objective = false)
    {
        $statement = $this->doQuery(query: "SELECT * FROM $table");
        return $this->parseQuery(statement: $statement);
    }
}