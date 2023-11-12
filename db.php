<?php
require "dbconf.php";

class Db
{
    private $connect;
    private $data;
    private $sql;
    protected $servername;
    protected $username;
    protected $password;
    protected $databasename;

    public function __construct()
    {
        $this->connect = null;
        $this->data = null;
        $this->sql = null;
        $Dbc = new Dbconf();
        $this->servername = $Dbc->servername;
        $this->username = $Dbc->username;
        $this->password = $Dbc->password;
        $this->databasename = $Dbc->databasename;
    }

    public function dbConnect()
    {
        $this->connect = mysqli_connect($this->servername, $this->username, $this->password, $this->databasename);
        if (!$this->connect) {
            die("Database connection failed: " . mysqli_connect_error());
        return $this->connect;
    }
}
    public function closeConnection()
    {
        if ($this->connect) {
            mysqli_close($this->connect);
        }
    }

    function prepareData($data)
    {
        return mysqli_real_escape_string($this->connect, stripslashes(htmlspecialchars($data)));
    }

    function logIn($table, $username, $password)
    {
        $username = $this->prepareData($username);
        $password = $this->prepareData($password);
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Check if the username and hashed password match the CSV file
        $csvData = $this->readCsvData('userdata.csv');
        foreach ($csvData as $row) {
            if ($row[1] === $username && password_verify($password, $row[2])) {
                return true; // Login success
            }
        }
        $this->sql = "select * from " . $table . " where username = '" . $username . "'";
        $result = mysqli_query($this->connect, $this->sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) != 0) {
            $Dbusername = $row['username'];
            $Dbpassword = $row['password'];
            if ($Dbusername == $username && password_verify($password, $Dbpassword)) {
                $login = true;  //Login Success
            } else $login = false;  //Invalid Password
        } else $login = false;  //Username not found

        return $login;
    }

    function signUp($table, $username, $fullname, $password, $dob, $sex)
    {
        $username = $this->prepareData($username);
        $fullname = $this->prepareData($fullname);
        $password = $this->prepareData($password);
        $dob = $this->prepareData($sex);
        $sex = $this->prepareData($dob);
        $password = password_hash($password, PASSWORD_DEFAULT);
        // Check if the username already exists in the CSV file
        $csvData = $this->readCsvData('userdata.csv');
        foreach ($csvData as $row) {
            if ($row[1] === $username) {
                return false; // Username already exists
            }
        }
        $this->sql =
            "INSERT INTO " . $table . " (username, fullname, password, sex, dob) VALUES ('" . $username . "','" . $fullname . "','" . $password . "','" . $sex . "','" . $dob . "')";
        if (mysqli_query($this->connect, $this->sql)) {
            $csvData = array($username, $fullname, $password, $sex, $dob);
            $csvFile = fopen('userdata.csv', 'a'); // 'a' is used to append to the file
            fputcsv($csvFile, $csvData);
            fclose($csvFile);
            return true;
        } else return false;
    }

}
?>