<?php

namespace Controller;

use Model\NoteModel;
use Model\VO\NoteVO;

final class NoteController extends Controller {

    public function list() {
        $model = new NoteModel();
        $data = $model->selectAll(new NoteVO());

        $this->loadView("notesList", [
            "notes" => $data
        ]);
    }

    public function form() {
        $id = $_GET["id"] ?? 0;

        if(!empty($id)) {
            $model = new NoteModel();
            $vo = new NoteVO($id);
            $note = $model->selectOne($vo);
        } else {
            $note = new NoteVO();
        }

        $this->loadView("noteForm", [
            "note" => $note
        ]);
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