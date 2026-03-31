@extends('layouts.app')
@section('content')
<div class="card mb-4">
    <div class="card-header bg-success text-white">Add Student</div>
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="row g-3">
                <div class="col-md-4"><input type="text" name="student_id_no" class="form-control" placeholder="ID No." required></div>
                <div class="col-md-4"><input type="text" name="firstname" class="form-control" placeholder="First Name" required></div>
                <div class="col-md-4"><input type="text" name="lastname" class="form-control" placeholder="Last Name" required></div>
            </div>
            <button type="submit" class="btn btn-success mt-3">Save</button>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-header bg-primary text-white">Student List</div>
    <div class="card-body">
        <table class="table table-hover">
            <thead><tr><th>ID</th><th>Name</th><th>Action</th></tr></thead>
            <tbody>
                @foreach($students as $s)
                <tr>
                    <td>{{ $s->student_id_no }}</td>
                    <td>{{ $s->firstname }} {{ $s->lastname }}</td>
                    <td>
                        <form action="{{ route('students.delete', $s->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection