<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\EmailService;

class ProcessEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailTo;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emailTo, $message)
    {
        $this->emailTo = $emailTo;
        $this->message = $message;        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailService = new EmailService;

        try {
            $emailService->send($this->emailTo, $this->message);
        } catch (\Exception $e) {
            //
        }
    }
}
