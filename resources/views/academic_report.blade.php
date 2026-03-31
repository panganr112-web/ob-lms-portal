@extends('layouts.app')

@section('content')
<div class="container-fluid py-4 px-5" id="reportContent">
    
    <div class="mb-4 no-print d-flex justify-content-between align-items-center">
        <a href="{{ route('reports.index') }}" class="btn btn-sm btn-light border fw-bold text-muted px-3 shadow-sm">
            <i class="fa-solid fa-arrow-left me-2"></i> BACK TO FILTERS
        </a>
        
        <div class="dropdown">
            <button class="btn btn-danger btn-sm fw-bold shadow-sm px-4 dropdown-toggle" type="button" id="exportMenu" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-download me-2"></i> EXPORT REPORT
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0" aria-labelledby="exportMenu">
                <li><a class="dropdown-item py-2" href="#" onclick="window.print()"><i class="fa-solid fa-file-pdf text-danger me-2"></i> Save as PDF</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item py-2" href="#" onclick="exportToExcel()"><i class="fa-solid fa-file-excel text-success me-2"></i> Export to Excel (.xls)</a></li>
                <li><a class="dropdown-item py-2" href="#" onclick="exportToDocs()"><i class="fa-solid fa-file-word text-primary me-2"></i> Export to Docs (.doc)</a></li>
                <li><a class="dropdown-item py-2" href="#" onclick="exportToNotes()"><i class="fa-solid fa-file-lines text-warning me-2"></i> Save as Notes (.txt)</a></li>
            </ul>
        </div>
    </div>

    <div class="card shadow-sm border-0 p-4 mb-4 report-header" style="border-radius: 15px; background: #fff;">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="fw-bold text-uppercase mb-0" style="color: #764ba2; letter-spacing: 1px;">Academic Performance Report</h2>
                <div class="mt-3">
                    <p class="mb-1 text-dark"><strong>Subject:</strong> {{ $subject->subject_name ?? 'N/A' }}</p>
                    <p class="mb-1 text-dark"><strong>Code:</strong> {{ $subject->subject_code ?? 'N/A' }}</p>
                    <p class="mb-0 text-dark"><strong>Term:</strong> {{ strtoupper($request->term ?? 'N/A') }}</p>
                </div>
            </div>
            <div class="col-md-6 border-start ps-md-4 mt-3 mt-md-0 border-start-print">
                <p class="mb-1 text-dark"><strong>Academic Year:</strong> {{ $request->sy ?? 'N/A' }}</p>
                <p class="mb-1 text-dark"><strong>Semester:</strong> {{ strtoupper($request->semester ?? 'N/A') }}</p>
                <p class="mb-0 text-dark"><strong>Assessment:</strong> {{ strtoupper($request->assessment ?? 'N/A') }}</p>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0" style="border-radius: 20px; overflow: hidden;">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="reportTable" class="table table-hover mb-0 align-middle text-center">
                    <thead style="background-color: #f8f9fa; color: #764ba2; border-bottom: 2px solid #eee;">
                        <tr class="small fw-bold text-uppercase">
                            <th class="text-start ps-5 py-4">Student Name</th>
                            <th class="text-start" style="width: 40%;">Skill / Outcome Description</th>
                            <th>Score</th>
                            <th>Term</th>
                            <th>Status / Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $s)
                        <tr>
                            <td class="text-start ps-5 py-3">
                                <div class="fw-bold text-dark">{{ strtoupper($s->lastname ?? 'N/A') }}, {{ strtoupper($s->firstname ?? 'N/A') }}</div>
                                <small class="text-muted">{{ $s->student_id_no ?? '---' }}</small>
                            </td>
                            <td class="text-start">
                                @php
                                    $rawDescription = $s->po_description ?? 'No Description Mapped'; 
                                    $descriptions = !empty($rawDescription) ? preg_split('/[,|]+/', $rawDescription) : [];
                                @endphp

                                @if(count($descriptions) > 0)
                                    @foreach($descriptions as $desc)
                                        <div class="text-wrap small text-primary mb-1" style="line-height: 1.2; font-weight: 500;">
                                            • {{ trim($desc) }}
                                        </div>
                                    @endforeach
                                @else
                                    <span class="text-muted small italic">No Description Mapped</span>
                                @endif
                            </td>
                            <td class="fw-bold fs-5" style="color: #764ba2;">{{ $s->score }}%</td>
                            <td class="text-muted small text-uppercase">{{ $request->term ?? 'N/A' }}</td>
                            <td>
                                <span class="badge rounded-pill px-4 py-2 {{ $s->statusClass ?? 'bg-secondary' }}" style="min-width: 140px; font-size: 10px; font-weight: 800; border: 1px solid currentColor;">
                                    {{ $s->goal ?? 'N/A' }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="py-5 text-muted">No student records found.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <h6 class="fw-bold text-muted text-uppercase mb-3" style="font-size: 12px; letter-spacing: 1px;">Performance Summary</h6>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 text-center" style="background: #e0e7ff; border-radius: 12px;">
                <h6 class="fw-bold text-primary mb-1" style="font-size: 11px;">EXCELLENT (90-100)</h6>
                <h3 class="fw-bold mb-0 text-primary">{{ $summary['excellent'] ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 text-center" style="background: #d1e7dd; border-radius: 12px;">
                <h6 class="fw-bold text-success mb-1" style="font-size: 11px;">PASSED (75-89)</h6>
                <h3 class="fw-bold mb-0 text-success">{{ $summary['passed'] ?? 0 }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-3 text-center" style="background: #f8d7da; border-radius: 12px;">
                <h6 class="fw-bold text-danger mb-1" style="font-size: 11px;">AT RISK (74 below)</h6>
                <h3 class="fw-bold mb-0 text-danger">{{ $summary['at_risk'] ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="row mt-5 pt-5 text-center">
        <div class="col-6">
            <div class="mx-auto" style="width: 300px;">
                <h6 class="fw-bold mb-0 text-uppercase" style="border-bottom: 2px solid #333; padding-bottom: 5px;">
                    {{ $instructor ?? 'SIGNATURE OVER PRINTED NAME' }}
                </h6>
                <p class="small fw-bold mb-0 text-muted mt-2" style="font-size: 11px;">SUBJECT INSTRUCTOR</p>
                <small class="text-muted" style="font-size: 9px;">School of Information Technology Education</small>
            </div>
        </div>
        <div class="col-6">
            <div class="mx-auto" style="width: 300px;">
                <h6 class="fw-bold mb-0 text-uppercase" style="border-bottom: 2px solid #333; padding-bottom: 5px;">
                    {{ $dean ?? 'JANN ALFRED QUINTO, MSIB' }}
                </h6>
                <p class="small fw-bold mb-0 text-muted mt-2" style="font-size: 11px;">DEPARTMENT HEAD</p>
                <small class="text-muted" style="font-size: 9px;">Dean, SITE Department</small>
            </div>
        </div>
    </div>
</div>

<script>
    // --- EXPORT TO EXCEL ---
    function exportToExcel() {
        const table = document.getElementById("reportTable");
        const html = table.outerHTML;
        const blob = new Blob([html], { type: "application/vnd.ms-excel" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "Academic_Report_{{ $subject->subject_name ?? 'Report' }}.xls";
        a.click();
    }

    // --- EXPORT TO DOCS ---
    function exportToDocs() {
        const header = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'></head><body>";
        const footer = "</body></html>";
        const content = document.getElementById("reportContent").innerHTML;
        const sourceHTML = header + content + footer;

        const blob = new Blob([sourceHTML], { type: "application/msword" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "Academic_Report.doc";
        a.click();
    }

    // --- EXPORT TO NOTES (.TXT) ---
    function exportToNotes() {
        let text = "ACADEMIC PERFORMANCE REPORT\n";
        text += "Subject: {{ $subject->subject_name ?? 'N/A' }}\n";
        text += "Term: {{ $request->term ?? 'N/A' }}\n";
        text += "-------------------------------------------\n\n";

        document.querySelectorAll("#reportTable tr").forEach(row => {
            const cols = Array.from(row.querySelectorAll("th, td")).map(c => c.innerText.trim());
            text += cols.join(" | ") + "\n";
        });

        const blob = new Blob([text], { type: "text/plain" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement("a");
        a.href = url;
        a.download = "Report_Notes.txt";
        a.click();
    }
</script>

<style>
    .status-excellent { background-color: #e0e7ff !important; color: #4338ca !important; border-color: #c7d2fe !important; }
    .status-passed { background-color: #d1e7dd !important; color: #0f5132 !important; border-color: #badbcc !important; }
    .status-failed { background-color: #f8d7da !important; color: #842029 !important; border-color: #f5c2c7 !important; }

    @media print {
        .no-print { display: none !important; }
        .card { border: 1px solid #eee !important; box-shadow: none !important; border-radius: 0 !important; }
        body { background: white !important; font-size: 11px; color: #000 !important; }
        .border-start-print { border-left: 1px solid #dee2e6 !important; }
        .status-excellent, .status-passed, .status-failed { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        h2, h6 { color: #000 !important; }
    }
</style>
@endsection