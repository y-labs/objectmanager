@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            Add object
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
            <form method="post" action="{{ route('items.store') }}">
                <div class="form-group">
                    {{ csrf_field() }}
                    <label for="name">Object name:</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="form-group">
                    <label for="description">Object description:</label>
                    <input type="text" class="form-control" name="description"/>
                </div>

                <div class="form-group">
                    <label for="type">Object type:</label>
                    <div class="type-options">
                        <div class="type-option">
                            <input type="radio" name="type" value="USER" checked />
                            <label for="type">User</label>
                        </div>
                        <div class="type-option">
                            <input type="radio" name="type" value="DEVICE"/>
                            <label for="type">Device</label>
                        </div>
                        <div class="type-option">
                            <input type="radio" name="type" value="SERVER"/>
                            <label for="type">Server</label>
                        </div>
                        <div class="type-option">
                            <input type="radio" name="type" value="ENDPOINT"/>
                            <label for="type">Endpoint</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection