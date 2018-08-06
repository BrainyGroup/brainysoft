<div class="blog-masthead">
  <div class="container">
    <nav class="blog-nav">
      <a class="blog-nav-item active" href="#">Home</a>
      <a class="blog-nav-item active" href="#">Users</a>
      <a class="blog-nav-item" href="/employees">Employees</a>
      <a class="blog-nav-item" href="/allowances">Allowances</a>
      <a class="blog-nav-item" href="/deductions">Deductions</a>
      <a class="blog-nav-item" href="/settings">Settings</a>
      <a class="blog-nav-item" href="/reports">Reports</a>

      @if(Auth::check())

      <a class="blog-nav-item" href="#">{{ Auth::user()->name }}</a>

      @endif

    </nav>
  </div>
</div>
