<!DOCTYPE html>
<html>
  <head>
    <title>{{$title}}</title>
    <link rel="icon" type="image/x-icon" href="/Images/favicon2.ico">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet" />
  </head>
  <body>
    <div class="navbar">
    <nav>
      <ul>
        <li><a href="/buses">Home</a></li>
        <li><a href="/buses/create">Add new bus</a></li>
        <li><a href="/buses/about">About</a></li>
        <li style="float:right"> 
          <div class="search-container">
            <form method='POST' action="/bus/search.php">
              @csrf
              @method('SEARCH')
              <input type="text" placeholder="Search:" name="searchbar">
              <button type="submit">&#x1F50E;&#xFE0E;<i class="search"></i></button>
            </form>
          </div>
        </li>
      </ul>
   </nav>
   </div>
    <div style="padding:30px 70px">
      {{$slot}}
    </div>
  </body>
</html>
