<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

 use App\Work;  

class WorkController extends Controller
{
    
/**
 * シフト申請画面
 * 
 * @param Recest $request
 * @return Response
 */

public function index(Request $request)
{
    $works = Work::orderBy('created_at', 'asc')->get();
    return view('works.index', [
        'works' => $works,
    ]);
}
}

