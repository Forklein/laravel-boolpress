@extends('layouts.app')

@section('content')
<div class="container">
    <header>
        <h1>Contact Us</h1>
    </header>
    <section id="form-email">
        <form method="post" action="{{route('contact.send')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                @error('name')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Titolo</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <input type="text" class="form-control @error('message') is-invalid @enderror" id="message" name="message" value="{{old('message')}}">
                @error('message')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </section>
</div>
@endsection