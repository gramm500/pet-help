@extends('layouts.app')

<h2>Sign In</h2>
<form method="POST" action="/login">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>

    <div class="form-group">
        <button style="cursor:pointer" type="submit" class="btn btn-primary">Sign In</button>
    </div>
</form>
<button type="button" onclick="window.location='{{ route("welcome") }}'">Don't have an account? Sign Up</button>