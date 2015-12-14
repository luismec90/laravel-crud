@extends('crud::layouts.master')

@section('content')

    <div class="container">

        <hr>

        <div class="row">
            <div class="col-lg-12">
                <form class="" role="form">

                    <div class="form-group">
                        <label for="pwd">Entity name:</label>
                        <input type="text" name="entity" class="form-control" id="entity">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Route:</label>
                        <input type="text" name="entity" class="form-control" id="entity">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Route name:</label>
                        <input type="text" name="entity" class="form-control" id="entity">
                    </div>

                    <div class="form-group">
                        <label for="pwd">Controller name:</label>
                        <input type="text" name="entity" class="form-control" id="entity">
                    </div>

                    <div class="form-group">
                        <label for="fields">Fields:</label>
                        <textarea class="form-control" id="fields"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>

@endsection