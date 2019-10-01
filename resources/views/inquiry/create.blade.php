@extends ('layouts.master') 
@section ('content')
<div class="container products">
<h1>Contact us</h1>
<hr>
<form method="POST" action="/inquiry/new" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="Name">Topic:</label>
        <input type="text" class="form-control" name="title" required placeholder="Subject" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="desc">Content:</label>
        <textarea name="body" id="" cols="30" rows="10" class="form-control" required>{{ old('body') }}</textarea>
    </div>
    <hr>
    <h1>Your contact details:</h1>
    <hr>
    <div class="form-group">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" name="name" required placeholder="John doe" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="Email">Email:</label>
        <input type="email" class="form-control" name="email" required placeholder="John.doe@manydoes.com" value="{{ old('email') }}">
    </div>
    <div class="form-group">
        <label for="number">Phone number:</label>
        <input type="text" class="form-control" name="phone" required placeholder="987/654-32-10" value="{{ old('phone') }}">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@stop