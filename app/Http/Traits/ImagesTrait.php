<?php

namespace App\Http\Traits;

trait ImagesTrait {
    private function uploadImage($file, $filename, $path, $oldFile = null) {

        $file->move(public_path('/uploads' . $path), $filename);
        if (!is_null($oldFile)) {
            unlink(public_path('/uploads' . $oldFile));
        }
        return true;
    }
}
