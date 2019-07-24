<form action="{{ route('tasks.store') }}" method="POST" class="horizontal">
    <div class="form-group {{ $errors->has('name') ? 'has-error': '' }} ">
        <label for="name" class="col-sm-3 control-label">Task</label>
        <div class="col-sm-6">
            <input type="text" name="name" id="name" class="form-control">
            @if ($errors->has('name'))
                <div class="help-block">
                    Name is required
                </div>
            @endif
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">Add Task</button>
        </div>
    </div>
    {{ crsf_field() }}
</form>
