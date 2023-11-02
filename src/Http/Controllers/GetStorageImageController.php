<?php

namespace Khoa\KhoaStorage\Http\Controllers;

use App\Http\Controllers\Controller;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Response;
use Khoa\KhoaStorage\Http\Requests\GetImageStorageImageRequest;

class GetStorageImageController extends Controller
{
    /**
     * Summary of __invoke
     *
     * @param GetImageStorageImageRequest $request
     * @return Response|HttpResponse
     */
    public function __invoke(GetImageStorageImageRequest $request): Response|HttpResponse
    {
        if (! $response = \StoragePackage::setFile($request->validated('file_url'))) {
            return abort(404);
        }

        return $response;
    }
}
