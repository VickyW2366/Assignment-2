<x-layout title="Results of Search">
    <h1>Here's what we found</h1>
    <p></p>
    if($buses > 0){
    <table>
        <tr>
        <th>City of Service</th>
        <th>Numberplate</th>
        </tr>
    @foreach ($buses as $bus)
    <tr>
        <td>{{$bus->origin}}</td>
        <td><a href="/buses/{{$bus->id}}">
        {{$bus->numberplate}}</td>
        </a>
      </tr>
      @endforeach
  </table>
    }
    else {  "Your search returned no results, sorry. "; }
</x-layout>
</body>
</html>