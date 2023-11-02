<?php

if (! function_exists('get_image_url')) {
    /**
     * Summary of get_image_url
     * 
     * @param string $fileUrl
     * @return string
     */
    function get_image_url(string $fileUrl): string
    {
        return route('storage_package.get_image', ['file_url' => $fileUrl]);
    }
}
