    <h2>Create a NEW Project Details</h2>

    <div class="form-group">
        {{ Form::label('project_detail_new[title]', 'NEW Detail Title: ') }}
        {{ Form::textarea('project_detail_new[title]', Input::old('project_detail_new[title]'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('project_detail_new[description]', 'NEW Detail Description: ') }}
        {{ Form::textarea('project_detail_new[description]', Input::old('project_detail_new[description]'), array('class' => 'form-control dog')) }}
    </div>
