<?php

require_once('./config_db.php');
/*
* DB情報
*/
class model_stack_data
{
    /*
    * DB情報
    */
    public $db;
    public $pdo;
    public $stmt_obj;


    /*
    * DB情報
    */
    public function __construct() {
        $this->db = new config_db();
        $this->pdo = $this->db->connect_db();
    }

    /*
    * SELECT
    */
    public function select_stack_data() {
        $stmt = $this->pdo->prepare("SELECT * FROM " . $this->db->table_name);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /*
    * INSERT(クエリ文作成)
    */
    public function insert_query_create() {
        $query_str  = 'INSERT INTO ' . $this->db->table_name;
        $query_str .= '    ( ';
        $query_str .= '    title, ';
        $query_str .= '    category, ';
        $query_str .= '    link_image, ';
        $query_str .= '    link_page, ';
        $query_str .= '    evaluation, ';
        $query_str .= '    price, ';
        $query_str .= '    created_by, ';
        $query_str .= '    created_at ';
        $query_str .= '    ) ';
        $query_str .= 'VALUES ';
        $query_str .= '    ( ';
        $query_str .= '    :title, ';
        $query_str .= '    :category, ';
        $query_str .= '    :link_image, ';
        $query_str .= '    :link_page, ';
        $query_str .= '    :evaluation, ';
        $query_str .= '    :price, ';
        $query_str .= '    :created_by, ';
        $query_str .= '    :created_at ';
        $query_str .= '    ) ';
        return $query_str;
    }

    /*
    * INSERT(セットする値を準備)
    */
    public function insert_query_set() {
        $value = [];
        $value['title'] = 'タイトル' . rand(50, 1500);
        $value['category'] = 'カテゴリ' . rand(50, 1500);
        $value['link_image'] = 'https://amazon.co.jp/' . rand(50, 1500);
        $value['link_page'] = 'https://amazon.co.jp/' . rand(50, 1500);
        $value['evaluation'] = rand(1, 10)/2;
        $value['price'] = rand(50, 1500);
        $value['created_by'] = 1;
        date_default_timezone_set('Asia/Tokyo');
        $value['created_at'] = date("Y-m-d H:i:s");
        return $value;
    }

    /*
    * INSERT(セットする値をバインド)
    */
    public function insert_query_bind($value) {
        $this->stmt_obj->bindParam(':title' , $value['title']);
        $this->stmt_obj->bindParam(':category' , $value['category']);
        $this->stmt_obj->bindParam(':link_image' , $value['link_image']);
        $this->stmt_obj->bindParam(':link_page' , $value['link_page']);
        $this->stmt_obj->bindParam(':evaluation' , $value['evaluation']);
        $this->stmt_obj->bindParam(':price' , $value['rice']);
        $this->stmt_obj->bindParam(':created_by' , $value['created_by']);
        $this->stmt_obj->bindParam(':created_at' , $value['created_at']);
        return;
    }

    public function insert_query_run() {
        /*
        * クエリ文作成
        */
        $query_str = $this->insert_query_create();

        /*
        * クエリオブジェクト作成
        */
        $this->stmt_obj = $this->pdo->prepare($query_str);

        /*
        * INSERTするvalueの作成
        */
        $value = $this->insert_query_set();

        /*
        * クエリ文に値をバインド
        */
        $this->insert_query_bind($value);

        /*
        * 実行
        */
        return $this->stmt_obj->execute();
    }

}