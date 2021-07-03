<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    
    public function simple_dropdown(Request $request)
    {
        $result = generate_simple_dropdown($request->table, $request->column, $request->where, $request->selected);
        return $result;
    }
}
