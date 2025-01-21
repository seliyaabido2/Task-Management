<div class="row">
    <div class="form-group col-md-12">
        <label class="form-control-label">Title<span class="vali">*</span></label>
        {!! Form::text('title',isset($task->title) ? $task->title : '', array('placeholder' => 'Title','class'=> 'form-control','id' => 'title'))!!}
    </div>

    <div class="form-group col-md-12">
        <label class="form-control-label">Task Description<span class="vali">*</span></label>
        {!! Form::textarea('description', isset($task->description) ? $task->description : '', array('placeholder' => 'Description', 'class' => 'form-control', 'id' => 'description')) !!}
        <label id="description-error" class="error-description d-none" for="description" style="color: red">Please enter description.</label>
    </div>
    @if (isset($task->id))
    <div class="form-group col-md-12">
        <label class="form-control-label">Status<span class="vali">*</span></label>
        {!! Form::select('status',array('1' => 'Completed', '0' => 'Incomplete'),isset($task->is_completed) ? $task->is_completed : '', array('placeholder' => 'Status','class'=> 'form-control','id' => 'status')) !!}
    </div>
    @endif

</div>

<div class="row mt-5">
    <button class="btn btn-primary mr-1" type="submit">Submit</button>
    <a href="{{ route('task.index') }}" class="btn btn-danger">Cancel</a>
</div>

<script type="text/javascript" src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description');
</script>



