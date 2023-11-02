<?php

namespace Khoa\KhoaStorage\Supports;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as IlluminateResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Storage
{
    /**
     * Summary of uploadFile
     *
     * @return bool|string
     */
    public function uploadFile(string $filePath, UploadedFile $uploadedFile): bool|string
    {
        if (! $filePath || ! $uploadedFile) {
            return false;
        }

        if (! $storage = FacadesStorage::put($filePath, $uploadedFile)) {
            return false;
        }

        return $storage;
    }

    /**
     * Summary of getFile
     *
     * @return bool|IlluminateResponse|Response
     */
    public function getFile(string $fileUrl): bool|IlluminateResponse|Response
    {
        ob_end_clean();

        return Response::make(FacadesStorage::get($fileUrl))
                ->header('Content-Type', FacadesStorage::mimeType($fileUrl));
    }

    /**
     * Summary of downloadFile
     *
     * @param string $fileUrl
     * @param string $fileName
     * @param array $headers
     * @return StreamedResponse|bool
     */
    public function downloadFile(string $fileUrl, string $fileName, array $headers): StreamedResponse|bool
    {
        ob_end_clean();

        if (! $storage = FacadesStorage::download($fileUrl, $fileName, $headers)) {
            return false;
        }

        return $storage;
    }

    /**
     * Summary of deleteFile
     *
     * @param string $fileUr
     * @return bool
     */
    public function deleteFile(string $fileUrl):bool
    {
        if (! FacadesStorage::disk(config('storage.disk'))->exists($fileUrl)) {
            return false;
        }

        return FacadesStorage::disk(config('storage.disk'))->delete($fileUrl);
    }
}
