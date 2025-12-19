<x-layout title="Status">
  <h1>The different statuses of the buses explained</h1>
  <p>Listed alongside other information is the status of a bus, which will be either Currently running, 
    Maintenance needed, In storage, On loan, or Static. Below all the meanings of the different 
    statuses are listed.</p>

@foreach ($statuses as $status)
<div>
<h2>{{$status->name}}</h2>
<p>{{$status->description}}</p>
</div>
@endforeach

</x-layout>