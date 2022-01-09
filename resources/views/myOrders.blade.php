@extends('layouts.main')
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="rounded">
                <div class="table-responsive table-borderless">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">
                                    <div class="toggle-btn">
                                        <div class="inner-circle"></div>
                                    </div>
                                </th>
                                <th>Image </th>
                                <th> name</th>
                                <th>Payment_Status</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                            @foreach ($myOrders as $order)
                            <tr class="cell-1">
                                <td class="text-center">
                                    <div class="toggle-btn">
                                        <div class="inner-circle"></div>
                                    </div>
                                </td>
                                <td> <img src="{{$order->image}}" alt="" height="50" width="50"> </td>
                                <td>{{$order->name}}</td>

                                <td>@if ($order->payment_status=='pending')
                                
                                    <span class="badge badge-danger">{{$order->payment_status}}</span>

                                    @else
                                    <span class="badge badge-success">{{$order->payment_status}}</span>
                                    @endif
                                </td>
                                <td>Ksh:{{$order->price}}</td>
                            </tr>
                                
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css?family=Assistant');

body {
    background: #eee;
    font-family: Assistant, sans-serif
}

.cell-1 {
    border-collapse: separate;
    border-spacing: 0 4em;
    background: #fff;
    border-bottom: 5px solid transparent;
    background-clip: padding-box
}

thead {
    background: #dddcdc
}

.toggle-btn {
    width: 40px;
    height: 21px;
    background: grey;
    border-radius: 50px;
    padding: 3px;
    cursor: pointer;
    -webkit-transition: all 0.3s 0.1s ease-in-out;
    -moz-transition: all 0.3s 0.1s ease-in-out;
    -o-transition: all 0.3s 0.1s ease-in-out;
    transition: all 0.3s 0.1s ease-in-out
}

.toggle-btn>.inner-circle {
    width: 15px;
    height: 15px;
    background: #fff;
    border-radius: 50%;
    -webkit-transition: all 0.3s 0.1s ease-in-out;
    -moz-transition: all 0.3s 0.1s ease-in-out;
    -o-transition: all 0.3s 0.1s ease-in-out;
    transition: all 0.3s 0.1s ease-in-out
}

.toggle-btn.active {
    background: blue !important
}

.toggle-btn.active>.inner-circle {
    margin-left: 19px
}
</style>    
@endsection

@push('scripts')
<script>
$(document).ready(function(){

$('.toggle-btn').click(function() {
$(this).toggleClass('active').siblings().removeClass('active');
});

});
</script>


    
@endpush