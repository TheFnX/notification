<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

use App\Models\User;


class MessageSent extends Notification
{
    use Queueable;

    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    // ->view('emails.message', ['message' => $this->message]);
                    ->subject('Tienes un nuevo mensaje')
                    ->greeting('Hola tú')
                    ->line('Para leer tu mensaje presiona en boton.')
                    ->action('Leer mensaje', route('messages.show', $this->message->id))
                    ->line('Hasta luego!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'url' => route('messages.show', $this->message->id),
            'message' => 'Has recibido un mensaje de ' . User::find($this->message->from_user_id)->name
        ];
    }
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([]);
    }
}
