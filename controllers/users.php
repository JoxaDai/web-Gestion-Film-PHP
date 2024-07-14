<?php
    class users extends controller{

        var $models = array('users');

        //action index du controlleur users : affiche le formulaire de connection
        //affiche le formulaire de connection (si pas connécter) 
        //affiche le formulaire de déconnection dans un layout de back office (si connexion) 

        //si clic sur connexion
        function index() {
            $d=array();
            // echo "<PRE>";
            // print_r($_POST);
            // echo "</PRE>";
            if(!empty($_POST)) {
                // echo "<PRE>";
                // print_r($_POST);
                // echo "</PRE>";
                $user = $this->user->getUser($_POST["login"], $_POST["password"]);
                if(!empty($user)){
                    $this->Session->write('User', $user);
                } else {
                    $this->Session->setFlash("Connexion incorrect", '<i class="fas fa-times"></i>', "danger");
                }
            }

            $this->set($d);
            // si login et le mdp sont correct, on affiche bienvenue NomUtilisateur
            // echo "<PRE>";
            // print_r($this->Session->read());
            // echo "</PRE>";
            if($this->Session->isLogged()) {
                $this->layout = "admin";
                $this->render('loginok');
            } else {
                $this->render('index');
            }
        }

        function logout() {
            unset($_SESSION['User']);
            $this->layout = "default";
            //je rend la vue de base
            $this->render('index');
        }
    }
?>