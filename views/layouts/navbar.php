<nav class="navbar navbar-expand-lg navbar-invert bg-dark">
  <a class="navbar-brand text-light" href="#">MY-MVC</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-light" href="<?=URL?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light" href="<?=URL?>help">Help</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="<?=URL?>login">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-danger" href="<?=URL?>testcontroller/test">Blade</a>
      </li>     
      <li class="nav-item">
        <a class="nav-link text-success" href="<?=URL?>posts/index">Posts</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>