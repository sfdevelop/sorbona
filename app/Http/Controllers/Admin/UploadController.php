<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class UploadController extends BaseAdminController
{
    public function __invoke(Request $request)
    {
        //        if ($request->hasFile('upload')) {
        //            $originName = $request->file('upload')->getClientOriginalName();
        //            $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //            $extension = $request->file('upload')->getClientOriginalExtension();
        //            $fileName = $fileName.'_'.time().'.'.$extension;
        //            $request->file('upload')->move(public_path('pages'), $fileName);
        //            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
        //            $url = asset('pages/'.$fileName);
        //            $response =
        //                "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
        //            echo $response;
        //        }

        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/'.$fileName);

            return response()->json([
                'fileName' => $fileName, 'uploaded' => 1, 'url' => $url,
            ]);
        }
    }
}
