<?php 

class LoginUser{

    private $username;

    private $password;

    public $error;

    public $success;

    private $storage = "data.json";

    private $storeData; //An array


    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->storeUser = json_decode(file_get_contents($this->storage),true);
        $this->login();
    }


    private function login(){
        foreach ($this->storeUser as $user) {
            if ($user['username'] == $this->username) {
                if (password_verify($this->password, $user['password'])) {
                    session_start();
                    $_SESSION['user'] = $this->username;
                    header("location: account.php"); exit();
                }
            }
        }
        return $this->error = "Wrong username or password";
    }


}


?>
