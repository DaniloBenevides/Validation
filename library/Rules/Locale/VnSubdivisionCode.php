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
 * Validates whether an input is subdivision code of Vietnam or not.
 *
 * ISO 3166-1 alpha-2: VN
 *
 * @see http://www.geonames.org/VN/administrative-division-vietnam.html
 *
 * @author Henrique Moody <henriquemoody@gmail.com>
 */
final class VnSubdivisionCode extends AbstractSearcher
{
    /**
     * {@inheritdoc}
     */
    protected function getDataSource(): array
    {
        return [
           '01', // Lai Chau
           '02', // Lao Cai
           '03', // Ha Giang
           '04', // Cao Bang
           '05', // Son La
           '06', // Yen Bai
           '07', // Tuyen Quang
           '09', // Lang Son
           '13', // Quang Ninh
           '14', // Hoa Binh
           '18', // Ninh Binh
           '20', // Thai Binh
           '21', // Thanh Hoa
           '22', // Nghe An
           '23', // Ha Tinh
           '24', // Quang Binh
           '25', // Quang Tri
           '26', // Thua Thien-Hue
           '27', // Quang Nam
           '28', // Kon Tum
           '29', // Quang Ngai
           '30', // Gia Lai
           '31', // Binh Dinh
           '32', // Phu Yen
           '33', // Dak Lak
           '34', // Khanh Hoa
           '35', // Lam Dong
           '36', // Ninh Thuan
           '37', // Tay Ninh
           '39', // Dong Nai
           '40', // Binh Thuan
           '41', // Long An
           '43', // Ba Ria-Vung Tau
           '44', // An Giang
           '45', // Dong Thap
           '46', // Tien Giang
           '47', // Kien Giang
           '49', // Vinh Long
           '50', // Ben Tre
           '51', // Tra Vinh
           '52', // Soc Trang
           '53', // Bac Can
           '54', // Bac Giang
           '55', // Bac Lieu
           '56', // Bac Ninh
           '57', // Binh Duong
           '58', // Binh Phuoc
           '59', // Ca Mau
           '61', // Hai Duong
           '63', // Ha Nam
           '66', // Hung Yen
           '67', // Nam Dinh
           '68', // Phu Tho
           '69', // Thai Nguyen
           '70', // Vinh Phuc
           '71', // Dien Bien
           '72', // Dak Nong
           '73', // Hau Giang
           'CT', // Can Tho
           'DN', // Da Nang
           'HN', // Ha Noi
           'HP', // Hai Phong
           'SG', // Ho Chi Minh
       ];
    }
}
