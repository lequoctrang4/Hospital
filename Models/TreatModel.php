<?php
class TreatModel extends BaseModel {
    const TABLE = "TREAT";
    public function getAll($select = ['*'], $orderBy =[], $limit = 15){
        return $this->all(TreatModel::TABLE, $select, $orderBy, $limit);
    }
}
?>