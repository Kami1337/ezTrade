<div class="row">
        <div class="col-auto col-md-3 mr-auto">
            <h3>Completed inquiries</h3>            
        </div>
        <hr>
        <div class="col-auto">
            <span class="badge badge-pill badge-success"><h4>{{$comInqTotal}}</h4></span>
        </div>
    </div>
    <hr> @foreach($comInq as $inq)
    
    <div class="row">
        <div class="col-auto col-md-3 mr-auto">
            <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#INQ{{$inq->id}}"><i class="far fa-question-circle"></i> {{$inq->title}}</button>
            
        </div>
        <div class="col-auto">
    
            {{$inq->updated_at->diffForHumans()}}
            <i class="fas fa-check badge-success"></i>
        </div>
    </div>
    <hr>
    <div class="modal fade" id="INQ{{$inq->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLongTitle">Inquiry completed {{$inq->updated_at->diffForHumans()}} by 
                        <a href="mailto:{{$inq->user->email}}">{{$inq->user->name}}</a></h6>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                            <div class="row">
                                <p class="col-md-6"> Name: </p>
                                <p class="col-md-6"> {{$inq->name}} </p>
                            </div>
                            <div class="row">
                                    <p class="col-md-6"> Email: </p>
                                    <p class="col-md-6"> <a href="mailto:{{$inq->email}}">{{$inq->email}}</a></p>
                            </div>
                            <div class="row">
                                    <p class="col-md-6"> Phone: </p>
                                    <p class="col-md-6"> {{$inq->phone}} </p>
                            </div>
                            <div class="row">
                                    <p class="col-md-6"> Subject: </p>
                                    <p class="col-md-6"> {{$inq->title}} </p>
                            </div>
                            <hr>
                
                                    <div class="row">
                                    <p class="col-md-12"> {{$inq->body}} </p>
                                    </div>
                    </div>
                <div class="modal-footer">         
                  
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    @endforeach