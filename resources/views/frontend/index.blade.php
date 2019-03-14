@extends('master')

@section('header')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <style>
        div.gui {
            display: block;
            float: left;
            padding: 0;
            margin: 5px;
        }

        div.gui input#name, div.gui a.search-button {
        }
    </style>

    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif

    <div class="gui card object-search col-3">
        <div class="card-header">
            Search <span style="font-style: italic; font-size: 1.2rem;">(Not implemented)</span>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Search object:</label>

                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <a href="{{ route('items.create') }}" class="btn btn-primary search-button">Search</a>
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label for="results">Results
                    <select name="results" size="5" style="width: 100%;">
                        <option selected>Pc 1 (DEVICE)</option>
                        <option>Pc 2 (DEVICE)</option>
                        <option>Pc 3 (DEVICE)</option>
                    </select>
                </label>
            </div>
        </div>
    </div>

    <div class="gui card object-data col-8">
        <div class="card-header">
            {{ $items[0]->name }} ({{$items[0]->type}}) <span style="font-style: italic; font-size: 1.2rem;">(Not implemented. Sample data)</span>
        </div>
        <div class="card-body">
            {{ $items[0]->description }}
        </div>
    </div>

    <div class="gui card object-relations col-8">
        <div class="card-header">
            Related objects <span style="font-style: italic; font-size: 1.2rem;">(Not implemented. Sample data)</span>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Type</td>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                        <td class="name-col">{{ $item->name }}</td>
                        <td class="description-col">{{ $item->description }}</td>
                        <td class="type-col">{{ $item->type }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection