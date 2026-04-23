<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\Message;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::pluck('setting_value', 'setting_key')->toArray();
        $skills = Skill::orderBy('display_order')->get();
        $certificates = Certificate::orderBy('display_order')->get();
        $projects = Project::orderBy('display_order')->get();

        return view('home', compact('settings', 'skills', 'certificates', 'projects'));
    }

    // ✅ KIRIM EMAIL
    public function send(Request $request)
{
    // Simpan ke database
    Message::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'subject' => $request->subject,
        'pesan' => $request->pesan,
    ]);

    // Kirim email (optional, boleh dihapus kalau error SMTP)
    // Mail::to('virahmayanti09@gmail.com')->send(new ContactMail($request->all()));

    return back()->with('success', 'Pesan berhasil dikirim!');
}
}