<?php
class FacultyModel extends BaseModel{
    const TABLE = "FACULTY";
    public function getAll($select = ['*'], $orderBy =[], $limit = 15){
        return $this->all(FacultyModel::TABLE, $select, $orderBy, $limit);
    }
    public function getList($select = ['*'], $orderBys =[], $limit = 15){
        $column = implode(', ', $select);
        $orderby = "";
        if(count($orderBys) != 0){
            foreach($orderBys as $key => $value){
                $orderby .= $key . " " . $value . ", ";
            }
            $orderby = " ORDER BY " . rtrim($orderby, ", ");
        }
        $query = "SELECT ${column} FROM ".self::TABLE." INNER JOIN DOCTOR ON DOCTOR.S_ID = DEAN${orderby} FETCH FIRST ${limit} ROWS ONLY";
        return $this->getBySQL($query);
    }
}
?>