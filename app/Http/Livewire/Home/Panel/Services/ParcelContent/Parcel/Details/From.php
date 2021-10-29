<?php

namespace App\Http\Livewire\Home\Panel\Services\ParcelContent\Parcel\Details;

use App\Models\AddressBook;
use App\Models\Country;
use Session;
use Livewire\Component;
use Ups\Entity\Address;
use Ups\SimpleAddressValidation;

class From extends Component
{
    public $from = [];
    public $to = [];
    
    private $validateError;

    public $validated;

    protected $listeners = [
        'edit_from' => 'editFrom',
        'set_from' => 'setFrom',
        'set_address_from' => 'setAddress'
    ];

    public function editFrom($from)
    {
        $this->from = $from;
    }

    public function setFrom($from) {
        $this->from = $from;
    }

    protected array $rules = [
        'from.company'     => 'required',
        'from.address1'    => 'required',
        'from.address2'    => 'string',
        'from.country'     => 'required',
        'from.postal'      => 'required',
        'from.city'        => 'required',
        'from.province'    => 'required',
        'from.attention'   => 'required',
        'from.phone'       => 'required|numeric',
        'from.email'       => 'email',
        'from.instruction' => 'string',
    ];

    public function setAddress($id) {
        if ($id !== '') {
            $address = AddressBook::where('id', $id)->get()->first();
            $this->from['company'] = $address['name'];
            $this->from['address1'] = $address['line_1'];
            $this->from['country'] = $address['country'];
            $this->from['postal'] = $address['postal_code'];
            $this->from['city'] = $address['city'];
            $this->from['province'] = $address['province'];
            $this->from['attention'] = $address['attention'];
            $this->from['phone'] = $address['phone'];
            $this->from['email'] = $address['email'];
            $this->from['instruction'] = $address['instruction'];
            $this->from['address2'] = $address['line_2'];
            $this->from['is-ab'] = true;
            $this->validate();
        } else {
            $this->from = false;
        }
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($name)
    {
        $this->validateOnly($name);
        $this->validated[$name] = true;
    }

    public function saveFrom()
    {
        $this->validate();
        if (! $this->addressValidate())
            return true;
        if (!isset($this->from['addressBook']))
            $this->from['addressBook'] = false;
        $this->emitUp('next_step','from',$this->from);
    }

    public function render()
    {
        if (Session::has('fromCountry')) {
            $data = Session::get('fromCountry');
            $this->from['country'] = $data;
            $data = Session::get('fromPostal');
            $this->from['postal'] = $data;
            $data = Session::get('fromCity');
            $this->from['city'] = $data;
        }
        $validated = $this->validated;
        $countries = Country::orderByRaw("FIELD(id,38,231) DESC")->get();
        $validateError = $this->validateError;
        return view('livewire.home.panel.services.parcel-content.parcel.details.from',compact('validated','countries','validateError'));
    }

    private function addressValidate()
    {
        $address = new Address();
//        $address->setStateProvinceCode('NY');
//        $address->setCity($this->from['city']);
//        $address->setCountryCode($this->from['country']);
//        $address->setPostalCode($this->from['Postal']);

        $address->setCity('New York');
        $address->setCountryCode('US');
        $address->setPostalCode('10000');

        $av = new SimpleAddressValidation('CD97722D88D5ECD5', 'TUPSS370', 'H7v2v2845');
        try {
            $response = $av->validate($address);
            return $response;
        } catch (\Exception $e) {
            $this->validateError = $e->getMessage();
            return false;
        }
    }








    public function select_store($id, $name, $address1, $city, $province, $country, $postal_code, $phone)
    {
        $this->to['id'] = $id;
        $this->to['company'] = $name;
        $this->to['address1'] = $address1;
        $this->to['country'] = $country;
        $this->to['postal'] = $postal_code;
        $this->to['city'] = $city;
        $this->to['province'] = $province;
        $this->to['phone'] = $phone;
        $addressFrom = '17 alfred, Montreal,QC';
        $addressTo   = $address1.', '.$city.', '.$province.', '.$country.', '.$postal_code;
        $distance = $this->calculateDistance($addressTo,$addressFrom);
        dd($distance);
        return $distance;
        $this->emit('distance', $distance);
    }

    // public function ratingPackage()
    // {
    //     $from = $this->data['from'];
    //     $to   = $this->data['to'];
    //     $pack = $this->data['package'];
    //     $pack['weight-type'] = 'LBS';
    //     $pack['type'] = 'INCH';

    //     $addressFrom = $from['address1'].', '.$from['city'].', '.$from['province'].', '.$from['country'].', '.$from['postal'];
    //     $addressTo   = $to['address1'].', '.$to['city'].', '.$to['province'].', '.$to['country'].', '.$to['postal'];
       
    //     // Get distance in km
    //     $distance = $this->calculateDistance($addressFrom, $addressTo);

    //     $service= Services::where('service_type', 'pickup And Delivery')->firstOrFail();
    //     if($pack['weight'] <= $service->weight_minimum)
    //     {
    //         $weight_price = null;
    //         $extra_weight = null;
    //     }
    //     else
    //     {
    //         $extra_weight = $pack['weight'] - $service->weight_minimum;
    //         $weight_price = (ceil($extra_weight / $service->weight_extra)) * $service->weight_extra_price;
    //     }
            
    //     if($pack['height'] <= $service->dimensions_minimum && $pack['width'] <= $service->dimensions_minimum && $pack['length'] <= $service->dimensions_minimum)
    //         $dimensions_price = null;
    //     else
    //     {
    //         $extra = max(0 , ($pack['height'] - $service->dimensions_minimum)) + max(0 , ($pack['width'] - $service->dimensions_minimum)) + max(0 , ($pack['length'] - $service->dimensions_minimum));
    //         $dimensions_price = (ceil($extra / $service->dimensions_extra)) * $service->dimensions_extra_price;
    //     }
    //     if($distance <= $service->distance_minimum)
    //     {
    //         $distance_price = null;
    //         $extra_distance = null;
    //     }
    //     else
    //     {
    //         $extra_distance = $distance - $service->distance_minimum;
    //         $distance_price = (ceil($extra_distance / $service->distance_extra)) * $service->distance_extra_price;
    //     }

    //     $regularCost = ($weight_price + $dimensions_price + $distance_price + $service->service_price);
    //     $urgentCost = ($weight_price + $dimensions_price + $distance_price + $service->urgent_price);

    //    return $this->mServiceSummary = [
    //         [
    //             'name' => 'Regular',
    //             'cost' => $regularCost,
    //             'service_details' =>[
    //                 'weight' => $service->weight_minimum,
    //                 'distance' => $service->distance_minimum,
    //             ],
    //             'order_extras' => [
    //                 'weight' => $extra_weight,
    //                 'distance' => $extra_distance,
    //             ],
    //         ],
    //         [
    //             'name' => 'Express',
    //             'cost' => $urgentCost,
    //             'service_details' =>[
    //                 'weight' => $service->weight_minimum,
    //                 'distance' => $service->distance_minimum,
    //             ],
    //             'order_extras' => [
    //                 'weight' => $extra_weight,
    //                 'distance' => $extra_distance,
    //             ],
    //         ],
    //     ];
    // }


    public function calculateDistance($addressFrom, $addressTo)
    {
        $apiKey = 'AIzaSyDYra2vRvL5bFa0bRNcMhjiXa7eWNA0_o0';
        $formattedAddrFrom    = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo     = str_replace(' ', '+', $addressTo);
        // Geocoding API request with start address

        $Api = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/distancematrix/json?origins='.$formattedAddrFrom.'&destinations='.$formattedAddrTo.'&mode=driving&language=en&key='.$apiKey));
        return substr($Api->rows['0']->elements['0']->distance->text,0,-3);
       
    }
}
