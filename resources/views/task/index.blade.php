@extends('task.layouts.backend')
@section('title', 'Task')
@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3 class="float-left">Task</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active" aria-current="page">Task</li>
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
                        {!! Form::open(array('role'=>'form','id'=>'task-search','name'=>"task-search",'autocomplete' => "off")) !!}
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="form-control-label">Search By Task Status</label>
                                    {!! Form::select('status',array('0' => 'All tasks','1' => 'Completed tasks', '2' => 'Non-completed tasks'),'', array('placeholder' => 'Search Status','class'=> 'form-control select','id' => 'status')) !!}
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
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
                        <div class="row">
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-6">
                                <h3 class="text-white float-right">
                                    <a type="button" href="{{ route('task.create') }}" class="btn btn-primary">
                                        Add Task
                                    </a>
                                </h3>
                            </div>
                        </div>

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

                        <div class="table-responsive table-responsive-data2">
                            <table class="table" id="task-table" style="width: 100% !important">
                                <thead>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Task Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
        $(function(){
            var oTable = $('#task-table').DataTable({
                processing: true,
                serverSide: true,
                searching:false,
                ajax:{
                    url:"{{ route('task.get') }}",
                    type:"POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: function(d){
                        d.status = $('select[name=status]').val();
                    }
                },
                order: [[0, 'DESC']],
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'title', name: 'title'},
                    {data: 'is_completed', name: 'is_completed'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            $(document).on('change','#task-search select' , function(e){
                oTable.draw(true);
                e.preventDefault();
            });

            $(document).on("click",".deleteTask",function () {
                var delete_id = $(this).attr('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ URL::to('task') }}' + '/' + delete_id,
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                            },
                            success:function(result){
                                Swal.fire(
                                    'Deleted!',
                                    'Your record has been deleted.',
                                    'success'
                                )
                                oTable.draw(true);
                            }
                        });
                    }
                })
            });
        });
    </script>
@endpush
