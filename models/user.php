<?php
//categorie hérite de la classe model
    class user extends Model {
        var $table = "users";
        public $tableJoin = [];

        //recherche des 10 derniers films
        //10 : paramètre facultatif qui est à 10 par default
        function getLast($num=10) {
            return $this->find(array(
                "order" => "ordre ASC",
                "limit" => 'LIMIT '.$num
            ));
        }

        //recherche des 10 derniers films par id
        //$id : paramètre obligatoire concernant la clées primaire
        function getDetail($id) {
            return $this->findFirst(array(
                "condition" => "id = ".$id
            ));
        }

        function getUser($login, $password) {
            return $this->findfirst(array(
                "condition" => 'login="'.$login.'" and password = "'.md5($password).'"'
            ));
            unset($_POST["password"]);
            unset($_POST["login"]);
        }
    }
?>