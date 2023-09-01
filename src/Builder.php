<?php
/**
 * Builder
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */

namespace Ishaarat\LaraIshaarat;

use Illuminate\Support\Arr;
class Builder
{
    protected array $recipients = [];

    protected string $body;

    protected ?string $driver = null;

    public function to($recipients): self
    {
        $this->recipients = Arr::wrap($recipients);

        return $this;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function via($driver): self
    {
        $this->driver = $driver;

        return $this;
    }

    public function send($body): self
    {
        $this->body = $body;

        return $this;
    }


    public function getRecipients(): array
    {
        return $this->recipients;
    }
    public function getDriver(): ?string
    {
        return $this->driver;
    }
}
