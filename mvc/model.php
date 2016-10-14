<?php

class UserModel {
	
	private $personal_code;
	private $name;
	private $lastname;
	private $birthdate;

	public function __construct() {
		$this->name = "";
		$this->lastname = "";
		$this->birthdate = "";
		$this->personal_code = "";
	}
	
	public function getName() {
		return $this->name;
	}
	public function getLastname() {
		return $this->lastname;
	}
	public function getBirthdate() {
		return $this->birthdate;
	}
	public function getPersonalCode() {
		return $this->personal_code;
	}
	
	public function setName($name) {
		$this->name = $name;
	}
	public function setLastname($lastname) {
		$this->lastname = $lastname;
	}
	public function setBirthdate($birthdate) {
		$this->birthdate = strtotime($birthdate);
	}
	
	public function updatePersonalCode() {
		$this->personal_code = md5($this->name . $this->lastname . $this->birthdate);
	}
	
	public function setUserData ($name, $lastname, $birthdate) {
		$this->name = $name;
		$this->lastname = $lastname;
		$this->birthdate = strtotime($birthdate);
		$this->personal_code = md5($this->name . $this->lastname . $this->birthdate);
	}
	
	public function isComplete() {
		if ($this->personal_code == md5($this->name . $this->lastname . $this->birthdate)) {
			return true;
		} else {
			return false;
		}
	}
}
