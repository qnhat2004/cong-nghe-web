@extends('layout')

@section('content')
<div class="container mt-4 w-70">
    <h2 class="mb-3">{{ isset($borrow) ? 'Edit borrow' : 'Create New borrow' }}</h2>

    <form action="{{ isset($borrow) ? route('borrows.update', $borrow->id) : route('borrows.store') }}"
        method="POST">
        @csrf
        @if(isset($borrow))
            @method('PUT')
        @else
            @method('POST')
        @endif

        <div class="form-group">
            <label for="reader_id">Select Reader</label>
            <select class="form-control @error('reader_id') is-invalid @enderror" name="reader_id" required>
                @foreach($readers as $reader)
                    <option value="{{ $reader->id }}" {{ isset($borrow) && $borrow->reader_id == $reader->id ? 'selected' : '' }}>
                        {{ $reader->name }}
                    </option>
                @endforeach
            </select>
            @error('reader_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="book_id">Select Book</label>
            <select class="form-control @error('book_id') is-invalid @enderror" name="book_id" required>
                @foreach($books as $book)
                    <option value="{{ $book->id }}" {{ isset($borrow) && $borrow->book_id == $book->id ? 'selected' : '' }}>
                        {{ $book->name }}
                    </option>
                @endforeach
            </select>
            @error('book_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="borrow_date">borrow Date</label>
            <input type="date" class="form-control @error('borrow_name') is-invalid @enderror" name="borrow_date"
                value="{{ isset($borrow) ? $borrow->borrow_date : old('borrow_date') }}" required>
            @error('borrow_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="return_date">Return Date</label>
            <input type="date" class="form-control @error('borrow_name') is-invalid @enderror" name="return_date"
                value="{{ isset($borrow) ? $borrow->borrow_date : old('borrow_date') }}" required>
            @error('borrow_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control @error('status') is-invalid @enderror" name="status" required>
                <option value="Borrowed" {{ isset($borrow) && $borrow->status == 'Borrowed' ? 'selected' : '' }}>Borrowed</option>
                <option value="Returned" {{ isset($borrow) && $borrow->status == 'Returned' ? 'selected' : '' }}>Returned</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2 mb-2">{{ isset($borrow) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection