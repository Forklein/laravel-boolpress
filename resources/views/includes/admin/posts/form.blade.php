@if($post->exists)
<form method="POST" action="{{route('admin.posts.update', $post->id)}}">
@method('PATCH')
@else
<form method="POST" action="{{route('admin.posts.store')}}">
@endif
    @csrf
    <div class="mb-3">
      <label for="title" class="form-label">Titolo</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $post->title)}}">
      @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Descrizione</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5">{{old('content', $post->content)}}</textarea>
        @error('content')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    <div class="mb-3">
        <label for="image" class="form-label">Link Image</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image', $post->image)}}">
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
</form>