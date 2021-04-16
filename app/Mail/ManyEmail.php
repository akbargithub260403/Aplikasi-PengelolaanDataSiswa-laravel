<?php

namespace App\Mail;
use App\Email;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManyEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return data
     */

     protected $data;


    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $greeting = "Perkenalkan saya Informatika dari SMKN 4 PADALARANG
        .";
        $closing ="Terima Kasih atas Perhatian nya.";
        $pesanemail  = $this->data['pesanemail'];
        $dari        = $this->data['dari'];
        $kepada      = $this->data['kepada'];

        if ($this->data['data_file1'] === null) {
            return $this->subject('Application Data Students')
            ->from($dari)
            ->markdown('pages/emailku')
            ->with([
                'dari'          => $dari,
                'kepada'        => $kepada,
                'pesanemail'    => $pesanemail,
                'greeting'      => $greeting,
                'closing'       => $closing
            ]);
           
        }else{
            return $this->subject('Application Data Students')
            ->from($dari)
            ->markdown('pages/emailku')
            ->attach($this->data['data_file1']->getRealPath(),
            [
                'as'    => $this->data['data_file1']->getClientOriginalName()
            ])
            ->with([
                'dari'          => $dari,
                'kepada'        => $kepada,
                'pesanemail'    => $pesanemail,
                'greeting'      => $greeting,
                'closing'       => $closing
            ]);
        }
    }
}
