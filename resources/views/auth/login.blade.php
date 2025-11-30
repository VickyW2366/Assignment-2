<x-layout title="Sign In">
  <h1>Sign In</h1>
  <span class="required">(*) Indicates a required field</span>
    <p></p>
  <form method="POST" action="/login">
    @csrf
    <div>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" />
      <span class="required">*</span>
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" />
      <span class="required">*</span>
    </div>
    <div class="submit">
      <button type="submit">Sign in</button>
    </div>
  </form>
</x-layout>