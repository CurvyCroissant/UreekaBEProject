@extends('layouts.main')


@section('container')
<h1 class="mb-4">Registration Page</h1>

<form action = "/register" method = "POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name = "name" value = "{{ old('name') }}" placeholder="Enter your full name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name = "email" value = "{{ old('email') }}" placeholder="Enter your email">
      @error('email')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name = "password" value = "{{ old('password') }}" placeholder="Enter your password">
      @error('password')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label for="phone" class="form-label">Phone Number</label>
      <input type="text" class="form-control" id="phone" name = "phone" value = "{{ old('phone') }}" placeholder="Enter your phone number">
      @error('phone')
      <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection