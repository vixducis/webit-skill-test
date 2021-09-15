<?php

namespace App\Mail;

use App\Models\Bid;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BidPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public Bid $bid
    ){
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $item = $this->bid->item;
        $user = $this->bid->user;
        if ($item !== null && $user !== null) {
            $content = 'Hi '.$user->name
                .",\r\n\r\nWe just wanted to confirm that you placed a bid of € "
                .$this->bid->amount.' on the object \''.ucwords($item->name)
                .'\'. Thanks for that! In the case you are overbid, we will '
                ."notify you by mail as well.\r\n\r\nThe Auction House Team";
            return $this
                ->subject('Bid placed on \''.$item->name.'\'')
                ->text('mail.template-text', ['content' => $content])
                ->view('mail.template-html', ['content' => $content]);
        } else {
            return $this;
        }
    }
}
