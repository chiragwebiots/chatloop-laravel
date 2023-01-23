<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Repositories\Contracts\AccountInterface;

class AccountController extends Controller
{

    private $account;

    public function __construct(AccountInterface $account)
    {
        $this->account = $account;
    }

    /**
     * Show Admin Profile
     */
    public function profile()
    {
        return view('admin.account.profile');
    }

    /**
     * Update Admin Profile
     */
    public function updateProfile(UpdateProfileRequest $request)
    {

        DB::beginTransaction();

        try {
            
            $this->account->updateProfile();

            DB::commit();

            return back()->with('message', 'your profile update successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }

    /**
     * Update Password
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
        DB::beginTransaction();

        try {

            $this->account->updatePassword();

            DB::commit();

            return back()->with('message', 'your password update successfully.');

        } catch (\Exception $e) {

            DB::rollback();

            throw $e;
        }
    }
}
