<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeaponEvolutionRequest;
use App\Models\WeaponEvolution;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WeaponEvolutionController extends Controller
{
    public function store(WeaponEvolutionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/weapons'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        WeaponEvolution::create([
                'approve' => $approve,
                'image' => $newImageName,
            ] + $validated);

        return redirect()->route('weapons.create')->with('message', 'Weapon Upgrade created successfully');
    }

    public function update(WeaponEvolutionRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $weapon = WeaponEvolution::findOrFail($id);

        if (!$weapon) {
            return response([
                'message' => 'Weapon not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $weapon->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('weapons.edit')->with('message', 'Weapon Upgrade updated successfully');
    }

    public function destroy($id)
    {
        $weapon = WeaponEvolution::findOrFail($id);
        $weapon->delete();
        return redirect()->route('weapons.edit')->with('message', 'Weapon Upgrade deleted successfully');
    }

}
