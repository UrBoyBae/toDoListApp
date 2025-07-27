<?php

namespace App\Http\Controllers;

use App\Models\Habits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HabitsController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'date' => 'required|date',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('habits_photos', 'public');
        }

        Habits::create([
            'title' => $validated['title'],
            'photo' => $validated['photo'] ?? null,
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'date' => $validated['date'],
        ]);

        return redirect()->route('activities.allday')->with('success', 'Kebiasaan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $habits = Habits::findOrFail($id);
        return response()->json($habits);
    }

    public function update(Request $request, $id)
    {
        $habits = Habits::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
            'photo' => 'nullable|image|max:2048',
            'date' => 'required|date',
        ]);


        if ($request->hasFile('photo')) {
            if ($habits->photo) {
                Storage::disk('public')->delete($habits->photo);
            }
            $validated['photo'] = $request->file('photo')->store('habits_photos', 'public');
        }

        $habits->update($validated);

        return redirect()->back()->with('success', 'Habit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $habits = Habits ::findOrFail($id);
        if ($habits->photo) {
            Storage::disk('public')->delete($habits->photo);
        }
        $habits->delete();

        return response()->json(['message' => 'Habits deleted']);
    }
}
