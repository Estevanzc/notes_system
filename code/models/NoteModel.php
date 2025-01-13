<?php

namespace Model;

use Model\VO\NoteVO;

final class NoteModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM notes";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = new NoteVO($row["id"], $row["title"], $row["description"],$row["create_date"],$row["remind_date"], $row["user_id"]);
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM notes WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new NoteVO($data[0]["id"], $data[0]["title"], $data[0]["description"],$data[0]["create_date"],$data[0]["remind_date"], $data[0]["user_id"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO notes VALUES (default, :title, :description, :create_date, :remind_date, :user_id";
        $binds = [
            "title" => $vo->getTitle(),
            "description" => $vo->getDescription(),
            "create_date" => $vo->getCreate_date(),
            "remind_date" => $vo->getRemind_date(),
            "user_id" => $vo->getUser_id(),
        ];

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE notes SET title=:title, description=:description, create_date=:create_date, remind_date=:remind_date, user_id=:user_id WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "title" => $vo->getTitle(),
            "description" => $vo->getDescription(),
            "create_date" => $vo->getCreate_date(),
            "remind_date" => $vo->getRemind_date(),
            "user_id" => $vo->getUser_id(),
        ];

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM notes WHERE id = :id";
        $binds = ["id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}