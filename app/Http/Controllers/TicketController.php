<?php
namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\TicketCategory;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        return view('tickets.index', [
            'tickets' => auth()->user()->tickets()->latest()->paginate(10)
        ]);
    }

    public function create()
    {
        return view('tickets.create', [
            'categories' => TicketCategory::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:ticket_categories,id',
            'priority' => 'required|in:low,medium,high,critical'
        ]);

        auth()->user()->tickets()->create($validated);

        return redirect()->route('tickets.index')->with('success', 'Ticket created!');
    }
    // ... (other methods)
}
