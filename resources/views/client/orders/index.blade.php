@extends('layout.layout')
@section('content')
<!-- Start breadcrumb area -->
<div class="ht__breadcrumb__area bg-image--3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__inner text-center">
                    <h2 class="breadcrumb-title">Order</h2>
                    <nav class="breadcrumb-content">
                        <a class="breadcrumb_item" href="index.html">Home</a>
                        <span class="brd-separator">/</span>
                        <span class="breadcrumb_item active">Order</span>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcrumb area -->
<!-- cart-main-area start -->
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        @if (session('message'))
        <h1 class="text-primary text-center" >{{ session('message') }}</h1>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12">

                <div class="table-content wnro__table table-responsive">
                    <table>
                        <thead>
                            <tr class="title-top">
                                <th class="product-thumbnail">#</th>
                                <th class="product-thumbnail">Name</th>
                                <th class="product-name">Address</th>
                                <th class="product-name">Email</th>
                                <th class="product-price">Phone</th>
                                <th class="product-quantity">Ship</th>
                                <th class="product-subtotal">Total</th>
                                <th class="product-subtotal">Payment</th>
                                <th class="product-subtotal">Date</th>
                                <th class="product-subtotal">Note</th>
                                <th class="product-subtotal">Status</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>${{ $item->address }}</td>
                                <td>{{ $item->email }}</td>
                                <td>${{ $item->phone }}</td>
                                <td>{{ $item->ship }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->payment }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    @if ($item->status == 'Đang xử lý')
                                    <form action="{{ route('client.orders.cancel', $item->id) }}" id="form-cancel{{ $item->id }}" method="post">
                                        @csrf
                                        <button class="btn btn-cancel btn-danger" data-id="{{$item->id}}"> Cancle
                                            Order</button>
                                    </form>
                                    @endif

                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

           

            </div>
        </div>

    </div>
</div>
<!-- cart-main-area end -->
@endsection
@section('script')
<script>
    $(function() {
     $(document).on("click","btn.cancel", function(e) { 
            e.preventDefault();
            let id =$(this).data("id")
            confirmDelete()
         .then(function(){
             $(`form-cancel${id}`).submit();
            })  
         .catch();
     });

     });
    
</script>