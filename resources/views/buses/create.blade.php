<x-layout title="Add new bus">
  <h1>Add a new bus</h1>
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

  <form method="POST" class="formBox" action="/buses">
    @csrf
    <div>
      <br>
      <label for="chassis">Chassis:</label>
      <input type="text" id="chassis" name="chassis" value="{{ old('chassis') }}"/>
      <span class="required">*</span>
      <p></p>
    </div>
    <div>
      <label for="entered_service">Entered service:</label>
      <input type="text" placeholder="YYYY:" id="entered_service" name="entered_service" value="{{ old('entered_service') }}"/>
      <span class="required">*</span>
      <p></p>
    </div>
    <div>
      <label for="withdrawn">Withdrawn from service:</label>
      <input type="text" placeholder="YYYY:" id="withdrawn" name="withdrawn" value="{{ old('withdrawn' ) }}"/>
      <span class="required">*</span>
      <p></p>
    </div>
    <div>
      <label for="numberplate">Numberplate:</label>
      <input type="text" id="numberplate" name="numberplate" value="{{ old('numberplate') }}"/>

      <input type="checkbox" id="numberplate" name="numberplate" value="Unregistered">
      <label for="numberplate">Unregistered</label><br>
      <p></p>
    </div>
    <div>
      <label for="origin">Origin:</label>
      <input type="text" id="origin" name="origin" value="{{ old('origin') }}"/>
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
      <button type="submit">Save the bus</button>
    </div>
  </form>
</x-layout>