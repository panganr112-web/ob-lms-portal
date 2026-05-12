@extends('layouts.app')

@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --indigo-deep:   #1e1354;
        --indigo-mid:    #3b28a8;
        --violet:        #6c47d6;
        --violet-light:  #8b6fe8;
        --teal:          #0db9b1;
        --teal-light:    #5de0da;
        --amber:         #f59e0b;
        --amber-light:   #fcd34d;
        --surface:       #f6f5fc;
        --card:          #ffffff;
        --border:        #ece9f8;
        --text-primary:  #1e1354;
        --text-muted:    #7c72a8;
        --text-faint:    #b8add8;
    }

    body {
        background-color: var(--surface);
        font-family: 'Plus Jakarta Sans', sans-serif;
        color: var(--text-primary);
    }

    /* ── WELCOME BANNER ── */
    .welcome-banner {
        position: relative;
        overflow: hidden;
        background: linear-gradient(130deg, #5b34c9 0%, #7c4fe0 45%, #9b6eee 100%);
        border-radius: 20px;
        padding: 32px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
        flex-wrap: wrap;
        gap: 18px;
    }

    .welcome-banner::before,
    .welcome-banner::after {
        content: '';
        position: absolute;
        border-radius: 50%;
        pointer-events: none;
    }
    .welcome-banner::before {
        width: 260px; height: 260px;
        background: radial-gradient(circle, rgba(13,185,177,0.22) 0%, transparent 70%);
        top: -80px; right: 200px;
    }
    .welcome-banner::after {
        width: 180px; height: 180px;
        background: radial-gradient(circle, rgba(93,224,218,0.15) 0%, transparent 70%);
        bottom: -60px; right: 60px;
    }

    .banner-text { position: relative; z-index: 1; }
    .banner-eyebrow {
        font-size: 10.5px;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: var(--teal-light);
        margin-bottom: 8px;
    }
    .welcome-banner h1 {
        font-size: 24px;
        font-weight: 800;
        color: #fff;
        margin: 0 0 6px;
        letter-spacing: -0.5px;
    }
    .welcome-banner .banner-sub {
        font-size: 13px;
        color: rgba(255,255,255,0.6);
        margin: 0;
    }
    .banner-actions {
        display: flex;
        gap: 10px;
        flex-shrink: 0;
        position: relative;
        z-index: 1;
    }
    .btn-ghost {
        background: rgba(255,255,255,0.1);
        border: 1px solid rgba(255,255,255,0.25);
        color: #fff;
        padding: 9px 22px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.2s;
        backdrop-filter: blur(4px);
    }
    .btn-ghost:hover {
        background: rgba(255,255,255,0.2);
        color: #fff;
    }
    .btn-teal {
        background: linear-gradient(135deg, var(--teal) 0%, var(--teal-light) 100%);
        border: none;
        color: var(--indigo-deep);
        padding: 9px 22px;
        border-radius: 11px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.2s;
        box-shadow: 0 4px 14px rgba(13,185,177,0.35);
    }
    .btn-teal:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 22px rgba(13,185,177,0.45);
        color: var(--indigo-deep);
    }

    /* ── STAT CARDS ── */
    .stat-card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 18px;
        padding: 24px 26px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 12px rgba(59,40,168,0.05);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        position: relative;
        overflow: hidden;
    }
    .stat-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 3px;
        border-radius: 0 0 18px 18px;
        opacity: 0;
        transition: opacity 0.25s;
        background: linear-gradient(90deg, var(--violet), var(--violet-light));
    }
    .stat-card:hover { transform: translateY(-5px); box-shadow: 0 14px 32px rgba(59,40,168,0.1); }
    .stat-card:hover::after { opacity: 1; }

    .stat-info { flex: 1; }
    .stat-label {
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: var(--text-faint);
        margin-bottom: 8px;
    }
    .stat-value {
        font-size: 38px;
        font-weight: 800;
        line-height: 1;
        margin: 0 0 6px;
        color: var(--violet);
    }
    .stat-sub {
        font-size: 11.5px;
        color: var(--text-faint);
        margin: 0;
    }

    /* ── OVERVIEW CARD ── */
    .overview-card {
        background: linear-gradient(135deg, #f5f3ff 0%, #ede9fd 100%);
        border: 1px solid #ddd6fe;
        border-radius: 20px;
        padding: 40px 44px;
        position: relative;
        overflow: hidden;
    }
    .overview-card::before {
        content: 'OB-LMS';
        position: absolute;
        right: -30px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 130px;
        font-weight: 800;
        color: #7c3aed;
        opacity: 0.06;
        letter-spacing: -4px;
        filter: blur(6px);
        user-select: none;
        pointer-events: none;
        white-space: nowrap;
    }
    .overview-card h2 {
        font-size: 22px;
        font-weight: 800;
        color: var(--indigo-deep);
        margin-bottom: 10px;
        letter-spacing: -0.4px;
    }
    .overview-card p {
        color: var(--text-muted);
        font-size: 14px;
        line-height: 1.75;
        margin-bottom: 28px;
        max-width: 440px;
    }

    .overview-badge {
        display: inline-block;
        background: #f0ebff;
        color: var(--violet);
        font-size: 10.5px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 4px 12px;
        border-radius: 100px;
        margin-bottom: 14px;
    }

    .btn-primary-cta {
        background: linear-gradient(135deg, var(--violet) 0%, var(--indigo-mid) 100%);
        border: none;
        color: #fff;
        padding: 12px 30px;
        border-radius: 12px;
        font-size: 14px;
        font-weight: 700;
        text-decoration: none;
        display: inline-block;
        transition: all 0.25s;
        box-shadow: 0 4px 16px rgba(108,71,214,0.35);
    }
    .btn-primary-cta:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 26px rgba(108,71,214,0.45);
        color: #fff;
    }
</style>

<div class="container-fluid py-4 px-4">

    {{-- WELCOME BANNER --}}
    <div class="welcome-banner">
        <div class="banner-text">
            <div class="banner-eyebrow">Good Day</div>
            <h1>Welcome back, Admin Rose!</h1>
            <p class="banner-sub">Everything is looking good today &nbsp;·&nbsp; {{ now()->format('F j, Y') }}</p>
        </div>
        <div class="banner-actions">
            <a href="{{ route('reports.index') }}" class="btn-ghost">View Reports</a>
            <a href="{{ route('assessment') }}" class="btn-teal">+ Map Assessment</a>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Active Students</div>
                    <h2 class="stat-value">{{ $activeStudents }}</h2>
                    <p class="stat-sub">Currently enrolled</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Enrolled Subjects</div>
                    <h2 class="stat-value">{{ $enrolledSubjects }}</h2>
                    <p class="stat-sub">This semester</p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-3">
            <div class="stat-card">
                <div class="stat-info">
                    <div class="stat-label">Assessments Mapped</div>
                    <h2 class="stat-value">{{ $passedEvaluations }}</h2>
                    <p class="stat-sub">Across all subjects</p>
                </div>
            </div>
        </div>
    </div>

    {{-- OUTCOME-BASED LEARNING SECTION --}}
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="overview-card">
                <div class="row align-items-center text-center text-md-start">
                    <div class="col-md-8">
                        <span class="overview-badge">OBE Platform</span>
                        <h2>Outcome-Based Learning</h2>
                        <p>Streamline your academic tracking. Map assessments to Program Outcomes and generate insightful reports with ease.</p>
                        <a href="{{ route('assessment') }}" class="btn-primary-cta">Open Assessment Tools</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection