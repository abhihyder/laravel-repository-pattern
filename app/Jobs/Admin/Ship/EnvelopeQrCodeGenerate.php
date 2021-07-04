<?php

namespace App\Jobs\Admin\Ship;

use App\Models\Ship\EnvelopeQrCode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Str;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class EnvelopeQrCodeGenerate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $requestData;

    public function __construct($requestData)
    {
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $totalEnvelope = $this->requestData['total_envelope'];
        $envelopeQrCodes = [];
        for ($i = 0; $i < $totalEnvelope; $i++) {
            $envelopeQrCodes[$i] = [
                // Just implement the queue job for test
                "parcel_category_id" => $this->requestData['parcel_category_id'],
                "parcel_station_id" => $this->requestData['parcel_station_id'],
                "envelope_id" => Str::random(20),
                "image_url" => null, //process will be later
            ];
        }
        return EnvelopeQrCode::insert($envelopeQrCodes);
    }
}
