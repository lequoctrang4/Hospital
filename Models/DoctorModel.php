<?php
class DoctorModel extends BaseModel{
    
    const TABLE = "Doctor";

    public function getAll($select = ['*'], $orderBy =[], $limit = 15){
        return $this->all(DoctorModel::TABLE, $select, $orderBy, $limit);
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
        $query = "SELECT ${column} FROM ".self::TABLE." INNER JOIN FACULTY ON DOCTOR.FACULTY = F_ID${orderby} FETCH FIRST ${limit} ROWS ONLY";
        return $this->getBySQL($query);
    }
    public function findById($S_ID)
    {
        $sql = "SELECT *FROM ".self::TABLE." WHERE S_ID = ${S_ID}";
        return $this->getBySQL($sql);
    }
    public function findByName($S_Name)
    {
        $sql = "SELECT *FROM ".self::TABLE." WHERE FNAME || ' ' || LNAME = '${S_Name}'";
        return $this->getBySQL($sql);
    }
    public function getNameNotInDean()
    {
        $sql = "SELECT fname || ' ' || lname FROM " . self::TABLE . " WHERE S_ID NOT IN (SELECT DEAN FROM FACULTY)";
        return $this->getBySQL($sql);
    }
    public function delete($S_ID)
    {
        $sql = "DELETE FROM ".self::TABLE." WHERE S_ID = '$S_ID'";
        return $this->runBySQL($sql);
    }
    public function insert($Fname, $Lname, $S_ID, $Bdate, $Address, $Sex, $Email, $Phone_number, $Salary, $Start_date, $Experience_job, $Faculty, $Buil_id, $Room_id)
    {
        $sql = "INSERT INTO " . self::TABLE . " VALUES('$Fname', '$Lname', '$S_ID', to_date('$Bdate', 'yyyy-mm-dd'), '$Address', '$Sex', '$Email',
                '$Phone_number', $Salary,  to_date('$Start_date', 'yyyy-mm-dd'), $Experience_job,  $Faculty, '$Buil_id', '$Room_id')";
        return $this->runBySQL($sql);
    }
    public function update($Fname, $Lname, $S_ID, $Bdate, $Address, $Sex, $Email, $Phone_number, $Salary, $Start_date, $Experience_job, $Faculty, $Buil_id, $Room_id, $OldS_ID){
        $sql = "UPDATE " . self::TABLE . " SET fname = '$Fname', Lname = '$Lname', S_ID = '$S_ID', Bdate =  to_date('$Bdate', 'yyyy-mm-dd'), 
                Address = '$Address', Sex = '$Sex', Email = '$Email', Phone_number = '$Phone_number', salary = $Salary, Start_date = to_date('$Start_date', 'yyyy-mm-dd'), 
                Experience_job = $Experience_job, Faculty = $Faculty, Buil_ID = '$Buil_id', Room_id = '$Room_id' WHERE S_ID = '$OldS_ID'";
        return $this->runBySQL($sql);
    }
}
?>