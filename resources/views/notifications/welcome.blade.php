
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>
		<?php 
		// print_r(Auth::user()->unreadNotifications); 
		?>
		@foreach(Auth::user()->unreadNotifications as $notifications )
		<!-- App\Notifications\PostNofification -->
		@include('notificaions.'. snake_case(class_basename($notifications->type)))
		<!-- <li>{{$notification->data['content']}}</li> -->
		@endforeach
	</p>
</body>
</html>
@extends('adminlte::layouts.landing')

