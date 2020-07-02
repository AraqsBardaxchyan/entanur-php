<?php
include_once "IDatabase.php";
class Database implements IDatabase
{
    private $conn = null;
    private $table = '';
    private $sql = '';

    /**
     * @param string $table
     */
    public function setTable($table)
    {
        $this->table = $table;
        return $this;
    }

    public function __construct($table)
    {
        $this->connect();
        $this->table = $table;
    }

    public function insert($data)
    {
        $fieldsArr = [];
        $valuesArr = [];
        foreach ($data as $field => $value){
            $fieldsArr[] = "`$field`";
            $valuesArr[] = "'$value'";
        }
        $fieldsStr = implode(',',$fieldsArr);
        $valuesStr = implode(',',$valuesArr);

        $this->sql = "INSERT INTO `$this->table` ($fieldsStr) VALUES ($valuesStr)";
        return $this;
    }

    public function select($what = "*")
    {
        $whatArr = [];
        if(is_array($what)){
            foreach ($what as $value){
                $whatArr[] = "`$value`";
            }
            $whatStr = implode(',',$whatArr);
        }else{
            if($what == "*"){
                $whatStr = "*";
            }else{
                $whatStr = "`$what`";
            }
        }

        $this->sql = "SELECT $whatStr FROM `$this->table`";
        return $this;
    }
    public function delete(){
        $this->sql = "DELETE FROM `$this->table`";
        return $this;
    }
    public function update($data)
    {
//        "UPDATE `users` SET `firstname` = 'petros', `lastname` = 'petrosyan"

        $dataArr = [];
        foreach ($data as $key => $value){
            $dataArr[] = "`$key` = '$value'";
        }

        $dataStr = implode(',',$dataArr);

        $this->sql = "UPDATE `$this->table` SET $dataStr";
        return $this;
    }

    public function where($condition = 1)
    {
        if(is_array($condition)){
            $condArr = [];
            foreach ($condition as $key => $value){
                $condArr[] = "`$key`='$value'";
            }
            $condStr = implode(" AND ",$condArr);
        }else{
            $condStr = 1;
        }

        $this->sql.= " WHERE $condStr";
        return $this;
    }

    public function one()
    {
        return $this->save()->fetch_assoc();
    }

    public function all()
    {
        return $this->save()->fetch_all(MYSQLI_ASSOC);
    }

    private function connect(){
        $configs = parse_ini_file("configs/db.ini");
        $this->conn = new Mysqli($configs['host'],$configs['username'],$configs['password'],$configs['db_name']);
    }

    public function save(){
        return $this->conn->query($this->sql);
    }





    //tany update delete
}