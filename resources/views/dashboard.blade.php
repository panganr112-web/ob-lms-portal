@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
                <div class="text-center">
                    <h6 class="text-muted fw-bold">Active Students</h6>
                    <h1 class="fw-bold mb-0">{{ $activeStudents }}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
                <div class="text-center">
                    <h6 class="text-muted fw-bold">Enrolled Subjects</h6>
                    <h1 class="fw-bold mb-0">{{ $enrolledSubjects }}</h1>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
                <div class="text-center">
                    <h6 class="text-muted fw-bold">Passed Evaluations</h6>
                    <h1 class="fw-bold mb-0">{{ $passedEvaluations }}</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm mt-2" style="border-radius: 15px;">
        <div class="card-body p-5">
            <h3 class="fw-bold mb-3">System Overview</h3>
            <p class="text-muted">
                Manage your students and compute their OBE grades through the Assessment menu. 
                This platform is designed to streamline the tracking of academic performance efficiently.
            </p>
            <div class="mt-4">
                <a href="/assessment" class="btn btn-primary px-4 shadow-sm" style="border-radius: 10px;">
                    Go to Assessment
                </a>
            </div>
        </div>
    </div>
</div>
@endsection