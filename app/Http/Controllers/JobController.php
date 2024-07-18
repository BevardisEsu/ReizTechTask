<?php
namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([                    #Validation for ensuring neccessary data
            'urls' => 'required|array',
            'selectors' => 'required|array',
        ]);

        $job = Job::create([                    #Structure to store jobs using POST
            'urls' => json_encode($request->urls),
            'selectors' => json_encode($request->selectors),
            'status' => 'pending',
        ]);

        return response()->json($job, 201);     #On succesfull attempt return 201 status message
    }

    public function show($id)                   #Show based on ID
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);  #If not found return message with 404 staus message
        }
        return response()->json($job);
    }

    public function destroy($id)                #Delete based on ID
    {
        $job = Job::find($id);
        if (!$job) {
            return response()->json(['message' => 'Job not found'], 404);   #If not found return message with 404 staus message
        }
        $job->delete();
        return response()->json(['message' => 'Job deleted']);
    }
}
