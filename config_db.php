<?php

/*
* DB情報
*/
class config_db
{
    /*
    * DB情報
    */
    public $host = "localhost";
    public $dbname = "demo_scraping";
    public $table_name = "stack_data";
    public $user = "root";
    public $pass = "";

    /*
    * DB接続
    */
    public function connect_db() {
        try {

            $pdo = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8',
                $this->user,
                $this->pass,
                array(
                    PDO::ATTR_EMULATE_PREPARES => false
                )
            );
            return $pdo;
    
        } catch (PDOException $e) {
    
            exit('データベース接続エラー。'.$e->getMessage());
    
        }
    }

}




