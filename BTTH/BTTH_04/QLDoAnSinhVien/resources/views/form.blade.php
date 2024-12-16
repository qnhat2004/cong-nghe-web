@extends('index')

@section('content')
<div class="container mt-4">
    <h2>{{ isset($issue) ? 'Edit Issue' : 'Create New Issue' }}</h2>
    
    <form action="{{ isset($issue) ? route('update', $issue->id) : route('issues.store') }}" method="POST">
        @csrf
        @if(isset($issue))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="computer_id">Select Computer</label>
            <select class="form-control" name="computer_id" required>
                @foreach($computers as $computer)
                    <option value="{{ $computer->id }}" {{ isset($issue) && $issue->computer_id == $computer->id ? 'selected' : '' }}>
                        {{ $computer->computer_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reported_by">Reported By</label>
            <input type="text" class="form-control" name="reported_by" 
                value="{{ isset($issue) ? $issue->reported_by : old('reported_by') }}" required>
        </div>

        <div class="form-group">
            <label for="reported_date">Report Date</label>
            <input type="date" class="form-control" name="reported_date" 
                value="{{ isset($issue) ? date('Y-m-d', strtotime($issue->reported_date)) : old('reported_date') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" required>{{ isset($issue) ? $issue->description : old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="urgency">Urgency</label>
            <select class="form-control" name="urgency" required>
                @foreach(['Low', 'Medium', 'High'] as $urgency)
                    <option value="{{ $urgency }}" {{ isset($issue) && $issue->urgency == $urgency ? 'selected' : '' }}>
                        {{ $urgency }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" required>
                @foreach(['Open', 'In Progress', 'Resolved'] as $status)
                    <option value="{{ $status }}" {{ isset($issue) && $issue->status == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($issue) ? 'Update' : 'Create' }}</button>
        <a href="{{ route('/') }}" class="btn btn-secondary">Cancel</a> 
    </form>
</div>
@endsection