
<div class="container-fluid mt-4 pt-4">
<div class="row justify-content-md-center">

<form action="edit" method="post">
<div class="form-group">
    <h3 class="text-center text-light p-2 bg-success">Edit post</h3>
  </div>
  <div class="form-group">
    <label>Post title</label>
    <input type="text" class="form-control" name="title"  value=<?php echo "$data->title"?> placeholder="Enter title">    
  </div>
  <div class="form-group">
    <label >Enter text</label> 
    <textarea type="text" class="form-control" name="body" id="exampleInputPassword1" placeholder="Your text">
    <?php echo "$data->body"?>
    </textarea>
  </div>
  <div class="form-group">
    <label>Your name</label>
    <input type="text" class="form-control" name="author" value=<?php echo "$data->author"?> placeholder="Enter your name">    
  </div>
  <input type="hidden" class="form-control" name="id"  value=<?php echo "$data->id"?>>
  <button type="submit" class="btn btn-danger mt-2">Edit post</button>
</form>
</div>
</div>