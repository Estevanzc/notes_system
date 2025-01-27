<?php

namespace Controller;

use Model\UserModel;
use Model\VO\UserVO;

final class UserController extends Controller {

    public function list() {
        $this->loadView("usersList", []);
    }
    public function list_one() {
        $model = new UserModel();
        $user = $model->selectOne(new UserVO($_GET["id"]));
        if ($_SESSION["user"]->getLevel() < 2 && $_SESSION["user"]->getId() != $user->getId()) {
            $this->redirect("index.php");
            exit();
        }
        $this->loadView("userDetail", [
            "user" => $user,
        ]);
    }
    public function userList() {
        $model = new UserModel();
        return $model->selectAll(new UserVO());
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new UserModel();
            $vo = new UserVO($id);
            $user = $model->selectOne($vo);
        } else {
            $user = new UserVO();
        }

        $this->loadView(($_GET["page_type"] == 0 ? "userForm" : "userCreate"), [
            "user" => $user
        ]);
    }

    public function save() {
        $id = $_POST["id"];
        $model = new UserModel();
        $nome_arquivo = $this->uploadFile($_FILES["photo"], (empty($id) ? "" : $model->selectOne(new UserVO($id))->getPhoto()));
        $vo = new UserVO($id, $_POST["login"], $_POST["password"], $_POST["name"], $_POST["entry_date"], $_POST["description"], $_POST["level"], $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("users.php");
    }

    public function remove() {
        $vo = new UserVO($_GET["id"]);
        $model = new UserModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("users.php");
    }

}