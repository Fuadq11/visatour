<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            ["code" => "ax", "az" => "Aland adaları", "en" => "Åland Islands"],
            ["code" => "al", "az" => "Albaniya", "en" => "Albania"],
            ["code" => "de", "az" => "Almaniya", "en" => "Germany"],
            ["code" => "us", "az" => "Amerika Birləşmiş Ştatları", "en" => "United States of America"],
            ["code" => "as", "az" => "Amerika Samoası", "en" => "American Samoa"],
            ["code" => "ad", "az" => "Andorra", "en" => "Andorra"],
//            ["code" => "ai", "az" => "Anqilya (Britaniya)", "en" => "Anguilla"],
            ["code" => "ao", "az" => "Anqola", "en" => "Angola"],
            ["code" => "ag", "az" => "Antiqua və Barbuda", "en" => "Antigua and Barbuda"],
            ["code" => "ar", "az" => "Argentina", "en" => "Argentina"],
            ["code" => "aw", "az" => "Aruba", "en" => "Aruba"],
            ["code" => "au", "az" => "Avstraliya", "en" => "Australia"],
            ["code" => "at", "az" => "Avstriya", "en" => "Austria"],
//            ["code" => "az", "az" => "Azərbaycan", "en" => "Azerbaijan"],
            ["code" => "bs", "az" => "Baham adaları", "en" => "Bahamas"],
            ["code" => "bd", "az" => "Banqladeş", "en" => "Bangladesh"],
            ["code" => "bb", "az" => "Barbados", "en" => "Barbados"],
            ["code" => "by", "az" => "Belarus", "en" => "Belarus"],
            ["code" => "bz", "az" => "Beliz", "en" => "Belize"],
            ["code" => "be", "az" => "Belçika", "en" => "Belgium"],
            ["code" => "bj", "az" => "Benin", "en" => "Benin"],
            ["code" => "bm", "az" => "Bermud adaları", "en" => "Bermuda"],
            ["code" => "ae", "az" => "Birləşmiş Ərəb Əmirlikləri", "en" => "United Arab Emirates"],
            ["code" => "bo", "az" => "Boliviya", "en" => "Bolivia"],
            ["code" => "bg", "az" => "Bolqarıstan", "en" => "Bulgaria"],
            ["code" => "bq", "az" => "Boneyr, Sint-Estatius və Saba", "en" => "Caribbean Netherlands"],
            ["code" => "ba", "az" => "Bosniya və Herseqovina", "en" => "Bosnia and Herzegovina"],
            ["code" => "bw", "az" => "Botsvana", "en" => "Botswana"],
            ["code" => "br", "az" => "Braziliya", "en" => "Brazil"],
            ["code" => "bn", "az" => "Bruney-Darüssalam", "en" => "Brunei"],
            ["code" => "bf", "az" => "Burkina-Faso", "en" => "Burkina Faso"],
            ["code" => "bi", "az" => "Burundi", "en" => "Burundi"],
            ["code" => "bt", "az" => "Butan", "en" => "Bhutan"],
            ["code" => "gb", "az" => "Böyük Britaniya", "en" => "United Kingdom"],
            ["code" => "bh", "az" => "Bəhreyn", "en" => "Bahrain"],
            ["code" => "je", "az" => "Cersi adası", "en" => "Jersey"],
            ["code" => "dj", "az" => "Cibuti", "en" => "Djibouti"],
            ["code" => "gi", "az" => "Cəbəli-Tariq", "en" => "Gibraltar"],
            ["code" => "za", "az" => "Cənubi Afrika Respublikası", "en" => "South Africa"],
            ["code" => "ss", "az" => "Cənubi Sudan", "en" => "South Sudan"],
            ["code" => "dk", "az" => "Danimarka", "en" => "Denmark"],
            ["code" => "dm", "az" => "Dominika", "en" => "Dominica"],
            ["code" => "do", "az" => "Dominikan Respublikası", "en" => "Dominican Republic"],
            ["code" => "ec", "az" => "Ekvador", "en" => "Ecuador"],
            ["code" => "gq", "az" => "Ekvatorial Qvineya", "en" => "Equatorial Guinea"],
            ["code" => "er", "az" => "Eritreya", "en" => "Eritrea"],
            ["code" => "ee", "az" => "Estoniya", "en" => "Estonia"],
            ["code" => "fo", "az" => "Farer adaları", "en" => "Faroe Islands"],
            ["code" => "fj", "az" => "Fici", "en" => "Fiji"],
            ["code" => "ph", "az" => "Filippinlər", "en" => "Philippines"],
            ["code" => "fi", "az" => "Finlandiya", "en" => "Finland"],
            ["code" => "fk", "az" => "Folklend (Malvin) adaları", "en" => "Falkland Islands"],
            ["code" => "fr", "az" => "Fransa", "en" => "France"],
            ["code" => "pf", "az" => "Fransa Polineziyası", "en" => "French Polynesia"],
            ["code" => "gf", "az" => "Fransa Qvianası", "en" => "French Guiana"],
            ["code" => "ps", "az" => "Fələstin", "en" => "Palestine"],
            ["code" => "ge", "az" => "Gürcüstan", "en" => "Georgia"],
            ["code" => "ht", "az" => "Haiti", "en" => "Haiti"],
            ["code" => "in", "az" => "Hindistan", "en" => "India"],
            ["code" => "hn", "az" => "Honduras", "en" => "Honduras"],
//            ["code" => "et", "az" => "Həbəşistan", "en" => "Ethiopia"],
            ["code" => "cv", "az" => "Kabo-Verde", "en" => "Cabo Verde"],
            ["code" => "kh", "az" => "Kamboca", "en" => "Cambodia"],
            ["code" => "cm", "az" => "Kamerun", "en" => "Cameroon"],
            ["code" => "ca", "az" => "Kanada", "en" => "Canada"],
            ["code" => "ky", "az" => "Kayman adaları", "en" => "Cayman Islands"],
            ["code" => "ke", "az" => "Keniya", "en" => "Kenya"],
            ["code" => "cy", "az" => "Kipr", "en" => "Cyprus"],
            ["code" => "ki", "az" => "Kiribati", "en" => "Kiribati"],
            ["code" => "co", "az" => "Kolumbiya", "en" => "Colombia"],
            ["code" => "cg", "az" => "Konqo (Brazzavil)", "en" => "Congo (Brazzaville)"],
            ["code" => "cd", "az" => "Konqo (Kinşasa)", "en" => "Congo (Kinshasa)"],
            ["code" => "kr", "az" => "Koreya Respublikası", "en" => "South Korea"],
            ["code" => "cr", "az" => "Kosta-Rika", "en" => "Costa Rica"],
            ["code" => "ci", "az" => "Kot-divuar", "en" => "Côte d’Ivoire"],
            ["code" => "cu", "az" => "Kuba", "en" => "Cuba"],
            ["code" => "ck", "az" => "Kuk adaları (Yeni Zelanda)", "en" => "Cook Islands"],
            ["code" => "cw", "az" => "Kurasao", "en" => "Curaçao"],
            ["code" => "kw", "az" => "Küveyt", "en" => "Kuwait"],
            ["code" => "la", "az" => "Laos (LXDR)", "en" => "Laos"],
            ["code" => "lv", "az" => "Latviya", "en" => "Latvia"],
            ["code" => "ls", "az" => "Lesoto", "en" => "Lesotho"],
            ["code" => "lr", "az" => "Liberiya", "en" => "Liberia"],
            ["code" => "lt", "az" => "Litva", "en" => "Lithuania"],
            ["code" => "lb", "az" => "Livan", "en" => "Lebanon"],
            ["code" => "ly", "az" => "Liviya", "en" => "Libya"],
            ["code" => "li", "az" => "Lixtenşteyn", "en" => "Liechtenstein"],
            ["code" => "lu", "az" => "Lüksemburq", "en" => "Luxembourg"],
            ["code" => "hu", "az" => "Macarıstan", "en" => "Hungary"],
            ["code" => "mg", "az" => "Madaqaskar", "en" => "Madagascar"],
            ["code" => "mw", "az" => "Malavi", "en" => "Malawi"],
            ["code" => "my", "az" => "Malayziya", "en" => "Malaysia"],
            ["code" => "mv", "az" => "Maldiv adaları", "en" => "Maldives"],
            ["code" => "ml", "az" => "Mali", "en" => "Mali"],
            ["code" => "mt", "az" => "Malta", "en" => "Malta"],
            ["code" => "yt", "az" => "Maori (Mayotta)", "en" => "Mayotte"],
            ["code" => "mq", "az" => "Martinika ", "en" => "Martinique"],
            ["code" => "mh", "az" => "Marşal adaları", "en" => "Marshall Islands"],
            ["code" => "mu", "az" => "Mavriki", "en" => "Mauritius"],
            ["code" => "mr", "az" => "Mavritaniya", "en" => "Mauritania"],
            ["code" => "mx", "az" => "Meksika", "en" => "Mexico"],
            ["code" => "im", "az" => "Men adası", "en" => "Isle of Man"],
            ["code" => "fm", "az" => "Mikroneziya", "en" => "Micronesia"],
            ["code" => "eg", "az" => "Misir", "en" => "Egypt"],
            ["code" => "md", "az" => "Moldova", "en" => "Moldova"],
            ["code" => "mc", "az" => "Monako", "en" => "Monaco"],
            ["code" => "mn", "az" => "Monqolustan", "en" => "Mongolia"],
            ["code" => "me", "az" => "Monteneqro", "en" => "Montenegro"],
            ["code" => "ms", "az" => "Montserrat", "en" => "Montserrat"],
            ["code" => "mz", "az" => "Mozambik", "en" => "Mozambique"],
            ["code" => "mm", "az" => "Myanma", "en" => "Myanmar"],
            ["code" => "ma", "az" => "Mərakeş", "en" => "Morocco"],
            ["code" => "cf", "az" => "Mərkəzi Afrika Respublikası ", "en" => "Central African Republic"],
            ["code" => "na", "az" => "Namibiya", "en" => "Namibia"],
            ["code" => "nr", "az" => "Nauru", "en" => "Nauru"],
            ["code" => "np", "az" => "Nepal", "en" => "Nepal"],
            ["code" => "nl", "az" => "Niderland", "en" => "Netherlands"],
            ["code" => "ne", "az" => "Niger", "en" => "Niger"],
            ["code" => "ng", "az" => "Nigeriya", "en" => "Nigeria"],
            ["code" => "ni", "az" => "Nikaraqua", "en" => "Nicaragua"],
            ["code" => "nu", "az" => "Niue (Yeni Zelanda)", "en" => "Niue"],
            ["code" => "nf", "az" => "Norfolk adası (Avstraliya)", "en" => "Norfolk Island"],
            ["code" => "no", "az" => "Norveç", "en" => "Norway"],
            ["code" => "om", "az" => "Oman", "en" => "Oman"],
            ["code" => "pk", "az" => "Pakistan", "en" => "Pakistan"],
            ["code" => "pw", "az" => "Palau", "en" => "Palau"],
            ["code" => "pa", "az" => "Panama", "en" => "Panam"],
            ["code" => "pg", "az" => "Papua-Yeni Qvineya", "en" => "Papua New Guinea"],
            ["code" => "pv", "az" => "Paraqvay", "en" => "Paraguay"],
            ["code" => "pe", "az" => "Peru", "en" => "Peru"],
//            ["code" => "pn", "az" => "Pitkern (Britaniya)", "en" => "Pitcairn Islands"],
            ["code" => "pl", "az" => "Polşa", "en" => "Poland"],
            ["code" => "pt", "az" => "Portuqaliya", "en" => "Portugal"],
            ["code" => "pr", "az" => "Puerto-Riko (ABŞ)", "en" => "Puerto Riko"],
            ["code" => "ga", "az" => "Qabon", "en" => "Gabon"],
            ["code" => "gm", "az" => "Qambiya", "en" => "Gambia"],
            ["code" => "gh", "az" => "Qana", "en" => "Gana"],
            ["code" => "gy", "az" => "Qayana", "en" => "Guyana"],
            ["code" => "kz", "az" => "Qazaxıstan", "en" => "Kazakhstan"],
            ["code" => "gd", "az" => "Qrenada", "en" => "Grenada"],
            ["code" => "gl", "az" => "Qrenlandiya", "en" => "Greenland"],
            ["code" => "gu", "az" => "Quam (ABŞ)", "en" => "Guam"],
            ["code" => "gp", "az" => "Qvadelupa (Fransa)", "en" => "Guadeloupe"],
            ["code" => "ft", "az" => "Qvatemala", "en" => "Guatemala"],
            ["code" => "gn", "az" => "Qvineya", "en" => "Guinea"],
            ["code" => "gw", "az" => "Qvineya-Bissau", "en" => "Guinea-Bissau"],
            ["code" => "kg", "az" => "Qırğızıstan", "en" => "Kyrgyzstan"],
            ["code" => "km", "az" => "Qəmər adaları", "en" => "Comoros"],
            ["code" => "eh", "az" => "Qərbi Sahara", "en" => "Western Sahara"],
            ["code" => "qa", "az" => "Qətər", "en" => "Qatar"],
            ["code" => "re", "az" => "Reyunyon (Fransa)", "en" => "Réunion"],
            ["code" => "rw", "az" => "Ruanda", "en" => "Rwanda"],
            ["code" => "ro", "az" => "Rumıniya", "en" => "Romania"],
            ["code" => "ru", "az" => "Rusiya", "en" => "Russia"],
            ["code" => "sv", "az" => "Salvador", "en" => "El Salvador"],
            ["code" => "ws", "az" => "Samoa", "en" => "Samoa"],
            ["code" => "sm", "az" => "San-Marino", "en" => "San Marino"],
            ["code" => "st", "az" => "San-Tome və Prinsipi ", "en" => "São Tomé and Príncipe"],
            ["code" => "bl", "az" => "Sen-Bartelemi", "en" => "Saint Barthélemy"],
            ["code" => "mf", "az" => "Sen-Marten (Fransa)", "en" => "Saint Martin"],
            ["code" => "pm", "az" => "Sen-Pyer və Mikelon", "en" => "Saint Pierre and Miquelon"],
            ["code" => "sn", "az" => "Seneqal", "en" => "Senegal"],
            ["code" => "kn", "az" => "Sent-Kits və Nevis", "en" => "Saint Kitts and Nevis"],
            ["code" => "lc", "az" => "Sent-Lüsiya", "en" => "Saint Lucia"],
            ["code" => "vc", "az" => "Sent-Vinsent və Qrenadina", "en" => "Saint Vincent and the Grenadines"],
            ["code" => "rs", "az" => "Serbiya", "en" => "Serbia"],
            ["code" => "sc", "az" => "Seyşel adaları", "en" => "Seychelles"],
            ["code" => "sg", "az" => "Sinqapur", "en" => "Singapore"],
            ["code" => "sk", "az" => "Slovakiya", "en" => "Slovakia"],
            ["code" => "si", "az" => "Sloveniya", "en" => "Slovenia"],
            ["code" => "sb", "az" => "Solomon adaları", "en" => "Solomon Islands"],
            ["code" => "so", "az" => "Somali", "en" => "Somalia"],
            ["code" => "sd", "az" => "Sudan", "en" => "Sudan"],
            ["code" => "sr", "az" => "Surinam", "en" => "Suriname"],
            ["code" => "sy", "az" => "Suriya Ərəb Respublikası", "en" => "Syria"],
            ["code" => "sj", "az" => "Svalbard (Şpisbergen və Yan-Mayen)", "en" => "Svalbard and Jan Mayen"],
            ["code" => "sz", "az" => "Svazilend", "en" => "Swaziland"],
            ["code" => "sl", "az" => "Syerra-Leone", "en" => "Sierra Leone"],
            ["code" => "sa", "az" => "Səudiyyə Ərəbistanı", "en" => "Saudi Arabia"],
            ["code" => "tj", "az" => "Tacikistan", "en" => "Tajikistan"],
            ["code" => "th", "az" => "Tailand", "en" => "Thailand"],
            ["code" => "tz", "az" => "Tanzaniya", "en" => "Tanzania"],
            ["code" => "tw", "az" => "Tayvan (Çinin əyaləti)", "en" => "Taiwan"],
            ["code" => "tl", "az" => "Timor-Leste", "en" => "Timor-Leste"],
            ["code" => "tk", "az" => "Tokelau (Yeni Zelanda)", "en" => "Tokelau"],
            ["code" => "to", "az" => "Tonqa", "en" => "Tonga"],
            ["code" => "tg", "az" => "Toqo", "en" => "Togo"],
            ["code" => "tt", "az" => "Trinidad və Tobaqo", "en" => "Trinidad and Tobago"],
            ["code" => "tn", "az" => "Tunis", "en" => "Tunisia"],
            ["code" => "tc", "az" => "Turk və Kaykos adaları", "en" => "Turks and Caicos Islands"],
            ["code" => "tv", "az" => "Tuvalu", "en" => "Tuvalu"],
            ["code" => "tr", "az" => "Türkiyə", "en" => "Turkiye"],
            ["code" => "tm", "az" => "Türkmənistan", "en" => "Turkmenistan"],
            ["code" => "ua", "az" => "Ukrayna", "en" => "Ukraine"],
            ["code" => "ug", "az" => "Uqanda", "en" => "Uganda"],
            ["code" => "uy", "az" => "Uruqvay", "en" => "Uruguay"],
            ["code" => "vu", "az" => "Vanuatu", "en" => "Vanuatu"],
//            ["code" => "va", "az" => "Vatikan", "en" => "Vatican City"],
            ["code" => "ve", "az" => "Venesuela", "en" => "Venezuela"],
            ["code" => "vn", "az" => "Vyetnam", "en" => "Vietnam"],
            ["code" => "wf", "az" => "Vollis və Futuna adaları", "en" => "Wallis and Futuna"],
            ["code" => "ye", "az" => "Yəmən", "en" => "Yemen"],
            ["code" => "nc", "az" => "Yeni Kaledoniya (Fransa)", "en" => "New Caledonia"],
            ["code" => "nz", "az" => "Yeni Zelanda", "en" => "New Zealand"],
            ["code" => "vi", "az" => "Virgin adaları (ABŞ)", "en" => "United States Virgin Islands"],
            ["code" => "vg", "az" => "Virgin adaları (Britaniya)", "en" => "British Virgin Islands"],
            ["code" => "hr", "az" => "Xorvatiya", "en" => "Croatia"],
            ["code" => "jm", "az" => "Yamayka", "en" => "Jamaica"],
            ["code" => "jp", "az" => "Yaponiya", "en" => "Japan"],
            ["code" => "gr", "az" => "Yunanıstan", "en" => "Greece"],
            ["code" => "zm", "az" => "Zambiya", "en" => "Zambia"],
            ["code" => "zw", "az" => "Zimbabve", "en" => "Zimbabwe"],
            ["code" => "td", "az" => "Çad", "en" => "Chad"],
            ["code" => "cz", "az" => "Çexiya", "en" => "Czechia"],
            ["code" => "cl", "az" => "Çili", "en" => "Chile"],
            ["code" => "cn", "az" => "Çin", "en" => "China"],
//            ["code" => "mo", "az" => "Çinin xüs. inz. r-nu Aomin (Makao)", "en" => "Macau"],
            ["code" => "hk", "az" => "Çinin xüs. inz. r-nu Honkonq", "en" => "Hong Kong"],
            ["code" => "uz", "az" => "Özbəkistan", "en" => "Uzbekistan"],
            ["code" => "id", "az" => "İndoneziya", "en" => "Indonesia"],
            ["code" => "jo", "az" => "İordaniya", "en" => "Jordan"],
            ["code" => "ir", "az" => "İran İslam Respublikası", "en" => "Iran"],
            ["code" => "iq", "az" => "İraq", "en" => "Iraq"],
            ["code" => "ie", "az" => "İrlandiya", "en" => "Ireland"],
            ["code" => "is", "az" => "İslandiya", "en" => "Iceland"],
            ["code" => "es", "az" => "İspaniya", "en" => "Spain"],
            ["code" => "il", "az" => "İsrail", "en" => "Israel"],
            ["code" => "se", "az" => "İsveç", "en" => "Sweden"],
            ["code" => "ch", "az" => "İsveçrə", "en" => "Switzerland"],
            ["code" => "it", "az" => "İtaliya", "en" => "Italy"],
            ["code" => "mk", "az" => "Şimali Makedoniya Respublikası", "en" => "North Macedonia"],
            ["code" => "mp", "az" => "Şimali Marian adaları (ABŞ)", "en" => "Northern Mariana Islands"],
            ["code" => "lk", "az" => "Şri-Lanka", "en" => "Sri Lanka"],
            ["code" => "af", "az" => "Əfqanıstan", "en" => "Afghanistan"],
            ["code" => "dz", "az" => "Əlcəzair", "en" => "Algeria"],
        ];
        
        foreach ($countries as $country) {
            $newCountry = new Country();
            $newCountry->code = $country['code'];
            $newCountry->setTranslation('name', "az", $country['az']);
            $newCountry->setTranslation('name', "en", $country['en']);
            $newCountry->save();
        }
    }
}
