<?php

namespace App\Mail;

use Faker\Provider\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Http\File;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf;
    public $data;
    public $report;
    public $storagePath;

    /**
     * Create a new message instance.
     *
     * @param $request
     */
    public function __construct($data, $pdf, $report, $storagePath)
    {
        //
        $this->data = $data;
        $this->pdf = base64_encode($pdf->stream());
        $this->report = $report;
        $this->storagePath = public_path() . '/' . $storagePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $defect = null;
        foreach ($this->data['questionModelList'] as $question) {
            if ($question['answer'] == 'Not Ok') {
                $defect = "X-";
            }
        }
        if ($defect != 'X-') {
            $defect = "V-";
        }
        return $this->markdown('emails.report')
            ->from($this->report->user->email)
            ->subject($defect . $this->data['vehicleNumber'])
            ->attach($this->storagePath, ['mime' => 'application/pdf']);
    }
}
