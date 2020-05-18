<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Response\ResponseController;
use App\Http\Controllers\ResponseController as Response;



class Settings extends Controller
{
    public static function createdBy($id, $name)
    {
        if(Auth::user()->id == $id)
            return 'Me';

        return $name;
    }

    public static function changeStatus($model, $id, $request)
    {
        $model = '\\App\\Model\\Admin\\' . $model;

        if($status = $model::select('status')->where('id', $id)->first()){
            if($status->status==1){
                $updateStatus = 0;
            }else {
                $updateStatus = 1;
            }
            $model::where('id',$id)->update(['status'=>$updateStatus]);
            return ResponseController::sendResponse(true, ['message' => 'Successfully updated!']);

        }
        return ResponseController::sendResponse(false, ['message' => 'Failed!']);

    }

    public static function deleteData($model, $id, $request, $baseModals = false)
    {
      if($baseModals == true) {
        $model = '\\App\\' . $model;
      }else {
        $model = '\\App\\Model\\Admin\\' . $model;

      }
        // echo $id;
        if($model::where('id', $id)->delete()) {
            return ResponseController::sendResponse(true, ['message' => 'Successfully updated!']);
        }
        return ResponseController::sendResponse(false, ['message' => 'Failed!']);
    }

    public static function getCurrentDay($day)
    {
        return [
                  '1' => 'MON',
                  '2' => 'TUE',
                  '3' => 'WED',
                  '4' => 'THU',
                  '5' => 'FRI',
                  '6' => 'SAT',
                  '7' => 'SUN'
              ][$day];
    }
}
