<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UploadedFile;

class UploadedFilesController extends Controller
{
    public function addTempFile(Request $request)
    {
        $uploadedFile = $request->file('file');
        $original_file_name = str_replace([' ', '"', "'", '\\', '%'], '_', $uploadedFile->getClientOriginalName());
        $size = $uploadedFile->getSize();
        $ext = $uploadedFile->extension();
        $type = $uploadedFile->getMimeType();
        $new_file_name = md5(time().$original_file_name);
        $path = 'tmp-files';
        $filename = time()."_tmp_file_{$new_file_name}.{$ext}";

        \Storage::disk('local')->putFileAs(
            "{$path}",
            $uploadedFile,
            $filename
        );

        $local_file = \Storage::disk('local')->get("{$path}/{$filename}");
        $tmp_url = null;

        if ($local_file) {
            $s3_file_path = "scheduling-app/tmp-files";
    
            if (\Storage::disk('s3')->put("{$s3_file_path}/{$filename}", $local_file, 'public')) {
                $tmp_url = \Storage::disk('s3')->url("{$s3_file_path}/{$filename}");
            }
        }

        $File = new UploadedFile;
        $File->filename = $filename;
        $File->original_filename = $original_file_name;
        $File->path = $path;
        $File->type = $type;
        $File->is_temp = true;
        $File->size = $size;
        $File->created_at = date('Y-m-d H:i:s');
        $File->updated_at = date('Y-m-d H:i:s');

        $File->save();

        $File->tmp_url = $tmp_url;

        return response()->json($File, 200);
    }
}
