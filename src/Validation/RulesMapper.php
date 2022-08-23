<?php

namespace HnScript\Validation;

use HnScript\Validation\Rules\MaxRule;
use HnScript\Validation\Rules\EmailRule;
use HnScript\Validation\Rules\UniqueRule;
use HnScript\Validation\Rules\BetweenRule;
use HnScript\Validation\Rules\AlphaNumRule;
use HnScript\Validation\Rules\RequiredRule;
use HnScript\Validation\Rules\ConfirmedRule;

trait RulesMapper
{
    protected static array $map = [
        'required' => RequiredRule::class,
        'alnum' => AlphaNumRule::class,
        'max' => MaxRule::class,
        'between' => BetweenRule::class,
        'email' => EmailRule::class,
        'confirmed' => ConfirmedRule::class,
        'unique' => UniqueRule::class,
    ];

    public static function resolve(string $rule, $options)
    {
        return new static::$map[$rule](...$options);
    }
}
