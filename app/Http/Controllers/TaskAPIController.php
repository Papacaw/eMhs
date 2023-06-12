<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskAPIController extends Controller
{
    public function create(Request $request){
        $task = Task::create([
            'nama' => $request -> nama,
            'judul_task' => $request -> judul_task,
            'deskripsi_task' => $request -> deskripsi_task
        ]);

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil di Tambah',
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal di Tambah',
            ], 400);
        }
    }

    public function read(){
        $task = Task::all();
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil di Wujudkan',
            'data' => $task
        ], 200);
    }

    public function update($id, Request $request){
        $task = Task::find($id)->update([
            'nama' => $request -> nama,
            'judul_task' => $request -> judul_task,
            'deskripsi_task' => $request -> deskripsi_task
        ]);

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil di Ganti'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal di Ganti'
            ], 400);
        }
    }

    public function delete($id){
        $task = Task::find($id)->delete();

        if ($task) {
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil di Hapus'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data Gagal di Hapus'
            ], 400);
        }
    }
}
