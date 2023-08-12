<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<div>
<p> Welcome, {{ $username }} </p>
  <form action="/logout" method="POST">
    @csrf
    <button>Log out</button>
  </form> 
  <h2>Register your paw friend</h2>
  <form action="/pets" method="POST">
    @csrf
    <input name="name" type="text" placeholder="name">
    <input name="breed" type="text" placeholder="breed">
    <input name="age" type="number" placeholder="age">
    <button>Register</button>
  </form>
  <h2>Your registered paw friends</h2>
  @foreach($pets as $pet)
  <div>
    <span> {{ $pet['name'] }} </span>
    <span> {{ $pet['breed'] }} </span>
    <span> {{ $pet['age'] }} </span>
  </div>
  @endforeach
</div>
</body>
</html>