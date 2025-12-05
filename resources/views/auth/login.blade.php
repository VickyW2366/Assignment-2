<x-layout title="Sign In">
  <h1>Sign In</h1>
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
  <form method="POST" action="/login">
    @csrf
    <div>
      
      <label for="email">Email:</label>      
      <span class="required">*</span>
      <input type="text" id="email" name="email"  placeholder="name@email.com" value="{{ old('email') }}" />
    </div>
    <div>
      <label for="password">Password:</label>
      <span class="required">*</span>
      <input type="password" id="password" name="password" value="{{ old('password') }}" />
    </div>
    <div class="submit">
      <button type="submit">Sign in</button>
    </div>
  </form>
  </div>
</x-layout>