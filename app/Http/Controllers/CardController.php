<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qrcode;

class CardController extends Controller
{
    public function index()
    {
        $qrcodes = Qrcode::all();
        return view('index', compact('qrcodes'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'linkedin_url' => 'required',
            'github_url' => 'required',
            'bio' => 'required|min:20|max:1000',
        ]);

        $qrcode = Qrcode::create($request->all());

        return redirect()->route('qrcode.showDetails', $qrcode->slug);
    }

    public function showDetails($slug){
        $qrcode = QrCode::where('slug', '=', $slug)->first();

        return view('showDetails', compact('qrcode'));
    }

    public function show(string $slug)
    {
        $qrcode = QrCode::where('slug', '=', $slug)->first();
        return view('show', compact('qrcode'));
    }

    public function edit(string $id)
    {
        return view('edit', compact('qrcode'));
    }

    public function update(Request $request, qrcode $qrcode)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
            'linkedin_url' => 'required',
            'github_url' => 'required',
            'bio' => 'required|min:20|max:1000',
        ]);

        $qrcode->update($request->all());

        return redirect()->route('qrcode.index')->with('success', 'QrCode updated successfully.');
    }

    public function destroy(qrcode $qrcode)
    {
        $qrcode->delete();

        return redirect()->route('qrcode.index')->with('success', 'QrCode deleted successfully.');
    }
}
