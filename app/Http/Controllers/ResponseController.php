<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponseController extends Controller
{
  public static function sendResponse($request, $result)
  {
    if($request->is('api/*')) {
      return response()->json([
        "status" => true,
        "data" => (!empty($result["data"])) ? $result["data"] : null,
        "message" => (!empty($result["message"])) ? $result["message"] : null,
        "timestamp" => date('Y-m-d h:i:s')
      ], 200);
    }
    flash()->success((!empty($result["message"])) ? $result["message"] : null);
    return redirect()->route($result['route']);
  }

  public static function errorResponse($request, $result)
  {
    // flash()->error(trans('messages.default-error'));
    if($request->is('api/*')) {
      return response()->json([
        "status" => false,
        "message" => trans('messages.default-error'),
        "timestamp" => date('Y-m-d h:i:s')
      ], 404);
    }
    return abort(404);
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
}
