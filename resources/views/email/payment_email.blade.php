<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Mail</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <!-- start -->
    <table class="table table-bordered table-striped table-hover">
    <tbody>
    <tr class="row">
      <th scope="col">User Id</th>
      <td scope="col">{{$payment['r_payment_id']}}</td>
    </tr>
    <tr class="row">
      <th scope="col">Method</th>
      <td scope="col">{{$payment['method']}}</td>
    </tr>
    <tr class="row">
      <th scope="col">$Currency</th>
      <td scope="col">{{$payment['currency']}}</td>
    </tr>
    <tr class="row">
      <th scope="col">Email</th>
      <td scope="col">{{$payment['email']}}</td>
    </tr>
    <tr class="row">
      <th scope="col">Amount</th>
      <td scope="col">{{$payment['amount']}}</td>
    </tr>


  </tbody>
</table>
    <!-- end -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>