<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Certificate;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    // ================= MESSAGES =================
    public function messages()
    {
        $messages = Message::latest()->get();
        return view('admin.messages', compact('messages'));
    }

    public function markAsRead($id)
    {
        Message::findOrFail($id)->update(['is_read' => 1]);
        return back();
    }

    public function deleteMessage($id)
    {
        Message::findOrFail($id)->delete();
        return back();
    }

    // ================= SKILLS =================
    public function skills()
    {
        $skills = Skill::all();
        return view('admin.skills', compact('skills'));
    }

    public function storeSkill(Request $request)
    {
        Skill::create($request->all());
        return back()->with('success', 'Skill ditambahkan');
    }

    public function updateSkill(Request $request, $id)
    {
        Skill::findOrFail($id)->update($request->all());
        return back()->with('success', 'Skill diupdate');
    }

    public function deleteSkill($id)
    {
        Skill::findOrFail($id)->delete();
        return back()->with('success', 'Skill dihapus');
    }

    // ================= PROJECT =================
    public function projects()
    {
        $projects = Project::all();
        return view('admin.projects', compact('projects'));
    }

    public function storeProject(Request $request)
    {
        Project::create($request->all());
        return back()->with('success', 'Project ditambahkan');
    }

    public function updateProject(Request $request, $id)
    {
        Project::findOrFail($id)->update($request->all());
        return back()->with('success', 'Project diupdate');
    }

    public function deleteProject($id)
    {
        Project::findOrFail($id)->delete();
        return back()->with('success', 'Project dihapus');
    }

    // ================= CERTIFICATE =================
    public function certificates()
    {
        $certificates = Certificate::all();
        return view('admin.certificates', compact('certificates'));
    }

    public function storeCertificate(Request $request)
    {
        Certificate::create($request->all());
        return back()->with('success', 'Certificate ditambahkan');
    }

    public function updateCertificate(Request $request, $id)
    {
        Certificate::findOrFail($id)->update($request->all());
        return back()->with('success', 'Certificate diupdate');
    }

    public function deleteCertificate($id)
    {
        Certificate::findOrFail($id)->delete();
        return back()->with('success', 'Certificate dihapus');
    }
}