<?php  
namespace database; // database namespace

use database\engine\DriverI;
use database\engine\mysql;

class Database implements DriverI
{
    public $config;
    public $db;
    public $engine;
	
    public function __construct(
    ){
		$configdir = (__DIR__)."/../../config.php"; // Config file
		
		if (file_exists($configdir)) // Check if file exist in $configdir
		{
		    $this->config = require $configdir;
		    $this->engine= $this->config["engine"];
		} 

        if ($this->engine == "mysql" ) // Check if DB engine is mysql
        {
	     
			$db =new engine\mysql(
			$this->config["host"],
			$this->config["user"],
			$this->config["password"]
			);
        }
        elseif ($this->engine == "mongodb") // Check if DB engine is mongodb
        {
			$db = new engine\mongodb(
			$this->config["host"],
			$this->config["user"],
			$this->config["password"] 
			);
			}

		$this->setDriver($db);

	}
	public function setDriver(DriverI $db): void // Set driver
	 { 
           $this->db= $db; // db property'sine alınan db değerini ata
	}

	public function all(String $table): array // Get all data from given table
	{
		return $this->db->all($table); 
	}
	
    public function find(String $table, mixed $id): mixed // Get data with given id from given table
	{
		return $this->db->find($table, $id); 
	}

	public function findAll(string $table, array $values): mixed // Get all data from given table and values as an array
    {
        return $this->db->findAll($table, $values); 
    }

    public function create(String $table, array $values): bool // Create new data with given values as an array in given table
	{
		return $this->db->create($table, $values);
	}

    public function update(String $table, mixed $id, array $values): bool // Update data with given id and values as an array in given table
    {
		return $this->db->update($table, $id, $values);
	}

    public function delete(String $table, mixed $id): bool// Delete data with given id from given table
    {
		return $this->db->delete($table, $id);
	}
}