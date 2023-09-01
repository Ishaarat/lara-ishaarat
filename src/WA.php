<?php
/**
 * WA
 *
 * @copyright Copyright © 2023 Ushop Unilever. All rights reserved.
 * @author    ahmed.allam@unilever.com
 */

namespace Ishaarat\LaraIshaarat;


use Ishaarat\LaraIshaarat\Contracts\Driver;

class WA
{
    protected array $config;

    protected array $settings;

    protected string $driver;

    protected Builder $builder;

    public function __construct(array $config)
    {
        $this->config = $config;
        $this->setBuilder(new Builder());
        $this->via(\Ishaarat\LaraIshaarat\Drivers\WA::class);
    }
    public function via($driver): self
    {
        $this->driver = $driver;
        $this->builder->via($driver);
        $this->settings = $this->config;
        return $this;
    }

    public function to($recipients): self
    {
        $this->builder->to($recipients);

        return $this;
    }

    public function send($message, $callback = null)
    {
        if ($message instanceof Builder) {
            return $this->setBuilder($message)->dispatch();
        }

        $this->builder->send($message);
        if (! $callback) {
            return $this;
        }
        $driver = $this->getDriverInstance();
        $driver->message($message);
        call_user_func($callback, $driver);

        return $driver->send();
    }

    public function dispatch()
    {
        $this->driver = $this->builder->getDriver() ?: $this->driver;
        if (empty($this->driver)) {
            $this->via(\Ishaarat\LaraIshaarat\Drivers\WA::class);
        }
        $driver = $this->getDriverInstance();
        $driver->message($this->builder->getBody());
        $driver->to($this->builder->getRecipients());

        return $driver->send();
    }

    protected function setBuilder(Builder $builder): self
    {
        $this->builder = $builder;

        return $this;
    }
    protected function getDriverInstance(): Driver
    {
        return new \Ishaarat\LaraIshaarat\Drivers\WA($this->settings);
    }

}
