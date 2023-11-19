@extends('layoutadmin.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Product</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="products.html" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Name Categogy</label>
                                            <input type="text" onkeyup='ChangeToSlug()' name="cate_Name" id="slug" value="{{ $category->cate_Name }}" class="form-control" placeholder="Name Category">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="title">Slug</label>
                                            <input type="text" name="slug" id="convert_slug" value="{{ $category->slug }}" class="form-control" placeholder="Name Categogy">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary">Update</button>
                            <a href="products.html" class="btn btn-outline-dark ml-3">Cancel</a>
                        </div>
                </div>

                
            </div>
                </form>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@endsection
