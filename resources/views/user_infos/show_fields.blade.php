<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $userInfos->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $userInfos->name !!}</p>
</div>

<!-- Phonr Field -->
<div class="form-group">
    {!! Form::label('phonr', 'Phonr:') !!}
    <p>{!! $userInfos->phonr !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $userInfos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $userInfos->updated_at !!}</p>
</div>

