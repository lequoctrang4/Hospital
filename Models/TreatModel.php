<?php
class TreatModel extends BaseModel {
    const TABLE = "TREAT";
    public function getAll($select = ['*'], $orderBy =[], $limit = 15){
        return $this->all(TreatModel::TABLE, $select, $orderBy, $limit);
    }
    public function insert($patien_id, $s_id, $disease, $date_treat, $price, $diagnostic)
    {
        $sql = "INSERT INTO ". self::TABLE . " (patien_id, s_id, disease, date_treat, price, diagnostic) 
        VALUES ($patien_id, $s_id, $disease, to_date('${date_treat}', 'yyyy-mm-dd'), $price, $diagnostic)";
        return $this->runBySQL($sql);
    }
}
?>