<x-layout title="Edit a bus">
  <h1>Edit the details for {{$bus->title}}</h1>
  <span class="required">(*) Indicates a required field</span>
    <p></p>

  <!--Displays an error message if any fields aren't filled in -->
@if ($errors->any())
    <div class="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }} </li><br>
            @endforeach
        </ul>
    </div>
@endif

  <div class="text_fields">
    <form action="/buses" method="POST">
    @csrf
    @method('PATCH')
    <!--A hidden field contains the id number of the bus -->
    <input type="hidden" name="id" value="{{$bus->id}}">
    <div>
    <fieldset>
    <legend>Select the Status of your bus:<span class="required">*</span></legend>
    @foreach ($statuses as $status)
    <label for="{{$status->name}}">
      <input type="radio" name="status_id" id="{{$status->name}}" value="{{$status->id}}"/>
      {{$status->name}}
    </label>
    <br>
    @endforeach
    </fieldset>
    </div>
    <p></p>
    <div>
      <br>
      <label for="chassis">Chassis:</label>
      <br>
      <input type="text" id="chassis" name="chassis" value="{{$bus->chassis}}">
      <span class="required">*</span>
      <p></p>
    </div>
    <div>
      <label for="entered_service">Entered service:</label>
      <br>
      <input type="text" placeholder="YYYY:" id="entered_service" name="entered_service" value="{{$bus->entered_service}}">
      <span class="required">*</span>
      <p></p>
    </div>
    <div>
      <label for="withdrawn">Withdrawn from service:</label>
      <br>
      <input type="text" placeholder="YYYY:" id="withdrawn" name="withdrawn" value="{{$bus->withdrawn}}">
      <span class="required">*</span>
      <p></p>
    </div>
    <div>
      <label for="numberplate">Numberplate:</label>
      <br>
      <input type="text" id="numberplate" name="numberplate" value="{{$bus->numberplate}}">
      <br>
      <input type="checkbox" id="numberplate" name="numberplate" value="Unregistered">
      <label for="numberplate">Unregistered</label><br>
      <p></p>
    </div>   
    <div>
      <label for="origin">City/Town of Origin:</label>
      <br>
      <input type="text" id="origin" name="origin" value="{{$bus->origin}}">
      <span class="required">*</span>
      <p></p>
    </div>
    <div class="submit">
      <button type="submit">Save Changes</button>
    </div>
  </form>
  </div>
</x-layout>