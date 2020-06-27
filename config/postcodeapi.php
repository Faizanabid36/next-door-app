<?php

return [
    'ApiPostcode' => [
        'url' => 'http://json.api-postcode.nl',
        'key' => '76feaaa5-3ea5-4ce3-a519-b8f8f8193919',
        'code' => 'nl_NL'
    ],
    'NationaalGeoRegister' => [
        'url' => 'http://geodata.nationaalgeoregister.nl/locatieserver/v3/free',
        'key' => '',
        'code' => 'nl_NL'
    ],
    'PostcoDe' => [
        'url' => 'https://api.postco.de/v1/postcode/%s/%s',
        'key' => '',
        'code' => 'nl_NL'
    ],
    'PostcodeNL' => [
        'url' => 'https://api.postcode.nl/rest/addresses/%s/%s',
        'key' => '',
        'secret' => '',
        'code' => 'nl_NL'
    ],
    'PostcodeApiNu' => [
        'url' => 'https://postcode-api.apiwise.nl/v2/addresses/?postcode=%s&number=%s',
        'key' => '',
        'code' => 'nl_NL',
    ],
    'PostcodeApiNuV3' => [
        'url' => 'https://api.postcodeapi.nu/v3/lookup/%s/%s',
        'key' => '',
        'code' => 'nl_NL'
    ],
    'PostcodeApiNuV3Sandbox' => [
        'alias' => \nickurt\PostcodeApi\Providers\nl_NL\PostcodeApiNuV3::class,
        'url' => 'https://sandbox.postcodeapi.nu/v3/lookup/%s/%s',
        'key' => '',
        'code' => 'nl_NL'
    ],
    'PostcodeData' => [
        'url' => 'http://api.postcodedata.nl/v1/postcode/?postcode=%s&streetnumber=%s&ref=%s',
        'key' => '',
        'code' => 'nl_NL',
    ],
    'PostcodesNL' => [
        'url' => 'http://api.postcodes.nl/1.0/address',
        'key' => '',
        'code' => 'nl_NL',
    ],
    'Pro6PP_NL' => [
        'url' => 'https://api.pro6pp.nl/v1/autocomplete?auth_key=%s&nl_sixpp=%s',
        'key' => '',
        'code' => 'nl_NL',
    ],
    'Pstcd' => [
        'url' => 'http://api.pstcd.nl/%s/?auth_key=%s&sixpp=%s&streetnumber=%s',
        'key' => '',
        'code' => 'nl_NL'
    ],

    'Pro6PP_BE' => [
        'url' => 'https://api.pro6pp.nl/v1/autocomplete?auth_key=%s&be_fourpp=%s',
        'key' => '',
        'code' => 'nl_BE',
    ],

    'Algolia' => [
        'url' => 'https://places-dsn.algolia.net/1/places/query',
        'key' => '',
        'secret' => '',
        'code' => 'en_US'
    ],
    'Bing' => [
        'url' => 'https://dev.virtualearth.net/REST/v1/Locations',
        'key' => '',
        'code' => 'en_US'
    ],
    'Geocodio' => [
        'url' => 'https://api.geocod.io/v1.3/geocode/?q=%s&api_key=%s',
        'key' => '50bee5e5eebeb57ed07eb35f20d5b10ed37beee',
        'code' => 'en_US',
    ],
    'Google' => [
        'url' => 'https://maps.googleapis.com/maps/api/geocode/json',
        'key' => 'AIzaSyAm4Wvmd2nIeaFQCdhAsxbiSXgBsibDolc',
        'code' => 'en_US',
    ],
    'Here' => [
        'url' => 'https://geocoder.api.here.com/6.2/geocode.json',
        'key' => '',
        'secret' => '',
        'code' => 'en_US',
    ],
    'LocationIQ' => [
        'url' => 'https://us1.locationiq.com/v1/search.php',
        'key' => 'b67e7fdced7673',
        'code' => 'en_US',
    ],
    'Mapbox' => [
        'url' => 'https://api.mapbox.com/geocoding/v5/mapbox.places/%s.json',
        'key' => '',
        'code' => 'en_US',
    ],
    'OpenCage' => [
        'url' => 'https://api.opencagedata.com/geocode/v1/json',
        'key' => 'd1d179c94f3e4783a05aca1ddca6dbc8',
        'code' => 'en_US',
    ],
    'TomTom' => [
        'url' => 'https://api.tomtom.com/search/2/geocode/%s.json',
        'key' => '',
        'code' => 'en_US',
    ],

    'IdealPostcodes' => [
        'url' => 'https://api.ideal-postcodes.co.uk/v1/postcodes/%s?api_key=%s',
        'key' => 'ak_kblaggogobKUxzOODNB0g474aZTSi',
        'code' => 'en_GB'
    ],
    'GetAddressIO' => [
        'url' => 'https://api.getaddress.io/find',
        'key' => '',
        'code' => 'en_GB'
    ],
    'PostcodesIO' => [
        'url' => 'https://api.postcodes.io/postcodes?q=%s',
        'key' => '',
        'code' => 'en_GB',
    ],
    'UkPostcodes' => [
        'url' => 'http://uk-postcodes.com/postcode/%s.json',
        'key' => '',
        'code' => 'en_GB',
    ],
    'GeoPostcodeOrgUk' => [
        'url' => 'http://www.geopostcode.org.uk/api/%s.json',
        'key' => '',
        'code' => 'en_GB',
    ],

    'PostcodeApiComAu' => [
        'url' => 'http://v0.postcodeapi.com.au/suburbs/%s.json',
        'key' => '',
        'code' => 'en_AU'
    ],

    'AddresseDataGouv' => [
        'url' => 'https://api-adresse.data.gouv.fr/search/?q=%s&postcode=%s&limit=1',
        'key' => '',
        'code' => 'fr_FR'
    ]
];
