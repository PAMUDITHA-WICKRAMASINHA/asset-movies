@extends('admin.layouts.master')

@section('title', 'Movies List')

@section('styles')
<!-- Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Duallistbox CSS -->
<link href="https://cdn.rawgit.com/istvan-ujjmeszaros/bootstrap-duallistbox/master/src/bootstrap-duallistbox.css"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
@vite([])
@stop

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create New Movie</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Movies</a></li>
                        <li class="breadcrumb-item active">Add Movie</li>
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
                            <div id="stepper-movie" class="bs-stepper">
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#test-l-1">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger1"
                                            aria-controls="test-l-1">
                                            <span class="bs-stepper-circle">1</span>
                                            <span class="bs-stepper-label">Movie Details</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-2">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger2"
                                            aria-controls="test-l-2">
                                            <span class="bs-stepper-circle">2</span>
                                            <span class="bs-stepper-label">Directors</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-3">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger3"
                                            aria-controls="test-l-3">
                                            <span class="bs-stepper-circle">3</span>
                                            <span class="bs-stepper-label">Top Casts</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-4">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger4"
                                            aria-controls="test-l-4">
                                            <span class="bs-stepper-circle">4</span>
                                            <span class="bs-stepper-label">Categories</span>
                                        </button>
                                    </div>
                                    <div class="bs-stepper-line"></div>
                                    <div class="step" data-target="#test-l-5">
                                        <button type="button" class="step-trigger" role="tab" id="stepper1trigger5"
                                            aria-controls="test-l-5">
                                            <span class="bs-stepper-circle">5</span>
                                            <span class="bs-stepper-label">Languages</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="bs-stepper-content">
                                    <form method="POST" action="{{ route('admin.add.movie') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger1">
                                            <div class="form-group row">
                                                <div class="col-md-6 col-12">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        placeholder="Enter Movie Title">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="duration">Duration</label>
                                                    <input type="text" class="form-control" id="duration"
                                                        name="duration" placeholder="Enter Movie Duration">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="release_date">Release Date</label>
                                                    <input type="text" class="form-control" id="release_date"
                                                        name="release_date" placeholder="Enter Movie Relese Date">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="rate">Rate</label>
                                                    <input type="text" class="form-control" id="rate" name="rate"
                                                        placeholder="Enter Movie Rate">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="trailer">Trailer</label>
                                                    <input type="text" class="form-control" id="trailer" name="trailer"
                                                        placeholder="Enter Movie Trailer">
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label for="image">Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="image"
                                                            name="image">
                                                        <label class="custom-file-label" for="image">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <label>Description</label>
                                                    <textarea class="form-control" rows="3" id="description"
                                                        name="description"
                                                        placeholder="Enter Movie Description ..."></textarea>
                                                </div>

                                            </div>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger2">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($directors) }}"
                                                    name="director[]" id="director">
                                                    @foreach ($directors as $director)
                                                    <option value="{{ $director->id }}">{{ $director->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-3" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger3">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($top_casts) }}"
                                                    name="top_cast[]" id="top_cast">
                                                    @foreach ($top_casts as $top_cast)
                                                    <option value="{{ $top_cast->id }}">{{ $top_cast->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-4" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger4">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($categories) }}"
                                                    name="category[]" id="category">
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->category }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.next()">Next</button>
                                        </div>

                                        <div id="test-l-5" role="tabpanel" class="bs-stepper-pane"
                                            aria-labelledby="stepper1trigger5">
                                            <div class="form-group">
                                                <select multiple="multiple" size="{{ count($languages) }}"
                                                    name="language[]" id="language">
                                                    @foreach ($languages as $language)
                                                    <option value="{{ $language->id }}">{{ $language->language }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <button type="button" class="btn btn-primary"
                                                onclick="stepper1.previous()">Previous</button>
                                            <button class="btn btn-primary" type="submit">Add Movie</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
<script src="/assets/js/addMovie.js"></script>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Duallistbox JS -->
<script
    src="https://cdn.rawgit.com/istvan-ujjmeszaros/bootstrap-duallistbox/master/src/jquery.bootstrap-duallistbox.js">
</script>

<script>
$(document).ready(function() {
    $('#director').bootstrapDualListbox({
        nonSelectedListLabel: 'All Directors',
        selectedListLabel: 'Selected Directors',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });

    $('#top_cast').bootstrapDualListbox({
        nonSelectedListLabel: 'All Top Casts',
        selectedListLabel: 'Selected Top Casts',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });

    $('#category').bootstrapDualListbox({
        nonSelectedListLabel: 'All Categories',
        selectedListLabel: 'Selected Categories',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });

    $('#language').bootstrapDualListbox({
        nonSelectedListLabel: 'All Languages',
        selectedListLabel: 'Selected Languages',
        preserveSelectionOnMove: 'moved',
        moveOnSelect: true, // Move item on selection without button click
        infoText: 'Showing all {0}',
        infoTextEmpty: 'Empty list',
        filterPlaceHolder: 'Filter',
        filterTextClear: 'Show all',
        moveSelectedLabel: 'Move selected',
        moveAllLabel: 'Move all',
        removeSelectedLabel: 'Remove selected',
        removeAllLabel: 'Remove all'
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
@vite([])
@stop