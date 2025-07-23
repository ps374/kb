<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketAdminController extends Controller
{
    public function index()
    {
        return view('admin.tickets.index', [
            'tickets' => Ticket::with(['user', 'category'])->latest()->paginate(15)
        ]);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'status' => 'required|in:open,in_progress,resolved,closed',
            'assigned_to' => 'nullable|exists:users,id'
        ]);

        $ticket->update($validated);

        return back()->with('success', 'Ticket updated!');
    }
}
