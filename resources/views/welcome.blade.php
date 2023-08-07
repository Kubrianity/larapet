<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
			<title>Laravel</title>
			<!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
  </head>
    <body>
      <div>
        <h2>Signup</h2>
        <form action="/signup" method="POST">
          @csrf
          <input name="name" type="text" placeholder="name">
        	<input name="email" type="text" placeholder="email">
          <input name="password" type="password" placeholder="password">
          <button>Register</button>
    		</form>
  		</div>
    </body>
</html>
