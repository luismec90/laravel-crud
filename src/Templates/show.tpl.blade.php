@extends('crud::layouts.master')

@section('content')

    <div class="container">
        <h2>Create</h2>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label for="name">name:</label>
                    <input id="first_name" type="text" name="name" class="form-control" required="required">
                </div>
            </div>
        </div>
    </div>

@endsection