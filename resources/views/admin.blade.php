@extends('layouts.appmaster')
@section('title', 'Admin Page')

@section('content')
<form action ="admin" method = "POST">	


<table>
  <tr>
    <th>ID</th>
    <th>User Name</th>
    <th>Password</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Role</th>
  </tr>
     
@foreach($users as $user)
 
  <tr>
    <td>{{@row['id']}}</td>
    <td>{{@row['username']}}</td>
    <td>{{@row['password']}}</td>
    <td>{{@row['firstname']}}</td>
    <td>{{@row['lastname']}}</td>
    <td>{{@row['phone']}}</td>
    <td>{{@row['email']}}</td>
    <td>{{@row['role']}}</td>
    <td><select name="Role">
    <option value="role1">1</option>
    <option value="role2">2</option>
    <option value="role3">3</option>
    <option value="role4">4</option>
    <option value="role5">5</option>
    </select></td>
  </tr>
@
</table>
</form>	

 
 @endsection
 
 <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: black;
  color: white;
}
</style>
