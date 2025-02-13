<?php
/**
 * Copyright © Ergonode Sp. z o.o. All rights reserved.
 * See LICENSE.txt for license details.
 */

declare(strict_types=1);

namespace Ergonode\Designer\Domain\Entity\Attribute;

use Ergonode\Attribute\Domain\Entity\Attribute\AbstractOptionAttribute;
use Ergonode\Attribute\Domain\ValueObject\AttributeScope;
use Ergonode\Attribute\Domain\ValueObject\SystemAttributeCode;
use Ergonode\Core\Domain\ValueObject\TranslatableString;
use Ergonode\SharedKernel\Domain\Aggregate\AttributeId;

class TemplateSystemAttribute extends AbstractOptionAttribute
{
    public const TYPE = 'SELECT';
    public const CODE = 'esa_template';

    /**
     * @throws \Exception
     */
    public function __construct(
        TranslatableString $label,
        TranslatableString $hint,
        TranslatableString $placeholder
    ) {
        $code = new SystemAttributeCode(self::CODE);
        $id = AttributeId::fromKey($code->getValue());
        $scope = new AttributeScope(AttributeScope::GLOBAL);

        parent::__construct($id, $code, $label, $hint, $placeholder, $scope);
    }

    public function getType(): string
    {
        return self::TYPE;
    }

    public function isSystem(): bool
    {
        return true;
    }

    public function isEditable(): bool
    {
        return false;
    }

    public function isMultilingual(): bool
    {
        return false;
    }
}
