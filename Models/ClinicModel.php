<?php
Class ClinicModel extends BaseModel{
    const TABLE = "CLINIC";
    public function getAll($select = ['*'], $orderBy =[], $limit = 15){
        return $this->all(ClinicModel::TABLE, $select, $orderBy, $limit);
    }
}
?>