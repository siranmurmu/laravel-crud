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
  <h2>Category</h2>
  <a href="{{ url('category-insert') }}" class="btn btn-primary">Add Category</a>
  <a href="{{ url('subcategory') }}" class="btn btn-primary">View Subcategory</a> 
  <a href="{{ url('product') }}" class="btn btn-primary">View Product</a>
  <a href="{{ url('article') }}" class="btn btn-primary">View Article</a>           
  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach($categories as $category)
      <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>
        <td><img src="{{ asset('images/category/'.$category->image) }}" width="50"></td>
        <td>
          @if($category->status==1)
          <a href="{{url('category/status/0')}}/{{$category->id}}"><button type="button" class="btn btn-primary">Active</button></a>
          @elseif($category->status==0)
          <a href="{{url('category/status/1')}}/{{$category->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
          @endif
        </td>

        <td>
          <a href="{{url('category/edit/')}}/{{$category->id}}"><button type="button" class="btn btn-success">Edit</button></a>
        </td>
        <td>
          <a onclick="return confirm('Are you sure?')" href="{{url('category/delete/')}}/{{$category->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
