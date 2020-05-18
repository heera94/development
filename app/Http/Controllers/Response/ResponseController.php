<?php

namespace App\Http\Controllers\Response;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

use Illuminate\Http\Request;

class ResponseController extends Controller
{

    public static function sendResponse($status = 'true', $result, $code = 200)
    {
        $date = date('Y-m-d h:i:s');

        switch ($status) {
            case 'true':

                return response()->json([
                    'status' => $status,
                    'result' => (isset($result['result'])) ? $result['result'] : '',
                    'message' => (isset($result['message'])) ? $result['message'] : 'Success',
                    'date' => $date
                ], $code);

                break;

            default:
                return response()->json([
                    'status' => $status,
                    'result' => (isset($result['result'])) ? $result['result'] : '',
                    'message' => (isset($result['message'])) ? $result['message'] : 'Error',
                    'date' => $date
                ], $code);

                break;
        }
    }
    public static function sendAjaxResponse($status = true, $data = [], $code = 404)
     {

       return response()->json([
         "status" => $status,
         "data" => (!empty($data["data"])) ? $data["data"] : null,
         "message" => (!empty($data["message"])) ? $data["message"] : 'Success',
         "timestamp" => date('Y-m-d h:i:s')
       ], ($status == true) ? 200 : $code);
     }

    //Form validation response
    public static function makeValidationResponse($validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'validation' => [
                    'errors' => $errors
                ],
                'message' => 'Bad request',
            ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

}
