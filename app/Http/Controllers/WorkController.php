<?php  //このファイルにシフト申請画面、勤怠一覧画面のControllerを記述

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // DB ファサードを use する

use App\Work;  
use App\shift; 
use Psy\Command\WhereamiCommand;


class WorkController extends Controller
{
    
/**
 * シフト申請画面
 * 
 * @param Recest $request
 * @return Response
 */

public function work(Request $request)
{
    return view('works');
}

/**
 * 勤怠管理画面
 * 
 * @param Recest $request
 * @return Response
 */

public function shift(Request $request)
{
    return view('Works.shift');
}
}


