@extends('master')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit object
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
            <form method="post" action="{{ route('items.update', $item->id) }}">
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Object name:</label>
                    <input type="text" class="form-control" name="name" value="{{ $item->name }}" />
                </div>
                <div class="form-group">
                    <label for="description">Object description:</label>
                    <input type="text" class="form-control" name="description" value="{{ $item->description }}" />
                </div>
                <div class="form-group">
                    <label for="type">Object type:</label>
                    <div class="type-options">
                        <div class="type-option">
                            <input type="radio" name="type" value="USER" {{ $item->type == 'USER' ? 'checked' : '' }} />
                            <label for="type">User</label>
                        </div>
                        <div class="type-option">
                            <input type="radio" name="type" value="DEVICE" {{ $item->type == 'DEVICE' ? 'checked' : '' }} />
                            <label for="type">Device</label>
                        </div>
                        <div class="type-option">
                            <input type="radio" name="type" value="SERVER" {{ $item->type == 'SERVER' ? 'checked' : '' }} />
                            <label for="type">Server</label>
                        </div>
                        <div class="type-option">
                            <input type="radio" name="type" value="ENDPOINT" {{ $item->type == 'ENDPOINT' ? 'checked' : '' }} />
                            <label for="type">Endpoint</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('items.index') }}" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>
@endsection