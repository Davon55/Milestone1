<?php

namespace App\Models;

class RegisterUserModel implements \JsonSerializable
{
	
	private $username;
	private $password; 
	private $firstname;
	private $lastname;
	private $phone;
	private $email;
	
	public function __construct($username, $password, $firstname, $lastname, $phone, $email) 
	{
		
		$this->username=$username;
		$this->password=$password;
		$this->firstname=$firstname;
		$this->lastname=$lastname;
		$this->phone=$phone;
		$this->email=$email;
	}
	public function jsonSerialize()
	{
		return get_object_vars($this);
	}
	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @return mixed
	 */
	public function getFirstname() {
		return $this->firstname;
	}

	/**
	 * @return mixed
	 */
	public function getLastname() {
		return $this->lastname;
	}

	/**
	 * @return mixed
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	

}