<x-layout title="Show the details for a bus">
    <div class="element_container">
    <div class="element1">
        <h1>{{$bus->origin}} {{$bus->numberplate}}</h1>
    </div>
        <table>
    <tr>
        <td>Status:</td>
        <td>{{$bus->status->name}}</td>
    </tr>
    <tr>
        <td>Entered service:</td>
        <td>{{$bus->entered_service}}</td>
    </tr>
    <tr>
        <td>Withdrawn:</td>
        <td>{{$bus->withdrawn}}</td>
    </tr>
    <tr>
        <td>Numberplate:</td>
        <td>{{$bus->numberplate}}</td>
    </tr>
    <tr>
        <td>Chassis:</td>
        <td>{{$bus->chassis}}</td>
    </tr>
    </table>
@can('edit')
<div class="submit">
<a href='/buses/{{$bus->id}}/edit'>
    <button class="btn-group">Edit</button>
</a>
<form method='POST' action='/buses'>
    @csrf
    @method('DELETE')
        <input type="hidden" name="id" value="{{$bus->id}}">
        <button class="btn-group" type='submit'>Delete</button>
</form>
</div>
@endcan
</x-layout>