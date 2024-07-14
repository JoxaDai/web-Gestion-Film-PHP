<?php
class Film extends Model {
    var $table = "film";
    public $tableJoin = [];

    function getAllFilms() {
        return $this->find();
    }

    function getFilmDetails($id) {
        return $this->findFirst(array(
            "condition" => "id = " . $id
        ));
    }

    function deleteFilm($id) {
        $this->id = $id;
        return $this->delete();
    }

    function addFilm($data) {
        return $this->save($data);
    }

    function updateFilm($id, $data) {
        $this->id = $id;
        return $this->save($data);
    }
}
?>