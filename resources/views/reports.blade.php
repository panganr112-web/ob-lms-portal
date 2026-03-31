@extends('layouts.app')

@section('content')
<style>
    body { background-color: #f4f7f6; }
    
    .center-wrapper { 
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        justify-content: center; 
        min-height: 85vh; 
        padding: 40px 20px; 
    }
    
    .report-header-tag { 
        background: #ffffff; 
        border: 2px solid #333; 
        border-bottom: none; 
        padding: 10px 35px; 
        border-radius: 12px 12px 0 0; 
        font-weight: 800; 
        text-transform: uppercase; 
        font-size: 14px; 
        color: #333; 
        z-index: 2; 
        box-shadow: 0 -5px 15px rgba(0,0,0,0.05); 
    }
    
    .filter-card-container { 
        background: #ffffff; 
        border: 2px solid #333; 
        border-radius: 0 20px 20px 20px; 
        padding: 50px 60px; 
        width: 100%; 
        max-width: 550px; 
        box-shadow: 0 15px 35px rgba(0,0,0,0.1); 
        margin-top: -2px; 
    }
    
    .select-item { 
        margin-bottom: 25px; 
        text-align: center; 
    }
    
    .select-item label { 
        display: block; 
        font-weight: 700; 
        margin-bottom: 12px; 
        color: #555; 
        font-size: 11px; 
        text-transform: uppercase; 
        letter-spacing: 1.5px; 
    }
    
    .modern-select { 
        width: 100%; 
        padding: 14px 20px; 
        border-radius: 12px; 
        border: 1.5px solid #e0e0e0; 
        background-color: #fdfdfd; 
        font-size: 15px; 
        color: #333; 
        appearance: none; 
        background-image: url("data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%27http%3A//www.w3.org/2000/svg%27%20width%3D%2724%27%20height%3D%2724%27%20viewBox%3D%270%200%2024%2024%27%20fill%3D%27none%27%20stroke%3D%27%23ccc%27%20stroke-width%3D%272%27%20stroke-linecap%3D%27round%27%20stroke-linejoin%3D%27round%27%3E%3Cpolyline%20points%3D%276%209%2012%2015%2018%209%27%3E%3C/polyline%3E%3C/svg%3E"); 
        background-repeat: no-repeat; 
        background-position: right 15px top 50%; 
    }
    
    .flow-arrow { 
        color: #cbd5e0; 
        font-size: 22px; 
        margin-bottom: 25px; 
        margin-top: -5px; 
    }
    
    .btn-generate-report { 
        background-color: #333; 
        color: #fff; 
        padding: 18px 50px; 
        font-weight: 800; 
        border-radius: 12px; 
        border: none; 
        font-size: 16px; 
        text-transform: uppercase; 
        width: 100%; 
        margin-top: 20px; 
        cursor: pointer; 
        transition: transform 0.2s ease;
    }

    .btn-generate-report:hover {
        background-color: #000;
        transform: translateY(-2px);
    }
</style>

<div class="center-wrapper">
    <div class="report-header-tag">Reports Details</div>
    
    <div class="filter-card-container">
        <form action="{{ route('reports.generate') }}" method="GET" target="_blank" class="text-center">
            
            <div class="select-item">
                <label>Academic / Choose Year</label>
                <select name="sy" class="modern-select" required>
                    <option value="2025-2026">2025-2026</option>
                    <option value="2024-2025">2024-2025</option>
                </select>
            </div>

            <div class="flow-arrow">↓</div>

            <div class="select-item">
                <label>Semester</label>
                <select name="semester" class="modern-select" required>
                    <option value="1st Semester">1st Semester</option>
                    <option value="2nd Semester">2nd Semester</option>
                    <option value="Summer">Summer</option>
                </select>
            </div>

            <div class="flow-arrow">↓</div>

            <div class="select-item">
                <label>Term Selection</label>
                <select name="term" class="modern-select" required>
                    <option value="Prelim">Prelim</option>
                    <option value="Midterm">Midterm</option>
                    <option value="Semi-final">Semi-final</option>
                    <option value="Finals">Finals</option>
                </select>
            </div>

            <div class="flow-arrow">↓</div>

            <div class="select-item">
                <label>Assessment Type</label>
                <select name="assessment" class="modern-select" required>
                    <option value="" disabled selected>-- Choose Assessment --</option>
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

            <div class="flow-arrow">↓</div>

            <div class="select-item">
                <label>Subject</label>
                <select name="subject_id" class="modern-select" required>
                    <option value="" disabled selected>-- Choose Subject --</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_code }} - {{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn-generate-report">
                <i class="fa-solid fa-file-export me-2"></i> Generate Report
            </button>
            
        </form>
    </div>
</div> 
@endsection