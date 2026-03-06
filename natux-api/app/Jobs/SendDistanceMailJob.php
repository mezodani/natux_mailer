<?php

namespace App\Jobs;

use App\Mail\NatuxComingMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendDistanceMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public string $email,
        public int $distance
    ) {}

    public function handle(): void
    {
        Mail::to($this->email)->send(new NatuxComingMail($this->distance));
    }
}