<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Response\APIResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseHTTP;

class GeneralController extends Controller
{

    /**
     * Define the API response
     */
    public function __construct()
    {
        $this->APIResponse = new APIResponse();
    }

    /**
     * return the Faq page link
     */
    public function GetFaq(Request $request)
    {
        try {
              $result['link'] = 'https://laravel.com/';
              
              return $this->APIResponse->respondWithMessageAndPayload($result);
        } catch (\Exception $e) {
            return $this->APIResponse->handleAndResponseException($e);
        }
    }

    /**
     * return the Privacy Policy page link
     */
    public function GetPrivacyPolicy(Request $request)
    {
        try {
                $result['link'] = 'https://laravel.com/';
                
                return $this->APIResponse->respondWithMessageAndPayload($result);
        } catch (\Exception $e) {
            return $this->APIResponse->handleAndResponseException($e);
        }
    }


    /**
     * return the Terms and Condition page link
     */
    public function GetTermsCondition(Request $request)
    {
        try {
                $result['link'] = 'https://laravel.com/';
                return $this->APIResponse->respondWithMessageAndPayload($result);
        } catch (\Exception $e) {
            return $this->APIResponse->handleAndResponseException($e);
        }
    }


    


    
}
