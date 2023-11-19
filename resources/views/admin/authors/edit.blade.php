@extends('layoutadmin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create User</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{ route('users.list') }}" class="btn btn-primary">Back</a>
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
                    <div class="card-body">
                        <form action="{{ route('authors.edit',['id'=>$authors->id])}}"  enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name_author" id="name" class="form-control"
                                               value="{{$authors->name_author}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label >Image</label> <br>
                                        <img id="image_preview" src="@if($authors->author_image) {{asset('storage/hinh/'.$authors->author_image)}} @else https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg @endif" style="width: 100px" alt="">
                                        <br>
                                        <input type="file" accept="image/*" id="img" name="author_image" value="{{$authors->author_image}}" class="form-control-file @error('image') is-invalid @enderror">
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="phone">Info</label>
                                        <textarea name="info" id="address" class="form-control" cols="30" rows="5"  >{{$authors->info}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary">Create</button>
                                <a href="{{ route('users.list') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>


@endsection
