<?php

namespace App\Http\Livewire\Admin\Agent\Envelop\Details;

use App\Models\AddressBook;
use App\Models\Country;
use App\Models\State;
use Livewire\Component;

class To extends Component
{
    public $validated, $to, $countries,$provinces, $cities;
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
        'set_to' => 'setTo',
        'set_address_to' => 'setAddress'
    ];

    protected array $rules = [
        'to.to-company'       => 'required',
        'to.to-address1'      => 'required',
        'to.to-country'       => 'required',
        'to.to-postal'        => 'required',
        'to.to-city'          => 'required',
        'to.to-province'      => 'required',
        'to.to-attention'     => 'required',
        'to.to-phone'         => 'required|numeric',
        'to.to-email'         => 'required|email',
        'to.to-instruction'   => 'required',
    ];

    public function setAddress($id) {
        if ($id !== '') {
            $address = AddressBook::where('id', $id)->get()->first();
            $this->to['to-company'] = $address['name'];
            $this->to['to-address1'] = $address['line_1'];
            $this->to['to-country'] = $address['country'];
            $this->to['to-postal'] = $address['postal_code'];
            $this->to['to-city'] = $address['city'];
            $this->to['to-province'] = $address['province'];
            $this->to['to-attention'] = $address['attention'];
            $this->to['to-phone'] = $address['phone'];
            $this->to['to-email'] = $address['email'];
            $this->to['to-instruction'] = $address['instruction'];
            $this->to['to-address2'] = $address['line_2'];
            $this->to['is-ab'] = true;
            $this->validate();
        } else {
            $this->to = false;
        }
    }

    public function setTo($to) {
        $this->to = $to;
    }

    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function next() {
        $this->validate();
        if (!isset($this->to['addressBook']))
            $this->to['addressBook'] = false;
        $this->emit('sh_next_step', 'to', $this->to);
    }

    public function back() {
        $this->emit('sh_preview_step');
    }

    public function render()
    {
        $validated = $this->validated;
        $countries = $this->countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        return view('livewire.admin.agent.envelop.details.to', compact('validated', 'countries'));
    }

    public function SelectedCountry($value)
    {
        $this->to['to-country'] = substr($value,strpos($value,"-")+1) ;
        $country_id = substr($value,0,strpos($value,"-")) ;
        $this->provinces = State::where('country_id',$country_id)->get();
    }  
}
