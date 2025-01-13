<?php

namespace Model\VO;

final class NoteVO extends VO {

    private $title;
    private $description;
    private $create_date;
    private $remind_date;
    private $user_id;

    public function __construct($id = 0, $title = "", $description = "", $create_date = 1, $remind_date = "", $user_id = "") {
        parent::__construct($id);
        $this->title = $title;
        $this->description = $description;
        $this->create_date = $create_date;
        $this->remind_date = $remind_date;
        $this->user_id = $user_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getCreate_date() {
        return $this->create_date;
    }

    public function setCreate_date($create_date) {
        $this->create_date = $create_date;
    }

    public function getRemind_date() {
        return $this->remind_date;
    }

    public function setRemind_date($remind_date) {
        $this->remind_date = $remind_date;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    public function getUser_id() {
        return $this->user_id;
    }
    public function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

}