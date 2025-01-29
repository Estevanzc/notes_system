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
            if ($_SESSION["user"]->getLevel() < 2 && $_SESSION["user"]->getId() != $user->getId()) {
                $this->redirect("index.php");
                exit();
            }
        } else {
            $user = new UserVO();
        }

        $this->loadView(($_GET["page_type"] == 0 ? "userForm" : "userCreate"), [
            "user" => $user
        ]);
    }

    public function save() {
        if ($_SESSION["user"]->getLevel() < 2 && $_SESSION["user"]->getId() != $_POST["id"]) {
            $this->redirect("index.php");
            exit();
        }
        $id = $_POST["id"];
        $model = new UserModel();
        $nome_arquivo = 0;
        $user_old_photo = $model->selectOne(new UserVO($id))->getPhoto();
        if (((int)$_POST["change_photo"]) == 1) {
            $nome_arquivo = empty($_FILES["photo"]["name"]) ? null : $this->uploadFile($_FILES["photo"], (empty($user_old_photo) ? "" : $user_old_photo));
        }
        $vo = new UserVO($id, $_POST["login"], $_POST["password"], $_POST["name"], $_POST["entry_date"], $_POST["description"], ($_SESSION["user"]->getLevel() == 2 ? $_POST["level"] : 0), $nome_arquivo);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("users.php");
    }

    public function remove() {
        if ($_SESSION["user"]->getLevel() < 2 && $_SESSION["user"]->getId() != $_GET["id"]) {
            $this->redirect("index.php");
            exit();
        }
        $vo = new UserVO($_GET["id"]);
        $model = new UserModel();
        $vo = $model->selectOne($vo);

        $result = $model->delete($vo);

        $this->redirect("users.php");
    }

}