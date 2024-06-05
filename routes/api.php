<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




Route::get('/public', function () {
    return response()->json(['message' => 'This is a public endpoint.']);
});

Route::middleware(['auth.jwt'])->group(function () {
    Route::get('/secure', function () {
        return response()->json(['message' => 'This is a secure endpoint.']);
    });
});


Route::middleware('check.jwt')->get('/protected-resource', function () {
    /*  ab wsy passport apni middleware s token decrypt krta usko oauth token main search krta etc but hmara resource server woh db use nhe kr rha tha
    so hm sirf us key s decrypt krty and chceck krty
    eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZDNlZjQ4MmVkZjU1YzA1ZjE1ODBmZDlhODMzMWZmMDdjY2Q2NDFjY2JlNTYxODRjZjk4N2E3NzVmODExOTY4N2FhMjRhMzMzMTdiNTM2NjIiLCJpYXQiOjE3MTY3MzkzMzguMTA1NzIzLCJuYmYiOjE3MTY3MzkzMzguMTA1NzI3LCJleHAiOjE3MTgwMzUzMzcuNjE4ODk0LCJzdWIiOiIxIiwic2NvcGVzIjpbImNoZWNrLXVzZXIiXX0.eSKPfbn8X-MjiSLEM4wpBnOiO5jBqur_a6Hpsp35E5lIpfiIYNkVaZd_Jxt3aeo6V7y6LtxlcY1MNe5dV4MLkbzIFr-1EsfEHssiC8_GbSQULW8GN0XR6E8CzXoah0HWXx3G0nCS-LTJGmFWxg7VGQHMm9KcH8u8QJHSm7JwA0aYSmsV7YK4Esh_jNujrNAZoOehAhe7CfqeF2mVYDk8GZt9sxDJcVvbciqqe_VHE46FrVH5CrlwARe1l7l0So91iW9pghblC8BK836lLNr_4J6g9Muv5NYuRN9fOSaw46gL4deHdznGFlCSBwfL_GyluxfL7P9pIy2liJy9fLsTR4hJLFztaB_KgYNf0wleZe5SGii6yAnlRSDLK_2pbrKbPaRYXw-4nTOr0YJ7AVEOttBPbHUl2YlK71sZDmzRu7CzUQueBC54Xln4WtPtPnDSRZI00qufK3Tt86lD8H3INDl6DYak43i5x2q8sGEHNgZMDSzhW0RyPz3oZ_P84epzCkKF1N_AcC15_XHjL4DlACqO29a3F6T7Uwin4YC5ZROcf0Gljki-t0n8FWmKl8KPmXwawzM13DG_HVuFr-cysUw55D3YCDa0HIzYAJh_nEKytwD8rZJOb84uL948oF-CMuIO7APn4VfjhxtHl_lRZ7FN32yZvWp3t0KDl8V61J0
    yeh oper wala woh token jo abhi wali key decrupt kr sakti
    but fir hm n new bna k check krna tha
     */
    return response()->json(['message' => 'This is a protected resource.']);
});
