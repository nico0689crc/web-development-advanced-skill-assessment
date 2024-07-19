<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if(!$user->isAdministrator())
        {
            $member = $user->member;
            return view('members.show', compact('member'));
        }

        $members = Member::paginate(9);
        
        return view('members.index', compact(['members','user']));
    }

    public function create()
    {   
        if (!auth()->user()->can('create', Member::class)) {
            abort(404);
        }

        return view('members.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->can('create', Member::class)) {
            abort(404);
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => 'required',
            'address' => 'required',
            'professional_summary' => 'required',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make(env('APPLICATION_PASSWORD')),
        ]);

        $user->assignRole('member');

        event(new Registered($user));

        $member = new Member($request->all());
        $member->uuid = Str::uuid();
        $member->user_id = $user->id;
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function showByUuid($uuid)
    {
        if (!auth()->user()->can('update', $member)) {
            abort(404);
        }
        
        $member = Member::where('uuid', $uuid)->firstOrFail();
        return view('members.show', compact('member'));
    }

    public function edit($uuid)
    {
        $member = Member::where('uuid', $uuid)->firstOrFail();

        if (!auth()->user()->can('update', $member)) {
            abort(404);
        }

        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $uuid)
    {
        $member = Member::where('uuid', $uuid)->firstOrFail();

        if (!auth()->user()->can('update', $member)) {
            abort(404);
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'phone' => 'required',
            'address' => 'required',
            'professional_summary' => 'required',
        ]);

        $user = User::where('id', $member->user_id)->firstOrFail();

        $member->update($request->all());
        $user->update($request->all());

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy($uuid)
    {
        $member = Member::where('uuid', $uuid)->firstOrFail();
        
        if (!auth()->user()->can('delete', $member)) {
            abort(404);
        }

        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}