<x-layout title="Edit a bus">
  <h1>Edit the details for {{$bus->title}}</h1>
  <span class="required">(*) Indicates a required field</span>
  <p></p>

@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li><br>
            @endforeach
        </ul>
    </div>
@endif

    <form action="/buses" method="POST">
    @csrf
    @method('PATCH')
    <!--A hidden field contains the id number of the bus -->
    <input type="hidden" name="id" value="{{$bus->id}}">
    <div>
    <!-- The text boxes are populated with values from the database ready for the user to edit -->
        <br>
        <label for="chassis">Chassis:</label>
        <input type="text" id="chassis" name="chassis" value="{{$bus->chassis}}">
        <span class="required">*</span>
        <p></p>
    </div>
    <div>
        <label for="entered_service">Entered service:</label>
        <input type="text" placeholder="YYYY:" id="entered_service" name="entered_service" value="{{$bus->entered_service}}">
        <span class="required">*</span>
        <p></p>
    </div>
    <div>
        <label for="withdrawn">Withdrawn from service:</label>
        <input type="text" placeholder="YYYY:" id="withdrawn" name="withdrawn" value="{{$bus->withdrawn}}">
        <span class="required">*</span>
        <p></p>
    </div>
    <div>
        <label for="numberplate">Numberplate:</label>
        <input type="text" id="numberplate" name="numberplate" value="{{$bus->numberplate}}">

        <input type="checkbox" id="numberplate" name="numberplate" value="Unregistered">
        <label for="numberplate">Unregistered</label><br>
        <p></p>
    </div>   
    <div>
        <label for="origin">Origin:</label>
        <input type="text" id="origin" name="origin" value="{{$bus->origin}}">
        <span class="required">*</span>
        <p></p>
    </div>

<div>
  <fieldset>
    <legend>Select the Status of your bus:<span class="required">*</span></legend>
    @foreach ($statuses as $status)
    <label for="{{$status->name}}">
      <input
        type="radio"
        name="status_id"
        id="{{$status->name}}"
        value="{{$status->id}}"/>
      {{$status->name}}
    </label>
    @endforeach
  </fieldset>
</div>

    <div class="submit">
      <button type="submit">Save Changes</button>
    </div>
  </form>
</x-layout>