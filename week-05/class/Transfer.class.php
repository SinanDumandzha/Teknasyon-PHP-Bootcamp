<?php
use database\Database;
use logger\logger;

class Transfer
{
    public $db;
    public $tables = array(
        'book',
        'section',
        'post'
    );

    public function __construct()
    {
        $this->db = new Database();
    }

    public function export() // Export data
    {
        $file = "export.json";
        $data = array();

        foreach ($this->tables as $table_name)
        {
            $tableAllData = $this->db->all($table_name);
            $data[$table_name] = $tableAllData;
        }

        file_put_contents("export.json",  json_encode($data));
        header('Content-type: application/json');
        header('Content-Disposition: attachment; filename="'. $file .'"');
        echo implode(file($file));

        exit();
    }

    public function import($file) // Import data
    {
        if (empty($file)) // Check if file is empty
        {
            $result = "Dosya seçilmedi!";
            echo $result;
            logger::log("Import sırasında : $result",0); // Log the error
        }
        else 
        {
            $target = "../transfer/".date('d_m_Y_H.i.s')."_".$file["name"];

            if (move_uploaded_file($file["tmp_name"], $target))
            {
                $json_file  = file_get_contents($target);
                $data = json_decode($json_file,true,flags: JSON_BIGINT_AS_STRING);

                foreach ($this->tables as $table_name)
                {
                    foreach ($data[$table_name] as $key => $value)
                    {
                        if (!$this->db->find($table_name, $value['id']))
                        {
                            $result = $this->db->create($table_name, $value);
                            echo $table_name." : Verileri aktarıldı.<br>"; 
                        }
                        else
                        {
                            $result = $table_name." : Veriler aktarılmadı<br>";
                            echo $result; // result değerini ekrana yazdır
                            logger::log("Import sırasında : $result",0); // hatayı logla
                        }
                    }
                }
            }
        }
    }
}
