<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Models\Ticket\ReplyComment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreReplyCommentRequest;
use App\Http\Resources\Ticket\ReplyCommentCollection;

class ReplyCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $comment_id = $request->query('comment');
        $reply_comments = ReplyComment::where('comment_id', $comment_id)->get();
        return new ReplyCommentCollection($reply_comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReplyCommentRequest $request)
    {
        try {
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $reply_comment = ReplyComment::create($data);
            return response([
                'message' => 'Respuesta creada exitosamente',
                'data' => $reply_comment
            ], 201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error creando la respuesta',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReplyComment $reply_comment)
    {
        try {
            $reply_comment->delete();
            return response([
                'message' => 'Respuesta eliminada exitosamente'
            ], 200);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error eliminando la respuesta',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
