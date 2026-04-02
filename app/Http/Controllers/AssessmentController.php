<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function showLogin() {
        if (Auth::check()) return redirect('/dashboard');
        return view('login');
    }

    public function login(Request $request) {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $credentials = [
            'email' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors(['username' => 'Invalid credentials.']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function dashboard() {
        $activeStudents = DB::table('students')->count();
        $enrolledSubjects = DB::table('subjects')->count();
        $passedEvaluations = DB::table('assessments')->count();
        $recentStudents = DB::table('students')->orderBy('id', 'desc')->limit(5)->get();
        
        return view('dashboard', compact('activeStudents', 'enrolledSubjects', 'passedEvaluations', 'recentStudents'));
    }

    public function manageStudents() {
        $students = DB::table('students')->get();
        return view('manage_students', compact('students'));
    }

    public function storeStudent(Request $request) {
        DB::table('students')->insert([
            'student_id_no' => $request->student_id_no,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'created_at' => now()
        ]);
        return redirect()->back()->with('success', 'Student added!');
    }

    public function deleteStudent($id) {
        $deleted = DB::table('students')->where('id', $id)->delete();
        if ($deleted) {
            return redirect()->back()->with('success', 'Student deleted successfully!');
        }
        return redirect()->back()->with('error', 'Student not found!');
    }

    public function manageSubjects() {
        $subjects = DB::table('subjects')->get();
        return view('manage_subjects', compact('subjects'));
    }

    public function storeSubject(Request $request) {
        DB::table('subjects')->insert([
            'subject_code' => $request->subject_code,
            'subject_name' => $request->subject_name,
            'instructor' => $request->instructor,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect()->back()->with('success', 'Subject saved!');
    }

    public function updateSubject(Request $request, $id) {
        DB::table('subjects')->where('id', $id)->update([
            'subject_code' => $request->subject_code,
            'subject_name' => $request->subject_name,
            'instructor' => $request->instructor,
            'updated_at' => now()
        ]);
        return redirect()->back()->with('success', 'Subject updated!');
    }

    public function deleteSubject($id) {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Subject deleted!');
    }

    public function manageAssessments(Request $request) {
        $subjects = DB::table('subjects')->get();
        $assessments = DB::table('assessments')
            ->leftJoin('subjects', 'assessments.subject_id', '=', 'subjects.id')
            ->select('assessments.*', 'subjects.subject_name', 'subjects.subject_code')
            ->orderBy('assessments.id', 'desc')
            ->get();
        return view('assessment', compact('subjects', 'assessments'));
    }

    public function store(Request $request) {
        $po_ids = $request->input('po_id');
        if ($po_ids) {
            foreach ($po_ids as $po) {
                DB::table('assessments')->insert([
                    'subject_id' => $request->subject_id,
                    'name' => $request->assessment_type, 
                    'term' => $request->term,
                    'po_id' => $po,
                    'created_at' => now()
                ]);
            }
        }
        return redirect()->back()->with('success', 'Mapping Saved!');
    }
}