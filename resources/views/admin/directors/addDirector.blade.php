@extends('admin.layouts.master')

@section('title', 'Add Director')

@section('styles')
<style>
.required {
    color: red;
}
</style>
@vite([])
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add New Director</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Directors</a></li>
                        <li class="breadcrumb-item active">Add Director</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.add.director') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-6 col-12">
                                        <label for="name">Director Name<span class="required">*</span></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Director Name">
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="image">Director Image<span class="required">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image"
                                                accept="image/*">
                                            <label class="custom-file-label" for="image">Choose
                                                Director Image</label>
                                        </div>
                                        <p id="image-name" class="mt-3"></p>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Add New Director</button>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@stop

@section('scripts')
<script>
$(document).ready(function() {
    $('#image').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
        $('#image-name').text('Selected Image: ' + fileName);
    });
});
</script>
@vite([])
@stop