<?php

namespace App\Http\Controllers\Admin\Single;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public static string $model = 'profile';

    protected object $partnerModel;

    public function __construct()
    {
        $this->partnerModel = User::query()->first();
    }

    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit(): View
    {
        return view('admin.'.self::$model.'.update', ['item' => $this->partnerModel, 'title' => 'Setting']);
    }

    /**
     * Update the resource in storage.
     */
    public function update(ProfileRequest $request): RedirectResponse
    {
        try {
            $data = $request->safe()->only('name', 'email');

            if ($request->safe()->old_password) {
                $data = $request->safe()->only('name', 'email', 'password');
            }

            auth()->user()->update($data);

            return redirect()->route('admin.'.self::$model.'.edit')->with(['success' => __('admin.success_update')]);
        } catch (\Throwable $e) {
            \Log::warning($e);

            return back()->withErrors(['msg' => __('admin.error')]);
        }
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
