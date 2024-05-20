<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Country::truncate();
        // DB::table('countries')->truncate();

        $countries = array(
            array("1", "AF", "Afghanistan", "93", "؋", "Kabul", "AFN", "Asia", "AS", "AFG"),
            array("2", "AX", "Aland Islands", "358", "€", "Mariehamn", "EUR", "Europe", "EU", "ALA"),
            array("3", "AL", "Albania", "355", "Lek", "Tirana", "ALL", "Europe", "EU", "ALB"),
            array("4", "DZ", "Algeria", "213", "دج", "Algiers", "DZD", "Africa", "AF", "DZA"),
            array("5", "AS", "American Samoa", "1684", "$", "Pago Pago", "USD", "Oceania", "OC", "ASM"),
            array("6", "AD", "Andorra", "376", "€", "Andorra la Vella", "EUR", "Europe", "EU", "AND"),
            array("7", "AO", "Angola", "244", "Kz", "Luanda", "AOA", "Africa", "AF", "AGO"),
            array("8", "AI", "Anguilla", "1264", "$", "The Valley", "XCD", "North America", "NA", "AIA"),
            array("9", "AQ", "Antarctica", "672", "$", "Antarctica", "AAD", "Antarctica", "AN", "ATA"),
            array("10", "AG", "Antigua and Barbuda", "1268", "$", "St. John's", "XCD", "North America", "NA", "ATG"),
            array("11", "AR", "Argentina", "54", "$", "Buenos Aires", "ARS", "South America", "SA", "ARG"),
            array("12", "AM", "Armenia", "374", "֏", "Yerevan", "AMD", "Asia", "AS", "ARM"),
            array("13", "AW", "Aruba", "297", "ƒ", "Oranjestad", "AWG", "North America", "NA", "ABW"),
            array("14", "AU", "Australia", "61", "$", "Canberra", "AUD", "Oceania", "OC", "AUS"),
            array("15", "AT", "Austria", "43", "€", "Vienna", "EUR", "Europe", "EU", "AUT"),
            array("16", "AZ", "Azerbaijan", "994", "m", "Baku", "AZN", "Asia", "AS", "AZE"),
            array("17", "BS", "Bahamas", "1242", "B$", "Nassau", "BSD", "North America", "NA", "BHS"),
            array("18", "BH", "Bahrain", "973", ".د.ب", "Manama", "BHD", "Asia", "AS", "BHR"),
            array("19", "BD", "Bangladesh", "880", "৳", "Dhaka", "BDT", "Asia", "AS", "BGD"),
            array("20", "BB", "Barbados", "1246", "Bds$", "Bridgetown", "BBD", "North America", "NA", "BRB"),
            array("21", "BY", "Belarus", "375", "Br", "Minsk", "BYN", "Europe", "EU", "BLR"),
            array("22", "BE", "Belgium", "32", "€", "Brussels", "EUR", "Europe", "EU", "BEL"),
            array("23", "BZ", "Belize", "501", "$", "Belmopan", "BZD", "North America", "NA", "BLZ"),
            array("24", "BJ", "Benin", "229", "CFA", "Porto-Novo", "XOF", "Africa", "AF", "BEN"),
            array("25", "BM", "Bermuda", "1441", "$", "Hamilton", "BMD", "North America", "NA", "BMU"),
            array("26", "BT", "Bhutan", "975", "Nu.", "Thimphu", "BTN", "Asia", "AS", "BTN"),
            array("27", "BO", "Bolivia", "591", "Bs.", "Sucre", "BOB", "South America", "SA", "BOL"),
            array("28", "BQ", "Bonaire", "599",  "$", "Kralendijk", "USD", "North America", "NA", "BES"),
            array("29", "BA", "Bosnia and Herzegovina", "387", "KM", "Sarajevo", "BAM", "Europe", "EU", "BIH"),
            array("30", "BW", "Botswana", "267", "P", "Gaborone", "BWP", "Africa", "AF", "BWA"),
            array("31", "BV", "Bouvet Island", "55", "kr", "", "NOK", "Antarctica", "AN", "BVT"),
            array("32", "BR", "Brazil", "55", "R$", "Brasilia", "BRL", "South America", "SA", "BRA"),
            array("33", "IO", "British Indian Ocean Territory", "246", "$", "Diego Garcia", "USD", "Asia", "AS", "IOT"),
            array("34", "BN", "Brunei Darussalam", "673", "B$", "Bandar Seri Begawan", "BND", "Asia", "AS", "BRN"),
            array("35", "BG", "Bulgaria", "359", "Лв.", "Sofia", "BGN", "Europe", "EU", "BGR"),
            array("36", "BF", "Burkina Faso", "226", "CFA", "Ouagadougou", "XOF", "Africa", "AF", "BFA"),
            array("37", "BI", "Burundi", "257", "FBu", "Bujumbura", "BIF", "Africa", "AF", "BDI"),
            array("38", "KH", "Cambodia", "855", "KHR", "Phnom Penh", "KHR", "Asia", "AS", "KHM"),
            array("39", "CM", "Cameroon", "237", "FCFA", "Yaounde", "XAF", "Africa", "AF", "CMR"),
            array("40", "CA", "Canada", "1", "$", "Ottawa", "CAD", "North America", "NA", "CAN"),
            array("41", "CV", "Cape Verde", "238", "$", "Praia", "CVE", "Africa", "AF", "CPV"),
            array("42", "KY", "Cayman Islands", "1345", "$", "George Town", "KYD", "North America", "NA", "CYM"),
            array("43", "CF", "Central African Republic", "236", "FCFA", "Bangui", "XAF", "Africa", "AF", "CAF"),
            array("44", "TD", "Chad", "235", "FCFA", "N'Djamena", "XAF", "Africa", "AF", "TCD"),
            array("45", "CL", "Chile", "56", "$", "Santiago", "CLP", "South America", "SA", "CHL"),
            array("46", "CN", "China", "86", "¥", "Beijing", "CNY", "Asia", "AS", "CHN"),
            array("47", "CX", "Christmas Island", "61", "$", "Flying Fish Cove", "AUD", "Asia", "AS", "CXR"),
            array("48", "CC", "Cocos (Keeling) Islands", "672", "$", "West Island", "AUD", "Asia", "AS", "CCK"),
            array("49", "CO", "Colombia", "57", "$", "Bogota", "COP", "South America", "SA", "COL"),
            array("50", "KM", "Comoros", "269", "CF", "Moroni", "KMF", "Africa", "AF", "COM"),
            array("51", "CG", "Congo", "242", "FC", "Brazzaville", "XAF", "Africa", "AF", "COG"),
            array("52", "CD", "Congo",  "242", "FC", "Kinshasa", "CDF", "Africa", "AF", "COD"),
            array("53", "CK", "Cook Islands", "682", "$", "Avarua", "NZD", "Oceania", "OC", "COK"),
            array("54", "CR", "Costa Rica", "506", "₡", "San Jose", "CRC", "North America", "NA", "CRI"),
            array("55", "CI", "Cote D'Ivoire", "225", "CFA", "Yamoussoukro", "XOF", "Africa", "AF", "CIV"),
            array("56", "HR", "Croatia", "385", "kn", "Zagreb", "HRK", "Europe", "EU", "HRV"),
            array("57", "CU", "Cuba", "53", "$", "Havana", "CUP", "North America", "NA", "CUB"),
            array("58", "CW", "Curacao", "599", "ƒ", "Willemstad", "ANG", "North America", "NA", "CUW"),
            array("59", "CY", "Cyprus", "357", "€", "Nicosia", "EUR", "Asia", "AS", "CYP"),
            array("60", "CZ", "Czech Republic", "420", "Kč", "Prague", "CZK", "Europe", "EU", "CZE"),
            array("61", "DK", "Denmark", "45", "Kr.", "Copenhagen", "DKK", "Europe", "EU", "DNK"),
            array("62", "DJ", "Djibouti", "253", "Fdj", "Djibouti", "DJF", "Africa", "AF", "DJI"),
            array("63", "DM", "Dominica", "1767", "$", "Roseau", "XCD", "North America", "NA", "DMA"),
            array("64", "DO", "Dominican Republic", "1809", "$", "Santo Domingo", "DOP", "North America", "NA", "DOM"),
            array("65", "EC", "Ecuador", "593", "$", "Quito", "USD", "South America", "SA", "ECU"),
            array("66", "EG", "Egypt", "20", "ج.م", "Cairo", "EGP", "Africa", "AF", "EGY"),
            array("67", "SV", "El Salvador", "503", "$", "San Salvador", "USD", "North America", "NA", "SLV"),
            array("68", "GQ", "Equatorial Guinea", "240", "FCFA", "Malabo", "XAF", "Africa", "AF", "GNQ"),
            array("69", "ER", "Eritrea", "291", "Nfk", "Asmara", "ERN", "Africa", "AF", "ERI"),
            array("70", "EE", "Estonia", "372", "€", "Tallinn", "EUR", "Europe", "EU", "EST"),
            array("71", "ET", "Ethiopia", "251", "Nkf", "Addis Ababa", "ETB", "Africa", "AF", "ETH"),
            array("72", "FK", "Falkland Islands (Malvinas)", "500", "£", "Stanley", "FKP", "South America", "SA", "FLK"),
            array("73", "FO", "Faroe Islands", "298", "Kr.", "Torshavn", "DKK", "Europe", "EU", "FRO"),
            array("74", "FJ", "Fiji", "679", "FJ$", "Suva", "FJD", "Oceania", "OC", "FJI"),
            array("75", "FI", "Finland", "358", "€", "Helsinki", "EUR", "Europe", "EU", "FIN"),
            array("76", "FR", "France", "33", "€", "Paris", "EUR", "Europe", "EU", "FRA"),
            array("77", "GF", "French Guiana", "594", "€", "Cayenne", "EUR", "South America", "SA", "GUF"),
            array("78", "PF", "French Polynesia", "689", "₣", "Papeete", "XPF", "Oceania", "OC", "PYF"),
            array("79", "TF", "French Southern Territories", "262", "€", "Port-aux-Francais", "EUR", "Antarctica", "AN", "ATF"),
            array("80", "GA", "Gabon", "241", "FCFA", "Libreville", "XAF", "Africa", "AF", "GAB"),
            array("81", "GM", "Gambia", "220", "D", "Banjul", "GMD", "Africa", "AF", "GMB"),
            array("82", "GE", "Georgia", "995", "ლ", "Tbilisi", "GEL", "Asia", "AS", "GEO"),
            array("83", "DE", "Germany", "49", "€", "Berlin", "EUR", "Europe", "EU", "DEU"),
            array("84", "GH", "Ghana", "233", "GH₵", "Accra", "GHS", "Africa", "AF", "GHA"),
            array("85", "GI", "Gibraltar", "350", "£", "Gibraltar", "GIP", "Europe", "EU", "GIB"),
            array("86", "GR", "Greece", "30", "€", "Athens", "EUR", "Europe", "EU", "GRC"),
            array("87", "GL", "Greenland", "299", "Kr.", "Nuuk", "DKK", "North America", "NA", "GRL"),
            array("88", "GD", "Grenada", "1473", "$", "St. George's", "XCD", "North America", "NA", "GRD"),
            array("89", "GP", "Guadeloupe", "590", "€", "Basse-Terre", "EUR", "North America", "NA", "GLP"),
            array("90", "GU", "Guam", "1671", "$", "Hagatna", "USD", "Oceania", "OC", "GUM"),
            array("91", "GT", "Guatemala", "502", "Q", "Guatemala City", "GTQ", "North America", "NA", "GTM"),
            array("92", "GG", "Guernsey", "44", "£", "St Peter Port", "GBP", "Europe", "EU", "GGY"),
            array("93", "GN", "Guinea", "224", "FG", "Conakry", "GNF", "Africa", "AF", "GIN"),
            array("94", "GW", "Guinea-Bissau", "245", "CFA", "Bissau", "XOF", "Africa", "AF", "GNB"),
            array("95", "GY", "Guyana", "592", "$", "Georgetown", "GYD", "South America", "SA", "GUY"),
            array("96", "HT", "Haiti", "509", "G", "Port-au-Prince", "HTG", "North America", "NA", "HTI"),
            array("97", "HM", "Heard Island and Mcdonald Islands", "0", "$", "", "AUD", "Antarctica", "AN", "HMD"),
            array("98", "VA", "Holy See (Vatican City State)", "39", "€", "Vatican City", "EUR", "Europe", "EU", "VAT"),
            array("99", "HN", "Honduras", "504", "L", "Tegucigalpa", "HNL", "North America", "NA", "HND"),
            array("100", "HK", "Hong Kong", "852", "$", "Hong Kong", "HKD", "Asia", "AS", "HKG"),
            array("101", "HU", "Hungary", "36", "Ft", "Budapest", "HUF", "Europe", "EU", "HUN"),
            array("102", "IS", "Iceland", "354", "kr", "Reykjavik", "ISK", "Europe", "EU", "ISL"),
            array("103", "IN", "India", "91", "₹", "New Delhi", "INR", "Asia", "AS", "IND"),
            array("104", "ID", "Indonesia", "62", "Rp", "Jakarta", "IDR", "Asia", "AS", "IDN"),
            array("105", "IR", "Iran",  "98", "﷼", "Tehran", "IRR", "Asia", "AS", "IRN"),
            array("106", "IQ", "Iraq", "964", "د.ع", "Baghdad", "IQD", "Asia", "AS", "IRQ"),
            array("107", "IE", "Ireland", "353", "€", "Dublin", "EUR", "Europe", "EU", "IRL"),
            array("108", "IM", "Isle of Man", "44", "£", "Douglas", "Isle of Man", "GBP", "Europe", "EU", "IMN"),
            array("109", "IL", "Israel", "972", "₪", "Jerusalem", "ILS", "Asia", "AS", "ISR"),
            array("110", "IT", "Italy", "39", "€", "Rome", "EUR", "Europe", "EU", "ITA"),
            array("111", "JM", "Jamaica", "1876", "J$", "Kingston", "JMD", "North America", "NA", "JAM"),
            array("112", "JP", "Japan", "81", "¥", "Tokyo", "JPY", "Asia", "AS", "JPN"),
            array("113", "JE", "Jersey", "44", "£", "Saint Helier", "GBP", "Europe", "EU", "JEY"),
            array("114", "JO", "Jordan", "962", "ا.د", "Amman", "JOD", "Asia", "AS", "JOR"),
            array("115", "KZ", "Kazakhstan", "7", "лв", "Astana", "KZT", "Asia", "AS", "KAZ"),
            array("116", "KE", "Kenya", "254", "KSh", "Nairobi", "KES", "Africa", "AF", "KEN"),
            array("117", "KI", "Kiribati", "686", "$", "Tarawa", "AUD", "Oceania", "OC", "KIR"),
            array("118", "KP", "Korea", "850", "₩", "Pyongyang", "KPW", "Asia", "AS", "PRK"),
            array("119", "KR", "Korea", "82", "₩", "Seoul", "KRW", "Asia", "AS", "KOR"),
            array("120", "XK", "Kosovo", "383", "€", "Pristina", "EUR", "Europe", "EU", "XKX"),
            array("121", "KW", "Kuwait", "965", "ك.د", "Kuwait City", "KWD", "Asia", "AS", "KWT"),
            array("122", "KG", "Kyrgyzstan", "996", "лв", "Bishkek", "KGS", "Asia", "AS", "KGZ"),
            array("123", "LA", "Lao People's Democratic Republic", "856", "₭", "Vientiane", "LAK", "Asia", "AS", "LAO"),
            array("124", "LV", "Latvia", "371", "€", "Riga", "EUR", "Europe", "EU", "LVA"),
            array("125", "LB", "Lebanon", "961", "£", "Beirut", "LBP", "Asia", "AS", "LBN"),
            array("126", "LS", "Lesotho", "266", "L", "Maseru", "LSL", "Africa", "AF", "LSO"),
            array("127", "LR", "Liberia", "231", "$", "Monrovia", "LRD", "Africa", "AF", "LBR"),
            array("128", "LY", "Libyan Arab Jamahiriya", "218", "د.ل", "Tripolis", "LYD", "Africa", "AF", "LBY"),
            array("129", "LI", "Liechtenstein", "423", "CHf", "Vaduz", "CHF", "Europe", "EU", "LIE"),
            array("130", "LT", "Lithuania", "370", "€", "Vilnius", "EUR", "Europe", "EU", "LTU"),
            array("131", "LU", "Luxembourg", "352", "€", "Luxembourg", "EUR", "Europe", "EU", "LUX"),
            array("132", "MO", "Macao", "853", "$", "Macao", "MOP", "Asia", "AS", "MAC"),
            array("133", "MK", "Macedonia", "389", "ден", "Skopje", "MKD", "Europe", "EU", "MKD"),
            array("134", "MG", "Madagascar", "261", "Ar", "Antananarivo", "MGA", "Africa", "AF", "MDG"),
            array("135", "MW", "Malawi", "265", "MK", "Lilongwe", "MWK", "Africa", "AF", "MWI"),
            array("136", "MY", "Malaysia", "60", "RM", "Kuala Lumpur", "MYR", "Asia", "AS", "MYS"),
            array("137", "MV", "Maldives", "960", "Rf", "Male", "MVR", "Asia", "AS", "MDV"),
            array("138", "ML", "Mali", "223", "CFA", "Bamako", "XOF", "Africa", "AF", "MLI"),
            array("139", "MT", "Malta", "356", "€", "Valletta", "EUR", "Europe", "EU", "MLT"),
            array("140", "MH", "Marshall Islands", "692", "$", "Majuro", "USD", "Oceania", "OC", "MHL"),
            array("141", "MQ", "Martinique", "596", "€", "Fort-de-France", "EUR", "North America", "NA", "MTQ"),
            array("142", "MR", "Mauritania", "222", "MRU", "Nouakchott", "MRO", "Africa", "AF", "MRT"),
            array("143", "MU", "Mauritius", "230", "₨", "Port Louis", "MUR", "Africa", "AF", "MUS"),
            array("144", "YT", "Mayotte", "262", "€", "Mamoudzou", "EUR", "Africa", "AF", "MYT"),
            array("145", "MX", "Mexico", "52", "$", "Mexico City", "MXN", "North America", "NA", "MEX"),
            array("146", "FM", "Micronesia", "691", "$", "Palikir", "USD", "Oceania", "OC", "FSM"),
            array("147", "MD", "Moldova",  "373", "L", "Chisinau", "MDL", "Europe", "EU", "MDA"),
            array("148", "MC", "Monaco", "377", "€", "Monaco", "EUR", "Europe", "EU", "MCO"),
            array("149", "MN", "Mongolia", "976", "₮", "Ulan Bator", "MNT", "Asia", "AS", "MNG"),
            array("150", "ME", "Montenegro", "382", "€", "Podgorica", "EUR", "Europe", "EU", "MNE"),
            array("151", "MS", "Montserrat", "1664", "$", "Plymouth", "XCD", "North America", "NA", "MSR"),
            array("152", "MA", "Morocco", "212", "DH", "Rabat", "MAD", "Africa", "AF", "MAR"),
            array("153", "MZ", "Mozambique", "258", "MT", "Maputo", "MZN", "Africa", "AF", "MOZ"),
            array("154", "MM", "Myanmar", "95", "K", "Nay Pyi Taw", "MMK", "Asia", "AS", "MMR"),
            array("155", "NA", "Namibia", "264", "$", "Windhoek", "NAD", "Africa", "AF", "NAM"),
            array("156", "NR", "Nauru", "674", "$", "Yaren", "AUD", "Oceania", "OC", "NRU"),
            array("157", "NP", "Nepal", "977", "₨", "Kathmandu", "NPR", "Asia", "AS", "NPL"),
            array("158", "NL", "Netherlands", "31", "€", "Amsterdam", "EUR", "Europe", "EU", "NLD"),
            array("159", "AN", "Netherlands Antilles", "599", "NAf", "Willemstad", "ANG", "North America", "NA", "ANT"),
            array("160", "NC", "New Caledonia", "687", "₣", "Noumea", "XPF", "Oceania", "OC", "NCL"),
            array("161", "NZ", "New Zealand", "64", "$", "Wellington", "NZD", "Oceania", "OC", "NZL"),
            array("162", "NI", "Nicaragua", "505", "C$", "Managua", "NIO", "North America", "NA", "NIC"),
            array("163", "NE", "Niger", "227", "CFA", "Niamey", "XOF", "Africa", "AF", "NER"),
            array("164", "NG", "Nigeria", "234", "₦", "Abuja", "NGN", "Africa", "AF", "NGA"),
            array("165", "NU", "Niue", "683", "$", "Alofi", "NZD", "Oceania", "OC", "NIU"),
            array("166", "NF", "Norfolk Island", "672", "$", "Kingston", "AUD", "Oceania", "OC", "NFK"),
            array("167", "MP", "Northern Mariana Islands", "1670", "$", "Saipan", "USD", "Oceania", "OC", "MNP"),
            array("168", "NO", "Norway", "47", "kr", "Oslo", "NOK", "Europe", "EU", "NOR"),
            array("169", "OM", "Oman", "968", ".ع.ر", "Muscat", "OMR", "Asia", "AS", "OMN"),
            array("170", "PK", "Pakistan", "92", "₨", "Islamabad", "PKR", "Asia", "AS", "PAK"),
            array("171", "PW", "Palau", "680", "$", "Melekeok", "USD", "Oceania", "OC", "PLW"),
            array("172", "PS", "Palestinian Territory", "970", "₪", "East Jerusalem", "ILS", "Asia", "AS", "PSE"),
            array("173", "PA", "Panama", "507", "B/.", "Panama City", "PAB", "North America", "NA", "PAN"),
            array("174", "PG", "Papua New Guinea", "675", "K", "Port Moresby", "PGK", "Oceania", "OC", "PNG"),
            array("175", "PY", "Paraguay", "595", "₲", "Asuncion", "PYG", "South America", "SA", "PRY"),
            array("176", "PE", "Peru", "51", "S/.", "Lima", "PEN", "South America", "SA", "PER"),
            array("177", "PH", "Philippines", "63", "₱", "Manila", "PHP", "Asia", "AS", "PHL"),
            array("178", "PN", "Pitcairn", "64", "$", "Adamstown", "NZD", "Oceania", "OC", "PCN"),
            array("179", "PL", "Poland", "48", "zł", "Warsaw", "PLN", "Europe", "EU", "POL"),
            array("180", "PT", "Portugal", "351", "€", "Lisbon", "EUR", "Europe", "EU", "PRT"),
            array("181", "PR", "Puerto Rico", "1787", "$", "San Juan", "USD", "North America", "NA", "PRI"),
            array("182", "QA", "Qatar", "974", "ق.ر", "Doha", "QAR", "Asia", "AS", "QAT"),
            array("183", "RE", "Reunion", "262", "€", "Saint-Denis", "EUR", "Africa", "AF", "REU"),
            array("184", "RO", "Romania", "40", "lei", "Bucharest", "RON", "Europe", "EU", "ROM"),
            array("185", "RU", "Russian Federation", "7", "₽", "Moscow", "RUB", "Asia", "AS", "RUS"),
            array("186", "RW", "Rwanda", "250", "FRw", "Kigali", "RWF", "Africa", "AF", "RWA"),
            array("187", "BL", "Saint Barthelemy", "590", "€", "Gustavia", "EUR", "North America", "NA", "BLM"),
            array("188", "SH", "Saint Helena", "290", "£", "Jamestown", "SHP", "Africa", "AF", "SHN"),
            array("189", "KN", "Saint Kitts and Nevis", "1869", "$", "Basseterre", "XCD", "North America", "NA", "KNA"),
            array("190", "LC", "Saint Lucia", "1758", "$", "Castries", "XCD", "North America", "NA", "LCA"),
            array("191", "MF", "Saint Martin", "590", "€", "Marigot", "EUR", "North America", "NA", "MAF"),
            array("192", "PM", "Saint Pierre and Miquelon", "508", "€", "Saint-Pierre", "EUR", "North America", "NA", "SPM"),
            array("193", "VC", "Saint Vincent and the Grenadines", "1784", "$", "Kingstown", "XCD", "North America", "NA", "VCT"),
            array("194", "WS", "Samoa", "684", "SAT", "Apia", "WST", "Oceania", "OC", "WSM"),
            array("195", "SM", "San Marino", "378", "€", "San Marino", "EUR", "Europe", "EU", "SMR"),
            array("196", "ST", "Sao Tome and Principe", "239", "Db", "Sao Tome", "STD", "Africa", "AF", "STP"),
            array("197", "SA", "Saudi Arabia", "966", "﷼", "Riyadh", "SAR", "Asia", "AS", "SAU"),
            array("198", "SN", "Senegal", "221", "CFA", "Dakar", "XOF", "Africa", "AF", "SEN"),
            array("199", "RS", "Serbia", "381", "din", "Belgrade", "RSD", "Europe", "EU", "SRB"),
            array("200", "CS", "Serbia and Montenegro", "381", "din", "Belgrade", "RSD", "Europe", "EU", "SCG"),
            array("201", "SC", "Seychelles", "248", "SRe", "Victoria", "SCR", "Africa", "AF", "SYC"),
            array("202", "SL", "Sierra Leone", "232", "Le", "Freetown", "SLL", "Africa", "AF", "SLE"),
            array("203", "SG", "Singapore", "65", "$", "Singapur", "SGD", "Asia", "AS", "SGP"),
            array("204", "SX", "Sint Maarten", "721", "ƒ", "Philipsburg", "ANG", "North America", "NA", "SXM"),
            array("205", "SK", "Slovakia", "421", "€", "Bratislava", "EUR", "Europe", "EU", "SVK"),
            array("206", "SI", "Slovenia", "386", "€", "Ljubljana", "EUR", "Europe", "EU", "SVN"),
            array("207", "SB", "Solomon Islands", "677", "Si$", "Honiara", "SBD", "Oceania", "OC", "SLB"),
            array("208", "SO", "Somalia", "252", "Sh.so.", "Mogadishu", "SOS", "Africa", "AF", "SOM"),
            array("209", "ZA", "South Africa", "27", "R", "Pretoria", "ZAR", "Africa", "AF", "ZAF"),
            array("210", "GS", "South Georgia and the South Sandwich Islands", "500", "£", "Grytviken", "GBP", "Antarctica", "AN", "SGS"),
            array("211", "SS", "South Sudan", "211", "£", "Juba", "SSP", "Africa", "AF", "SSD"),
            array("212", "ES", "Spain", "34", "€", "Madrid", "EUR", "Europe", "EU", "ESP"),
            array("213", "LK", "Sri Lanka", "94", "Rs", "Colombo", "LKR", "Asia", "AS", "LKA"),
            array("214", "SD", "Sudan", "249", ".س.ج", "Khartoum", "SDG", "Africa", "AF", "SDN"),
            array("215", "SR", "Suriname", "597", "$", "Paramaribo", "SRD", "South America", "SA", "SUR"),
            array("216", "SJ", "Svalbard and Jan Mayen", "47", "kr", "Longyearbyen", "NOK", "Europe", "EU", "SJM"),
            array("217", "SZ", "Swaziland", "268", "E", "Mbabane", "SZL", "Africa", "AF", "SWZ"),
            array("218", "SE", "Sweden", "46", "kr", "Stockholm", "SEK", "Europe", "EU", "SWE"),
            array("219", "CH", "Switzerland", "41", "CHf", "Berne", "CHF", "Europe", "EU", "CHE"),
            array("220", "SY", "Syrian Arab Republic", "963", "LS", "Damascus", "SYP", "Asia", "AS", "SYR"),
            array("221", "TW", "Taiwan", "886", "$", "Taipei", "TWD", "Asia", "AS", "TWN"),
            array("222", "TJ", "Tajikistan", "992", "SM", "Dushanbe", "TJS", "Asia", "AS", "TJK"),
            array("223", "TZ", "Tanzania", "255", "TSh", "Dodoma", "TZS", "Africa", "AF", "TZA"),
            array("224", "TH", "Thailand", "66", "฿", "Bangkok", "THB", "Asia", "AS", "THA"),
            array("225", "TL", "Timor-Leste", "670", "$", "Dili", "USD", "Asia", "AS", "TLS"),
            array("226", "TG", "Togo", "228", "CFA", "Lome", "XOF", "Africa", "AF", "TGO"),
            array("227", "TK", "Tokelau", "690", "$", "", "NZD", "Oceania", "OC", "TKL"),
            array("228", "TO", "Tonga", "676", "$", "Nuku'alofa", "TOP", "Oceania", "OC", "TON"),
            array("229", "TT", "Trinidad and Tobago", "1868", "$", "Port of Spain", "TTD", "North America", "NA", "TTO"),
            array("230", "TN", "Tunisia", "216", "ت.د", "Tunis", "TND", "Africa", "AF", "TUN"),
            array("231", "TR", "Turkey", "90", "₺", "Ankara", "TRY", "Asia", "AS", "TUR"),
            array("232", "TM", "Turkmenistan", "7370", "T", "Ashgabat", "TMT", "Asia", "AS", "TKM"),
            array("233", "TC", "Turks and Caicos Islands", "1649", "$", "Cockburn Town", "USD", "North America", "NA", "TCA"),
            array("234", "TV", "Tuvalu", "688", "$", "Funafuti", "AUD", "Oceania", "OC", "TUV"),
            array("235", "UG", "Uganda", "256", "USh", "Kampala", "UGX", "Africa", "AF", "UGA"),
            array("236", "UA", "Ukraine", "380", "₴", "Kiev", "UAH", "Europe", "EU", "UKR"),
            array("237", "AE", "United Arab Emirates", "971", "إ.د", "Abu Dhabi", "AED", "Asia", "AS", "ARE"),
            array("238", "GB", "United Kingdom", "44", "£", "London", "GBP", "Europe", "EU", "GBR"),
            array("239", "US", "United States", "1", "$", "Washington", "USD", "North America", "NA", "USA"),
            array("240", "UM", "United States Minor Outlying Islands", "1", "$", "", "USD", "North America", "NA", "UMI"),
            array("241", "UY", "Uruguay", "598", "$", "Montevideo", "UYU", "South America", "SA", "URY"),
            array("242", "UZ", "Uzbekistan", "998", "лв", "Tashkent", "UZS", "Asia", "AS", "UZB"),
            array("243", "VU", "Vanuatu", "678", "VT", "Port Vila", "VUV", "Oceania", "OC", "VUT"),
            array("244", "VE", "Venezuela", "58", "Bs", "Caracas", "VEF", "South America", "SA", "VEN"),
            array("245", "VN", "Viet Nam", "84", "₫", "Hanoi", "VND", "Asia", "AS", "VNM"),
            array("246", "VG", "Virgin Islands", "1284", "$", "Road Town", "USD", "North America", "NA", "VGB"),
            array("247", "VI", "Virgin Islands", "1340", "$", "Charlotte Amalie", "USD", "North America", "NA", "VIR"),
            array("248", "WF", "Wallis and Futuna", "681", "₣", "Mata Utu", "XPF", "Oceania", "OC", "WLF"),
            array("249", "EH", "Western Sahara", "212", "MAD", "El-Aaiun", "MAD", "Africa", "AF", "ESH"),
            array("250", "YE", "Yemen", "967", "﷼", "Sanaa", "YER", "Asia", "AS", "YEM"),
            array("251", "ZM", "Zambia", "260", "ZK", "Lusaka", "ZMW", "Africa", "AF", "ZMB"),
            array("252", "ZW", "Zimbabwe", "263", "$", "Harare", "ZWL", "Africa", "AF", "ZWE")
        );


        foreach ($countries as $country) {
            DB::table('countries')->insert([
                'id' => $country[0],
                'code' => $country[1],
                'name' => $country[2],
                'phone' => $country[3],
                'symbol' => $country[4],
                'capital' => $country[5],
                'currency' => $country[6],
                'continent' => $country[7],
                'continent_code' => $country[8],
                'alpha_3' => $country[9],
                'updated_at' => now(),
                'created_at' => now(),
            ]);
        }
    }
}