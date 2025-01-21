<?php

namespace App\Http\Controllers;

use App\Models\NoHandphone;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function premium() {
        $no_tlp = NoHandphone::first()->no_tlp;
        $no_tlp = preg_replace('/^0/', '+62', $no_tlp);
        return view('admin.premium.index', compact('no_tlp'));
    }
}
