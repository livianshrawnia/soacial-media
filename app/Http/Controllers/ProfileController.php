<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        return view('profiles.show', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profiles.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'bio' => 'nullable|string|max:255',
            'personal_interests' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:20',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $profileData = $request->only('bio', 'personal_interests', 'contact_number');

        if ($request->hasFile('profile_picture')) {
            $profileData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        $user->profile()->update($profileData);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}

