<?php
class Type extends Model {
    var $table = "type";
    public $tableJoin = [];

    function getAllTypes() {
        return $this->find();
    }

    function getTypeDetails($id) {
        return $this->findFirst(array(
            "condition" => "id = " . $id
        ));
    }

    function deleteType($id) {
        $this->id = $id;
        return $this->delete();
    }

    function addType($data) {
        return $this->save($data);
    }

    function updateType($id, $data) {
        $this->id = $id;
        return $this->save($data);
    }
}
?>
