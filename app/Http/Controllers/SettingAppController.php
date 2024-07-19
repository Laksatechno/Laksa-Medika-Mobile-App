<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Artisan;


class SettingAppController extends Controller
{
    //View Setting/index
    public function index()
    {
        return view('setting.index');
    }

    public function clearViewCache()
    {
        Artisan::call('view:clear');
        return redirect('/pengaturan')->with('status', "View cache cleared!");
    }

    public function clearRouteCache()
    {
        Artisan::call('route:clear');
        return redirect('/pengaturan')->with('status', "Route cache cleared!");
    }

    public function clearConfigCache()
    {
        Artisan::call('config:clear');
        return redirect('/pengaturan')->with('status',"Config cache cleared!");
    }

    public function clearAllCache()
    {
        Artisan::call('cache:clear');
        return redirect('/pengaturan')->with('status', "All caches cleared!");
    }

    public function clearAll()
    {
        $this->clearViewCache();
        $this->clearRouteCache();
        $this->clearConfigCache();
        $this->clearAllCache();
        return redirect('/pengaturan')->with('status', "All caches cleared!");
    }

    public function clearSession()
    {
        session()->flush();
        return redirect('/pengaturan')->with('status', "Session cleared!");
    }
    // <!--Clear Logs-->


    public function StorageLink(){
        Artisan::call('storage:link');
        return redirect('/pengaturan')->with('status', "Storage link created!");
    }
}
