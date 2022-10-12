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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <h2>product</h2>
  <a href="{{ url('product') }}" class="btn btn-primary">View Product</a>            
  
  <form action="{{ route('update.product', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf

  
     <div class="row">

      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <select name="category_id" id="category_id" class="form-control">
                <option value="">-- Select Category --</option>
                @foreach($category as $c)
                	<option value="{{ $c->id }}"  {{ $c->id === $product->category_id ? 'selected'  : '' }}>{{ $c->name }}</option>
                @endforeach
           		</select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subcategory:</strong>
                <select name="subcategory_id" id="subcategory_id" class="form-control">
                <option value="">-- Select Subcategory --</option>
                @foreach($subcategory->subcategory as $sub)
                	<option value="{{ $sub->id }}"  {{ $sub->id === $product->subcategory_id ? 'selected'  : '' }}>{{ $sub->name }}</option>
                @endforeach
           		</select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{ $product->description }}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" value="{{ $product->image }}" class="form-control">
                <img src="{{asset('images/product/'.$product->image)}}" class="" width="100" />
                <input type="hidden" name="hidden_image" value="{{ $product->image }}" />
        
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select class="form-control" name="status" class="form-control">
                 <option value="">---Select Status---</option>
                 <option value="1" {{ $product->status ==1 ? 'selected':'' }} >Active</option>
                 <option value="0" {{ $product->status ==0 ? 'selected':'' }} >Inactive</option>
               </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
               
                  <input type="submit" name="submit" value="Submit">
        </div>
    </div>
   
</form>

<script type="text/javascript">
jQuery(document).ready(function ()
    {
            jQuery('select[name="category_id"]').on('change',function(){
               var categoryID = jQuery(this).val();
               if(categoryID)
               {
                  jQuery.ajax({
                     //url : '/getsubcategory' ,
                     url : "{{ url('/getsubcategory') }}",
                     //url : "post" ,
                     type : "GET",
                     data : {"categoryID":categoryID},
                     dataType : "html",
                     success:function(data)
                     {
                        $("#subcategory_id").html(data);
                     }
                  });
               }
               else
               {
                  $('select[name="subcategory_id"]').empty();
               }
            });
    });

</script>


</div>

</body>
</html>
