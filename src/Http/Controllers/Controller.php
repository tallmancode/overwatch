<?php

namespace Tallmancode\OverWatch\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Tallmancode\OverWatch\Traits\AlertsMessages;
use Validator;

abstract class Controller extends BaseController
{
   // use DispatchesJobs,
       // ValidatesRequests,
      //  AuthorizesRequests,
     //   AlertsMessages;


}
