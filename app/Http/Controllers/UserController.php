<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Intervention\Image\Laravel\Facades\Image;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()
            ->orderBy('id')
            ->get();

        return view('users', [
            'title' => 'User Accounts',
            'users' => $users,
        ]);
    }

    public function create(): View
    {
        return view('users.create', [
            'title' => 'Create User',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
            ],
            'full_name' => [
                'required',
                'string',
                'max:100',
            ],
        ]);

        User::create($validated);

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User created successfully.'
            );
    }

    public function edit(User $user): View
    {
        return view('users.edit', [
            'title' => 'Edit User',
            'user' => $user,
        ]);
    }

    public function update(
        Request $request,
        User $user
    ): RedirectResponse {
        $validated = $request->validate([
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'username')
                    ->ignore($user),
            ],
            'full_name' => [
                'required',
                'string',
                'max:100',
            ],
            'avatar' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        $uploadedAvatar = $request->file('avatar');

        // Prevent the uploaded file object from being written
        // directly into the database.
        unset($validated['avatar']);

        if ($uploadedAvatar !== null) {
            $newAvatarPath = 'avatars/'
                . Str::uuid()
                . '.jpg';

            $preparedAvatar = Image::read($uploadedAvatar)
                ->cover(300, 300)
                ->toJpeg(
                    quality: 85,
                    progressive: false,
                    strip: true
                );

            $stored = Storage::disk('public')->put(
                $newAvatarPath,
                (string) $preparedAvatar
            );

            if (! $stored) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'avatar' => 'The avatar could not be stored.',
                    ]);
            }

            $oldAvatarPath = $user->avatar;
            $validated['avatar'] = $newAvatarPath;

            $user->update($validated);

            if ($oldAvatarPath !== null) {
                Storage::disk('public')
                    ->delete($oldAvatarPath);
            }
        } else {
            $user->update($validated);
        }

        return redirect()
            ->route('users.index')
            ->with(
                'success',
                'User updated successfully.'
            );
    }
}