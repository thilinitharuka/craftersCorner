<?php

namespace App\Mail;

use App\Models\GeneratedImage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ImageApprovedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $image;

    /**
     * Create a new message instance.
     */
    public function __construct(GeneratedImage $image)
    {
        $this->image = $image;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Your Generated Image Has Been Approved!')
            ->view('emails.image-approved');
    }
}
