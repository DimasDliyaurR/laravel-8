<?php

namespace App\Http\Controllers\Api;

use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\PostRecource;

class PostController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $posts = stok::all();

        //return collection of posts as a resource
        return new PostRecource(true, 'List', $posts);
    }

    public function show($id)
    {
        //get posts
        $posts = DB::table('stoks')->where('kode_barang', $id)->get();

        //return collection of posts as a resource
        // return new PostRecource(true, 'List', $posts);
        return response()->json([
            'success' => true,
            'message' => 'List',
            'data' => $posts
        ]);
    }
}
