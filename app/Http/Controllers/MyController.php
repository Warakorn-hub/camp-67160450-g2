<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    // ... ฟังก์ชันเดิม (index, myfunction) เก็บไว้ได้ ...

    // เพิ่มฟังก์ชันนี้สำหรับรับค่าจากฟอร์ม html101
    function submitForm(Request $request){
        // รับข้อมูลทั้งหมดจาก input
        $data = $request->all();

        // ส่งข้อมูลไปยัง View ชื่อ 'result' (เดี๋ยวเราสร้างไฟล์นี้ในข้อ 4)
        return view('result', compact('data'));
    }
}
