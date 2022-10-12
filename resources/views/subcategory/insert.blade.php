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
  <a href="{{ url('subcategory') }}" class="btn btn-primary">View Subcategory</a>            
  
  <form action="{{ route('store.subcategory') }}" method="post" enctype="multipart/form-data">
    @csrf
  
     <div class="row">

     	<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <select name="category_id" id="category_id" class="form-control">
                <option value="">---Select Category---</option>
      			    @foreach($category_id as $c)
      			    <option value="{{$c->id}}">{{$c->name}}</option>
      			    @endforeach
			          </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select class="form-control" name="status" class="form-control">
                 <option value="">---Select Status---</option>
                 <option value="1">Active</option>
                 <option value="0">Inactive</option>
               </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit" name="submit" value="Submit">
        </div>
    </div>
   
</form>


</div>

</body>
</html>
