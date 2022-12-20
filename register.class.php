<?php 
class RegisterUser{
    

    private $username;
    
    private $rawPassword;

    private $encryptedPassword;

    public $error;

    public $success;

    private $storage = "data.json";

    private $storeUser;

    private $newUser; // An array



    public function __construct($username, $password){

        $this->username = trim($this->username);
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);

        $this->rawPassword = filter_var(trim($password),FILTER_SANITIZE_STRING);
        $this->encryptedPassword = password_hash($this->rawPassword, PASSWORD_DEFAULT);

        $this->storeUser = json_decode(file_get_contents($this->storage),true);

        $this->newUser =[
            "username" => $this->username,
            "password" => $this->encryptedPassword
        ];

        if ($this->checkValue()) {
            $this->insertUser();
        }
        
    }

    private function checkValue(){
        if (empty($this->username) || empty($this->rawPassword)) {
            $this->error = "Both fields are required";
            return false;
        } else{
            return true;
        }
    }

    private function validUser(){
        foreach ($this->storeUser as $user) {
            if ($this->username == $user['username']) {
                $this->error = "Username already taken, please use a different one.";
                return true;
            } else {
                return false;
            }
        }
    }

    private function insertUser(){
        if ($this->validUser() == FALSE) {
            array_push($this->storeUser, $this->newUser);
            if (file_put_contents($this->storage, json_encode($this->storeUser, JSON_PRETTY_PRINT))) {
                return $this->success = "You registered successfully";
            } else{
                return $this->error = "Something went wrong, please try again";
            }
        }
    }

}


?>