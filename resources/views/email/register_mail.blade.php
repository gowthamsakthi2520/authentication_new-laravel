<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Mail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <!-- start -->
    <table class="table table-bordered table-striped table-hover">
    <tbody>
    <tr class="row">
      <th scope="col">User</th>
      <td scope="col">{{$data['name']}}</td>
    </tr>
    <tr class="row">
      <th scope="col">Email</th>
      <td scope="col">{{$data['email']}}</td>
    </tr>
    <tr class="row">
      <th scope="col">Password</th>
      <td scope="col">{{$data['password']}}</td>
    </tr>
  </tbody>
</table>
    <!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>