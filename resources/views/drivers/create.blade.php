@extends('admin.index')

@section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Driver</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Driver</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection


@section('content')
    <section class="content" style="height: 100vh">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10" style="margin: auto">
                    <div class="card card-warning" style="width: 60%; margin:auto; border-radius:20px">
                        <div class="card-header">
                            <h3 class="card-title">Add New Driver</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <style>
                            small {
                                color: red;
                            }
                        </style>
                        <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="fname">
                                    @error('fname')
                                        <small> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lname">
                                    @error('lname')
                                        <small> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Licensed No</label>
                                    <input type="text" class="form-control" name="licensed_no">
                                    @error('licensed_no')
                                        <small> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" name="description"></textarea>
                                    @error('description')
                                        <small> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address">
                                    @error('address')
                                        <small> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Images</label>
                                    <div class="input-group">
                                        <input type="file" id="exampleInputFile" name="image_path[]" multiple>
                                        @error('image_path.*')
                                            <small> {{ $message }}</small>
                                        @enderror
                                        @error('image_path')
                                            <small> {{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
