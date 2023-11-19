@extends('layoutadmin.layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders</h1>
                </div>
                <div class="col-sm-6 text-right">
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <div class="input-group input-group" style="width: 250px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Orders #</th>
                                <th>Customer name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Note</th>
                                <th>Date Purchased</th>
                            </tr>
                        </thead>
                        @foreach ($orders as $item)
                        <tbody>
                            <tr> 
                                <td>{{$item->id}}</td>
                                <td><a href="order-detail.html">{{$item->name}}</a></td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->total}}</td>
                                <td>  
                                       
                                       
                                          <form action="{{ route('order.updateStatus', $item->id) }}" method="post">
                                                @csrf
                                                @method('PUT') 
                                                <input name="status"  type="text" value="{{ $item->status }}"> <button
                                                    class="update" type="submit"><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z" />
                                                        <path
                                                            d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z" />
                                                    </svg></button>
                                            </form>
                                  
                                </td>
                                <td>${{$item->note}}</td>
                                <td>{{$item->date}}</td>
                            </tr>
                         
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination m-0 float-right">
                      <li class="page-item"><a class="page-link" href="#">«</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
@endsection
