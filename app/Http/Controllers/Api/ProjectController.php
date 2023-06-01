<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with(['technologies', 'type'])->paginate(6);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['technologies', 'type'])->first();

        if ($project) {
            return response()->json([
                'success' => true,
                // inserisco in questa chiave la risposta della query che mi da il database per trasferirla al front
                'project' => $project
            ]);
        } else {
            return response()->json([
                'success' => false,
                'error' => 'Progetto non trovato!'
            ]);
        }
    }
}
