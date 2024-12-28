@extends('layout')

@section('content')
<a class="btn btn-primary mb-2" href="{{ route('borrows.create') }}" data-bs-toggle="tooltip" data-bs-placement="top"
    title="Add new"><i class="fa-solid fa-circle-plus"></i> Add New</a>
<div class="table-responsive card">
    <table class="table table-bordered table-striped table-hover">
        <thead class="thead-dark">
            @php
                $columns = [
                    'Id',
                    'Reader',
                    'Book',
                    'Borrow Date',
                    'Return Date',
                    'Status',
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
            @foreach($borrows as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ $i->reader->name }}</td>
                    <td>{{ $i->book->name }}</td>
                    <td>{{ $i->borrow_date }}</td>
                    <td>{{ $i->return_date }}</td>
                    <td>{{ $i->status }}</td>
                    <td class="">
                        <div class="btn-group" role="group">
                            <a href="{{ route('borrows.edit', $i->id) }}" 
                               class="btn btn-sm btn-primary me-2" 
                               data-bs-toggle="tooltip"
                               data-bs-placement="top" 
                               title="Edit this">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button" 
                                    class="btn btn-sm btn-danger" 
                                    data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $i->id }}" 
                                    data-bs-placement="top"
                                    title="Delete this">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $i->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Confirmation</h5>
                                        <a type="button" class="btn-close" data-bs-dismiss="modal"></a>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('borrows.destroy', $i->id) }}" method="POST"
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
        {{ $borrows->links('pagination::bootstrap-5') }}
    </nav>
</div>
@endsection