<?php

namespace App\Services\Ticket;

use App\Models\Ticket\Comment;
use App\Helpers\CloudinaryHelper;

class CommentService
{
    public function createComment(array $data): Comment
    {

        if (!empty($data['evidence'])) {
            $file = $data['evidence'];
            $name = 'comment_' . time();
            $extension = $file->getClientOriginalExtension();
            $data['file_name'] = $name;
            $data['extension'] = $extension ?? null;

            $path = $file->getRealPath();
            $folder = 'comments';
            $public_id = $name;

            $cloudinaryHelper = new CloudinaryHelper($path, $folder, $public_id, $extension);
            $upload = $cloudinaryHelper->uploadFile();

            if (!$upload) throw new \Exception('Error al subir el archivo.');
            $data['url_evidence'] = $upload['secure_url'];
        }

        $data['user_id'] = auth()->id();
        return Comment::create($data);
    }

    public function deleteComment(Comment $comment): void
    {
        if ($comment->user_id !== auth()->id())
            throw new \Exception('No tienes permiso para eliminar este comentario.');

        if ($comment->url_evidence) {
            CloudinaryHelper::deleteFile('comments', $comment->file_name, $comment->extension);
        }

        $comment->delete();
    }
}
