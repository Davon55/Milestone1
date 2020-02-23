<?php


namespace app\Models;
namespace App\Http\Controllers;
use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Illuminate\Http\Request;

class Login2Controller extends Controller
{
	//BEST PRACTICE: name your methods properly and clearly 
	public function dologin2(Request $request)
	{
		//Get the post Form Data
		$username = $request->input('username');
		$password = $request->input('password');
	
		//$role = $request->input('role');
		
		//Save posted Form Data in User Object Model
		$user = new UserModel(-1, $username, $password);
		
		
		//call Security Business SErvice
		// BEST PRACTICE: pass course grained not fine grained parameters 
		$service = new SecurityService();
		$status = $service->login($user);
		
		
		
		//Render a failed or success response View and pass the User Model to it
		if($status)
		{
			$data = ['model' => $user];
			return view('loginPassed2')->with($data);
		}
		else 
	
		{
			return view('loginFailed');
		}
	}
}