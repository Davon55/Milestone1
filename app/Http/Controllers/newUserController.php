<?php

namespace App\Models;
namespace App\Http\Controllers;
use App\Models\RegisterUserModel;
use App\Services\Business\SecurityService;
use illuminate\http\request;



class newUserController extends Controller
{
	public function RegisterUser(Request $request)
	{
		// Get the data from the form
		$username = $request->input('username');
		$password = $request->input('password');
		$firstname = $request->input('firstname');
		$lastname = $request->input('lastname');
		$phone = $request->input('phone');
		$email = $request->input('email');
		
		// store the data in the model 
		$Register = new RegisterUserModel($username, $password, $firstname, $lastname, $phone, $email);
		
		//instance of the SecurityService class
		$service = new SecurityService();
		$status = $service->Register($Register);
		
		
		//Render a failed or success response View and pass the User Model to it
		if($status)
		{
			$data = ['model' => $Register];
			return view('RegistrationPassed2')->with($data);
		}
		else 
		{
			$data = ['model' => $Register];
			return view('RegistrationPassed2')->with($data);
		}
		
	}
}