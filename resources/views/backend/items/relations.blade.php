@extends('master')

@section('header')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/relations.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="card object-data">
        <div class="card-header">
            Object data
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
            <label for="name">Name:</label> {{ $item->name }}<br />
            <label for="description">Description:</label> {{ $item->description }}<br />
            <label for="type">Type:</label> {{ $item->type }}<br />
            <label for="type">Serialized object:</label> {{ $item->toJson() }}
        </div>
    </div>

    <br />

    <div class="card object-relations">
        <div class="card-header">
            Related objects <span style="font-style: italic; font-size: 1.2rem;">(Not implemented. Sample data)</span>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Object ID</td>
                    <td>Name</td>
                    <td>Type</td>
                    <td colspan="3">Action</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="id-col">{{ $item->id }}</td>
                    <td class="name-col">{{ $item->name }}</td>
                    <td class="type-col">{{ $item->type }}</td>
                    <td class="button-col">
                        <form action="{{ route('items.destroyRelation', $item->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" disabled>Delete</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="id-col">{{ $item->id+1 }}</td>
                    <td class="name-col">{{ $item->name }}</td>
                    <td class="type-col">{{ $item->type }}</td>
                    <td class="button-col">
                        <form action="{{ route('items.destroyRelation', $item->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" disabled>Delete</button>
                        </form>
                    </td>
                </tr>
                <tr>
                    <td class="id-col">{{ $item->id+2 }}</td>
                    <td class="name-col">{{ $item->name }}</td>
                    <td class="type-col">{{ $item->type }}</td>
                    <td class="button-col">
                        <form action="{{ route('items.destroyRelation', $item->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger" type="submit" disabled>Delete</button>
                        </form>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <br />

    <div class="card add-relation">
        <div class="card-header">
            Add relation <span style="font-style: italic; font-size: 1.2rem;">(Not implemented. Sample data)</span>
        </div>
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Relate to:</label> <span style="font-style: italic; font-size: 1.2rem;">(Only possible parent/child objects are listed)</span>
                    <select class="form-control" name="items">
                        <option>Pc 1 (DEVICE)</option>
                        <option>Pc 2 (DEVICE)</option>
                        <option>Tablet 1 (DEVICE)</option>
                        <option>Server A (SERVER)</option>
                    </select>
                </div>

                <a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
@endsection