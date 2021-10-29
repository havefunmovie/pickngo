<?php

// namespace App\Http\Livewire\Admin\Agent\Envelop\Details;

// use App\Models\OrderEnvelop;
// use App\Models\OrderParcel;
// use PDF;
// use Session;

// class PrintLabel
// {
//     public $data;

//     public function printPDF()
//     {
//         $param = session('image');
//         $type = session('label-type');
//         if ($type === 'parcel') {
//             $this->data = OrderParcel::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
//         } else {
//             $this->data = OrderEnvelop::where('id', $param)->where('agent_id', auth()->user()->id)->get()->first();
//         }

//         if (is_null($this->data)) {
//             abort(403);
//         }

//         $data = ['content' => $this->data['label']];
//         $pdf = PDF::loadView('livewire.home.panel.services.parcel-content.parcel.pdf_label', $data);
//         $pdf->setPaper('a4', 'landscape');
//         return $pdf->download('label.pdf');
//     }
// }
