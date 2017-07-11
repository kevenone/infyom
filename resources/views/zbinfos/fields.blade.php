<!-- A1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('a1', 'A1:') !!}
    {!! Form::text('a1', null, ['class' => 'form-control']) !!}
</div>

<!-- A2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('a2', 'A2:') !!}
    {!! Form::number('a2', null, ['class' => 'form-control']) !!}
</div>

<!-- A3 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('a3', 'A3:') !!}
    {!! Form::date('a3', null, ['class' => 'form-control']) !!}
</div>

<!-- Aemail Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aemail', 'Aemail:') !!}
    {!! Form::email('aemail', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('zbinfos.index') !!}" class="btn btn-default">Cancel</a>
</div>
