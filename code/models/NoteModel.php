<?php

namespace Model;

use Model\VO\NoteVO;

final class NoteModel extends Model {

    public function selectAll($vo) {
        $filter = json_decode(urldecode($_GET["filter"]), true);
        $db = new Connection();
        $query = "SELECT * FROM notes";
        if (!empty($filter)) {
            $string = ($filter[0] != "" ? " (LOWER(title) LIKE LOWER(\"%".$filter[0]."%\") or LOWER(description) LIKE LOWER(\"%".$filter[0]."%\"))" : "");
            $string1 = "";
            if ($filter[1] != 0) {
                if ($filter[1] == 1) {
                    $string1 = "datediff(remind_date, curdate()) < 7";
                } else {
                    $string1 = "datediff(remind_date, curdate()) < 0";
                }
            }
            $string2 = "ORDER BY create_date ".($filter[2] == 0 ? "ASC" : "DESC");
            $query .= ($string != "" || $string1 != "" ? " WHERE " : " ").$string.($string != "" && $string1 != "" ? " AND " : "").$string1." ".($string != "" || $string1 != "" ? " AND" : " WHERE")." user_id = ".$_SESSION["user"]->getId().($string2 != "" ? " " : "").$string2;
        }
        $data = $db->select($query);

        $arrayDados = [];

        foreach($data as $row) {
            $vo = [
                "id" => $row["id"],
                "title" => $row["title"],
                "description" => $row["description"],
                "create_date" => $row["create_date"],
                "remind_date" => $row["remind_date"],
                "user_id" => $row["user_id"]
            ];
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