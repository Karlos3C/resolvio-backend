<?php

namespace App\Http\Controllers\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Ticket\StoreAttachmentRequest;
use App\Http\Resources\Ticket\AttachmentCollection;
use App\Http\Resources\Ticket\AttachmentResource;
use App\Models\Ticket\Attachment;
use App\Services\Ticket\AttachmentsService;

class AttachmentController extends Controller
{
    public function __construct(private AttachmentsService $attachments_service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ticket_id = $request->query('ticket');
        $attachments = Attachment::where('ticket_id', $ticket_id)->get();
        return new AttachmentCollection($attachments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAttachmentRequest $request)
    {
        try {
            $attachment = $this->attachments_service->saveFile($request->validated());
            return response([
                'message' => 'Archivo subido correctamente',
                'data' => $attachment
            ], 201);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al subir el archivo',
                'error' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attachment $attachment)
    {
        return new AttachmentResource($attachment);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attachment $attachment)
    {
        try {
            $this->attachments_service->deleteFile($attachment);
            return response([
                'message' => 'Archivo eliminado correctamente'
            ]);
        } catch (\Throwable $th) {
            return response([
                'message' => 'Error al eliminar el archivo',
                'error' => $th->getMessage()
            ], 500);
        }
    }
}
