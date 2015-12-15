@extends('crud::layouts.master')

@section('content')

    <div class="container">
        <h2>Create</h2>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <form method="POST" action="">

                    <div class="form-group">
                        <label for="name">name:</label>
                        <input id="first_name" type="text" name="name" class="form-control" required="required">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection