<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationRequest;
use App\Models\Galaxy;
use App\Models\Organization;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrganizationController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        $organizations = Organization::where('approve', 1)
            ->get();
        $organizations->makeHidden('approve')->toArray();

        foreach ($organizations as $organization) {
            if ($organization->image) {
                $organization->image = public_path('images/organizations/' . $organization->image);
            }
        }

        return response([
            'organizations' => $organizations
        ], 200);
    }

    public function show($id): Response|Application|ResponseFactory
    {
        $organization = Organization::where('id', $id)
            ->where('approve', 1)
            ->get();
        $organization->makeHidden('approve')->toArray();

        if ($organization[0]->image) {
            $organization[0]->image = public_path('images/organizations/' . $organization[0]->image);
        }

        return response([
            'organization' => $organization
        ], 200);
    }

    public function store(OrganizationRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/organizations'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Organization::create([
                'image' => $newImageName,
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('organizations.create')->with('message', 'Organization created successfully');
    }

    public function update(OrganizationRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $organization = Organization::findOrFail($id);

        if (!$organization) {
            return response([
                'message' => 'Organization not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $organization->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('organizations.edit')->with('message', 'Organization updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        $organization = Organization::findOrFail($id);
        $organization->delete();
        return redirect()->route('organizations.edit')->with('message', 'Organization deleted successfully');
    }

    public function create(): Factory|View|Application
    {
        $galaxies = Galaxy::where('approve', 1)->get();
        return view('organizations.create', ['galaxies' => $galaxies]);
    }

    public function edit(): Factory|View|Application
    {
        $organizations = Organization::where('approve', 0)->get();
        return view('organizations.edit', ['organizations' => $organizations]);
    }
}
