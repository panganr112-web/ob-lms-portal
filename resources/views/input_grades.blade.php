@extends('layouts.app')

@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-success text-white">Record Grades</div>
    <div class="card-body p-4">
        @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
        <form action="{{ route('grades.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="fw-bold">Student Name</label>
                    <select name="student_id" class="form-select" required>
                        <option value="" disabled selected>-- Select --</option>
                        @foreach($students as $s)
                            <option value="{{ $s->id }}">{{ $s->full_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="fw-bold">Subject</label>
                    <select name="subject_id" class="form-select" required>
                        @foreach($subjects as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->subject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Term</label>
                    <select name="term" class="form-select" required>
                        <option>Prelim</option><option>Midterm</option><option>Semis</option><option>Final</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Mapping Reference</label>
                    <select name="assessment_id" class="form-select" required>
                        @foreach($assessments as $a)
                            <option value="{{ $a->id }}">{{ $a->name }} ({{ $a->weight }}%)</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="fw-bold">Score</label>
                    <input type="number" name="score" class="form-control" min="0" max="100" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4 fw-bold">Save Grade Record</button>
        </form>
    </div>
</div>
@endsection