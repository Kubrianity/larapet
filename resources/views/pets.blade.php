<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  @foreach($pets as $pet)
  <section>
    <span> {{ $pet-> name }} </span>
    <span> {{ $pet-> age }} </span>
    <span> {{ $pet-> breed }} </span>
  </section>
  @endforeach
</body>
</html>