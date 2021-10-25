<?php

namespace App\Notifications;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class InvoicePaid extends Notification implements ShouldQueue
{
    // Traits
    use Queueable;

    // After commit
    public $afterCommit = true;

    /**
     * User payment.
     *
     * @var Payment
     */
    private $payment;

    /**
     * Create a new notification instance.
     *
     * @param Payment $payment
     */
    public function __construct(Payment $payment)
    {
        $this->payment = $payment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return MailMessage
     */
    public function toMail($notifiable): MailMessage
    {
        Log::info('Payment: ' . $this->payment->cart->user->name);
        return (new MailMessage())
            ->subject('Invoice Paid');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable): array
    {
        return [
            'invoice_id' => $this->invoice->id,
            'amount' => $this->payment->amount
        ];
    }
}
