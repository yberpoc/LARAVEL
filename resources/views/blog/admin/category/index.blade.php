@extends('layouts.app')

@section('content')
    <div>
        <a href="{{ route('blog.admin.categories.create') }}">Добавить</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Категория</th>
                <th>Родитель</th>
            </tr>
        </thead>
        <tbody>
            @foreach($paginator as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        <a href="{{ route("blog.admin.categories.edit", $item->id) }}">
                            {{ $item->parent->id }}
                        </a>
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
