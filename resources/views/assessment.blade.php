@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-5" style="min-height: 120vh; padding-bottom: 600px !important;">
    <h4 class="fw-bold mb-4 text-uppercase" style="color: #764ba2; letter-spacing: 1px;">Assessment & PO Mapping</h4>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm mb-4" style="border-radius: 10px;">
            <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 mb-5" style="border-radius: 20px;">
        <div class="card-body p-4">
            <form action="{{ route('assessments.store') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">School Year</label>
                        <select class="form-select border-0 bg-light py-2" name="sy" required>
                            <option value="2024-2025" selected>2024-2025</option>
                            <option value="2025-2026">2025-2026</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Semester</label>
                        <select class="form-select border-0 bg-light py-2" name="semester" required>
                            <option value="1st Semester">1st Semester</option>
                            <option value="2nd Semester">2nd Semester</option>
                            <option value="Summer">Summer</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Select Subject</label>
                        <select class="form-select border-0 bg-light py-2" name="subject_id" required>
                            <option value="" disabled selected>-- Select Subject --</option>
                            @foreach($subjects as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->subject_code }} - {{ $sub->subject_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label small fw-bold text-muted text-uppercase">Term</label>
                        <select class="form-select border-0 bg-light py-2" name="term" required>
                            <option value="Prelim">Prelim</option>
                            <option value="Midterm">Midterm</option>
                            <option value="Semi-final">Semi-final</option>
                            <option value="Finals">Finals</option>
                        </select>
                    </div>

                    <hr class="text-muted opacity-25">

                    <div class="col-md-4">
                        <label class="form-label small fw-bold text-muted text-uppercase">Assessment Type</label>
                        <select class="form-select border-0 bg-light py-2" name="assessment_type" required>
                            <option value="" disabled selected>-- Select Type --</option>
                            <optgroup label="Written Works">
                                <option value="Quiz 1">Quiz 1</option>
                                <option value="Quiz 2">Quiz 2</option>
                                <option value="Quiz 3">Quiz 3</option>
                                <option value="Assignment">Assignment</option>
                                <option value="Seatwork">Seatwork</option>
                            </optgroup>
                            <optgroup label="Performance Tasks">
                                <option value="Activity 1">Activity 1</option>
                                <option value="Activity 2">Activity 2</option>
                                <option value="Lab Exercise 1">Lab Exercise 1</option>
                                <option value="Lab Exercise 2">Lab Exercise 2</option>
                                <option value="Group Activity">Group Activity</option>
                                <option value="Oral Presentation">Oral Presentation</option>
                            </optgroup>
                            <optgroup label="Major Examinations">
                                <option value="Preliminary Exam">Preliminary Exam</option>
                                <option value="Midterm Exam">Midterm Exam</option>
                                <option value="Semi-Final Exam">Semi-Final Exam</option>
                                <option value="Final Exam">Final Exam</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="col-md-8">
                        <label class="form-label small fw-bold text-muted text-uppercase">Program Outcomes (Skills Mapping)</label>
                        <div id="po-wrapper">
                            <div class="input-group mb-2">
                                <select class="form-select border-0 bg-light py-2" name="po_id[]" required style="border-radius: 8px 0 0 8px;">
                                    <option value="" disabled selected>-- Choose Skill --</option>
                                    <option value="PO1">Engineering/Technical Knowledge (PO1)</option>
                                    <option value="PO2">Problem Analysis (PO2)</option>
                                    <option value="PO3">Design/Development of Solutions (PO3)</option>
                                    <option value="PO4">Investigation of Complex Problems (PO4)</option>
                                    <option value="PO5">Modern Tool Usage (PO5)</option>
                                    <option value="PO6">The Engineer and Society (PO6)</option>
                                    <option value="PO7">Environment and Sustainability (PO7)</option>
                                    <option value="PO8">Ethics and Professionalism (PO8)</option>
                                    <option value="PO9">Individual and Team Work (PO9)</option>
                                    <option value="PO10">Communication Proficiency (PO10)</option>
                                    <option value="PO11">Project Management and Finance (PO11)</option>
                                    <option value="PO12">Lifelong Learning (PO12)</option>
                                    <option value="PO13">UdD Institutional Outcome (PO13)</option>
                                </select>
                                <button type="button" class="btn btn-primary px-3 fw-bold shadow-sm" onclick="addPORow()" style="border-radius: 0 8px 8px 0;">+</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-4 text-end">
                        <button type="submit" class="btn fw-bold px-5 py-2 shadow-sm text-white text-uppercase" style="background-color: #764ba2; border-radius: 10px;">
                            Save Mapping
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function addPORow() {
        const wrapper = document.getElementById('po-wrapper');
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <select class="form-select border-0 bg-light py-2" name="po_id[]" required style="border-radius: 8px 0 0 8px;">
                <option value="PO1">Engineering/Technical Knowledge (PO1)</option>
                <option value="PO2">Problem Analysis (PO2)</option>
                <option value="PO3">Design/Development of Solutions (PO3)</option>
                <option value="PO4">Investigation of Complex Problems (PO4)</option>
                <option value="PO5">Modern Tool Usage (PO5)</option>
                <option value="PO6">The Engineer and Society (PO6)</option>
                <option value="PO7">Environment and Sustainability (PO7)</option>
                <option value="PO8">Ethics and Professionalism (PO8)</option>
                <option value="PO9">Individual and Team Work (PO9)</option>
                <option value="PO10">Communication Proficiency (PO10)</option>
                <option value="PO11">Project Management and Finance (PO11)</option>
                <option value="PO12">Lifelong Learning (PO12)</option>
                <option value="PO13">UdD Institutional Outcome (PO13)</option>
            </select>
            <button type="button" class="btn btn-danger px-3 fw-bold" onclick="this.parentElement.remove()" style="border-radius: 0 8px 8px 0;">-</button>
        `;
        wrapper.appendChild(div);
    }
</script>
@endsection