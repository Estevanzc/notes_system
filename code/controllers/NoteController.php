<?php

namespace Controller;

use Model\NoteModel;
use Model\VO\NoteVO;

final class NoteController extends Controller {

    public function list() {
        $this->loadView("notesList", []);
    }
    public function filter_list() {
        $model = new NoteModel();
        $data = $model->selectAll(new NoteVO());
        return $data;
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        $model = new NoteModel();
        if(!empty($id)) {
            $vo = new NoteVO($id);
            $note = $model->selectOne($vo);
        } else {
            $note = new NoteVO();
        }
        $notes_num = count($model->selectAll([]));
        if (!empty($id) && $note->getUser_id() == $_SESSION["user"]->getId() || empty($id)) {
            $this->loadView("noteForm", [
                "note" => $note,
                "notes_num" => $notes_num
            ]);
        } else if (!empty($id) && $note->getUser_id() != $_SESSION["user"]->getId()) {
            $this->redirect("index.php");
        }
    }

    public function save() {
        $id = $_POST["id"];
        $model = new NoteModel();
        $vo = new NoteVO($id, $_POST["title"], $_POST["description"], $_POST["create_date"], $_POST["remind_date"], $_POST["user_id"]);

        if(empty($id)) {
            $result = $model->insert($vo);
        } else {
            $result = $model->update($vo);
        }

        $this->redirect("notes.php");
    }

    public function remove() {
        $vo = new NoteVO($_GET["id"]);
        $model = new NoteModel();

        $result = $model->delete($vo);

        $this->redirect("notes.php");
    }

}