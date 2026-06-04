<?php

namespace App\Http\Controllers;

use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        return Profile::with('user')
            ->where('status', 'approved')
            ->get();
    }

    public function stats()
    {
        return [
            'total' => Profile::count(),

            'approved' => Profile::where(
                'status',
                'approved'
            )->count(),

            'pending' => Profile::where(
                'status',
                'pending'
            )->count(),
        ];
    }

    public function adminProfiles()
    {
        return Profile::with('user')->get();
    }

    public function approve($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->status = 'approved';

        $profile->save();

        return response()->json([
            'message' => 'Profil validé'
        ]);
    }

    public function reject($id)
    {
        $profile = Profile::findOrFail($id);

        $profile->status = 'rejected';

        $profile->save();

        return response()->json([
            'message' => 'Profil rejeté'
        ]);
    }

    public function show($id)
    {
        return Profile::with('user')
            ->findOrFail($id);
    }

    public function sectors()
    {
        return Profile::select('sector')
            ->where('status', 'approved')
            ->distinct()
            ->get();
    }
}