<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'reminder_time' => 'required|date',
        ]);

        $reminder = Reminder::create([
            'title' => $request->title,
            'description' => $request->description,
            'reminder_time' => $request->reminder_time,
        ]);

        return response()->json($reminder, 201);
    }

    public function index(){
        return response()->json(Reminder::all());
    }

    public function show($id){
        $reminder = Reminder::findOrFail($id);
        return response()->json($reminder);
    }

    public function update(Request $request, $id){
        $reminder = Reminder::findOrFail($id);
        $reminder->update($request->all());
        return response()->json($reminder);
    }

    public function destroy($id){
        Reminder::destroy($id);
        return response()->json(['message' => 'Reminder Deleted Successfully']);
    }
}
