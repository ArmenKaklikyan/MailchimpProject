<?php

namespace App\Http\Controllers;

use NZTim\Mailchimp\Mailchimp;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $mailChimp;

    public $successStatus = 200;
    public $badRequestStatus = 400;
    public $notFoundStatus = 404;
    public $serverErrorStatus = 500;

    /**
     * Connect to Mailchimp
     *
     */

    public function __construct()
    {
        try {
            $this->mailChimp = new Mailchimp(env('MAILCHIMP_KEY'));
        }catch (\Exception $e){
            return response()->json(['status' => 'Error', 'code' => $e->getCode(), 'message' => $e->getMessage()], $e->getCode());
        }
    }
}
