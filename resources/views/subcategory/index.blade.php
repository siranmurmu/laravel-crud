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
  <h2>subcategory</h2>
  <a href="{{ url('subcategory-insert') }}" class="btn btn-primary">Add Subcategory</a>
  <a href="{{ url('category') }}" class="btn btn-primary">View Category</a> 
  <a href="{{ url('product') }}" class="btn btn-primary">View Product</a>  
  <a href="{{ url('article') }}" class="btn btn-primary">View Article</a>      
  <table class="table">
    <thead>
      <tr>
      	<th>Category Name</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
     @foreach($subcategories as $subcategory)
      <tr>
      	<td>{{ $subcategory->category->name }}</td>
        <td>{{ $subcategory->name }}</td>
        <td>{{ $subcategory->description }}</td>
        <td><img src="{{ asset('images/subcategory/'.$subcategory->image) }}" width="50"></td>
        <td>
          @if($subcategory->status==1)
          <a href="{{url('subcategory/status/0')}}/{{$subcategory->id}}"><button type="button" class="btn btn-primary">Active</button></a>
          @elseif($subcategory->status==0)
          <a href="{{url('subcategory/status/1')}}/{{$subcategory->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
          @endif
        </td>

        <td>
          <a href="{{url('subcategory/edit/')}}/{{$subcategory->id}}"><button type="button" class="btn btn-success">Edit</button></a>
        </td>
        
        <td>
          <a onclick="return confirm('Are you sure?')" href="{{url('subcategory/delete/')}}/{{$subcategory->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>

      

      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
