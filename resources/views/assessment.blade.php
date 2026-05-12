@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e8e2f5 !important;
    }

    /* ── Page Layout ── */
    .assessment-page {
        padding: 28px 32px;
        min-height: 100vh;
        background: #e8e2f5;
    }

    .page-label {
        font-size: 11px;
        color: #7a5db0;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 4px;
    }

    .page-heading {
        font-size: 24px;
        font-weight: 700;
        color: #1e0f42;
        margin-bottom: 24px;
    }

    .page-heading span {
        color: #5a3aa0;
    }

    .top-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
    }

    .breadcrumb-custom {
        font-size: 12px;
        color: #9c84c9;
        display: flex;
        align-items: center;
        gap: 6px;
        background: none;
        padding: 0;
        margin: 0;
    }

    .breadcrumb-custom b {
        color: #5a3aa0;
        font-weight: 600;
    }

    /* ── Stat Cards ── */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-bottom: 20px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #d4c8ee;
        border-radius: 14px;
        padding: 18px 22px;
    }

    .stat-dot {
        display: inline-block;
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #5a3aa0;
        margin-right: 6px;
        vertical-align: middle;
    }

    .stat-label {
        font-size: 11px;
        font-weight: 700;
        color: #7a5db0;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 30px;
        font-weight: 700;
        color: #1e0f42;
        line-height: 1;
    }

    .stat-sub {
        font-size: 11px;
        color: #a898cc;
        margin-top: 5px;
    }

    /* ── Cards ── */
    .ob-card {
        background: #fff;
        border: 1px solid #d4c8ee;
        border-radius: 16px;
        padding: 24px 28px;
        margin-bottom: 18px;
    }

    .ob-card-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 22px;
        padding-bottom: 16px;
        border-bottom: 1px solid #ece7f7;
    }

    .ob-card-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        background: #ece7f7;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ob-card-title {
        font-size: 15px;
        font-weight: 700;
        color: #1e0f42;
        margin-bottom: 2px;
    }

    .ob-card-subtitle {
        font-size: 12px;
        color: #a898cc;
    }

    /* ── Form ── */
    .ob-form-label {
        font-size: 11px !important;
        font-weight: 700 !important;
        color: #5a3aa0 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.7px !important;
        margin-bottom: 6px !important;
    }

    .ob-select {
        font-size: 13px !important;
        padding: 10px 12px !important;
        border-radius: 10px !important;
        border: 1.5px solid #c8b8e8 !important;
        background: #f5f2fc !important;
        color: #1e0f42 !important;
        width: 100%;
        cursor: pointer;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .ob-select:focus {
        outline: none !important;
        border-color: #5a3aa0 !important;
        box-shadow: 0 0 0 3px rgba(90, 58, 160, 0.13) !important;
    }

    /* ── PO Rows ── */
    .po-section {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .po-row {
        display: flex;
        align-items: center;
        gap: 8px;
        animation: fadeInSlide 0.3s ease forwards;
    }

    @keyframes fadeInSlide {
        from { opacity: 0; transform: translateY(-6px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .btn-add-po {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: none;
        background: #5a3aa0;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 20px;
        font-weight: 300;
        flex-shrink: 0;
        transition: background 0.2s;
    }

    .btn-add-po:hover { background: #3d2080; }

    .btn-remove-po {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        border: 1.5px solid #c8b8e8;
        background: #f5f2fc;
        color: #a898cc;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 18px;
        flex-shrink: 0;
        transition: background 0.2s, color 0.2s;
    }

    .btn-remove-po:hover { background: #ece7f7; color: #5a3aa0; }

    /* ── Form Footer ── */
    .ob-form-footer {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 22px;
        padding-top: 18px;
        border-top: 1px solid #ece7f7;
    }

    .btn-ob-cancel {
        font-size: 13px;
        font-weight: 500;
        padding: 10px 22px;
        border-radius: 10px;
        border: 1.5px solid #c8b8e8;
        background: transparent;
        color: #7a5db0;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-ob-cancel:hover { background: #f5f2fc; }

    .btn-ob-save {
        font-size: 13px;
        font-weight: 700;
        padding: 10px 26px;
        border-radius: 10px;
        border: none;
        background: #1e0f42;
        color: #fff;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        letter-spacing: 0.2px;
        transition: background 0.2s;
    }

    .btn-ob-save:hover { background: #2d1a5e; color: #fff; }

    /* ── Table ── */
    .ob-table thead th {
        font-size: 11px;
        font-weight: 700;
        color: #7a5db0;
        text-transform: uppercase;
        letter-spacing: 0.7px;
        padding: 10px 14px;
        border-bottom: 1px solid #ece7f7;
        border-top: none;
    }

    .ob-table tbody td {
        font-size: 13px;
        color: #1e0f42;
        padding: 14px 14px;
        border-bottom: 1px solid #f2eefb;
        vertical-align: middle;
    }

    .ob-table tbody tr:last-child td { border-bottom: none; }
    .ob-table tbody tr:hover td { background: #faf8ff; }
    .ob-table tbody tr:hover .btn-delete-row { opacity: 1; }

    .badge-type {
        display: inline-block;
        font-size: 11px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 20px;
        background: #ece7f7;
        color: #3d2080;
    }

    .badge-po {
        display: inline-block;
        font-size: 11px;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 20px;
        background: #1e0f42;
        color: #d4c8ee;
    }

    .subject-code { font-weight: 700; color: #1e0f42; }
    .text-muted-ob { color: #7a6a9a !important; }
    .text-date { font-size: 12px; color: #b8a5d8; }

    /* ── Delete Button ── */
    .btn-delete-row {
        opacity: 0;
        background: none;
        border: 1.5px solid #c8b8e8;
        border-radius: 8px;
        padding: 5px 10px;
        cursor: pointer;
        color: #c0392b;
        font-size: 12px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: opacity 0.15s, background 0.15s, border-color 0.15s;
    }

    .btn-delete-row:hover {
        background: #fdecea;
        border-color: #e74c3c;
    }

    /* ── Delete Modal ── */
    .delete-modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.35);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .delete-modal-overlay.open {
        display: flex;
    }

    .delete-modal {
        background: #fff;
        border: 1px solid #d4c8ee;
        border-radius: 16px;
        padding: 28px;
        max-width: 380px;
        width: 90%;
        box-shadow: 0 8px 32px rgba(30, 15, 66, 0.12);
    }

    .delete-modal h5 {
        font-size: 16px;
        font-weight: 700;
        color: #1e0f42;
        margin-bottom: 8px;
    }

    .delete-modal p {
        font-size: 13px;
        color: #7a6a9a;
        line-height: 1.6;
        margin-bottom: 22px;
    }

    .delete-modal-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
    }

    .btn-modal-cancel {
        font-size: 13px;
        font-weight: 500;
        padding: 9px 20px;
        border-radius: 10px;
        border: 1.5px solid #c8b8e8;
        background: transparent;
        color: #7a5db0;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-modal-cancel:hover { background: #f5f2fc; }

    .btn-modal-delete {
        font-size: 13px;
        font-weight: 700;
        padding: 9px 20px;
        border-radius: 10px;
        border: none;
        background: #c0392b;
        color: #fff;
        cursor: pointer;
        transition: background 0.2s;
    }

    .btn-modal-delete:hover { background: #a93226; }
</style>

<div class="assessment-page">

    {{-- ── Top Row ── --}}
    <div class="top-row">
        <div>
            <div class="page-label">OB-LMS &nbsp;›&nbsp; Assessment</div>
            <div class="page-heading">Assessment & <span>PO Mapping</span></div>
        </div>
        <nav class="breadcrumb-custom">
            Dashboard &nbsp;›&nbsp; <b>Assessment</b>
        </nav>
    </div>

    {{-- ── Stat Cards ── --}}
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label"><span class="stat-dot"></span>Total Mappings</div>
            <div class="stat-value">{{ $assessments->count() }}</div>
            <div class="stat-sub">This school year</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><span class="stat-dot"></span>Subjects Mapped</div>
            <div class="stat-value">{{ $assessments->pluck('subject_code')->unique()->count() }}</div>
            <div class="stat-sub">Active subjects</div>
        </div>
        <div class="stat-card">
            <div class="stat-label"><span class="stat-dot"></span>POs Covered</div>
            <div class="stat-value">{{ $assessments->pluck('po_id')->unique()->count() }} / 13</div>
            <div class="stat-sub">Program outcomes</div>
        </div>
    </div>

    {{-- ── New Mapping Form ── --}}
    <div class="ob-card">
        <div class="ob-card-header">
            <div class="ob-card-icon">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <rect x="2" y="2" width="5.5" height="5.5" rx="1.2" fill="#5a3aa0"/>
                    <rect x="9.5" y="2" width="5.5" height="5.5" rx="1.2" fill="#a898cc"/>
                    <rect x="2" y="9.5" width="5.5" height="5.5" rx="1.2" fill="#a898cc"/>
                    <rect x="9.5" y="9.5" width="5.5" height="5.5" rx="1.2" fill="#5a3aa0"/>
                </svg>
            </div>
            <div>
                <div class="ob-card-title">New Mapping</div>
                <div class="ob-card-subtitle">Link an assessment to a program outcome</div>
            </div>
        </div>

        <form action="{{ route('assessments.store') }}" method="POST">
            @csrf
            <div class="row g-3">

                <div class="col-md-2">
                    <label class="ob-form-label">School Year</label>
                    <select class="ob-select" name="school_year" required>
                        <option value="" disabled selected>-- Choose --</option>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2025-2026">2025-2026</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="ob-form-label">Semester</label>
                    <select class="ob-select" name="semester" required>
                        <option value="" disabled selected>-- Choose --</option>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="ob-form-label">Select Subject</label>
                    <select class="ob-select" name="subject_id" required>
                        <option value="" disabled selected>-- Choose --</option>
                        @foreach($subjects as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->subject_code }} - {{ $sub->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="ob-form-label">Academic Term</label>
                    <select class="ob-select" name="term" required>
                        <option value="" disabled selected>-- Choose --</option>
                        <option value="Prelim">Prelim</option>
                        <option value="Midterm">Midterm</option>
                        <option value="Semi-final">Semi-final</option>
                        <option value="Finals">Finals</option>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="ob-form-label">Assessment Type</label>
                    <select class="ob-select" name="assessment_type" required>
                        <option value="" disabled selected>-- Choose --</option>
                        <optgroup label="Written Works">
                            <option value="Quiz 1">Quiz 1</option>
                            <option value="Quiz 2">Quiz 2</option>
                            <option value="Assignment">Assignment</option>
                            <option value="Seatwork">Seatwork</option>
                        </optgroup>
                        <optgroup label="Performance Tasks">
                            <option value="Activity 1">Activity 1</option>
                            <option value="Lab Exercise 1">Lab Exercise 1</option>
                            <option value="Group Activity">Group Activity</option>
                        </optgroup>
                        <optgroup label="Major Examinations">
                            <option value="Preliminary Exam">Preliminary Exam</option>
                            <option value="Midterm Exam">Midterm Exam</option>
                            <option value="Semi-final Exam">Semi-final Exam</option>
                            <option value="Final Exam">Final Exam</option>
                        </optgroup>
                    </select>
                </div>

                <div class="col-md-2">
                    <label class="ob-form-label">Program Outcome</label>
                    <div class="po-section" id="po-wrapper">
                        <div class="po-row">
                            <select class="ob-select" name="po_id[]" required>
                                <option value="" disabled selected>-- Select --</option>
                                <option value="PO1">PO1 - Engineering Knowledge</option>
                                <option value="PO2">PO2 - Problem Analysis</option>
                                <option value="PO3">PO3 - Design Solutions</option>
                                <option value="PO4">PO4 - Investigation</option>
                                <option value="PO5">PO5 - Modern Tool Usage</option>
                                <option value="PO6">PO6 - Engineer and Society</option>
                                <option value="PO7">PO7 - Sustainability</option>
                                <option value="PO8">PO8 - Ethics</option>
                                <option value="PO9">PO9 - Teamwork</option>
                                <option value="PO10">PO10 - Communication</option>
                                <option value="PO11">PO11 - Project Management</option>
                                <option value="PO12">PO12 - Lifelong Learning</option>
                                <option value="PO13">PO13 - UdD Outcome</option>
                            </select>
                            <button type="button" class="btn-add-po" onclick="addPORow()">+</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="ob-form-footer">
                <button type="button" class="btn-ob-cancel">Cancel</button>
                <button type="submit" class="btn-ob-save">
                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
                        <path d="M2 7l4 4 6-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Save Mapping
                </button>
            </div>
        </form>
    </div>

    {{-- ── Mapping Records Table ── --}}
    <div class="ob-card">
        <div class="ob-card-header">
            <div class="ob-card-icon">
                <svg width="17" height="17" viewBox="0 0 17 17" fill="none">
                    <rect x="2" y="4" width="13" height="1.8" rx="0.9" fill="#5a3aa0"/>
                    <rect x="2" y="7.6" width="9.5" height="1.8" rx="0.9" fill="#a898cc"/>
                    <rect x="2" y="11.2" width="11" height="1.8" rx="0.9" fill="#a898cc"/>
                </svg>
            </div>
            <div>
                <div class="ob-card-title">Mapping Records</div>
                <div class="ob-card-subtitle">All saved assessment to Program Outcome mappings</div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table ob-table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>S.Y.</th>
                        <th>Semester</th>
                        <th>Type</th>
                        <th>Term</th>
                        <th>Mapped PO</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($assessments as $asmt)
                    <tr>
                        <td><span class="subject-code">{{ $asmt->subject_code }}</span></td>
                        <td class="text-muted-ob">{{ $asmt->school_year ?? 'N/A' }}</td>
                        <td class="text-muted-ob">{{ $asmt->semester ?? 'N/A' }}</td>
                        <td><span class="badge-type">{{ $asmt->name ?? $asmt->assessment_type }}</span></td>
                        <td class="text-muted-ob">{{ $asmt->term }}</td>
                        <td><span class="badge-po">{{ $asmt->po_id }}</span></td>
                        <td class="text-date">{{ date('M d, Y', strtotime($asmt->created_at)) }}</td>
                        <td>
                            <button
                                type="button"
                                class="btn-delete-row"
                                data-id="{{ $asmt->id }}"
                                data-subject="{{ $asmt->subject_code }}"
                                data-type="{{ $asmt->name ?? $asmt->assessment_type }}"
                                onclick="askDelete(this)"
                            >
                                <svg width="13" height="13" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M2 4h12M5 4V3a1 1 0 011-1h4a1 1 0 011 1v1M6 7v5M10 7v5M3 4l1 9a1 1 0 001 1h6a1 1 0 001-1l1-9"/>
                                </svg>
                                Delete
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5" style="color: #a898cc;">
                            No mapping records found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ── Delete Confirmation Modal ── --}}
<div class="delete-modal-overlay" id="deleteModalOverlay">
    <div class="delete-modal">
        <h5>Delete this mapping?</h5>
        <p id="deleteModalDesc">This will permanently remove the mapping record. This action cannot be undone.</p>
        <div class="delete-modal-actions">
            <button type="button" class="btn-modal-cancel" onclick="closeDeleteModal()">Cancel</button>
            <form id="deleteForm" method="POST" style="margin: 0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn-modal-delete">Delete</button>
            </form>
        </div>
    </div>
</div>

<script>
function addPORow() {
    const wrapper = document.getElementById('po-wrapper');
    const div = document.createElement('div');
    div.className = 'po-row';
    div.innerHTML = `
        <select class="ob-select" name="po_id[]" required>
            <option value="" disabled selected>-- Select --</option>
            <option value="PO1">PO1 - Engineering Knowledge</option>
            <option value="PO2">PO2 - Problem Analysis</option>
            <option value="PO3">PO3 - Design Solutions</option>
            <option value="PO4">PO4 - Investigation</option>
            <option value="PO5">PO5 - Modern Tool Usage</option>
            <option value="PO6">PO6 - Engineer and Society</option>
            <option value="PO7">PO7 - Sustainability</option>
            <option value="PO8">PO8 - Ethics</option>
            <option value="PO9">PO9 - Teamwork</option>
            <option value="PO10">PO10 - Communication</option>
            <option value="PO11">PO11 - Project Management</option>
            <option value="PO12">PO12 - Lifelong Learning</option>
            <option value="PO13">PO13 - UdD Outcome</option>
        </select>
        <button type="button" class="btn-remove-po" onclick="this.parentElement.remove()">×</button>
    `;
    wrapper.appendChild(div);
}

function askDelete(btn) {
    const id      = btn.dataset.id;
    const subject = btn.dataset.subject;
    const type    = btn.dataset.type;
    document.getElementById('deleteModalDesc').textContent =
        'This will permanently remove the "' + type + '" mapping for ' + subject + '. This action cannot be undone.';
    document.getElementById('deleteForm').action = '/assessments/delete/' + id;
    document.getElementById('deleteModalOverlay').classList.add('open');
}

function closeDeleteModal() {
    document.getElementById('deleteModalOverlay').classList.remove('open');
}
</script>

@endsection