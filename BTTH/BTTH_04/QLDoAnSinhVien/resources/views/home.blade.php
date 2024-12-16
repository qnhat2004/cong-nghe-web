@extends('index')

@section('content')
<div class="container">
    <a class="btn btn-primary mt-2 mb-2" href="{{ route('create') }}">Add Issue</a>
    <table class="table table-bordered table-hover">
        @php
            $columns = [
                'Mã vấn đề',
                "Tên máy tính",
                'Tên phiên bản',
                'Người báo cáo sự cố',
                'Thời gian báo cáo',
                'Mức độ sự cố',
                'Trạng thái hiện tại'
            ]
        @endphp
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th>{{ $column }}</th>
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($issues as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->computer->computer_name }}</td>
                    <td>{{ $i->computer->model }}</td>
                    <td>{{ $i->reported_by }}</td>
                    <td>{{ $i->reported_date }}</td>
                    <td>{{ $i->urgency }}</td>
                    <td>{{ $i->status }}</td>
                    <td class="d-flex">
                        <a class="btn btn-primary" href="{{ route('edit', parameters: $i->id) }}">Edit</a>
                        <form action="{{ route('destroy', $i->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this issue?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $issues->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection