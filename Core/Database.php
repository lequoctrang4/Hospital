<?php
class Database{
    private $connection;
    public function Connect()
    {
        $this->connection = oci_connect('Trang', 'Lequoctrang512', 'localhost/ORCL', 'UTF8') or die(oci_error());
        // $this->connection = oci_connect('BTL', 'Duy06051998', 'localhost/orclpdb', 'UTF8') or die(oci_error());
        if(!$this->connection){
            echo "Sorry, there is some issue";
        }
        else{
            return $this->connection;
        }
    }
    public function DisConnect(){
        oci_close($this->connection);
    }
}
?>