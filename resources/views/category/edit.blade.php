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
  <a href="{{ url('category') }}" class="btn btn-primary">View Category</a>            
  
  <form action="{{ route('update.category', $category->id) }}" method="post" enctype="multipart/form-data">
    @csrf

  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $category->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $category->description }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" value="{{ $category->image }}" class="form-control">
                <img src="{{asset('images/category/'.$category->image)}}" class="" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $category->image }}" />
        
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select class="form-control" name="status" class="form-control">
                 <option value="">---Select Status---</option>
                 <option value="1" {{ $category->status ==1 ? 'selected':'' }} >Active</option>
                 <option value="0" {{ $category->status ==0 ? 'selected':'' }} >Inactive</option>
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
