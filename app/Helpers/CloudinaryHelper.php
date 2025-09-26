<?php


namespace App\Helpers;

use Cloudinary\Api\ApiResponse;
use Cloudinary\Cloudinary;

class CloudinaryHelper
{
    protected string $path;
    protected string $folder;
    protected string $public_id;
    protected string $extension;

    public function __construct(string $path, string $folder, string $public_id, string $extension)
    {
        $this->path = $path;
        $this->folder = $folder;
        $this->public_id = $public_id;
        $this->extension = $extension;
    }


    public function uploadFile(): ApiResponse
    {
        $cdn = new Cloudinary($_ENV['CLOUDINARY_URL']);
        $upload = $cdn->uploadApi()->upload($this->path, [
            'folder' => $this->folder,
            'public_id' => $this->public_id,
            'resource_type' => $this->extension === 'pdf' ? 'raw' : 'image',
        ]);

        if (!$upload) throw new \Exception('Error al subir el archivo.');

        return $upload;
    }

    public static function deleteFile(string $folder, string $public_id, string $extension): void
    {
        $cdn = new Cloudinary($_ENV['CLOUDINARY_URL']);
        $public_id = $folder . '/' . $public_id;

        $delete = $cdn->uploadApi()->destroy($public_id, [
            'resource_type' => $extension === 'pdf' ? 'raw' : 'image',
        ]);

        if ($delete['result'] !== 'ok' && $delete['result'] !== 'not found')
            throw new \Exception('Error al eliminar el archivo del CDN.');
    }
}
