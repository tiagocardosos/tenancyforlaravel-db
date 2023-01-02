<?php

namespace App\Jobs;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateRootUserTenant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private Tenant $tenant;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tenant)
    {
        $this->tenant = $tenant;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->tenant->run(function ($tenant) {
            User::create($tenant->only('name', 'email', 'password', 'role'));

            $this->tenant->password = '';
            $this->tenant->save();
        });
    }
}
