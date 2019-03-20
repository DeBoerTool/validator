<?php declare(strict_types=1);

namespace Dbt\Validator\Abstracts;

abstract class Multi
{
    /** @var array */
    protected $validators = [];

    protected function setValidators (array $validators): void
    {
        foreach ($validators as $validator) {
            $this->validators[] = $validator;
        }
    }
}
