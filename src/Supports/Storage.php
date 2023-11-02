<?php

namespace Khoa\KhoaStorage\Supports;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage as FacadesStorage;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Response as IlluminateResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class Storage
{
    protected $storage;

    /**
     * Summary of initStorage
     *
     * @param string|null $disk
     * @return self
     */
    public function initStorage(?string $disk = null): self
    {
        $this->storage = FacadesStorage::disk(($disk ?: config('filesystems.default')));

        return $this;
    }

    /**
     * Summary of uploadFile
     *
     * @return bool|string
     */
    public function uploadFile(?string $filePath = '', UploadedFile $uploadedFile): bool|string
    {
        if (! $uploadedFile) {
            return false;
        }

        if (! $storage = $this->storage->put($filePath, $uploadedFile)) {
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

        return Response::make($this->storage->get($fileUrl))
                ->header('Content-Type', $this->storage->mimeType($fileUrl));
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

        if (! $storage = $this->storage->download($fileUrl, $fileName, $headers)) {
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
        if (! $this->storage->exists($fileUrl)) {
            return false;
        }

        return $this->storage->delete($fileUrl);
    }
}
