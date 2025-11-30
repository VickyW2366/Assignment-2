<x-layout title="Show the details for a bus">
    <h1>{{$bus->chassis}}</h1>
    <p>Status: {{$bus->status->name}}</p>
    <p>Entered service: {{$bus->entered_service}}</p>
    <p>Withdrawn: {{$bus->withdrawn}}</p>
    <p>Numberplate: {{$bus->numberplate}}</p>
    <p>Origin: {{$bus->origin}}</p>
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