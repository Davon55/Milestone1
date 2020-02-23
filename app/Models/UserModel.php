<?php

namespace app\Models;




//REFACTOR: Thise should be renamed to Credential Model
class UserModel implements \JsonSerializable
{
	private $id;
	private $username;
	private $password;
	
	
	


	//BEST PRACTICE: Use a non-default constructor for Object Models
	public function __construct($id, $username, $password)
	{
		$this->id = $id;
		$this->username = $username;
		$this->password = $password;
		
	}
	public function jsonSerialize()
	{
		return get_object_vars($this);
	}
	//BEST PRACTICE: Just implement getter (read-only) accesors for Object Models

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




}
