<?php

namespace App\Services\Ticket;

use Cloudinary\Cloudinary;
use function PHPSTORM_META\type;

use App\Helpers\CloudinaryHelper;
use App\Models\Ticket\Attachment;

class AttachmentsService
{
    public function saveFile(array $data): Attachment
    {

        $file = $data['attachment'];
        $name = $data['name'];
        $extension = $file->getClientOriginalExtension();

        $path = $file->getRealPath();
        $folder = 'attachments';
        $public_id = $name;

        $cloudinaryHelper = new CloudinaryHelper($path, $folder, $public_id, $extension);
        $upload = $cloudinaryHelper->uploadFile();

        if (!$upload) throw new \Exception('Error al subir el archivo.');

        $attachment = Attachment::create([
            'folder_path' => $folder,
            'file_name' => $name,
            'extension' => $extension,
            'ticket_id' => $data['ticket_id'],
            'url_evidence' => $upload['secure_url'],
            'user_id' => auth()->id(),
        ]);

        return $attachment;
    }

    public function deleteFile(Attachment $attachment): void
    {
        CloudinaryHelper::deleteFile($attachment->folder_path, $attachment->file_name, $attachment->extension);
        $attachment->delete();
    }
}
