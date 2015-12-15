@extends('crud::layouts.master')

@section('js')
    <script>
        $(function () {
            $('#clone-btn').click(function () {
                $('#template .well').clone().appendTo('#clone-container');
            });

            $('#clone-container').on('click', '.delete-div', function () {
                $(this).parent().parent().parent().remove();
            });

            $('#clone-btn').trigger('click');
        });
    </script>
@endsection

@section('content')

    <div class="container">

        <hr>

        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('montoya_generate_path') }}" class="" role="form" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="pwd">Entity name:</label>
                        <input type="text" name="entity" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <a id="clone-btn" class="btn btn-primary pull-right">Agregar campo</a>


                    </div>

                    <br>
                    <br>
                    <br>

                    <div id="clone-container">

                    </div>

                    <hr>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
        </div>
    </div>


    <div id="template" class="hide">
        <div class="well well-sm div-field">

            <div class="row">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="pwd">Field name:</label>
                        <input type="text" name="fields[]" class="form-control" required>
                    </div>
                </div>

                <div class="col-lg-2">
                    <label for="pwd"> Data type:</label>
                    <select name="columnTypes[]" class="form-control" required>
                        <option value="">Select...</option>
                        @foreach($columnTypes as $columnType)
                            <option value="{{ $columnType }}">
                                {{ $columnType }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-lg-2">
                    <label for="pwd">Data type parameters:</label>
                    <input type="text" name="params[]" class="form-control">
                </div>
                <div class="col-lg-5">
                    <label for="pwd">Validation rules:</label>
                    <input type="text" name="rules[]" class="form-control" placeholder="Ej: required|date|after:tomorrow">
                </div>

            </div>

            <div class="row">

                <div class="col-lg-12">
                    <label for="pwd">Custom messages:</label>
                    <textarea name="messages[]" rows="4" class="form-control"></textarea>

                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-lg-12">
                    <a class="btn btn-danger pull-right delete-div">Eliminar campo</a>
                </div>
            </div>

        </div>
    </div>

@endsection