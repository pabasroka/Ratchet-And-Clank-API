<?php

namespace App\Http\Controllers;

use App\Http\Requests\GadgetRequest;
use App\Models\Gadget;
use App\Models\Game;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class GadgetController extends Controller
{
    public function index(): Response|Application|ResponseFactory
    {
        $gadgets = Gadget::where('approve', 1)
            ->get();

        $gadgets->makeHidden('approve')->toArray();

        foreach ($gadgets as $gadget) {
            if ($gadget->image) {
                $gadget->image = public_path('images/gadgets/' . $gadget->image);
            }
        }

        return response([
            'gadgets' => $gadgets
        ], 200);
    }

    public function show($id): Response|Application|ResponseFactory
    {
        $gadget = Gadget::where('id', $id)
            ->where('approve', 1)
            ->get();

        $gadget->makeHidden('approve')->toArray();

        if ($gadget[0]->image) {
            $gadget[0]->image = public_path('images/gadgets/' . $gadget[0]->image);
        }

        return response([
            'gadget' => $gadget
        ], 200);
    }

    public function store(GadgetRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $newImageName = '';
        if ($request->image) {
            $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('images/gadgets'), $newImageName);
        }

        $approve = 0;
        if (Auth::check()) {
            $approve = 1;
        }

        Gadget::create([
                'image' => $newImageName,
                'approve' => $approve,
            ] + $validated);

        return redirect()->route('gadgets.create')->with('message', 'Gadget created successfully');
    }

    public function update(GadgetRequest $request, $id): Response|RedirectResponse|Application|ResponseFactory
    {
        $gadget = Gadget::findOrFail($id);

        if (!$gadget) {
            return response([
                'message' => 'Gadget not found'
            ], 403);
        }

        $validated = $request->validated();
        $approve = 0;
        if (isset($validated['approve'])) {
            $approve = 1;
        }

        $gadget->update([
                'approve' => $approve
            ] + $validated);

        return redirect()->route('gadgets.edit')->with('message', 'Gadget updated successfully');
    }

    public function destroy($id)
    {
        $gadget = Gadget::findOrFail($id);
        $gadget->delete();
        return redirect()->route('gadgets.edit')->with('message', 'Gadget deleted successfully');
    }

    public function create(): Factory|View|Application
    {
        $games = Game::where('approve', 1)->get();
        return view('gadgets.create', ['games' => $games]);
    }

    public function edit(): Factory|View|Application
    {
        $gadgets = Gadget::where('approve', 0)->get();
        return view('gadgets.edit', ['gadgets' => $gadgets]);
    }

}
