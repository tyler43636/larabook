<?php namespace Larabook\Registration;

class RegisterUserCommand {

    public $email;

    public $password;

    public $username;

    function __construct($email, $password, $username)
    {
        $this->email = $email;
        $this->password = $password;
        $this->username = $username;
    }
}