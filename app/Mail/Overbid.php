<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Bid;

class Overbid extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public Bid $oldTopBid,
        public Bid $newTopBid
    ) {
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = $this->oldTopBid->user;
        $item = $this->oldTopBid->item;
        if ($user !== null && $item !== null) {
            $content = 'Hi '.$user->name
                .",\r\n\r\nYou previously held the top bid on the object '<a href=\""
                .url('item/'.$item->id).'">'
                .$item->name.'</a>\', for €'.$this->oldTopBid->amount
                .'. We just wanted to let you know that you have been overbid. '
                .'The new top bid is € '.$this->newTopBid->amount
                .".\r\n\r\nThe Auction House Team";
            return $this
                ->subject('You\'ve been overbid!')
                ->text('mail.template-text', ['content' => $content])
                ->view('mail.template-html', ['content' => $content]);
        } else {
            return $this;
        }
    }
}
