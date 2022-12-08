<?php
class PatientModel extends BaseModel
{
    const TABLE = "PATIENT";

    public function getAll($select = ['*'], $orderBy =[], $limit = 15){
        return $this->all(PatientModel::TABLE, $select, $orderBy, $limit);
    }

    public function findById($id)
    {
        $sql = "SELECT *FROM ".self::TABLE." WHERE PATIENT_ID = ${id}";
        return $this->getOneSQL($sql);
    }
    public function insert($fname, $lname, $bdate, $address, $sex, $PHONE_NUMBER, $H_I_N)
    {
        $sql = "INSERT INTO ".self::TABLE." (fname, lname, bdate, address, sex, phone_number, H_I_N) VALUES ('${fname}', '${lname}', to_date('${bdate}', 'yyyy-mm-dd'), '${address}', '${sex}', '${PHONE_NUMBER}', '${H_I_N}')";
        return $this->runBySQL($sql);
    }
    public function delete($id)
    {
        $sql = "DELETE FROM ".self::TABLE." WHERE patient_id = $id";
        return $this->runBySQL($sql);
    }
    public function update($id, $fname, $lname, $bdate, $address, $sex, $phone_number, $H_I_N){
        $sql = "UPDATE ".self::TABLE." SET fname = '$fname', lname = '$lname', bdate = to_date('$bdate', 'YYYY-MM-DD'), address = '$address',
                sex = '$sex', phone_number = '$phone_number', H_I_N = '$H_I_N' WHERE patient_id = $id";
        return $this->runBySQL($sql);
    }
}
?>