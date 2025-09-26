<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Models\Ticket\Comment;
use App\Http\Controllers\Controller;
use App\Services\Ticket\CommentService;
use App\Http\Requests\Ticket\StoreCommentRequest;
use App\Http\Requests\Ticket\UpdateCommentRequest;
use App\Http\Resources\Ticket\CommentCollection;
use App\Http\Resources\Ticket\CommentResource;

class CommentController extends Controller
{
    public function __construct(private CommentService $comment_service) {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ticket_id = $request->query('ticket');
        $comments = Comment::where('ticket_id', $ticket_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return new CommentCollection($comments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        try {
            $comment = $this->comment_service->createComment($request->validated());
            return response([
                'message' => 'Comentario agregado correctamente',
                'data' => $comment
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al agregar el comentario',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return new CommentResource($comment);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        try {
            $this->comment_service->deleteComment($comment);
            return response([
                'message' => 'Comentario eliminado correctamente',
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al eliminar el comentario',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
