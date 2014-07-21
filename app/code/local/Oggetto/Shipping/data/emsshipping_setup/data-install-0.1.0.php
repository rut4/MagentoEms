<?php
/**
 * Oggetto Web shipping extension for Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Oggetto Shipping module to newer versions in the future.
 * If you wish to customize the Oggetto Shipping module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Oggetto
 * @package    Oggetto_Shipping
 * @copyright  Copyright (C) 2012 Oggetto Web ltd (http://oggettoweb.com/)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

$installer = $this;

$regions = [
    'RU-AD'     => 'Республика Адыгея',
    'RU-AL'     => 'Республика Алтай',
    'RU-BA'     => 'Республика Башкортостан',
    'RU-BU'     => 'Республика Бурятия',
    'RU-DA'     => 'Республика Дагестан',
    'RU-IN'     => 'Республика Ингушетия',
    'RU-KB'     => 'Кабардино-Балкарская республика',
    'RU-KL'     => 'Республика Калмыкия',
    'RU-KC'     => 'Карачаево-Черкесская республика',
    'RU-KR'     => 'Республика Карелия',
    'RU-KO'     => 'Республика Коми',
    'UA-43'     => 'Республика Крым',
    'RU-ME'     => 'Республика Марий Эл',
    'RU-MO'     => 'Республика Мордовия',
    'RU-SA'     => 'Республика Саха (Якутия)',
    'RU-SE'     => 'Республика Северная Осетия — Алания',
    'RU-TA'     => 'Республика Татарстан',
    'RU-TY'     => 'Республика Тыва',
    'RU-UD'     => 'Удмуртская республика',
    'RU-KK'     => 'Республика Хакасия',
    'RU-CE'     => 'Чеченская республика',
    'RU-CU'     => 'Чувашская республика',
    'RU-ALT'    => 'Алтайский край',
    'RU-ZAB'    => 'Забайкальский край',
    'RU-KAM'    => 'Камчатский край',
    'RU-KDA'    => 'Краснодарский край',
    'RU-KYA'    => 'Красноярский край',
    'RU-PER'    => 'Пермский край',
    'RU-PRI'    => 'Приморский край',
    'RU-STA'    => 'Ставропольский край',
    'RU-KHA'    => 'Хабаровский край',
    'RU-AMU'    => 'Амурская область',
    'RU-ARK'    => 'Архангельская область',
    'RU-AST'    => 'Астраханская область',
    'RU-BEL'    => 'Белгородская область',
    'RU-BRY'    => 'Брянская область',
    'RU-VLA'    => 'Владимирская область',
    'RU-VGG'    => 'Волгоградская область',
    'RU-VLG'    => 'Вологодская область',
    'RU-VOR'    => 'Воронежская область',
    'RU-IVA'    => 'Ивановская область',
    'RU-IRK'    => 'Иркутская область',
    'RU-KGD'    => 'Калининградская область',
    'RU-KLU'    => 'Калужская область',
    'RU-KEM'    => 'Кемеровская область',
    'RU-KIR'    => 'Кировская область',
    'RU-KOS'    => 'Костромская область',
    'RU-KGN'    => 'Курганская область',
    'RU-KRS'    => 'Курская область',
    'RU-LEN'    => 'Ленинградская область',
    'RU-LIP'    => 'Липецкая область',
    'RU-MAG'    => 'Магаданская область',
    'RU-MOS'    => 'Московская область',
    'RU-MUR'    => 'Мурманская область',
    'RU-NIZ'    => 'Нижегородская область',
    'RU-NGR'    => 'Новгородская область',
    'RU-NVS'    => 'Новосибирская область',
    'RU-OMS'    => 'Омская область',
    'RU-ORE'    => 'Оренбургская область',
    'RU-ORL'    => 'Орловская область',
    'RU-PNZ'    => 'Пензенская область',
    'RU-PSK'    => 'Псковская область',
    'RU-ROS'    => 'Ростовская область',
    'RU-RYA'    => 'Рязанская область',
    'RU-SAM'    => 'Самарская область',
    'RU-SAR'    => 'Саратовская область',
    'RU-SAK'    => 'Сахалинская область',
    'RU-SVE'    => 'Свердловская область',
    'RU-SMO'    => 'Смоленская область',
    'RU-TAM'    => 'Тамбовская область',
    'RU-TVE'    => 'Тверская область',
    'RU-TOM'    => 'Томская область',
    'RU-TUL'    => 'Тульская область',
    'RU-TYU'    => 'Тюменская область',
    'RU-ULY'    => 'Ульяновская область',
    'RU-CHE'    => 'Челябинская область',
    'RU-YAR'    => 'Ярославская область',
    'RU-MOW'    => 'Москва',
    'RU-SPE'    => 'Санкт-Петербург',
    'UA-40'     => 'Севастополь',
    'RU-YEV'    => 'Еврейская автономная область',
    'RU-NEN'    => 'Ненецкий автономный округ',
    'RU-KHM'    => 'Ханты-Мансийский автономный округ - Югра',
    'RU-CHU'    => 'Чукотский автономный округ',
    'RU-YAN'    => 'Ямало-Ненецкий автономный округ'
];

$regionTranslations = [
    'RU-AD'  => [
        'en_US' => 'Republic of Adygea',
        'de_DE' => 'Republik Adygea',
        'fr_FR' => "République d'Adygea"
    ],
    'RU-AL'  => [
        'en_US' => 'Altai Republic',
        'de_DE' => 'Republik Altai',
        'fr_FR' => "République de l'Altaï"
    ],
    'RU-BA'  => [
        'en_US' => 'Republic of Bashkortostan',
        'de_DE' => 'Republik Baschkortostan',
        'fr_FR' => "République du Bachkortostan"
    ],
    'RU-BU'  => [
        'en_US' => 'Republic of Buryatia',
        'de_DE' => 'Republik Burjatien',
        'fr_FR' => "République de Bouriatie"
    ],
    'RU-DA'  => [
        'en_US' => 'The Republic of Dagestan',
        'de_DE' => 'Die Republik Dagestan',
        'fr_FR' => "la République du Daghestan"
    ],
    'RU-IN'  => [
        'en_US' => 'Republic of Ingushetia',
        'de_DE' => 'Republik Inguschetien',
        'fr_FR' => "République d'Ingouchie"
    ],
    'RU-KB'  => [
        'en_US' => 'Kabardino-Balkaria',
        'de_DE' => 'Kabardino-Balkarien',
        'fr_FR' => "Kabardino-Balkarie"
    ],
    'RU-KL'  => [
        'en_US' => 'Republic of Kalmykia',
        'de_DE' => 'Republik Kalmückien',
        'fr_FR' => "République de Kalmoukie"
    ],
    'RU-KC'  => [
        'en_US' => 'Karachay-Cherkessia',
        'de_DE' => 'Karatschai-Tscherkessien',
        'fr_FR' => "Karachay-Tcherkesses"
    ],
    'RU-KR'  => [
        'en_US' => 'Republic of Karelia',
        'de_DE' => 'Republik Karelien',
        'fr_FR' => "République de Carélie"
    ],
    'RU-KO'  => [
        'en_US' => 'Komi Republic',
        'de_DE' => 'Republik Komi',
        'fr_FR' => "République des Komis"
    ],
    'UA-43'  => [
        'en_US' => 'Republic of Crimea',
        'de_DE' => 'Republik Krim',
        'fr_FR' => "République de Crimée"
    ],
    'RU-ME'  => [
        'en_US' => 'Mari El Republic',
        'de_DE' => 'Republik Mari El',
        'fr_FR' => "Mari El République"
    ],
    'RU-MO'  => [
        'en_US' => 'Republic of Mordovia',
        'de_DE' => 'Republik Mordowien',
        'fr_FR' => "République de Mordovie"
    ],
    'RU-SA'  => [
        'en_US' => 'The Republic of Sakha (Yakutia)',
        'de_DE' => 'Die Republik Sacha (Jakutien)',
        'fr_FR' => "La République de Sakha (Yakoutie)"
    ],
    'RU-SE'  => [
        'en_US' => 'Republic of North Ossetia - Alania',
        'de_DE' => 'Republik Nordossetien - Alania',
        'fr_FR' => "République d'Ossétie du Nord - Alanie"
    ],
    'RU-TA'  => [
        'en_US' => 'The Republic of Tatarstan',
        'de_DE' => 'Die Republik Tatarstan',
        'fr_FR' => "la République du Tatarstan"
    ],
    'RU-TY'  => [
        'en_US' => 'Republic of Tyva',
        'de_DE' => 'Republik Tuwa',
        'fr_FR' => "République de Touva"
    ],
    'RU-UD'  => [
        'en_US' => 'Udmurt Republic',
        'de_DE' => 'Republik Udmurtien',
        'fr_FR' => "République d'Oudmourtie"
    ],
    'RU-KK'  => [
        'en_US' => 'Republic of Khakassia',
        'de_DE' => 'Republik Chakassien',
        'fr_FR' => "République de Khakassie"
    ],
    'RU-CE'  => [
        'en_US' => 'The Chechen Republic',
        'de_DE' => 'Die Tschetschenische Republik',
        'fr_FR' => "la République tchétchène"
    ],
    'RU-CU'  => [
        'en_US' => 'Chuvash Republic',
        'de_DE' => 'Republik Tschuwaschien',
        'fr_FR' => "Tchouvachie"
    ],
    'RU-ALT' => [
        'en_US' => 'Altay region',
        'de_DE' => 'Altay Region',
        'fr_FR' => "région de l'Altaï"
    ],
    'RU-ZAB' => [
        'en_US' => 'Trans-Baikal Territory',
        'de_DE' => 'Transbaikalien Territory',
        'fr_FR' => "trans-Baïkal Territoire"
    ],
    'RU-KAM' => [
        'en_US' => 'Kamchatka Krai',
        'de_DE' => 'Kamchatka Krai',
        'fr_FR' => "Kamchatka Krai"
    ],
    'RU-KDA' => [
        'en_US' => 'Krasnodar region',
        'de_DE' => 'Region Krasnodar',
        'fr_FR' => "région de Krasnodar"
    ],
    'RU-KYA' => [
        'en_US' => 'Krasnoyarsk Territory',
        'de_DE' => 'Region Krasnojarsk',
        'fr_FR' => "Territoire de Krasnoïarsk"
    ],
    'RU-PER' => [
        'en_US' => 'Perm Krai',
        'de_DE' => 'Region Perm',
        'fr_FR' => "kraï de Perm"
    ],
    'RU-PRI' => [
        'en_US' => 'Primorsky Krai',
        'de_DE' => 'Region Primorje',
        'fr_FR' => "Primorsky"
    ],
    'RU-STA' => [
        'en_US' => 'Stavropol region',
        'de_DE' => 'Region Stawropol',
        'fr_FR' => "région de Stavropol"
    ],
    'RU-KHA' => [
        'en_US' => 'Khabarovsk Krai',
        'de_DE' => 'Khabarovsk Krai',
        'fr_FR' => "Khabarovsk Krai"
    ],
    'RU-AMU' => [
        'en_US' => 'Amur Oblast',
        'de_DE' => 'Oblast Amur',
        'fr_FR' => "Oblast d'Amour"
    ],
    'RU-ARK' => [
        'en_US' => 'Arkhangelsk region',
        'de_DE' => 'Region Archangelsk',
        'fr_FR' => "région d'Arkhangelsk"
    ],
    'RU-AST' => [
        'en_US' => 'Astrakhan region',
        'de_DE' => 'Region Astrachan',
        'fr_FR' => "région d'Astrakhan"
    ],
    'RU-BEL' => [
        'en_US' => 'Belgorod region',
        'de_DE' => 'Region Belgorod',
        'fr_FR' => "région de Belgorod"
    ],
    'RU-BRY' => [
        'en_US' => 'Bryansk region',
        'de_DE' => 'Brjansk',
        'fr_FR' => "région de Briansk"
    ],
    'RU-VLA' => [
        'en_US' => 'Vladimir region',
        'de_DE' => 'Vladimir Region',
        'fr_FR' => "région de Vladimir"
    ],
    'RU-VGG' => [
        'en_US' => 'Volgograd region',
        'de_DE' => 'Gebiet Wolgograd',
        'fr_FR' => "région de Volgograd"
    ],
    'RU-VLG' => [
        'en_US' => 'Vologda region',
        'de_DE' => 'Region Vologda',
        'fr_FR' => "région de Vologda"
    ],
    'RU-VOR' => [
        'en_US' => 'Voronezh region',
        'de_DE' => 'Voronezh Region',
        'fr_FR' => "région de Voronej"
    ],
    'RU-IVA' => [
        'en_US' => 'Ivanovo region',
        'de_DE' => 'Ivanovo Region',
        'fr_FR' => "région d'Ivanovo"
    ],
    'RU-IRK' => [
        'en_US' => 'Irkutsk region',
        'de_DE' => 'Region Irkutsk',
        'fr_FR' => "région d'Irkoutsk"
    ],
    'RU-KGD' => [
        'en_US' => 'Kaliningrad region',
        'de_DE' => 'Region Kaliningrad',
        'fr_FR' => "région de Kaliningrad"
    ],
    'RU-KLU' => [
        'en_US' => 'Kaluga region',
        'de_DE' => 'Kaluga',
        'fr_FR' => "région de Kalouga"
    ],
    'RU-KEM' => [
        'en_US' => 'Kemerovo region',
        'de_DE' => 'Gebiet Kemerowo',
        'fr_FR' => "région de Kemerovo"
    ],
    'RU-KIR' => [
        'en_US' => 'Kirov region',
        'de_DE' => 'Kirov Region',
        'fr_FR' => "région de Kirov"
    ],
    'RU-KOS' => [
        'en_US' => 'Kostroma region',
        'de_DE' => 'Region Kostroma',
        'fr_FR' => "région de Kostroma"
    ],
    'RU-KGN' => [
        'en_US' => 'Kurgan region',
        'de_DE' => 'Kurgan Region',
        'fr_FR' => "région de Kourgan"
    ],
    'RU-KRS' => [
        'en_US' => 'Kursk region',
        'de_DE' => 'Region Kursk',
        'fr_FR' => "région de Koursk"
    ],
    'RU-LEN' => [
        'en_US' => 'Leningrad region',
        'de_DE' => 'Leningrader Gebiet',
        'fr_FR' => "région de Leningrad"
    ],
    'RU-LIP' => [
        'en_US' => 'Lipetsk region',
        'de_DE' => 'Lipezk',
        'fr_FR' => "région de Lipetsk"
    ],
    'RU-MAG' => [
        'en_US' => 'Magadan region',
        'de_DE' => 'Magadan Region',
        'fr_FR' => "région de Magadan"
    ],
    'RU-MOS' => [
        'en_US' => 'Moscow region',
        'de_DE' => 'Region Moskau',
        'fr_FR' => "région de Moscou"
    ],
    'RU-MUR' => [
        'en_US' => 'Murmansk region',
        'de_DE' => 'Murmansk Region',
        'fr_FR' => "région de Mourmansk"
    ],
    'RU-NIZ' => [
        'en_US' => 'Nizhny Novgorod region',
        'de_DE' => 'Region Nischni Nowgorod',
        'fr_FR' => "région de Nijni Novgorod"
    ],
    'RU-NGR' => [
        'en_US' => 'Novgorod region',
        'de_DE' => 'Nowgorod',
        'fr_FR' => "région de Novgorod"
    ],
    'RU-NVS' => [
        'en_US' => 'Novosibirsk region',
        'de_DE' => 'Region Nowosibirsk',
        'fr_FR' => "région de Novossibirsk"
    ],
    'RU-OMS' => [
        'en_US' => 'Omsk region',
        'de_DE' => 'Region Omsk',
        'fr_FR' => "région d'Omsk"
    ],
    'RU-ORE' => [
        'en_US' => 'Orenburg region',
        'de_DE' => 'Orenburg Region',
        'fr_FR' => "région d'Orenbourg"
    ],
    'RU-ORL' => [
        'en_US' => 'Orel region',
        'de_DE' => 'Orjol',
        'fr_FR' => "région d'Orel"
    ],
    'RU-PNZ' => [
        'en_US' => 'Penza region',
        'de_DE' => 'Penza Region',
        'fr_FR' => "région de Penza"
    ],
    'RU-PSK' => [
        'en_US' => 'Pskov region',
        'de_DE' => 'Gebiet Pskow',
        'fr_FR' => "région de Pskov"
    ],
    'RU-ROS' => [
        'en_US' => 'Rostov region',
        'de_DE' => 'Region Rostow',
        'fr_FR' => "région de Rostov"
    ],
    'RU-RYA' => [
        'en_US' => 'Ryazan region',
        'de_DE' => 'Region Rjasan',
        'fr_FR' => "région de Riazan"
    ],
    'RU-SAM' => [
        'en_US' => 'Samara region',
        'de_DE' => 'Gebiet Samara',
        'fr_FR' => "région de Samara"
    ],
    'RU-SAR' => [
        'en_US' => 'Saratov region',
        'de_DE' => 'Region Saratow',
        'fr_FR' => "région de Saratov"
    ],
    'RU-SAK' => [
        'en_US' => 'Sakhalin Region',
        'de_DE' => 'Region Sachalin',
        'fr_FR' => "la région de Sakhaline"
    ],
    'RU-SVE' => [
        'en_US' => 'Sverdlovsk region',
        'de_DE' => 'Gebiet Swerdlowsk',
        'fr_FR' => "région de Sverdlovsk"
    ],
    'RU-SMO' => [
        'en_US' => 'Smolensk region',
        'de_DE' => 'Smolensk',
        'fr_FR' => "région de Smolensk"
    ],
    'RU-TAM' => [
        'en_US' => 'Tambov region',
        'de_DE' => 'Tambow',
        'fr_FR' => "région de Tambov"
    ],
    'RU-TVE' => [
        'en_US' => 'Tver region',
        'de_DE' => 'Tver-Region',
        'fr_FR' => "région de Tver"
    ],
    'RU-TOM' => [
        'en_US' => 'Tomsk Oblast',
        'de_DE' => 'Tomsk',
        'fr_FR' => "Oblast de Tomsk"
    ],
    'RU-TUL' => [
        'en_US' => 'Tula region',
        'de_DE' => 'Tula',
        'fr_FR' => "région de Tula"
    ],
    'RU-TYU' => [
        'en_US' => 'Tyumen region',
        'de_DE' => 'Region Tjumen',
        'fr_FR' => "région de Tioumen"
    ],
    'RU-ULY' => [
        'en_US' => 'Ulyanovsk region',
        'de_DE' => 'Gebiet Uljanowsk',
        'fr_FR' => "région d'Oulianovsk"
    ],
    'RU-CHE' => [
        'en_US' => 'Chelyabinsk region',
        'de_DE' => 'Gebiet Tscheljabinsk',
        'fr_FR' => "région de Tcheliabinsk"
    ],
    'RU-YAR' => [
        'en_US' => 'Yaroslavl region',
        'de_DE' => 'Jaroslawl Region',
        'fr_FR' => "région de Yaroslavl"
    ],
    'RU-MOW' => [
        'en_US' => 'Moscow',
        'de_DE' => 'Moskau',
        'fr_FR' => "Moscou"
    ],
    'RU-SPE' => [
        'en_US' => 'St. Petersburg',
        'de_DE' => 'St. Petersburg',
        'fr_FR' => "Saint-Pétersbourg"
    ],
    'UA-40'  => [
        'en_US' => 'Sevastopol',
        'de_DE' => 'Sewastopol',
        'fr_FR' => "Sébastopol"
    ],
    'RU-YEV' => [
        'en_US' => 'Jewish Autonomous Region',
        'de_DE' => 'Jüdische Autonome Region',
        'fr_FR' => "Région autonome juive"
    ],
    'RU-NEN' => [
        'en_US' => 'Nenets Autonomous Okrug',
        'de_DE' => 'Nenzen',
        'fr_FR' => "Nenets district autonome"
    ],
    'RU-KHM' => [
        'en_US' => 'Khanty-Mansi Autonomous Okrug - Yugra',
        'de_DE' => 'Khanty-Mansi Autonomous Okrug - Yugra',
        'fr_FR' => "Khanty-Mansi district autonome - Ugra"
    ],
    'RU-CHU' => [
        'en_US' => 'Chukotka Autonomous Okrug',
        'de_DE' => 'Autonomen Kreises Tschukotka',
        'fr_FR' => "District autonome de Tchoukotka"
    ],
    'RU-YAN' => [
        'en_US' => 'Yamal-Nenets Autonomous Okrug',
        'de_DE' => 'Jamal-Nenzen',
        'fr_FR' => "Yamal-Nenets district autonome"
    ],
];

try {
    foreach ($regions as $code => $name) {
        Mage::getModel('directory/region')->setData([
            'country_id' => 'RU',
            'code' => $code,
            'default_name' => $name
        ])
            ->save();
    }

    /** @var array $regionCollection */
    $regionCollection = Mage::getResourceModel('directory/region_collection')->addCountryFilter('RU')->load()->getItems();

    $query = "INSERT INTO {$this->getTable('directory/country_region_name')} (locale, region_id, name) VALUES ";

    foreach ($regionCollection as $region) {
        /** @var Mage_Directory_Model_Region $region */

        $code = $region->getCode();
        $id = $region->getId();
        $translations = $regionTranslations[$code];
        foreach ($translations as $locale => $name) {
            if ($locale != 'fr_FR') {
                $query .= "('{$locale}', {$id}, '{$name}'), ";
            }
        }
    }

    $query = rtrim($query, ', ') . ';';

    $installer->startSetup();

    $installer->run($query);

    $installer->endSetup();
} catch (Exception $e) {
    Mage::logException($e);
}
