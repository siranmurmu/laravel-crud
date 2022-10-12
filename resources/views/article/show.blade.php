<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Image List</h2>   
  <div align="right">
    <a href="{{ url('article') }}" class="btn btn-success">Back</a>
</div>         
  <table class="table">
    <thead>
      <tr>

      </tr>
    </thead>
    <tbody>
      <tr>
        @foreach($data as $d)
          <img src="{{ asset('images/article/'.$d->image) }}" style="height: 150px;width: 120px;">
        @endforeach
      </tr>
    </tbody>
  </table>
</div>

</body>
</html>
