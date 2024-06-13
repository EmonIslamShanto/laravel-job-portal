<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobType;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class JobTypeController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $query = JobType::query();

        $this->search($query, ['name', 'slug']);

        $jobTypes = $query->paginate(10);
        return view('admin.job.job-type.index', compact('jobTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.job.job-type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $education = new JobType();
        $education->name = $request->name;
        $education->save();

        Notify::createdNotification();

        return redirect()->route('admin.job-types.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $jobType = JobType::findOrFail($id);
        return view('admin.job.job-type.edit', compact('jobType'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255'],
        ]);

        $jobType = JobType::findOrFail($id);
        $jobType->name = $request->name;
        $jobType->save();

        Notify::updatedNotification();

        return redirect()->route('admin.job-types.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            JobType::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['massage' => 'success'], 200);
        } catch (\Exception $e) {
            // Notify::errorNotification();
            logger($e);
            return response(['massage' => 'Something went wrong! Please, try again.'], 500);
        }
    }
}
