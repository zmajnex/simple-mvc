<?php if(($data!=null)){ echo "<div class='container-fluid mt-2'><div class='alert alert-warning text-center'>
<p>$data</p>
</div>
</div>";}; ?>
<div class="container-fluid mt-4 pt-4">
<div class="row justify-content-md-center">

<form action="store" method="post">
<div class="form-group">
    <h3 class="text-center text-light p-2 bg-success">Create new post</h3>
  </div>
  <div class="form-group">
    <label>Post title</label>
    <input type="text" class="form-control" name="title"  placeholder="Enter title">    
  </div>
  <div class="form-group">
    <label >Enter text</label> 
    <textarea type="text" class="form-control" name="body" id="exampleInputPassword1" placeholder="Your text"></textarea>
  </div>
  <div class="form-group">
    <label>Your name</label>
    <input type="text" class="form-control" name="author"  placeholder="Enter your name">    
  </div>
  <button type="submit" class="btn btn-danger mt-2">Submit post</button>
</form>
</div>
</div>