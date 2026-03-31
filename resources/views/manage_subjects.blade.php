@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    
    <div class="card mb-4 border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-header bg-success text-white fw-bold" style="border-radius: 15px 15px 0 0;">
            <i class="fa-solid fa-plus-circle me-2"></i> Add New Subject
        </div>
        <div class="card-body p-4">
            <form action="{{ route('subjects.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="small fw-bold text-muted">Subject Code</label>
                        <input type="text" name="subject_code" class="form-control" placeholder="e.g. CSE17" required>
                    </div>
                    <div class="col-md-5">
                        <label class="small fw-bold text-muted">Subject Name</label>
                        <input type="text" name="subject_name" class="form-control" placeholder="e.g. Information Assurance and Security" required>
                    </div>
                    <div class="col-md-5">
                        <label class="small fw-bold text-muted">Instructor Name</label>
                        <input type="text" name="instructor" class="form-control" placeholder="e.g. JANN ALFRED QUINTO, MSIB" required>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="submit" class="btn btn-success px-4 fw-bold">
                        <i class="fa-solid fa-save me-2"></i> Save Subject
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card border-0 shadow-sm" style="border-radius: 15px;">
        <div class="card-header bg-primary text-white fw-bold" style="border-radius: 15px 15px 0 0;">
            <i class="fa-solid fa-list me-2"></i> Subject List
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr class="text-uppercase small fw-bold">
                            <th class="ps-4">Code</th>
                            <th>Subject Name</th>
                            <th>Instructor</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subjects as $sub)
                        <tr>
                            <td class="ps-4 fw-bold text-primary">{{ $sub->subject_code }}</td>
                            <td>{{ $sub->subject_name }}</td>
                            <td class="text-muted">{{ $sub->instructor ?? 'Not Assigned' }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-outline-primary fw-bold px-3 me-1" data-bs-toggle="modal" data-bs-target="#editModal{{ $sub->id }}">
                                    <i class="fa-solid fa-pen-to-square me-1"></i> Edit
                                </button>

                                <form action="{{ route('subjects.delete', $sub->id) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger fw-bold px-3" onclick="return confirm('Sigurado ka bang buburahin ito?')">
                                        <i class="fa-solid fa-trash me-1"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <div class="modal fade" id="editModal{{ $sub->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content" style="border-radius: 15px;">
                                    <div class="modal-header border-0 bg-primary text-white" style="border-radius: 15px 15px 0 0;">
                                        <h5 class="modal-title fw-bold"><i class="fa-solid fa-edit me-2"></i> Edit Subject</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('subjects.update', $sub->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body p-4">
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Subject Code</label>
                                                <input type="text" name="subject_code" class="form-control" value="{{ $sub->subject_code }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Subject Name</label>
                                                <input type="text" name="subject_name" class="form-control" value="{{ $sub->subject_name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Assigned Instructor</label>
                                                <input type="text" name="instructor" class="form-control" value="{{ $sub->instructor }}" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="button" class="btn btn-light fw-bold" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary px-4 fw-bold">Update Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection