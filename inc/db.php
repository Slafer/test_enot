<?php
class db{
    private $host = 'localhost';
    private $db_name = 'test_enot';
    private $username = 'root';
    private $password = '';

    public $conn;

    public function __construct(){
        $this->conn = null;

        try{
            $this->conn = new mysqli($this->host, $this->username,$this->password,$this->db_name);

        }catch(mysqli_sql_exception $ex){
            echo "Connection error: " . $ex->getMessage();
        }

        return $this->conn;
    }
    public function addCurrency(string $abbr, string $name, string $rate)
    {
        $query = "INSERT INTO currencies (abbr,name,rate) VALUES ('$abbr','$name',$rate)";
        $this->conn->query($query);
    }
    public function updateCurrency(string $abbr, string $rate)
    {
        $query = "UPDATE currencies SET rate=$rate WHERE abbr='$abbr';";
        $this->conn->query($query);
    }
    public function get_currencies()
    {
        $query = "SELECT * FROM currencies";
        $result = $this->conn->query($query);
        return $result->fetch_all();
    }
    public function __destruct()
    {
        $this->conn->close();
    }
    public function AddUser(string $login, string $pass, string $name)
    {
        $this->conn->query("INSERT INTO users (login, pass, name) VALUES('$login','$pass','$name');");
    }
    public function CheckUser($login, $pass)
    {
        $pass = md5($pass."salt121");
        $result = $this->conn->query("SELECT * FROM users WHERE login ='$login' AND pass = '$pass' ");
        $user = $result->fetch_assoc();
        if (!count($user))
        {
        return false;
        } else 
        {
            return true;
        }
    }
    public function CheckDb() {
        $result = $this->conn->query("SELECT * FROM currencies");
        $currencies = $result->fetch_all();
        if (!count($currencies))
        {
            return false;
        } else
        {
            return true;
        }
    }
}
?>