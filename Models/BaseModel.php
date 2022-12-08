<?php

class BaseModel extends Database{
    protected $connect;
    public function __construct(){
        $this->connect = $this->connect();
    }
    public function all($table, $select = ['*'], $orderBys = ['namecolumn' => 'asc/desc'], $limit = 15){
        $column = implode(', ', $select);
        $orderby = "";
        if(count($orderBys) != 0){
            foreach($orderBys as $key => $value){
                $orderby .= $key . " " . $value . ", ";
            }
            $orderby = " ORDER BY " . rtrim($orderby, ", ");
        }
        $query = "SELECT ${column} FROM ${table}${orderby} FETCH FIRST ${limit} ROWS ONLY";
        $stid = oci_parse($this->connect, $query);
        oci_execute($stid);
        $rs = [];
        while ($nrows = oci_fetch_assoc($stid)) {
            array_push($rs, $nrows);
        }
        return $rs;
    }
    public function getBySQL($sql){
        $stid = oci_parse($this->connect, $sql);
        oci_execute($stid);
        $data =[];
        while($row = oci_fetch_assoc($stid)){
            array_push($data, $row);
        }
        return $data;
    }
    public function getOneSQL($sql){
        $stid = oci_parse($this->connect, $sql);
        oci_execute($stid);
        $data =[];
        return oci_fetch_assoc($stid);
    }
    public function runBySQL($sql){
        $stid = oci_parse($this->connect, $sql);
        return oci_execute($stid);
    }
    public function __destruct()
    {
        $this->DisConnect();
    } 
}
?>