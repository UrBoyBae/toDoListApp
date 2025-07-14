<?php

namespace App\Http\Controllers;

use App\Models\Habits;
use App\Models\Lists;
use App\Models\Reminders;
use App\Models\Tags;
use App\Models\Tasks;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ActivitiesController extends Controller
{
    public function allday()
    {
        $user = auth()->user();
        session(['full_name' => $user->name]);
        $lists = Lists::all();
        $tags = Tags::all();
        $habits = Habits::orderBy('start_time', 'asc')->get();
        $toDoTasks = Tasks::with(['lists', 'tags', 'reminders'])->where('status', 0)->get();
        $inProgressTasks = Tasks::with(['lists', 'tags', 'reminders'])->where('status', 1)->get();
        $completedTasks = Tasks::with(['lists', 'tags', 'reminders'])->where('status', 2)->get();

        $toDoCount = $toDoTasks->count();
        $inProgressCount = $inProgressTasks->count();
        $completedCount = $completedTasks->count();

        $today = Carbon::today();

        $reminderTasks = Tasks::with(['lists', 'tags', 'reminders' => function ($query) use ($today) {
            $query->orderBy('remind_at', 'asc');
        }])->where('status', 0)->get();

        return view('components.templates.activities.index', [
            'title' => 'All Day Activities',
            'lists' => $lists,
            'tags' => $tags,
            'habits' => $habits,
            'toDoTasks' => $toDoTasks,
            'inProgressTasks' => $inProgressTasks,
            'completedTasks' => $completedTasks,
            'toDoCount' => $toDoCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'reminderTasks' => $reminderTasks,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'list_id'     => 'required|exists:lists,list_id',
            'tag_id'      => 'required|exists:tags,tag_id',
            'title'       => 'required|string|max:255',
            'detail_task' => 'nullable|string',
            'remind_at'   => 'nullable|date',
            'note'        => 'nullable|string|max:255',
        ]);

        $taskId = Uuid::uuid4()->toString();

        $task = Tasks::create([
            'task_id'     => $taskId,
            'list_id'     => $request->list_id,
            'tag_id'      => $request->tag_id,
            'title'       => $request->title,
            'detail_task' => $request->detail_task,
            'status'      => 0,
        ]);

        if ($request->remind_at) {
            Reminders::create([
                'reminder_id' => Uuid::uuid4()->toString(),
                'task_id'     => $taskId,
                'remind_at'   => $request->remind_at,
                'note'        => $request->note ?? 'No note',
            ]);
        }

        return redirect()->route('activities.allday')->with('success', 'Activity added successfully.');
    }

    public function update(Request $request, $task_id)
    {
        $request->validate([
            'list_id'     => 'required|exists:lists,list_id',
            'tag_id'      => 'required|exists:tags,tag_id',
            'title'       => 'required|string|max:255',
            'detail_task' => 'nullable|string',
            'remind_at'   => 'nullable|date',
            'note'        => 'nullable|string|max:255',
            'status'      => 'required|in:0,1,2',
        ]);

        DB::beginTransaction();
        try {
            // Update task
            $task = Tasks::findOrFail($task_id);
            $task->update([
                'list_id'     => $request->list_id,
                'tag_id'      => $request->tag_id,
                'title'       => $request->title,
                'detail_task' => $request->detail_task,
                'status'      => $request->status,
            ]);

            // Update or create reminder
            if ($request->remind_at) {
                Reminders::updateOrCreate(
                    ['task_id' => $task_id],
                    [
                        'remind_at' => $request->remind_at,
                        'note'      => $request->note,
                    ]
                );
            } else {
                // Jika tidak ada tanggal, hapus reminder jika ada
                Reminders::where('task_id', $task_id)->delete();
            }

            DB::commit();
            return redirect()->route('activities.allday')->with('success', 'Activity updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update activity: ' . $e->getMessage());
        }
    }

    public function destroy($task_id)
    {
        $task = Tasks::where('task_id', $task_id)->firstOrFail();

        // Hapus reminder jika ada
        $task->reminders()->delete();

        // Hapus task utama
        $task->delete();

        return redirect()->route('activities.allday')->with('success', 'Activity deleted successfully.');
    }

    public function today()
    {
        $user = auth()->user();
        session(['full_name' => $user->name]);
        $lists = Lists::all();
        $tags = Tags::all();
        $habits = Habits::orderBy('start_time', 'asc')->get();

        $today = Carbon::today();

        $toDoTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 0)
            ->whereHas('reminders', function ($query) use ($today) {
                $query->whereDate('remind_at', $today);
            })
            ->get();

        $inProgressTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 1)
            ->whereHas('reminders', function ($query) use ($today) {
                $query->whereDate('remind_at', $today);
            })
            ->get();

        $completedTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 2)
            ->whereHas('reminders', function ($query) use ($today) {
                $query->whereDate('remind_at', $today);
            })
            ->get();

        $toDoCount = $toDoTasks->count();
        $inProgressCount = $inProgressTasks->count();
        $completedCount = $completedTasks->count();

        // Reminder panel juga pakai remind_at hari ini
        $reminderTasks = Tasks::with(['lists', 'tags', 'reminders' => function ($query) use ($today) {
            $query->whereDate('remind_at', $today);
        }])->where('status', 0)
            ->whereHas('reminders', function ($query) use ($today) {
                $query->whereDate('remind_at', $today);
            })
            ->get();

        return view('components.templates.activities.index', [
            'title' => 'Today Activities',
            'lists' => $lists,
            'tags' => $tags,
            'habits' => $habits,
            'toDoTasks' => $toDoTasks,
            'inProgressTasks' => $inProgressTasks,
            'completedTasks' => $completedTasks,
            'toDoCount' => $toDoCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'reminderTasks' => $reminderTasks,
        ]);
    }

    public function tomorrow()
    {
        $user = auth()->user();
        session(['full_name' => $user->name]);
        $lists = Lists::all();
        $tags = Tags::all();
        $habits = Habits::orderBy('start_time', 'asc')->get();

        $tomorrow = \Carbon\Carbon::tomorrow();

        $toDoTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 0)
            ->whereHas('reminders', function ($query) use ($tomorrow) {
                $query->whereDate('remind_at', $tomorrow);
            })
            ->get();

        $inProgressTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 1)
            ->whereHas('reminders', function ($query) use ($tomorrow) {
                $query->whereDate('remind_at', $tomorrow);
            })
            ->get();

        $completedTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 2)
            ->whereHas('reminders', function ($query) use ($tomorrow) {
                $query->whereDate('remind_at', $tomorrow);
            })
            ->get();

        $toDoCount = $toDoTasks->count();
        $inProgressCount = $inProgressTasks->count();
        $completedCount = $completedTasks->count();

        // Reminder panel juga pakai remind_at hari ini
        $reminderTasks = Tasks::with(['lists', 'tags', 'reminders' => function ($query) use ($tomorrow) {
            $query->whereDate('remind_at', $tomorrow);
        }])->where('status', 0)
            ->whereHas('reminders', function ($query) use ($tomorrow) {
                $query->whereDate('remind_at', $tomorrow);
            })
            ->get();

        return view('components.templates.activities.index', [
            'title' => 'Tomorrow Activities',
            'lists' => $lists,
            'tags' => $tags,
            'habits' => $habits,
            'toDoTasks' => $toDoTasks,
            'inProgressTasks' => $inProgressTasks,
            'completedTasks' => $completedTasks,
            'toDoCount' => $toDoCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'reminderTasks' => $reminderTasks,
        ]);
    }

    public function nextweek()
    {
        $user = auth()->user();
        session(['full_name' => $user->name]);
        $lists = Lists::all();
        $tags = Tags::all();
        $habits = Habits::orderBy('start_time', 'asc')->get();

        $startDate = \Carbon\Carbon::now()->startOfDay(); // Hari ini
        $endDate = \Carbon\Carbon::now()->addDays(7)->endOfDay(); // 7 hari ke depan

        $toDoTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 0)
            ->whereHas('reminders', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('remind_at', [$startDate, $endDate]);
            })
            ->get();

        $inProgressTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 1)
            ->whereHas('reminders', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('remind_at', [$startDate, $endDate]);
            })
            ->get();

        $completedTasks = Tasks::with(['lists', 'tags', 'reminders'])
            ->where('status', 2)
            ->whereHas('reminders', function ($query) use ($startDate, $endDate) {
                $query->whereBetween('remind_at', [$startDate, $endDate]);
            })
            ->get();

        $toDoCount = $toDoTasks->count();
        $inProgressCount = $inProgressTasks->count();
        $completedCount = $completedTasks->count();

        $reminderTasks = Tasks::with(['lists', 'tags', 'reminders' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('remind_at', [$startDate, $endDate]);
        }])->where('status', 0)->whereHas('reminders', function ($query) use ($startDate, $endDate) {
            $query->whereBetween('remind_at', [$startDate, $endDate]);
        })->get();


        return view('components.templates.activities.index', [
            'title' => 'Next 7 Days Activities',
            'lists' => $lists,
            'tags' => $tags,
            'habits' => $habits,
            'toDoTasks' => $toDoTasks,
            'inProgressTasks' => $inProgressTasks,
            'completedTasks' => $completedTasks,
            'toDoCount' => $toDoCount,
            'inProgressCount' => $inProgressCount,
            'completedCount' => $completedCount,
            'reminderTasks' => $reminderTasks,
        ]);
    }
}
