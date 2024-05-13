<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Services\Notify;
use App\Traits\Searchable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class CountryController extends Controller
{
    use Searchable;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $query = Country::query();

        $this->search($query, ['name']);

        $countries = $query->paginate(30);

        return view('admin.location.country.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.location.country.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:countries,name'],
        ]);

        $data = new Country();
        $data->name = $request->name;
        $data->save();

        Notify::createdNotification();

        return to_route('admin.countries.index');
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
        $country = Country::findOrFail($id);
        return view('admin.location.country.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:255', 'unique:countries,name,' . $id],
        ]);

        $data = Country::findOrFail($id);
        $data->name = $request->name;
        $data->save();

        Notify::updatedNotification();

        return to_route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): Response
    {
        try {
            Country::findOrFail($id)->delete();

            Notify::deletedNotification();
            return response(['massage' => 'success'], 200);
        } catch (\Exception $e) {
            // Notify::errorNotification();
            logger($e);
            return response(['massage' => 'Something went wrong! Please, try again.'], 500);
        }
    }
}
