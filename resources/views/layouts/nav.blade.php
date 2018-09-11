<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">



      @if(Auth::check())

      <a class="blog-nav-item active" href="#">Dashboard</a>
      <a class="blog-nav-item active" href="/users">Users</a>
      <a class="blog-nav-item" href="/employees">Employees</a>
      <a class="blog-nav-item" href="/pays">Earning</a>
      <a class="blog-nav-item" href="#">Report</a>
      <a class="blog-nav-item" href="/settings">Settings</a>

      <a class="blog-nav-item" href="/settings">Help</a>


      <a class="blog-nav-item pull-right" href="#">{{ Auth::user()->name }}</a>

      <a class="blog-nav-item pull-right" href="/logout">Logout</a>

      @endif



    </nav>
  </div>
</div>
