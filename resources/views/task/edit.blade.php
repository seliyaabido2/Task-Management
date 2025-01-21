@extends('task.layouts.backend')
@section('title', 'Edit Task')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Task</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                   
                    <li class="breadcrumb-item">
                        <a href="{{ route('task.index') }}">Task</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Task</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-body">
                        @if (count($errors) > 0)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible show fade">
                                    <div class="alert-body">
                                        <button class="close" data-dismiss="alert">
                                        <span>&times;</span>
                                        </button>
                                        {{ $error }}
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        {!! Form::model($task, ['method'=>'PATCH','route'=>array('task.update',$task->id),'id'=>'edit_task','autocomplete' =>"off","enctype"=>"multipart/form-data"]) !!}
                            @include('task.form',['form'=>'Edit'])
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/js/additional-methods.min.js') }}"></script>

    <script>
        $('.dropify').dropify();

        $('#edit_task').validate({
            rules: {
                title : {
                    required: true,
                    maxlength :100,
                },
                description : {
                    required: true,
                },
                status : {
                    required: true,
                }
            },
            messages: {
                title : {
                    required : "Please enter Task title.",
                    maxlength : "Please enter no more than 100 characters."
                },
                description : {
                    required : "Please enter description.",
                },
                status:{
                    required: "Please select status",
                }
            },
        });

        $("#edit_task").submit(function(e) {
              var totalcontentlength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if( !totalcontentlength ) {
                $('#description-error').removeClass('d-none');
                e.preventDefault();
            }
        });

        CKEDITOR.instances.body.on('change', function() {
            var totalcontentlength = CKEDITOR.instances['description'].getData().replace(/<[^>]*>/gi, '').length;
            if( !totalcontentlength ) {
                $('#description-error').removeClass('d-none');
            }else{
                $('#description-error').addClass('d-none');
            }
        });
    </script>
@endpush
