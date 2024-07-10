<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::paginate(9);
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:members,email',
            'phone' => 'required',
            'address' => 'required',
            'professional_summary' => 'required',
        ]);

        $member = new Member($request->all());
        $member->uuid = Str::uuid();
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function showByUuid($uuid)
    {
        $member = Member::where('uuid', $uuid)->firstOrFail();
        return view('members.show', compact('member'));
    }

    public function edit($uuid)
    {
        $member = Member::where('uuid', $uuid)->firstOrFail();
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $uuid)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'email' => 'required|email|unique:members,email,' . $uuid . ',uuid',
            'phone' => 'required',
            'address' => 'required',
            'professional_summary' => 'required',
        ]);

        $member = Member::where('uuid', $uuid)->firstOrFail();
        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy($uuid)
    {
        $member = Member::where('uuid', $uuid)->firstOrFail();
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}