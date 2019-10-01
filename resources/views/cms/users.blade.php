<div class="row">
        <div class="col-auto col-md-3 mr-auto">
            <h3>Users:</h3>
        </div>
        <hr>
    </div>
    <hr> @foreach($users as $user)
    <div class="row">
        <div class="col-auto col-md-3 mr-auto">
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#USR{{$user->id}}"><i class="far fa-user"></i> {{$user->name}}</button>
        </div>
        <div class="col-auto">
            <span class="badge badge-pill badge-success"><h6>{{$user->type}}</h6></span>
        </div>
    </div>
    <hr>
    <div class="modal fade" id="USR{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$user->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card mb-4 box-shadow">
                        <div class="card-body">
                            <h3 class="card-text text-center">
                                <span class="badge badge-pill badge-dark">Type: {{$user->type}}</span>
                            </h3>
                            <hr>
                            <div class="text-center">
                                    <div class="row">
                                            <p class="col-md-6">Account made:</p> <p class="col-md-6">{{$user->created_at->diffForHumans()}}</p>
                                    </div>   
                                    <div class="row">
                                            <p class="col-md-6">Email:</p> <p class="col-md-6"><a href="mailto:{{$user->email}}">{{$user->email}}</a></p>
                                    </div> 
                                    <div class="row">

                                            <form class="col-md-12" method="POST" action="/cms/type/{{$user->id}}">
                                                {{csrf_field()}}
                                                <label class="text-center" for="type">User type:</label>
                                                <select class="custom-select" name="type" required>
                                                    <option selected value ="">Set user type</option>
                                                    <option value="Admin">Administrator</option>
                                                    <option value="Customer">Customer</option>
                                                </select>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>         
                        <button type="submit" class="btn btn-danger">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach