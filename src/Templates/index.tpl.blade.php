@extends('crud::layouts.master')

@section('content')

    <div class="container">
        <h2>upperEntity List
            <small>{{ $lowerPluralEntity->total() }} lowerPluralEntity found</small>
        </h2>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <table>
                    @foreach($lowerPluralEntity as $lowerEntity)
                        <tr>
                            <td>
                                {{ $lowerEntity->id }}
                            </td>
                        </tr>
                    @endforeach
                </table>

                {!! $lowerPluralEntity->render() !!}

            </div>
        </div>
    </div>

@endsection