<?php

namespace Longmancode\OverWatch\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OverWatchController extends Controller
{

    public function index(){
        return view('OverWatch::login');
    }
    public function assets(Request $request)
    {
        $path = str_start(str_replace(['../', './'], '', urldecode($request->path)), '/');
        $path = realpath(__DIR__.'/../../assets'.$path);
        if (File::exists($path)) {
            $mime = '';
            if (ends_with($path, '.js')) {
                $mime = 'text/javascript';
            } elseif (ends_with($path, '.css')) {
                $mime = 'text/css';
            } else {
                $mime = File::mimeType($path);
            }
            $response = response(File::get($path), 200, ['Content-Type' => $mime]);
            $response->setSharedMaxAge(31536000);
            $response->setMaxAge(31536000);
            $response->setExpires(new \DateTime('+1 year'));

            return $response;
        }
        return response('', 404);
    }
}
