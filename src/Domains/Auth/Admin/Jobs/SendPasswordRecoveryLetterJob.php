<?php

namespace App\Domains\Auth\Admin\Jobs;

use App\Data\Models\Admin;
use App\Services\Dashboard\Http\Requests\Auth\PasswordRecoveryRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Lucid\Foundation\Job;

/**
 * Class SendPasswordRecoveryLetterJob
 * @package App\Domains\Auth\Jobs\Admin
 * @author Yosyp Mykhailiv <y.mykhailiv@bvblogic.com>
 */
class SendPasswordRecoveryLetterJob extends Job
{
    /**
     * @var PasswordRecoveryRequest
     */
    protected $request;

    /**
     * @var Admin
     */
    protected $admin;

    /**
     * SendPasswordRecoveryLetterJob constructor.
     * @param PasswordRecoveryRequest $request
     * @param Admin $admin
     */
    public function __construct(PasswordRecoveryRequest $request, Admin $admin)
    {
        $this->request = $request;
        $this->admin = $admin;
    }

    /**
     * Execute the job.
     * @return void
     */
    public function handle()
    {
        $token = str_random(64);
        $passwordRecoveryTable = config('auth.passwords.admins.table');

        /**
         * Delete old requests for password reseting
         */
        DB::table($passwordRecoveryTable)->where([
            'email' => $this->admin->email
        ])->delete();

        /**
         * Create new password resete request
         */
        DB::table($passwordRecoveryTable)->insert([
            'email'      => $this->admin->email,
            'token'      => $token,
            'created_at' => Carbon::now()
        ]);

        $link = route('auth.password-recovery', ['token' => $token]);

        $data = [
            'name' => $this->admin->name,
            'link' => $link,
        ];

        Mail::send('dashboard::emails.password-recovery', $data, function ($message) {
            $message->from('support@hackteam.loc', 'HackTeam');
            $message->to($this->admin->email);
        });
    }
}
