<!DOCTYPE HTML>
<html>
<head>
<title>List the buses</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link href="{{asset('css/style.css')}}" type="text/css" rel="stylesheet">
</head>
<body>
<x-layout title="List the buses">
  @auth
    <h1>Here's our full list of buses:</h1>
    <p></p>
    <br>
    <table>
      <tr>
        <th>City of Service</th>
        <th>Numberplate</th>
        <th>Status</th>
      </tr>
      @foreach ($buses as $bus)
      <tr>
          <td>{{$bus->origin}}</td>
          <td><a href="/buses/{{$bus->id}}">
          {{$bus->numberplate}}</td></a>
          <td>{{$bus->status->name}}</td>
      </tr>
      @endforeach
  </table>
   
<div class="pages">
  <a href="{{ $buses->links() }}"></a>
</div>
@endauth @guest
  <p>
    You need to be logged in to view the content of this website. @endguest
  </p>
</x-layout>
</body>
</html>