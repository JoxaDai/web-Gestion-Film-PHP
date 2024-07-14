<?php
    class session {
        var $vars = array();
        var $layout = "default";

        function __construct() {
            //chargement du tableau d emodèles en mémoire
            if (!isset($_SESSION)) {
                session_start();
            }
        }

        //creer une variable de session
        function write($key, $value) {
            $_SESSION[$key] = $value;
        }

        //lecture d'une variable de session
        public function read($key=null) {
            if($key) {
                if (isset($_SESSION[$key])) {
                    return $_SESSION[$key];
                } else {
                    return false;
                }
            } else {
                return $_SESSION;
            }
        }

        public function setFlash($message, $icon="", $type="success") {
            $_SESSION['flash'] = array (
                'message'=>$message,
                'icon'=>$icon,
                'type'=>$type
            );
        }

        public function flash() {
            if (isset($_SESSION['flash']['message'])) {
                $html = '<div class="alert alert-'.$_SESSION['flash']['type'].' d-flex align-items-center" role="alert">';
                $html .= $_SESSION['flash']['icon'];
                $html .= '<div>';
                $html .= $_SESSION['flash']['message'];
                $html .= '</div>';
                $html .= '</div>';
                $_SESSION['flash'] = array ();
                return $html;
            }
        } 

        //retourne vrai si la personne logué existe
        public function isLogged() {
            return isset($_SESSION['User']->nom);
        }

        //methode pour lire la valeur du user
        public function user($key) {
            if ($this-> read('User')) {
                if (isset($this->read('User')->$key)) {
                    return $this->read('User')->key;
                } else {
                    return false;
                }
            }
            return false;
        }
    }
?>