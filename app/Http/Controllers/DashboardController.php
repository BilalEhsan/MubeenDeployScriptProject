<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Sources;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public $sitePath = 'mxe';
    public $countryFlags = [];
    public function __construct()
    {

        $this->countryFlags = array("CA" => "Canada", "US" => "United States", "BS" => "Bahamas", "BB" => "Barbados", "AI" => "Anguilla", "AG" => "Antigua and Barbuda", "VG" => "Virgin Islands", "VI" => "Virgin Islands", "BM" => "Bermuda", "GD" => "Grenada", "TC" => "Turks and Caicos Islands", "MS" => "Montserrat", "MP" => "Northern Mariana Islands", "GU" => "Guam", "AS" => "American Samoa", "LC" => "Saint Lucia", "DM" => "Dominica", "VC" => "Saint Vincent and the Grenadines", "DO" => "Dominican Republic", "TT" => "Trinidad and Tobago", "KN" => "Saint Kitts and Nevis", "JM" => "Jamaica", "PR" => "Puerto Rico", "EG" => "Egypt", "SS" => "South Sudan", "MA" => "Morocco", "DZ" => "Algeria", "TN" => "Tunisia", "LY" => "Libyan Arab Jamahiriya", "GM" => "Gambia", "SN" => "Senegal", "MR" => "Mauritania", "ML" => "Mali", "GN" => "Guinea", "CI" => "Cote d'Ivoire", "BF" => "Burkina Faso", "NE" => "Niger", "TG" => "Togo", "BJ" => "Benin", "MU" => "Mauritius", "LR" => "Liberia", "SL" => "Sierra Leone", "GH" => "Ghana", "NG" => "Nigeria", "TD" => "Chad", "CF" => "Central African Republic", "CM" => "Cameroon", "CV" => "Cape Verde", "ST" => "Sao Tome and Principe", "GQ" => "Equatorial Guinea", "GA" => "Gabon", "CG" => "Congo", "CD" => "Congo", "AO" => "Angola", "GW" => "Guinea-Bissau", "IO" => "British Indian Ocean Territory", "SC" => "Seychelles", "SD" => "Sudan", "RW" => "Rwanda", "ET" => "Ethiopia", "SO" => "Somalia", "DJ" => "Djibouti", "KE" => "Kenya", "TZ" => "Tanzania", "UG" => "Uganda", "BI" => "Burundi", "MZ" => "Mozambique", "ZM" => "Zambia", "MG" => "Madagascar", "TF" => "French Southern Territories", "YT" => "Mayotte", "RE" => "Reunion", "ZW" => "Zimbabwe", "NA" => "Namibia", "MW" => "Malawi", "LS" => "Lesotho", "BW" => "Botswana", "SZ" => "Swaziland", "KM" => "Comoros", "ZA" => "South Africa", "SH" => "Saint Helena", "ER" => "Eritrea", "AW" => "Aruba", "FO" => "Faroe Islands", "GL" => "Greenland", "GR" => "Greece", "NL" => "Netherlands", "BE" => "Belgium", "FR" => "France", "ES" => "Spain", "KY" => "Cayman Islands", "GI" => "Gibraltar", "PT" => "Portugal", "LU" => "Luxembourg", "IE" => "Ireland", "IS" => "Iceland", "AL" => "Albania", "MT" => "Malta", "CY" => "Cyprus", "AX" => "Åland Islands", "FI" => "Finland", "BG" => "Bulgaria", "HU" => "Hungary", "LT" => "Lithuania", "LV" => "Latvia", "EE" => "Estonia", "MD" => "Moldova", "AM" => "Armenia", "BY" => "Belarus", "AD" => "Andorra", "MC" => "Monaco", "SM" => "San Marino", "VA" => "Holy See (Vatican City State)", "UA" => "Ukraine", "RS" => "Serbia", "ME" => "Montenegro", "XK" => "Kosovo", "HR" => "Croatia", "SI" => "Slovenia", "BA" => "Bosnia and Herzegovina", "MK" => "North Macedonia", "IT" => "Italy", "RO" => "Romania", "CH" => "Switzerland", "CZ" => "Czech Republic", "SK" => "Slovakia", "LI" => "Liechtenstein", "AT" => "Austria", "GG" => "Guernsey", "IM" => "Isle of Man", "JE" => "Jersey", "GB" => "United Kingdom", "DK" => "Denmark", "SE" => "Sweden", "BV" => "Bouvet Island", "NO" => "Norway", "SJ" => "Svalbard and Jan Mayen", "PL" => "Poland", "DE" => "Germany", "FK" => "Falkland Islands (Malvinas)", "GS" => "South Georgia and the South Sandwich Islands", "BZ" => "Belize", "GT" => "Guatemala", "SV" => "El Salvador", "HN" => "Honduras", "NI" => "Nicaragua", "CR" => "Costa Rica", "PA" => "Panama", "PM" => "Saint Pierre and Miquelon", "HT" => "Haiti", "PE" => "Peru", "MX" => "Mexico", "CU" => "Cuba", "AR" => "Argentina", "BR" => "Brazil", "CL" => "Chile", "CO" => "Colombia", "VE" => "Venezuela", "GP" => "Guadeloupe", "BL" => "Saint Barthelemy", "MF" => "Saint Martin", "BO" => "Bolivia", "GY" => "Guyana", "EC" => "Ecuador", "GF" => "French Guiana", "PY" => "Paraguay", "MQ" => "Martinique", "SR" => "Suriname", "UY" => "Uruguay", "AN" => "Netherlands Antilles", "MY" => "Malaysia", "AU" => "Australia", "CX" => "Christmas Island", "CC" => "Cocos (Keeling) Islands", "ID" => "Indonesia", "PH" => "Philippines", "NZ" => "New Zealand", "PN" => "Pitcairn", "SG" => "Singapore", "TH" => "Thailand", "TL" => "Timor-Leste", "AQ" => "Antarctica", "HM" => "Heard Island and Mcdonald Islands", "NF" => "Norfolk Island", "BN" => "Brunei Darussalam", "NR" => "Nauru", "PG" => "Papua New Guinea", "TO" => "Tonga", "SB" => "Solomon Islands", "VU" => "Vanuatu", "FJ" => "Fiji", "PW" => "Palau", "WF" => "Wallis and Futuna", "CK" => "Cook Islands", "NU" => "Niue", "WS" => "Samoa", "KI" => "Kiribati", "NC" => "New Caledonia", "TV" => "Tuvalu", "PF" => "French Polynesia", "TK" => "Tokelau", "FM" => "Micronesia", "MH" => "Marshall Islands", "KZ" => "Kazakhstan", "RU" => "Russia", "JP" => "Japan", "KR" => "Korea", "VN" => "Vietnam", "KP" => "Korea", "HK" => "Hong Kong", "MO" => "Macao", "KH" => "Cambodia", "LA" => "Laos", "CN" => "China", "BD" => "Bangladesh", "TW" => "Taiwan", "TR" => "Türkiye", "IN" => "India", "PK" => "Pakistan", "AF" => "Afghanistan", "LK" => "Sri Lanka", "MM" => "Myanmar", "MV" => "Maldives", "LB" => "Lebanon", "JO" => "Jordan", "SY" => "Syrian Arab Republic", "IQ" => "Iraq", "KW" => "Kuwait", "SA" => "Saudi Arabia", "YE" => "Yemen", "OM" => "Oman", "PS" => "Palestinian Territory", "AE" => "United Arab Emirates", "IL" => "Israel", "BH" => "Bahrain", "QA" => "Qatar", "BT" => "Bhutan", "MN" => "Mongolia", "NP" => "Nepal", "IR" => "Iran", "TJ" => "Tajikistan", "TM" => "Turkmenistan", "AZ" => "Azerbaijan", "GE" => "Georgia", "KG" => "Kyrgyzstan", "UZ" => "Uzbekistan");
        asort($this->countryFlags);

        $serverAddr = @$_SERVER['REMOTE_ADDR'];

        $domainSource = Sources::where('domain_name', $serverAddr)->first();
        $enabledSource = Sources::where('enabled', true)->first();

        if ($domainSource) {
            $this->sitePath = $domainSource->path;
        } else {

            if ($enabledSource) {
                $this->sitePath = $enabledSource->path;
            }
        }
    }
    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $activeMenu = 'dashboard';
        return view('dashboard.index', compact('activeMenu'));
    }

    public function operation()
    {
        $newVisitor = Customer::whereDate('date_submit', Carbon::today()->format('Y-m-d'))->count();
        $activeMenu = 'operation';
        $sitePath = $this->sitePath;
        $protoal = env('SOCKET_HOST') == '127.0.0.1' ? 'http://' : 'https://';
        $socket_url = $protoal.env('SOCKET_HOST').':'.env('SOCKET_PORT');
        return view('dashboard.operation', compact('activeMenu', 'socket_url', 'newVisitor', 'sitePath'));
    }

    public function switchCountry()
    {
        $sources = Sources::all();
        $activeMenu = 'sources';
        return view('dashboard.sources.index', compact('activeMenu', 'sources'));
    }

    public function sourceCreate()
    {
        $countries = $this->countryFlags;
        $activeMenu = 'sources';
        return view('dashboard.sources.create', compact('activeMenu', 'countries'));
    }

    public function sourceSave(Request $request)
    {
        $data = $request->all();
        $source = Sources::updateOrCreate(
            [
                'path' => $request->get('path')
            ],
            [
                'country_code' => $request->get('country_code'),
                'project_name' => $request->get('project_name'),
                'country_name' => $this->countryFlags[$request->get('country_code')],
                'domain_name' => $request->get('domain_name')
            ]
        );
        $activeMenu = 'sources';
        return redirect('/dashboard/sources');
    }

    public function sourceEdit($id)
    {
        $countries = $this->countryFlags;
        $source = Sources::findOrFail($id);
        $activeMenu = 'sources';
        return view('dashboard.sources.edit', compact('activeMenu', 'source', 'countries'));
    }

    public function sourceUpdate($id, Request $request)
    {
        $data = $request->all();
        $source = Sources::findOrFail($id);

        $source::updateOrCreate(
            [
                'path' => $request->get('path')
            ],
            [
                'country_code' => $request->get('country_code'),
                'project_name' => $request->get('project_name'),
                'country_name' => $this->countryFlags[$request->get('country_code')],
                'domain_name' => $request->get('domain_name')
            ]
        );

        $activeMenu = 'sources';
        return redirect('/dashboard/sources');
    }
    public function sourceDelete($id)
    {
        $source = Sources::findOrFail($id);

        $source->delete();

        $activeMenu = 'sources';
        return redirect('/dashboard/sources');
    }

    public function sourceEnable($id)
    {
        $sources = Sources::query()->update(['enabled' => false]);
        $source = Sources::findOrFail($id);

        $source->enabled = ($source->enabled) ? false : true;
        $source->save();

        $activeMenu = 'sources';
        return redirect('/dashboard/sources');
    }
}
