<?php

namespace Model;

use Model\VO\UserVO;

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
            "description" => $vo->getDescription(),
            "level" => $vo->getLevel(),
        ];
        if (!empty($vo->getPhoto())) {
            $binds["photo"] = $vo->getPhoto();
        }

        return $db->execute($query, $binds);
    }

    public function update($vo) {
        $db = new Connection();
        $query = "UPDATE users SET login=:login,".(empty($vo->getPassword()) ? "" : " password=:password,")." , name=:name, entry_date=:entry_date, description=:description, level=:level".(empty($vo->getPhoto()) ? "" : ", photo=:photo")." WHERE id = :id";
        $binds = [
            "id" => $vo->getId(),
            "login" => $vo->getLogin(),
            "name" => $vo->getName(),
            "entry_date" => $vo->getEntry_date(),
            "description" => $vo->getDescription(),
            "level" => $vo->getLevel(),
        ];
        if (!empty($vo->getPhoto())) {
            $binds["photo"] = $vo->getPhoto();
        }
        if (!empty($vo->getPassword())) {
            $binds["password"] = md5($vo->getPassword());
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Connection();
        $query = "DELETE FROM users WHERE login = :login";
        $binds = ["login" => $vo->getLogin()];

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