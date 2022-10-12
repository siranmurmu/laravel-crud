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
	<h2>Article</h2>
  <a href="{{ route('insert.article') }}" class="btn btn-primary">Add Article</a>
  <a href="{{ url('category') }}" class="btn btn-primary">View Category</a>
  <a href="{{ url('subcategory') }}" class="btn btn-primary">View Subcategory</a> 
  <a href="{{ url('product') }}" class="btn btn-primary">View Product</a>

  <table class="table">
    <thead>
      <tr>
      	<th>ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>Slug</th>
        <th>Description</th>
        <th>Status</th>
        <th>IP Address</th>
        <th>Date</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach($articles as $key=>$article)
      <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $article->title }}</td>
        <td><a href="{{ route('show.article', $article->id) }}" class="btn btn-success">Image</a></td>
        <td>{{ $article->slug }}</td>
        <td>{{ $article->description }}</td>
        <td></td>
        <td>{{ $article->ip_address }}</td>
        <td>{{ $article->created_at }}</td>
        <td><a href="{{ url('/article-edit', $article->id) }}" class="btn btn-success">Edit</a></td>
        <td><a onclick="return confirm('Are You Sure ?')" href="{{ url('/article-delete', $article->id) }}" class="btn btn-danger">Delete</a></td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

</body>
</html>
