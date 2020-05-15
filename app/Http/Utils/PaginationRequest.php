<?php

namespace App\Http\Utils;

use Digbang\Utils\PaginationData;
use Illuminate\Http\Request;

trait PaginationRequest
{
    public function paginationData(Request $request, int $defaultLimit = 10): PaginationData
    {
        $limit = is_numeric($request->input('limit')) ? $request->input('limit') : $defaultLimit;
        $page = is_numeric($request->input('page')) ? $request->input('page') : 1;

        return new PaginationData($limit, $page);
    }
}
