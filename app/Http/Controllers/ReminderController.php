<?php
namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    // Menampilkan semua reminder untuk tampilan (web view)
    public function indexView(){
        $reminders = Reminder::all();
        return view('index', compact('reminders'));
    }

    // Menampilkan form untuk membuat reminder baru
    public function createView(){
        return view('create');
    }

    // Menyimpan reminder baru ke database (API + web)
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'reminder_time' => 'required|date',
        ]);

        $reminder = Reminder::create($validated);

        // Untuk API
        if ($request->expectsJson()) {
            return response()->json($reminder, 201);
        }

        // Redirect ke halaman reminder
        return redirect()->route('reminders.index')->with('success', 'Reminder created successfully.');
    }

    // Menampilkan reminder berdasarkan ID untuk tampilan (web view)
    public function showView($id){
        $reminder = Reminder::findOrFail($id);
        return view('show', compact('reminder'));
    }

    // Menampilkan form edit reminder
    public function editView($id){
        $reminder = Reminder::findOrFail($id);
        return view('edit', compact('reminder'));
    }

    // Memperbarui reminder berdasarkan ID
    public function update(Request $request, $id){
        $reminder = Reminder::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'reminder_time' => 'required|date',
        ]);

        $reminder->update($validated);

        // Untuk API
        if ($request->expectsJson()) {
            return response()->json($reminder, 200);
        }

        // Redirect ke halaman reminder setelah update
        return redirect()->route('reminders.index')->with('success', 'Reminder updated successfully.');
    }

    // Menghapus reminder berdasarkan ID
    public function destroy($id){
        $reminder = Reminder::findOrFail($id);
        $reminder->delete();

        // Untuk API
        if (request()->expectsJson()) {
            return response()->json(['message' => 'Reminder deleted successfully.'], 200);
        }

        // Redirect ke halaman reminder setelah delete
        return redirect()->route('reminders.index')->with('success', 'Reminder deleted successfully.');
    }
}
