@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f4f3fb;
    }

    /* PAGE HEADER */
    .page-header {
        margin-bottom: 24px;
    }
    .page-header h4 {
        font-size: 20px;
        font-weight: 800;
        color: #2d1b5e;
        margin-bottom: 4px;
    }
    .page-header p {
        font-size: 13px;
        color: #9d8cc4;
        margin: 0;
    }

    /* CARDS */
    .ob-card {
        border: 1px solid #ede8f8;
        border-radius: 18px;
        background: #fff;
        box-shadow: 0 8px 24px rgba(118, 75, 162, 0.06);
        margin-bottom: 24px;
        overflow: hidden;
    }
    .ob-card-header {
        padding: 16px 24px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .ob-card-header span {
        font-size: 14px;
        font-weight: 700;
        color: #fff;
        letter-spacing: 0.2px;
    }
    .ob-card-header i {
        color: rgba(255,255,255,0.8);
        font-size: 15px;
    }
    .ob-card-body {
        padding: 24px;
    }

    /* FORM */
    .form-control {
        border: 1px solid #e0d9f5;
        border-radius: 10px;
        padding: 10px 14px;
        font-size: 13.5px;
        color: #2d1b5e;
        background: #faf8ff;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus {
        border-color: #764ba2;
        box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.12);
        background: #fff;
        outline: none;
    }
    .form-control::placeholder {
        color: #b8add8;
        font-size: 13px;
    }

    .btn-save {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: #fff;
        padding: 10px 28px;
        border-radius: 10px;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        box-shadow: 0 4px 14px rgba(118, 75, 162, 0.25);
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 7px;
    }
    .btn-save:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 18px rgba(118, 75, 162, 0.35);
        color: #fff;
    }

    /* TABLE */
    .ob-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13.5px;
    }
    .ob-table thead tr {
        border-bottom: 2px solid #ede8f8;
    }
    .ob-table th {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #9d8cc4;
        padding: 10px 14px;
        text-align: left;
    }
    .ob-table tbody tr {
        border-bottom: 1px solid #f4f0fc;
        transition: background 0.15s;
    }
    .ob-table tbody tr:last-child {
        border-bottom: none;
    }
    .ob-table tbody tr:hover {
        background: #faf8ff;
    }
    .ob-table td {
        padding: 13px 14px;
        color: #3d2b6e;
        vertical-align: middle;
    }

    /* ID BADGE */
    .id-badge {
        display: inline-block;
        background: #f0ebff;
        color: #5b2d9e;
        font-size: 12px;
        font-weight: 600;
        padding: 3px 10px;
        border-radius: 6px;
        letter-spacing: 0.3px;
    }

    /* STUDENT AVATAR */
    .student-name {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .student-avatar {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 700;
        color: #fff;
        flex-shrink: 0;
    }

    /* DELETE BUTTON */
    .btn-delete {
        background: #fff0f0;
        border: 1px solid #ffd5d5;
        color: #c0392b;
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 5px;
    }
    .btn-delete:hover {
        background: #ffe0e0;
        border-color: #ffb3b3;
        color: #a93226;
    }

    /* EMPTY STATE */
    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #b8add8;
    }
    .empty-state i {
        font-size: 40px;
        margin-bottom: 12px;
        opacity: 0.4;
    }
    .empty-state p {
        font-size: 13px;
    }
</style>

<div class="container-fluid py-4 px-4">

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <h4><i class="fas fa-users me-2" style="color:#764ba2;"></i> Student Management</h4>
        <p>Add and manage enrolled students in the system.</p>
    </div>

    {{-- ADD STUDENT FORM --}}
    <div class="ob-card">
        <div class="ob-card-header">
            <i class="fas fa-user-plus"></i>
            <span>Add New Student</span>
        </div>
        <div class="ob-card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="student_id_no" class="form-control" placeholder="ID No. (e.g. 2026-0001)" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
                    </div>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn-save">
                        <i class="fas fa-save"></i> Save Student
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- STUDENT LIST --}}
    <div class="ob-card">
        <div class="ob-card-header">
            <i class="fas fa-list"></i>
            <span>Student List</span>
        </div>
        <div class="ob-card-body" style="padding: 0;">
            @if($students->count() > 0)
            <table class="ob-table">
                <thead>
                    <tr>
                        <th style="padding-left:24px;">Student ID</th>
                        <th>Full Name</th>
                        <th style="text-align:right; padding-right:24px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $s)
                    <tr>
                        <td style="padding-left:24px;">
                            <span class="id-badge">{{ $s->student_id_no }}</span>
                        </td>
                        <td>
                            <div class="student-name">
                                <div class="student-avatar">
                                    {{ strtoupper(substr($s->firstname, 0, 1)) }}{{ strtoupper(substr($s->lastname, 0, 1)) }}
                                </div>
                                {{ $s->firstname }} {{ $s->lastname }}
                            </div>
                        </td>
                        <td style="text-align:right; padding-right:24px;">
                            <form action="{{ route('students.delete', $s->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="empty-state">
                <i class="fas fa-user-slash"></i>
                <p>No students found. Add a student above to get started.</p>
            </div>
            @endif
        </div>
    </div>

</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection