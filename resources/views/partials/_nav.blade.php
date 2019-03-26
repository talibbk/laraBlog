 <!-- Default Bootstrap Navbar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">LaraBlog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
        <a class="nav-link" href="/blog">Blog</a>
      </li>
      <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
        <a class="nav-link" href="/contact">Contact</a>
      </li>
    </ul>
    <div class="nav-item dropdown my-2 my-lg-0">
        @guest
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Login/Register
        </a>
        @else
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Hello, {{ Auth::user()->name }}! <span class="caret"></span>
        </a>
        @endguest
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @guest 
          <a class="dropdown-item" href="{{route('login')}}">Login</a>
          <a class="dropdown-item" href="{{route('register')}}">Register</a>
        @else
          <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
          <a class="dropdown-item" href="{{route('categories.index')}}">Categories</a>
          <a class="dropdown-item" href="{{route('tags.index')}}">Tags</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
          @csrf 
          </form>
        </div>
        @endguest
      </div>
  </div>
</nav>