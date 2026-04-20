<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\Certificate;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\ContactMessage;

class ApiController extends Controller
{
    public function skills()
    {
        $skills = Skill::orderBy('display_order')->get()->groupBy('category');
        
        return response()->json([
            'success' => true,
            'data' => $skills
        ]);
    }

    public function certificates()
    {
        $certificates = Certificate::orderBy('display_order')->get();
        
        return response()->json([
            'success' => true,
            'data' => $certificates
        ]);
    }

    public function projects()
    {
        $projects = Project::orderBy('display_order')->get();
        
        return response()->json([
            'success' => true,
            'data' => $projects
        ]);
    }

    public function settings()
    {
        $settings = SiteSetting::all()->pluck('setting_value', 'setting_key');
        
        return response()->json([
            'success' => true,
            'data' => $settings
        ]);
    }

    public function stats()
    {
        $stats = [
            'total_messages' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
            'total_projects' => Project::count(),
            'completed_projects' => Project::where('status', 'completed')->count(),
            'ongoing_projects' => Project::where('status', 'ongoing')->count(),
            'total_skills' => Skill::count(),
            'total_certificates' => Certificate::count(),
        ];
        
        return response()->json([
            'success' => true,
            'data' => $stats
        ]);
    }
}