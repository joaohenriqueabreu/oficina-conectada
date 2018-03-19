<!-- Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url', 'Url:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logo_url', 'Logo Url:') !!}
    {!! Form::text('logo_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Encrypt Field -->
<div class="form-group col-sm-6">
    {!! Form::label('encrypt', 'Encrypt:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('encrypt', false) !!}
        {!! Form::checkbox('encrypt', '1', null) !!} 1
    </label>
</div>

<!-- Callback Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('callback_url', 'Callback Url:') !!}
    {!! Form::text('callback_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Public Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('public_token', 'Public Token:') !!}
    {!! Form::text('public_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Private Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('private_token', 'Private Token:') !!}
    {!! Form::text('private_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
