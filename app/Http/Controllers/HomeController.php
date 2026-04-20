<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\SiteSetting;

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
}