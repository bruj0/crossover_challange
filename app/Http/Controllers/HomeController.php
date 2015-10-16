<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use View;
class HomeController extends Controller
{
    /**
     * Display the input form 
     *
     * @return html
     */
    public function index()
    {
        //
        $encrypter = app('Illuminate\Encryption\Encrypter');
        $encrypted_token = $encrypter->encrypt(csrf_token());
        return View::make('content', ['token' => $encrypted_token ] );
    }

    /**
     * Beautify the number 
     *
     * @return json array
     * [error] = true if there is a validation error
     * [text] = text to show
     * or
     * [number] = number transformed
     */
    public function work(Request $request)
    {
        //
        $number = $request->input('number');
        $number=trim($number);
        
        if(!is_numeric($number))
            return json_encode(
                               array('error' => true,
                                     'text'  => 'The input is not a number'
                                     ));
        
        if($number>1000000000000)
            $ret=round(($number/1000000000000),1).'T';
        else if($number>1000000000)
            $ret= round(($number/1000000000),1).'B';
        else
            if($number>1000000)
                $ret= round(($number/1000000),1).'M';
            else if($number>1000)
                    $ret=round(($number/1000),1).'Th';
                        else $ret=$number;
        
        return json_encode(array('number' => $ret));
    }

}
