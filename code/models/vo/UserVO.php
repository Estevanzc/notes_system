<?php

namespace Model\VO;

final class UserVO extends VO {

    private $login;
    private $password;
    private $name;
    private $entry_date;
    private $description;
    private $level;
    private $photo;

    public function __construct($id = 0, $login = "", $password = "", $name = 1, $entry_date = "", $description = "", $level = "", $photo = "") {
        parent::__construct($id);
        $this->login = $login;
        $this->password = $password;
        $this->name = $name;
        $this->entry_date = $entry_date;
        $this->description = $description;
        $this->level = $level;
        $this->photo = $photo;
    }

    public function getLogin() {
        return $this->login;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEntry_date() {
        return $this->entry_date;
    }

    public function setEntry_date($entry_date) {
        $this->entry_date = $entry_date;
    }
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getPhoto() {
        return $this->photo;
    }

    public function setPhoto($photo) {
        $this->photo = $photo;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
    public function getLevel() {
        return $this->level;
    }
    public function setLevel($level) {
        $this->level = $level;
    }

}