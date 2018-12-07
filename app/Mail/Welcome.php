<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Welcome extends Mailable
{
    use Queueable, SerializesModels;

    public $user; // Must để public nếu muốn khỏi truyền qua view mà ở view xài đc $user
    # Nhờ class Mailable, bất cứ public property nào, sẽ luôn available ở view.
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*return $this->view('emails.welcome', [
            'user' => $this->user
        ]);*/

        return $this->view('emails.welcome');
    }
}
