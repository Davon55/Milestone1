<?php

namespace App\Services\Data;



use Illuminate\Support\Facades\Log;
use App\Models\UserModel;
use App\Services\Utility\DatabaseException;
use PDOException;

use app\Models\RegisterUserModel;


//BAD PRACTICE: This class really should be a User DAO!
class SecurityDAO
{
	private $db = NULL;
	
	//BEST PRACTICE: Do not create Database connections in a data Service 
	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function findByUser(UserModel $user)
	{
		Log::info("Entering SecurityDAO.findByUser()");
		try 
		{
			
			// Select username and password and see if this row exists
			$name = $user->getUsername();
			$pw = $user->getPassword();
			$stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD
                                       FROM users
									   WHERE USERNAME = :username AND PASSWORD = :password");
			$stmt->bindParam(':username' , $name);
			$stmt->bindParam(':password' , $pw);
			$stmt->execute();
			
			
			// See if user existed and return true if found else return false if not found
			// BAD PRACTICE: This is a business rules in our DAO!
			if($stmt->rowCount() == 1)
			{
				Log::info("Exit SecurityDAO.findByUser() with true");
				return true;
			}
			else 
			{
				Log::info("Exit SecurityDAO.findByUser() with false");
				return false;
			}
			
		} 
		catch (PDOException $e) 
		{
			//BEST PRACTICE: Catch all exceptions (do not swallow exceptions,
			//meaning do not leave empty
			Log::error("Exception:", array("message" => $e->getMessage()));
			throw new DatabaseException("Database Exception:" . $e->getMessage(), 0, $e);
		}
		
	}
	public function insertByUser(RegisterUserModel $user)
	{
		Log::info("Entering SecurityDAO.insertByUser()");
		try
		{
			
			//DB::insert('insert into users (USERNAME, PASSWORD, FIRSTNAME,LASTNAME,
                       // PHONE, EMAIL) values (?,?,?,?,?');
			
			 //insert fields into the database
		    $name = $user->getUsername();
			$pw = $user->getPassword();
			$fn = $user->getFirstname();
			$ln = $user->getLastname();
			$pn = $user->getPhone();
			$em = $user->getEmail();
			$stmt = $this->db->prepare("INSERT INTO users (USERNAME, PASSWORD, FIRSTNAME, LASTNAME, PHONE, EMAIL) 
                                        VALUES (:username, :password, :firstname, :lastname, :phone, :email) ");
			
			$stmt->bindParam(':username' , $name);
			$stmt->bindParam(':password' , $pw);
			$stmt->bindParam(':firstname', $fn);
			$stmt->bindParam(':lastname',  $ln);
			$stmt->bindParam(':phone', $pn);
			$stmt->bindParam(':email', $em);
			$stmt->execute(); 
			
			
			// See if user existed and return true if found else return false if not found
			// BAD PRACTICE: This is a business rules in our DAO!
			if($stmt->rowCount() == 0)
			{
				Log::info("Exit SecurityDAO.insertByUser() with true");
				return true;
			}
			else
			{
				Log::info("Exit SecurityDAO.insertByUser() with false");
				return false;
			}
			
		}
		catch (PDOException $e)
		{
			//BEST PRACTICE: Catch all exceptions (do not swallow exceptions,
			//meaning do not leave empty
			Log::error("Exception:", array("message" => $e->getMessage()));
			throw new DatabaseException("Database Exception:" . $e->getMessage(), 0, $e);
		}
	}
}