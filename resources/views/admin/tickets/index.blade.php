@extends('admin.layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Manage Tickets</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ Str::limit($ticket->subject, 30) }}</td>
                    <td>
                        <span class="badge badge-{{ 
                            $ticket->status === 'open' ? 'warning' : 
                            ($ticket->status === 'resolved' ? 'success' : 'info') 
                        }}">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-sm btn-primary">Manage</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tickets->links() }}
    </div>
</div>
@endsection
