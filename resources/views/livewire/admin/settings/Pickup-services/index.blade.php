<div>    
    <div class="table-responsive">
        <table class="table table-hover table-danger table table-bordered mt-3" width="100%">
            <thead class="bg-danger text-white">
                <tr>
                    <td class="text-center" rowspan=2>NO.</td>
                    <td class="text-center" rowspan=2>Regular Service</td>
                    <td class="text-center" rowspan=2>Urgent Service</td>
                    <td class="text-center" rowspan=2>Agent Discount</td>
                    <td class="text-center" rowspan=2>Driver Percentage</td>

                    <td class="text-center" colspan=3>weight</td>
                    <td class="text-center" colspan=3>distance</td>
                    <td class="text-center" colspan=3>dimensions</td>
                    <td class="text-center" colspan=2></td>
                </tr>
                <tr>
                    <td class="text-center">limit</td>
                    <td class="text-center">minimum</td>
                    <td class="text-center">extra</td>

                    <td class="text-center">limit</td>
                    <td class="text-center">minimum</td>
                    <td class="text-center">extra</td>
                    
                    <td class="text-center">limit</td>
                    <td class="text-center">minimum</td>
                    <td class="text-center">extra</td>                
                    <td class="text-center"></td>                
                </tr>
            </thead>
            <tbody>
            @if($services)
                @foreach($services as $service)
                    <tr>
                        <td>{{$loop->index + 1}}</td>
                        <td class="text-center">{{$service['service_price'] == NULL ? '-' : $service['service_price'].' $'}}</td>
                        <td class="text-center">{{$service['urgent_price'] == NULL ? '-' : $service['urgent_price'].' $'}}</td>
                        <td class="text-center">{{$service['service_percentage'] == NULL ? '-' : $service['service_percentage'].' %'}}</td>
                        <td class="text-center">{{$service['driver_percentage'] == NULL ? '-' : $service['driver_percentage'].' %'}}</td>
                        <td class="text-center">{{$service['weight_limit'] == NULL ? '-' : $service['weight_limit'].' kg'}}</td>
                        <td class="text-center">{{$service['weight_minimum'] == NULL ? '-' : $service['weight_minimum'].' kg'}}</td>
                        <td class="text-center">{{$service['weight_extra'] .' kg / '.$service['weight_extra_price'].' $'}}</td>

                        <td class="text-center">{{$service['distance_limit'] == NULL ? '-' : $service['distance_limit'].' km'}}</td>
                        <td class="text-center">{{$service['distance_minimum'] == NULL ? '-' : $service['distance_minimum'].' km'}}</td>
                        <td class="text-center">{{$service['distance_extra'] .' km / '.$service['distance_extra_price'].' $'}}</td>

                        <td class="text-center">{{$service['dimensions_limit'] == NULL ? '-' : $service['dimensions_limit'].' inch'}}</td>
                        <td class="text-center">{{$service['dimensions_minimum'] == NULL ? '-' : $service['dimensions_minimum'].' inch'}}</td>
                        <td class="text-center">{{$service['dimensions_extra'] .' inch / '.$service['dimensions_extra_price'].' $'}}</td>
                        <td class="text-center">
                            <a href="{{ route('admin.settings.pickupAndDelivery.edit', $service['id']) }}" class="p-2 text-yellow-600 hover:bg-yellow-900 hover:text-white rounded">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path></svg>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" class="text-center text-secondary">{{ __('There is no any Data yet!') }}</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
