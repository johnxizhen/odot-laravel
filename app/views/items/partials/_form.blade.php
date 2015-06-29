{{ Form::label('content', 'Task') }}
{{ Form::text('content') }}
{{ $errors->first('content', '<small class="error">:message</small>') }}
{{ Form::submit('submit', array('class' => 'button')) }}