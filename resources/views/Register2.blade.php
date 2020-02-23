@extends('layouts.member')
@section('title', 'Register Page')

@section('content')
<form action ="RegisterUser" method = "POST">
	<input type = "hidden" name="_token" value ="<?php echo csrf_token() ?>"/>
	<h2> Please Register</h2>
	<table>
		<tr>
			<td>User Name: </td>
			<td><input type ="text" name= "username" /></td>
		</tr>
		
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
		<tr>
		<tr>
<tr>
<td>First Name: </td><td><input type ="text" name= "firstname" /><br></td>
</tr>
		
<tr>
			
<td>Last Name: </td><td><input type ="text" name= "lastname" /><br></td>
</tr>

<tr>
<td>Phone Number: </td><td><input type ="tel" name= "phone" /><br></td>
</tr>

<tr>
<td>Email: </td><td><input type ="email" name= "email" /></td>
		<tr>
			<td colspan ="2" align ="center">
				<input type="Submit" value="Register"/>
	    </td>
     </tr>
   </table>
 </form>
 @endsection
