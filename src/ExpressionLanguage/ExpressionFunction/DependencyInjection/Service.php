<?php

declare(strict_types=1);

namespace Overblog\GraphQLBundle\ExpressionLanguage\ExpressionFunction\DependencyInjection;

use Overblog\GraphQLBundle\ExpressionLanguage\ExpressionFunction;
use Overblog\GraphQLBundle\Generator\TypeGenerator;

final class Service extends ExpressionFunction
{
    public function __construct($name = 'service')
    {
        parent::__construct(
            $name,
            fn (string $serviceId) => "$this->services->get('container')->get($serviceId)",
            static fn (array $arguments, $serviceId) => $arguments[TypeGenerator::GRAPHQL_SERVICES]->get('container')->get($serviceId)
        );
    }
}
