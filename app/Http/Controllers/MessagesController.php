<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Requests\MessageRequest;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return response()->json($request->user()->messages, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MessageRequest $request)
    {
        $attrs = $request->validated();

        Message::create([
            ...$attrs,
            'user_id' => $request->user()->id,
        ]);

        return response()->json([
            'message' => [
                'Message created successfully!',
            ],
        ], 200);
    }
}
