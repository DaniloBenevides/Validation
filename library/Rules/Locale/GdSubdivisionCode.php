<?php

/*
 * This file is part of Respect/Validation.
 *
 * (c) Alexandre Gomes Gaigalas <alexandre@gaigalas.net>
 *
 * For the full copyright and license information, please view the "LICENSE.md"
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Respect\Validation\Rules\Locale;

use Respect\Validation\Rules\AbstractSearcher;

/**
 * Validates whether an input is subdivision code of Grenada or not.
 *
 * ISO 3166-1 alpha-2: GD
 *
 * @see http://www.geonames.org/GD/administrative-division-grenada.html
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class GdSubdivisionCode extends AbstractSearcher
{
    /**
     * {@inheritdoc}
     */
    protected function getDataSource(): array
    {
        return [
           '01', // Saint Andrew
           '02', // Saint David
           '03', // Saint George
           '04', // Saint John
           '05', // Saint Mark
           '06', // Saint Patrick
           '10', // Southern Grenadine Islands
       ];
    }
}
