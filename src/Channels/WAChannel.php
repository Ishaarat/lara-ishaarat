<?php
/**
 * WAChannel
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */
use Exception;
use Illuminate\Notifications\Notification;
class WAChannel
{
    public function send($notifiable, Notification $notification)
    {
        /**
         * @psalm-suppress UndefinedMethod
         */
        $message = $notification->toWhatsapp($notifiable);

        $this->validate($message);
        $waSender = app()->make('ishaarat-wa');

        return $waSender->send($message->getBody(), function ($waMessage) use ($message) {
            $waMessage->to($message->getRecipients());
        });
    }

    private function validate($message)
    {
        $conditions = [
            'Invalid data for whatsapp notification.' => ! is_a($message, \Ishaarat\LaraIshaarat\Builder::class),
            'Message body could not be empty.' => empty($message->getBody()),
            'Message recipient could not be empty.' => empty($message->getRecipients()),
        ];

        foreach ($conditions as $ex => $condition) {
            throw_if($condition, new Exception($ex));
        }
    }
}
