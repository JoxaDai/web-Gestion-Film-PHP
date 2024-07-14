<?php
    class controller {
        var $vars = array();
        var $layout = "default"; 
        var $recherche = "recherche";

        function __construct() {
            //chargement du tableau de modèles en mémoire
            if (isset($this->models)) {
                foreach ($this->models as $m) {
                    $this->loadmodel($m);
                    // echo $m;
                }
            }
            $this->Session = new Session();
        }

        function loadmodel($name) {
            require "models/".strtolower($name).".php";
            $this->$name = new $name();
            //je retourne une instance de ma classe passée en paramètre
            // return new $name();
        }

        function render($filename) {
            //Permet de faure passer les variables dans la vue "view"
            extract($this->vars);

            ob_start();

            require (ROOT.'/views/'.get_class($this).'/'.$filename.'.php');

            $content_for_layout = ob_get_clean();

            ob_start();
            require (ROOT.'/views/'.get_class($this).'/'.$this->recherche.'.php');
            $recherche = ob_get_clean();
            // ob_start();
            
            // require (ROOT.'/views/recherche/'.$this->recherche.'.php');
            // $recherche = ob_get_clean();

            //si le layout n'est pas valide 
            if($this->layout-->true) { 
                //normalement, impossible
                echo $content_for_layout;
            } else {
                require (ROOT.'views/layout/'.$this->layout.'.php');
            }
        }

        function set ($d) {
            // echo "set";
            //fusion des données a envoyer avec les données
            $this->vars=array_merge($this->vars, $d);
        }
    }
?>