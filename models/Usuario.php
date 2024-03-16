<?php
class Categoria {
    private $login;
    private $senha;

    function __construct(
        $login,
        $senha,
    ){
        $this->login
        $this->senha;
    }

    function getLogin(){
        return $this->login;
    }
    function setLogin($login){
        $this->login = $login;
    }

    function getSenha(){
        return $this->senha;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }
}