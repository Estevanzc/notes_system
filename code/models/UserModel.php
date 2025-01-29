<?php

namespace Model;

use Model\VO\UserVO;
use Model\NoteModel;
use Model\VO\NoteVO;

final class UserModel extends Model {

    public function selectAll($vo) {
        $db = new Connection();
        $query = "SELECT * FROM users";
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = [
                "id" => $row["id"],
                "login" => $row["login"],
                "password" => $row["password"],
                "name" => $row["name"],
                "entry_date" => $row["entry_date"],
                "description" => $row["description"],
                "level" => $row["level"],
                "photo" => $row["photo"]
            ];
            array_push($arrayDados, $vo);
        }

        return $arrayDados;
    }

    public function selectOne($vo) {
        $db = new Connection();
        $query = "SELECT * FROM users WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $data = $db->select($query, $binds);

        return new UserVO($data[0]["id"], $data[0]["login"], $data[0]["password"], $data[0]["name"], $data[0]["entry_date"], $data[0]["description"], $data[0]["level"], $data[0]["photo"]);
    }

    public function insert($vo) {
        $db = new Connection();
        $query = "INSERT INTO users VALUES (default, :login, :password, :name, :entry_date, :description, :level, ".(empty($vo->getPhoto()) ? "null" : ":photo").")";
        $binds = [
            "login" => $vo->getLogin(),
            "password" => md5($vo->getPassword()),
            "name" => $vo->getName(),
            "entry_date" => $vo->getEntry_date(),
            "description" => "",
            "level" => 1,
        ];
        if (!empty($vo->getPhoto())) {
            $binds["photo"] = $vo->getPhoto();
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE users SET login=:login, name=:name, description=:description".($vo->getLevel() == 0 ? "" : ", level=:level")."".($vo->getPhoto() == 0 ? "" : ", photo=:photo")." WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "login" => $vo->getLogin(),
            "name" => $vo->getName(),
            "description" => $vo->getDescription(),
        ];
        if ($vo->getPhoto() != 0) {
            $binds["photo"] = $vo->getPhoto();
        }
        if ($vo->getLevel() != 0) {
            $binds["level"] = $vo->getLevel();
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM users WHERE id = :id";
        $binds = ["id" => $vo->getId()];
        $note_vo = new NoteVO(null, null, null, null, null, $vo->getId());
        $note_model = new NoteModel();
        $note_result = $note_model->delete_by_user($note_vo);

        return $db->execute($query, $binds);
    }
    public function doLogin($vo) {
        $db = new Connection();
        $query = "SELECT * FROM users WHERE login=:login and password=:password";
        $binds = [
            "login" => $vo->getLogin(),
            "password" => md5($vo->getPassword())
        ];
        $data = $db->select($query, $binds);
        if (count($data) == 0) {
            return null;
        }
        $_SESSION["user"] = new UserVO($data[0]["id"],$data[0]["login"], $data[0]["password"], $data[0]["name"], $data[0]["entry_date"], $data[0]["description"], $data[0]["level"], $data[0]["photo"]);
        return $_SESSION["user"];
    }
}
