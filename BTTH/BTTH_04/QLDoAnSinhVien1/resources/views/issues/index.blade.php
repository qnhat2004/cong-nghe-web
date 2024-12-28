@extends('layout')

@section('content')
<a class="btn btn-primary mb-2" href="{{ route('issues.create') }}" data-bs-toggle="tooltip" data-bs-placement="top"
    title="Add new"><i class="fa-solid fa-circle-plus"></i> Add New</a>
<div class="table-responsive card">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark text-center">
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
            <tr>
                @foreach ($columns as $c)
                    <th>{{ $c }}</th>
                @endforeach
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($issues as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->computer->computer_name }}</td>
                    <td>{{ $i->computer->model }}</td>
                    <td>{{ $i->reported_by }}</td>
                    <td>{{ $i->reported_date }}</td>
                    <td>{{ $i->urgency }}</td>
                    <td>{{ $i->status }}</td>
                    <td class="d-flex border-0 action-buttons" scope="row">
                        <a href="{{ route('issues.edit', $i->id) }}" class="btn btn-primary" data-bs-toggle="tooltip"
                            data-bs-placement="top" title="Edit this">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $i->id }}" data-bs-toggle="tooltip" data-bs-placement="top"
                            title="Delete this">
                            <i class="fas fa-trash"></i> Delete
                        </button>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $i->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <a type="button" class="btn-close" data-bs-dismiss="modal"></a>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this issue?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('issues.destroy', $i->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end mt-4">
    <nav aria-label="Page navigation">
        {{ $issues->links('pagination::bootstrap-5') }}
    </nav>
</div>
@endsection