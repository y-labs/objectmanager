@extends('master')

@section('header')
    <link href="{{ asset('css/tables.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif
    <a href="{{ route('items.create') }}" class="btn btn-primary create-button">Add object</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Description</td>
            <td>Type</td>
            <td colspan="3">Action</td>
        </tr>
        </thead>
        <tbody>
        @if($items->count() <= 0)
            <tr>
                <td colspan="7" style="text-align: center;">No objects found</td>
            </tr>
        @endif

        @foreach($items as $item)
            <tr>
                <td class="id-col">{{ $item->id }}</td>
                <td class="name-col">{{ $item->name }}</td>
                <td class="description-col">{{ $item->description }}</td>
                <td class="type-col">{{ $item->type }}</td>
                <td class="button-col"><a href="{{ route('items.edit',$item->id) }}" class="btn btn-primary">Edit</a></td>
                <td class="button-col">
                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
                <td class="button-col"><a href="{{ route('items.relations',$item->id) }}" class="btn btn-success">Relations</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection