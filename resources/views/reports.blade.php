@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #e8e2f5 !important;
    }

    .reports-page {
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

    .page-heading span { color: #5a3aa0; }

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

    /* ── Main Card ── */
    .ob-card {
        background: #fff;
        border: 1px solid #d4c8ee;
        border-radius: 16px;
        padding: 28px 32px;
        margin-bottom: 18px;
        max-width: 780px;
        margin-left: auto;
        margin-right: auto;
        animation: cardIn 0.45s cubic-bezier(0.4,0,0.2,1) both;
    }

    @keyframes cardIn {
        from { opacity: 0; transform: translateY(22px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .ob-card-header {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 28px;
        padding-bottom: 18px;
        border-bottom: 1px solid #ece7f7;
    }

    .ob-card-icon {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        background: #ece7f7;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .ob-card-title {
        font-size: 16px;
        font-weight: 700;
        color: #1e0f42;
        margin-bottom: 2px;
    }

    .ob-card-subtitle {
        font-size: 12px;
        color: #a898cc;
    }

    /* ── Form Fields ── */
    .ob-form-label {
        font-size: 11px !important;
        font-weight: 700 !important;
        color: #5a3aa0 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.7px !important;
        margin-bottom: 7px !important;
        display: block;
    }

    .ob-select {
        font-size: 13px !important;
        padding: 10px 14px !important;
        border-radius: 10px !important;
        border: 1.5px solid #c8b8e8 !important;
        background: #f5f2fc !important;
        color: #1e0f42 !important;
        width: 100%;
        cursor: pointer;
        transition: border-color 0.2s, box-shadow 0.2s, transform 0.2s;
        appearance: auto;
    }

    .ob-select:focus {
        outline: none !important;
        border-color: #5a3aa0 !important;
        box-shadow: 0 0 0 3px rgba(90,58,160,0.13) !important;
        transform: translateY(-1px);
    }

    .form-divider {
        height: 1px;
        background: #ece7f7;
        margin: 8px 0;
    }

    /* ── Generate Button ── */
    .btn-ob-generate {
        width: 100%;
        font-size: 13px;
        font-weight: 700;
        padding: 15px 24px;
        border-radius: 10px;
        border: none;
        background: linear-gradient(135deg, #1e0f42 0%, #3b28a8 100%);
        color: #fff;
        cursor: pointer;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-top: 8px;
        position: relative;
        overflow: hidden;
        transition: transform 0.18s cubic-bezier(0.34,1.56,0.64,1), box-shadow 0.2s;
        box-shadow: 0 6px 20px rgba(30,15,66,0.3);
    }

    .btn-ob-generate:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 32px rgba(30,15,66,0.42);
        color: #fff;
    }

    .btn-ob-generate:active {
        transform: translateY(1px) scale(0.98);
        box-shadow: 0 3px 10px rgba(30,15,66,0.2);
    }

    .btn-ob-generate .btn-icon { width: 16px; height: 16px; transition: transform 0.3s cubic-bezier(0.34,1.56,0.64,1); }
    .btn-ob-generate:hover .btn-icon { transform: translateX(5px); }

    /* Ripple */
    .btn-ob-generate .ripple-el {
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,0.28);
        width: 60px; height: 60px;
        margin-top: -30px; margin-left: -30px;
        pointer-events: none;
        animation: btnRipple 0.75s linear;
    }
    @keyframes btnRipple {
        from { transform: scale(0); opacity: 1; }
        to   { transform: scale(6); opacity: 0; }
    }

    /* Loading state */
    .btn-ob-generate.loading { pointer-events: none; opacity: 0.8; }
    .btn-ob-generate .btn-label { display: inline-flex; align-items: center; gap: 10px; transition: opacity 0.2s; }
    .btn-ob-generate .btn-spinner {
        display: none;
        width: 18px; height: 18px;
        border: 2.5px solid rgba(255,255,255,0.35);
        border-top-color: #fff;
        border-radius: 50%;
        animation: spinBtn 0.7s linear infinite;
        position: absolute;
    }
    @keyframes spinBtn { to { transform: rotate(360deg); } }
    .btn-ob-generate.loading .btn-label { opacity: 0; }
    .btn-ob-generate.loading .btn-spinner { display: block; }

    /* ── Info Note ── */
    .ob-note {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        background: #f5f2fc;
        border: 1px solid #d4c8ee;
        border-radius: 10px;
        padding: 12px 16px;
        margin-top: 10px;
    }

    .ob-note-icon {
        width: 18px; height: 18px;
        flex-shrink: 0;
        margin-top: 1px;
    }

    .ob-note p {
        font-size: 12px;
        color: #7a5db0;
        margin: 0;
        line-height: 1.5;
    }

    /* Page entrance */
    @keyframes pageSlideIn {
        from { opacity: 0; transform: translateY(16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .reports-page { animation: pageSlideIn 0.4s cubic-bezier(0.4,0,0.2,1) both; }
</style>

<div class="reports-page">

    <div class="top-row">
        <div>
            <div class="page-label">OB-LMS &nbsp;›&nbsp; Reports</div>
            <div class="page-heading">Report <span>Generator</span></div>
        </div>
        <nav class="breadcrumb-custom">
            Dashboard &nbsp;›&nbsp; <b>Reports</b>
        </nav>
    </div>

    <div class="ob-card">
        <div class="ob-card-header">
            <div class="ob-card-icon">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <rect x="2" y="2" width="14" height="2" rx="1" fill="#5a3aa0"/>
                    <rect x="2" y="6" width="10" height="2" rx="1" fill="#a898cc"/>
                    <rect x="2" y="10" width="12" height="2" rx="1" fill="#a898cc"/>
                    <rect x="2" y="14" width="7" height="2" rx="1" fill="#a898cc"/>
                </svg>
            </div>
            <div>
                <div class="ob-card-title">Generate OBE Report</div>
                <div class="ob-card-subtitle">Fill out the fields below to generate the Outcome-Based Report</div>
            </div>
        </div>

        <form action="{{ route('reports.generate') }}" method="GET" target="_blank" id="reportForm">
            <div class="row g-3">

                <div class="col-md-4">
                    <label class="ob-form-label">School Year</label>
                    <select name="school_year" class="ob-select" required>
                        <option value="2024-2025">2024-2025</option>
                        <option value="2025-2026">2025-2026</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="ob-form-label">Semester</label>
                    <select name="semester" class="ob-select" required>
                        <option value="1st Semester">1st Semester</option>
                        <option value="2nd Semester">2nd Semester</option>
                        <option value="Summer">Summer</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="ob-form-label">Academic Term</label>
                    <select name="term" class="ob-select" required>
                        <option value="Prelim">Prelim</option>
                        <option value="Midterm">Midterm</option>
                        <option value="Semi-final">Semi-final</option>
                        <option value="Final">Final</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="ob-form-label">Assessment Type (PO Mapping)</label>
                    <select name="assessment" class="ob-select" required>
                        <option value="" disabled selected>-- Choose Assessment --</option>
                        <optgroup label="Major Examinations">
                            <option value="Preliminary Exam">Preliminary Exam</option>
                            <option value="Midterm Exam">Midterm Exam</option>
                            <option value="Semi-final Exam">Semi-final Exam</option>
                            <option value="Final Exam">Final Exam</option>
                        </optgroup>
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
                    </select>
                </div>

                <div class="col-12">
                    <label class="ob-form-label">Select Subject</label>
                    <select name="subject_id" class="ob-select" required>
                        <option value="" disabled selected>-- Choose Subject --</option>
                        @foreach($subjects as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->subject_code }} - {{ $sub->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <div class="ob-note">
                        <svg class="ob-note-icon" viewBox="0 0 18 18" fill="none">
                            <circle cx="9" cy="9" r="7.5" stroke="#7a5db0" stroke-width="1.2"/>
                            <rect x="8.25" y="8" width="1.5" height="5" rx="0.75" fill="#7a5db0"/>
                            <circle cx="9" cy="6" r="0.85" fill="#7a5db0"/>
                        </svg>
                        <p>The report will open in a new tab. Make sure all fields are correctly filled before generating.</p>
                    </div>
                </div>

                <div class="col-12 mt-2">
                    <button type="submit" class="btn-ob-generate" id="generateBtn">
                        <span class="btn-label">
                            <svg class="btn-icon" viewBox="0 0 16 16" fill="none">
                                <path d="M3 8h10M9 4l4 4-4 4" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Generate Report
                        </span>
                        <div class="btn-spinner"></div>
                    </button>
                </div>

            </div>
        </form>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const errorMsg = "{{ session('error') }}";
    if (errorMsg) {
        Swal.fire({
            icon: 'info',
            title: 'System Notice',
            text: errorMsg,
            confirmButtonColor: '#1e0f42',
            background: '#fff'
        });
    }

    const btn = document.getElementById('generateBtn');
    const form = document.getElementById('reportForm');

    // Ripple on click
    btn.addEventListener('click', function(e) {
        const rect = btn.getBoundingClientRect();
        const ripple = document.createElement('span');
        ripple.classList.add('ripple-el');
        ripple.style.left = (e.clientX - rect.left) + 'px';
        ripple.style.top  = (e.clientY - rect.top)  + 'px';
        btn.appendChild(ripple);
        setTimeout(() => ripple.remove(), 750);
    });

    // Loading state on submit — resets after 3s since it opens a new tab
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) return;
        btn.classList.add('loading');
        setTimeout(() => btn.classList.remove('loading'), 3000);
    });
</script>

@endsection