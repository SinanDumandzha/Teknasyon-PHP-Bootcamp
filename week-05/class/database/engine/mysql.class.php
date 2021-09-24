<?php
namespace database\engine; // database\engine namespace tanımlaması

class mysql extends \PDO implements DriverI
{
    private \PDO $PDO;

    public function __construct(
        private string  $host ="mariadb",
        private string  $user="root",
        private string  $pass="root",
        private string  $dbname="test"
    ){

        $this->PDO = new \PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);

    }

    public function all(string $table): array // Get all data from given table
    {
        $query = "SELECT * FROM $table";
        $statement = $this->PDO->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(self::FETCH_ASSOC);

        return $result;
    }

    public function find(string $table, mixed $id): mixed // Get data with given id from given table
    {
        $idValue = (is_numeric($id) || is_string($id)) ? $id : $id['id'];
        $query = "SELECT * FROM $table WHERE id=:id";
        $statement = $this->PDO->prepare($query);
        $statement->execute(['id' => $idValue]);
        $result = $statement->fetch(); 

        return $result;
    }

    public function findAll(string $table, array $values): mixed // Get all data with given id from given table
    {
        $whereSerialize = $this->serialize($values,'where');
        $query = "SELECT * FROM $table WHERE $whereSerialize";
        $statement = $this->PDO->prepare($query);

        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }

        $statement->execute();
        $result = $statement->fetchAll(self::FETCH_ASSOC);

        return $result;
    }

    public function create(string $table, array $values): bool // Create new data with given values as an array in given table
    {
        $columnSerialize = $this->serialize($values,'column');
        $valuesSerialize = $this->serialize($values,'value');
        $query = "INSERT INTO $table($columnSerialize) values($valuesSerialize)";
        $statement = $this->PDO->prepare($query);

        foreach ($values as $param => $value) { 
            $statement->bindValue(":$param", $value); 
        }

        $result = $statement->execute();

        return $result;
    }

    public function update(string $table, mixed $id, array $values): bool // Update data with given id and values as an array in given table
    {
        $setSerialize = $this->serialize($values,'set');
        $query = "UPDATE $table SET $setSerialize WHERE id=:id";
        $statement = $this->PDO->prepare($query);

        foreach ($values as $param => $value) {
            $statement->bindValue(":$param", $value);
        }

        $statement->bindValue(":id", $id);
        $result = $statement->execute(); 

        return $result;
    }

    public function delete(string $table, mixed $id): bool // Delete data with given id from given table
    {
        $query = "DELETE FROM $table WHERE id=:id";
        $statement = $this->PDO->prepare($query);
        $result = $statement->execute(['id' => $id]); 

        return $result;
    }

    public function serialize(array $values, string $type): mixed // Serialize 
    {
        $propertiesCounter = 1;
        $result = '';

        foreach ($values as $column => $value )
        {
            if ($propertiesCounter > 1)
            {
                if ($type == 'where')
                {
                    $result .= " and ";
                }
                else
                {
                    $result .= ",";
                }
            }

            if ($type == 'value')
            {
                $result .= ":$column";
            }
            elseif ($type == 'column')
            {
                $result .= $column;
            }
            elseif ($type == 'set' || $type == 'where')
            {
                $result .= "$column=:$column";
            }

            $propertiesCounter++;
        }

        return $result;
    }
}
