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
  <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Article</h2>  

  <div align="right">
 		<a href="{{ url('article') }}" class="btn btn-success">Back</a>
  </div>

  @if($errors->any())
  <div class="alert alert-danger">
  	<ul>
	  @foreach($errors->all() as $error)
	  		<li>{{ $error }}</li>
	  @endforeach
	</ul>
  </div>
  @endif

  <form action="{{ route('store.article') }}" method="post" enctype="multipart/form-data">
  	@csrf

  	<div class="row">
  		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" id="title" name="title" class="form-control" placeholder="Title">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Slug:</strong>
                <input type="text" id="slug" name="slug" class="form-control" placeholder="Slug">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea name="description" id="description" class="form-control" placeholder="Description" rows="10" cols="80" ></textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status" class="form-control">
                	<option value="">Select Status</option>
                	<option value="1">Active</option>
                	<option value="0">Inactive</option>
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image[]" multiple class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
               
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        </div>
  	</div>
  </form>
</div>


<script type="text/javascript">
  $('#title').on('keyup', function() {
    var theTitle = this.value.toLowerCase().trim();
    slugInput = $('#slug'),
    theSlug = theTitle.replace(/&/g, '-and-')
    .replace(/[^a-z0-9-]+/g, '-')
    .replace(/\-\-+/g, '-')
    .replace(/^-+|-+&/g, '');
    slugInput.val(theSlug);
  });
</script>

<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .then( editor => {
        editor.ui.view.editable.element.style.height = '300px';
         } )
        .catch( error => {
            console.error( error );
        } );
        
</script>

</body>
</html>


