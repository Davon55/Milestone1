<?php

namespace App\Services\Business;
use \PDO;
use Illuminate\Support\Facades\Log;
use App\Models\UserModel;
use App\Services\Data\SecurityDAO;

use app\Models\RegisterUserModel;


class SecurityService
{
	//REFACTOR: This should be renamed to authenticate()
	public function login(UserModel $user)
	{
		Log::info("Entering SecurityService.login()");
		
		//BestPractice: Externalize your application
		//Get credntials for acessing the database
		//REFACTOR: The initialization code is repeated in all business methods
		$servername = config("database.connections.mysql.host");
		$port = config("database.connections.mysql.port");
		$username = config("database.connections.mysql.username");
		$password = config("database.connections.mysql.password");
		$dbname = config("database.connections.mysql.database");
		
		$db= new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//Create a Security Service DAO with this connection and try to find the password in User.
		$service = new SecurityDAO($db);
		$flag = $service->findByUser($user);
		
		// In PDO you "close the database connection by setting the PDO object to null
		$db = null;
		//reutrn the finder results
		Log::info("Exit SercurityService.login() with" . $flag);
		return $flag;
		
		
	}
	public function Register(RegisterUserModel $user)
	{
		Log::info("Entering SecurityService.Register()");
		
		//BestPractice: Externalize your application
		//Get credntials for acessing the database
		//REFACTOR: The initialization code is repeated in all business methods
		$servername = config("database.connections.mysql.host");
		$port = config("database.connections.mysql.port");
		$username = config("database.connections.mysql.username");
		$password = config("database.connections.mysql.password");
		$dbname = config("database.connections.mysql.database");
		
		$db= new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		//Create a Security Service DAO with this connection and try to find the password in User.
		$service = new SecurityDAO($db);
		$flag = $service->insertByUser($user);
		
		// In PDO you "close the database connection by setting the PDO object to null
		$db = null;
		//reutrn the finder results
		Log::info("Exit SecurityService.Register() with" . $flag);
		return $flag;
		
		
	}
}