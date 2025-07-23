<?php
namespace App\Http\Controllers;
use App\Models\Attachment;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['file' => 'required|file|max:2048']);

        $path = $request->file('file')->store('attachments');

        $attachment = Attachment::create([
            'path' => $path,
            'original_name' => $request->file('file')->getClientOriginalName(),
            'mime_type' => $request->file('file')->getMimeType(),
            'size' => $request->file('file')->getSize()
        ]);

        return response()->json([
            'url' => asset("storage/$path"),
            'id' => $attachment->id
        ]);
    }
}
