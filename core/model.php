<?php
    class Model {
        //propriétés
        public $id; 
        public $table;
        public $conf = "default";
        public $db;

        function __construct() {
            $conf=conf::$databases[$this->conf];
            try {
                $this->db = new PDO('mysql:host='.$conf["host"].';dbname='.$conf["database"],
                    $conf["login"], $conf["password"], array(PDO::ATTR_ERRMODE =>
                        PDO::ERRMODE_WARNING));
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        static function load($name) {
            require "models/".$name.".php";
            //je retourne une instance de ma classe passée en paramètre
            return new $name();
        }

        function findFirst($data) {
            // retorune l'élément courrant d'un tableau
            // print_r($data);
            return current($this->find($data));
        }

        function search($data=null) {
            $fields = '*';
            $condition = "1=1";
            $order = "id";
            $limit = "";
            if(isset($data["fields"])) {
                $field=$data["fields"];
            }
            if(isset($data["condition"])) {
                $condition=$data["condition"];
            }
            if(isset($data["order"])) {
                $order=$data["order"];
            }
            if(isset($data["limit"])) {
                $limit=$data["limit"];
            }
            // print_r($_POST);
            if (count($this->tableJoin)>0) {
                $sql="SELECT ".$this->table.".id, ".$this->table;
                for ($i = 0; $i <= count($this->tableJoin)-1; $i++) {
                    for ($j = 1; $j <= count($this->tableJoin[$i])-1; $j++) {
                        $sql = $sql.", ".$this->tableJoin[$i][$j];
                    }
                }
                if (isset($this->tableInterne)) {
                    for ($i = 0; $i <= count($this->tableInterne)-1; $i++) {
                        $sql = $sql.", ".$this->tableInterne[$i];
                    } 
                }
                $sql = $sql." FROM ".$this->table." ";
                for ($i = 0; $i <= count($this->tableJoin)-1; $i++) {
                    $sql = $sql."INNER JOIN ".$this->tableJoin[$i][0]." ON ".$this->table.".id".$this->tableJoin[$i][0]."=".$this->tableJoin[$i][0].".id ";
                }
                $sql = $sql." WHERE ".$condition. " AND ";
            } else {
                $sql="SELECT ".$fields." FROM ".$this->table." WHERE ".$condition. " AND ";
            }
            foreach($_POST as $post=>$p) {
                if ($p != "NULL") {
                    $sql = $sql.$post."=".$p." AND ";
                }
            }
            $sql = substr($sql, 0, -4);
            $sql = $sql." ORDER BY ".$order;


            // $postName = array_keys($_POST);
 
            // foreach ($array as $value)
            // {
            //     echo $value; echo '<br />';
            // }
            // "idcategorie = ".$_POST["idcategorie"];

            // echo $sql;
            // print_r($sql);
            $sth = $this->db->prepare($sql);
            if ($sth->execute()) {
                $data = $sth->fetchAll(PDO::FETCH_OBJ);
                    // echo "<PRE>";
                    // print_r ($data);
                    // echo "</PRE>";
                return $data;
            } else {
            echo "<br> Erreur SQL <br>";
            }
            $_POST=NULL;
        }

        //read : un select sur la clé primaire
        function find($data=null) {
            $fields = '*';
            $condition = "1=1";
            $order = "id";
            $limit = "";
            //public $join="INNER JOIN ".$table." ON ".$table."id=".$table."id";
            if(isset($data["fields"])) {
                $fields=$data["fields"];
            }
            // echo $fields;
            if(isset($data["condition"])) {
                $condition=$data["condition"];
            }
            // echo $condition;
            if(isset($data["order"])) {
                $field=$data["order"];
            }
            if(isset($data["limit"])) {
                $field=$data["limit"];
            }
            // echo "fcfccvnv";
            // echo $this->tableJoin[0][0];
            //echo count($this->tableJoin);
            // echo "-|-".$this->table."-|-";
            if (count($this->tableJoin)>0) {
                $sql="SELECT ".$this->table.".id, ".$this->table;
                for ($i = 0; $i <= count($this->tableJoin)-1; $i++) {
                    for ($j = 1; $j <= count($this->tableJoin[$i])-1; $j++) {
                        $sql = $sql.", ".$this->tableJoin[$i][$j];
                    }
                }
                if (isset($this->tebleInterne)) {
                    for ($i = 0; $i <= count($this->tebleInterne)-1; $i++) {
                        $sql = $sql.", ".$this->tebleInterne[$i];
                    } 
                }
                $sql = $sql." FROM ".$this->table." ";
                for ($i = 0; $i <= count($this->tableJoin)-1; $i++) {
                    $sql = $sql."INNER JOIN ".$this->tableJoin[$i][0]." ON ".$this->table.".id".$this->tableJoin[$i][0]."=".$this->tableJoin[$i][0].".id ";
                }
                $sql = $sql." WHERE ";
            } else {
                $sql="SELECT ".$fields." FROM ".$this->table." WHERE ";
            }
            $sql.= $condition." ORDER BY ".$order." ".$limit;
            // echo $sql;
            // print_r($sql);
            $sth = $this->db->prepare($sql);
            // echo $sql;
            if ($sth->execute()) {
                $data = $sth->fetchAll(PDO::FETCH_OBJ);
                    // echo "<PRE>";
                    // print_r ($data);
                    // echo "</PRE>";
                return $data;
            } else {
            echo "<br> Erreur SQL <br>";
            }
        }

        function read($fields=null) {
            if ($fields==null) {
                $fields ='*';
            }
            $sql ="SELECT ".$fields." FROM ". $this->table ." WHERE id=:id";
            //echo $sql;
            $sth = $this->db->prepare($sql);
            if ($sth->execute(array(':id'=>$this->id))) {
                //echo "<br> id => ".$this->id."<br>";
                $data = $sth->fetch(PDO::FETCH_OBJ);
                foreach($data as $key=>$value) {
                    $this->$key = $value;
                }
            } else {
                echo "<br> erreur SQL read <br>";
            }
        }

        function delete() {
            $sql="DELETE FROM ".$this->table." WHERE id=:id";
            // echo "---|".$this->id."|---";
            // echo $sql;
            // echo "\n";
            $sth = $this->db->prepare($sql);
            if ($sth->execute(array(':id' => $this->id))) {
                // print_r($sth);
                return true;
            }
            else {
                echo "<br> ERREUR SQL DELETE <br>";
            }
        }

        function save($data) {
            // var_dump($_FILES);
            if(empty($data['id'])){
                unset($data["id"]);
                // echo "insert<br>";
                $sql="INSERT INTO ". $this->table."(";
                $values = "";
                foreach($data as $key=>$value) {
                    $sql.= $key.",";
                    $values.= ":".$key.",";
                }
                $sql = substr($sql, 0, -1);
                $values = substr($values, 0, -1);
                $sql.=") VALUES (".$values.");";
                echo $sql;
                $sth = $this->db->prepare($sql);
                if($sth->execute($data)) {
                    //echo "<br> INSERT OK <br>";
                    $this->id = $this->db->lastinsertId();
                } else {
                    echo "<br> ERREUR SQL INSERT <br>";
                }
                // update
            } else {
                $this->id = $data["id"];
                unset($data["id"]);
                $sql="UPDATE ".$this->table." SET ";
                foreach ($data as $key=>$value) {
                    $sql .= $key."= :".$key.",";
                }
                $sql = substr($sql, 0,-1);
                $sql.=" WHERE id=".$this->id;
                // echo $sql;
                $sth = $this->db->prepare($sql);
                if ($sth->execute($data)) {
                    //echo "<br> Update OK <br>";
                } else {
                    echo "<br> Update ERREUR <br>";
                }
            }
        }
    }
?>