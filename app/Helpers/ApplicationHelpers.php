<?php

use App\Helpers\JsonToObject;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActivityLogController;


function checkNull($value = "", $passValue = "- NIL -")
{
  return ($value) ? $value : '<i>'.$passValue.'</i>';
}

function checkMenuActive($menu)
{
  if(request()->is($menu)) {
    return 'cui-menu-left-item-active';
  }
  return '';
}

function getAuthUserImage()
{
  return 'http://cdn.securelinuxservers.com/assets/images/no-avatar.jpg';
}

function cdnAsset($url)
{
  return config('app.cdn_asset').'/'.$url;
}

function appDateFormat($date)
{
  return date('d, M Y', strtotime($date));
}

function checkCreatedBy()
{
  # code...
}

function checkAuthPermission($permission)
{
  return Auth::user()->can($permission);
}

function checkPermission($permission, $route = "")
{
  return true;
  if(! $route) {
    $route = explode('.', \Request::route()->getName())[0];
  }
  return Auth::user()->can($permission.'_'.$route);
}

function generalActivityLog($type='create',$parent_type='',$parent_id='',$child,$child_id='',$id,$message)
{
    //Activity log
    ActivityLogController::createActivity([
        "type" => $type,
        "action" => [
            "parent_type" =>    $parent_type,
            "parent_id"   =>   $parent_id,
            "value" => $child,
            "child_id" => $child_id,
            "id"    =>  $id,
            "message" => $message,
        ],
    ]);
}



?>
