<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <h3>Completed orders</h3>
        
    </div>
    <hr>
    <div class="col-auto">
        <span class="badge badge-pill badge-success"><h4>{{$completedTotal}}</h4></span>
    </div>
</div>
<hr> @foreach($completedOrders as $order)

<div class="row">
    <div class="col-auto col-md-3 mr-auto">
        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#O{{$order->id}}"><?php echo $order->cartData($order->id,'name')?></button>
        
    </div>
    <div class="col-auto">

        {{$order->updated_at->diffForHumans()}}
        <i class="fas fa-check badge-success"></i>
    </div>
</div>
<hr>
<div class="modal fade" id="O{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Order made {{$order->created_at->diffForHumans()}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                  
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Product</p><hr>
                            <p><?php echo $order->cartData($order->id,'name')?></p>
                            </div>
                            <div class="col-md-3">
                                    <p>Quantity</p><hr>
                            <p><?php echo $order->cartData($order->id,'quantity')?></p>
                            </div>
                            <div class="col-md-3">
                                    <p>Price</p><hr>
                            <p><?php echo $order->cartData($order->id,'price')?></p>
                        </div>
                        </div>
                        
                        <hr>
                        <div class="row">
                            <p class="col-md-6"> First name: </p>
                            <p class="col-md-6"> {{$order->first_name}} </p>
                        </div>
                        <div class="row">
                                <p class="col-md-6"> Surname: </p>
                                <p class="col-md-6"> {{$order->last_name}} </p>
                        </div>
                        <div class="row">
                                <p class="col-md-6"> Address: </p>
                                <p class="col-md-6"> {{$order->address}} </p>
                        </div>
                        <div class="row">
                                <p class="col-md-6"> Address 2: </p>
                                <p class="col-md-6"> {{$order->address2}} </p>
                        </div>
                        <div class="row">
                                <p class="col-md-6"> Country: </p>
                                <p class="col-md-6"> {{$order->country}} </p>
                        </div>
                        <div class="row">
                                <p class="col-md-6"> State: </p>
                                <p class="col-md-6"> {{$order->state}} </p>
                        </div>
                        <div class="row">
                                <p class="col-md-6"> Postcode: </p>
                                <p class="col-md-6"> {{$order->zip}} </p>
                        </div>
                        
                    
                </div>
            </div>

            <div class="modal-footer">
                    <h3 class="card-text text-center">
                            <span class="badge badge-pill badge-dark">{{$order->total}}£</span>
                    </h3>
                    <form method="POST" action="/cms/order/complete/{{$order->id}}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="#">
                        <button type="button" class="btn btn-primary">Edit</button>
                    </a>
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-danger"><i class="far fa-check-square"></i> Complete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach