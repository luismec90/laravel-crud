@extends('crud::layouts.master')

@section('content')

    <div class="container">

        <hr>

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('montoya_generate_path') }}" class="" role="form" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="pwd">Entity name:</label>
                        <input type="text" name="entity" class="form-control" id="entity">
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

@endsection