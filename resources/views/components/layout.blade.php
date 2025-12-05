<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="/Images/favicon2.ico">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
    @viteReactRefresh
    @vite(['resources/js/app.jsx', 'resources/js/app.js'])
  </head>
  <body>
    <div class="navbar">
    <nav>
      <ul>
        <li><a href="/buses">Home</a></li>
        @can('edit')
        <li><a href="/buses/create">Add new bus</a></li>
        @endcan
        <li><a href="/buses/about">About</a></li>
        <li><a href="/statuses">Status</a></li>
        <li style="float:right"> 
        @auth
      <div class="element_container">
        <div class="element1">Logged in as {{Auth::user()->name}}</div>
        <div class="element2">
          <div class="submit">
            <form method='POST' action='/logout'>
              @csrf
              <button type='submit'>Log out</button>
            </form>
          </div>
        </div>
      </div>
      @endauth
          <div class="sign_in">
            @guest
            <li><a href="/login">Sign in</a></li>
            @endguest
          </div>
        </li>
      </ul>
   </nav>
   </div>
    <div style="padding:60px 70px">
      {{$slot}}
    </div>
    <div id="react-content"></div>
  </body>
</html>
