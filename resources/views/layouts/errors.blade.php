<div class="notification">
@if (count($errors))
      <div class="form-group">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
      </div>
      @endif
      <div class="form-group">
      @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div> 
    </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div> 
    </div>
        @endif
</div>