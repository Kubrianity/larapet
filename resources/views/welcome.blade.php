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
        @auth
        <p> Welcome! </p>
        <form action="/logout" method="POST">
          @csrf
          <button>Log out</button>
        </form>  
        @else
        <h2>Signup</h2>
        <div>
          <form action="/signup" method="POST">
            @csrf
            <input name="name" type="text" placeholder="name">
        	  <input name="email" type="text" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register</button>
    		  </form>
        </div>
        <div>
          <h2>Login</h2>
          <form action="/login" method="POST">
            @csrf
            <input name="login_name" type="text" placeholder="name">
            <input name="login_password" type="password" placeholder="password">
            <button>Log in</button>
    		  </form>
        </div>
        @endauth
  		</div>
    </body>
</html>
