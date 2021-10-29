<?php

namespace App\Http\Livewire\Admin\Agent\Envelop\Details;

use App\Models\AddressBook;
use App\Models\Country;
use Livewire\Component;

class From extends Component
{
    public $validated, $from,$validateError,$countries, $provinces,$cities;
    public $US_states = array(
        'AL'=>'Alabama',
        'AK'=>'Alaska',
        'AZ'=>'Arizona',
        'AR'=>'Arkansas',
        'CA'=>'California',
        'CO'=>'Colorado',
        'CT'=>'Connecticut',
        'DE'=>'Delaware',
        'DC'=>'District of Columbia',
        'FL'=>'Florida',
        'GA'=>'Georgia',
        'HI'=>'Hawaii',
        'ID'=>'Idaho',
        'IL'=>'Illinois',
        'IN'=>'Indiana',
        'IA'=>'Iowa',
        'KS'=>'Kansas',
        'KY'=>'Kentucky',
        'LA'=>'Louisiana',
        'ME'=>'Maine',
        'MD'=>'Maryland',
        'MA'=>'Massachusetts',
        'MI'=>'Michigan',
        'MN'=>'Minnesota',
        'MS'=>'Mississippi',
        'MO'=>'Missouri',
        'MT'=>'Montana',
        'NE'=>'Nebraska',
        'NV'=>'Nevada',
        'NH'=>'New Hampshire',
        'NJ'=>'New Jersey',
        'NM'=>'New Mexico',
        'NY'=>'New York',
        'NC'=>'North Carolina',
        'ND'=>'North Dakota',
        'OH'=>'Ohio',
        'OK'=>'Oklahoma',
        'OR'=>'Oregon',
        'PA'=>'Pennsylvania',
        'RI'=>'Rhode Island',
        'SC'=>'South Carolina',
        'SD'=>'South Dakota',
        'TN'=>'Tennessee',
        'TX'=>'Texas',
        'UT'=>'Utah',
        'VT'=>'Vermont',
        'VA'=>'Virginia',
        'WA'=>'Washington',
        'WV'=>'West Virginia',
        'WI'=>'Wisconsin',
        'WY'=>'Wyoming',
    );
    public $Canada_states = array( 
        "AB" => "Alberta",
        "BC" => "British Columbia",
        "MB" => "Manitoba",
        "NB" => "New Brunswick",
        "NL" => "Newfoundland and Labrador",
        "NS" => "Nova Scotia",
        "NT" => "Northwest Territories",
        "NU" => "Nunavut",
        "ON" => "Ontario",
        "PE" => "Prince Edward Island",
        "QC" => "Quebec",
        "SK" => "Saskatchewan",
        "YT" => "Yukon Territory"
    );
    
    protected $listeners = [
        'validate_error' => 'validateError',
        'set_from' => 'setFrom',
        'set_address_from' => 'setAddress'
    ];

    public function validateError($validateError) {
        $this->validateError = $validateError;
    }

    protected function rules()
    {

        if(isset($this->from['user_id']))
            return [
            'from.from-company'       => 'required',
            'from.from-address1'      => 'required',
            'from.from-address2'      => 'sometimes',
            'from.from-country'       => 'required',
            'from.from-postal'        => 'required',
            'from.from-city'          => 'required',
            'from.from-province'      => 'required',
            'from.from-attention'     => 'required',
            'from.from-phone'         => 'required|numeric',
            'from.from-email'         => 'required|email',
            'from.from-instruction'   => 'required|string',
            ];
        else
            return [
                'from.from-company'       => 'required',
                'from.from-address1'      => 'required',
                'from.from-address2'      => 'sometimes',
                'from.from-country'       => 'required',
                'from.from-postal'        => 'required',
                'from.from-city'          => 'required',
                'from.from-province'      => 'required',
                'from.from-attention'     => 'required',
                'from.from-phone'         => 'required|numeric|unique:users,mobile',
                'from.from-email'         => 'required|email|unique:users,email',
                'from.from-instruction'   => 'required|string',
                ];
    }

    public function setAddress($id) {
        if ($id !== '') {
            $address = AddressBook::where('id', $id)->get()->first();
            $this->from['from-company'] = $address['company'];
            $this->from['from-address1'] = $address['address1'];
            $this->from['from-country'] = $address['country'];
            $this->from['from-postal'] = $address['postal'];
            $this->from['from-city'] = $address['city'];
            $this->from['from-province'] = $address['province'];
            $this->from['from-phone'] = $address['mobile'];
            $this->from['from-email'] = $address['email'];
            $this->from['from-instruction'] = $address['instruction'];
            $this->from['is-ab'] = true;
            $this->validate();
        } else {
            $this->from = false;
        }
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function next() {
        $this->validate();
        if (!isset($this->from['addressBook']))
            $this->from['addressBook'] = false;
        $this->emit('sh_next_step', 'from', $this->from);
    }

    public function mount($from)
    {
        $this->from = $from;
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = $this->countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.admin.agent.envelop.details.from', compact('validated', 'countries'));
    }

    public function SelectedCountry($value)
    {
        $this->from['from-country'] = substr($value,strpos($value,"-")+1) ;
        $country_id = substr($value,0,strpos($value,"-")) ;
        $this->provinces = State::where('country_id', $country_id)->get();
    }
}
