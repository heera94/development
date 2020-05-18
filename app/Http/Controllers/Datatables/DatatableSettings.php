<?php

namespace App\Http\Controllers\Datatables;

use Illuminate\Http\Request;
use Crypt;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class DatatableSettings extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | @Author:Anju Thomas
    | @Modified at: 18-09-2019
    |--------------------------------------------------------------------------
    | function to set table actions(edit,delete)
    */
    public static function tableActions($url, $id, $hideEdit='', $hideDelete=''){
      $id = Crypt::encrypt($id);

      $editUrl = route($url.'.edit', $id);
      $deleteUrl  =  route($url.'.destroy', $id);

      $deleteaction = '<span data-url="'.$deleteUrl.'" class="waves-effect btn-flat btn-small delete-data mouse"><i class="badge badge-lg badge-danger"><i class="fas fa-trash-alt"></i> delete</i></span>';

      $editaction = '<a href ="'.$editUrl.'" class="edit-table-data"><i class="badge badge-lg badge-success btn-loader"><i class="fas fa-edit"></i> edit</i></a>';
      if($hideEdit == 'E')
        {
           return $deleteaction;
        }
        elseif($hideDelete == 'D')
        {
           return $editaction;
        }
        else {
           return $editaction.' '.$deleteaction;
        }
    }
    /*
    |--------------------------------------------------------------------------
    | @Author:Anju Thomas
    | @Modified at: 18-09-2019
    |--------------------------------------------------------------------------
    | function to set different date formats
    */
    public static function showCreatedDate($created_at,$type=""){
      switch ($type) {
        case 'd M Y' :
            $result = date('d M Y', strtotime($created_at));
            break;
        case 'd/m/Y' :
            $result = \Carbon\Carbon::parse($created_at)->format('d/m/Y');
            break;
        case 'show-diffForHumans' :
            $result = '<div>'.Carbon::parse($created_at)->diffForHumans().'</div><div class="font-size-12">'.date('d, M Y', strtotime($created_at)).'</div>';
            break;
        case 'diffForHumans-only';
            $result =  Carbon::parse($created_at)->diffForHumans();
            break;
        case 'default' :
            return 'Nil';
            break;
      }
      return $result;
    }
    /*
    |--------------------------------------------------------------------------
    | @Author:Anju Thomas
    | @Modified at: 18-09-2019
    |--------------------------------------------------------------------------
    | function to set status changes
    */
    public static function dataTableStatusSwitcher($status, $id, $url){
      $id = Crypt::encrypt($id);

      $btn = '<i class="fas fa-ban"></i> Inactive';
      $color = 'danger';

      if($status == 1) {
        $btn = '<i class="fas fa-check"></i> Active';
        $color = 'success';
      }

      return '<span data-url="'.url($url).'" data-id="'.$id.'" data-type="datatable" class="badge badge-lg badge-'.$color.' change-status mouse">'.$btn.'</span>';
    }

    public static function checkBox($id, $type = "")
    {
      if($type == "checkbox")
        return '<div><input type="checkbox" value="'.\Crypt::encrypt($id).'" name="table_check_box[]" class="table-checkbox"/></div>';

      return $id;
    }
}
