@section('content')
<div class="container">
    <div class="col-4 mx-auto shadow p-3">
        <form method="POST" action="{{route('admin.roles.update', $role->id)}}">
            @method('PATCH')
            @csrfp
            <button class="btn btn-success" type="submit">Save</button>
            <a class="btn btn-primary" href="{{route('admin.categories.index')}}">Back</a>
        </form>
    </div>
</div>
@endsection