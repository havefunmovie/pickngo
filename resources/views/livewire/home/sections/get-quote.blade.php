<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="parcel" role="tabpanel" aria-labelledby="parcel-tab">
        <livewire:home.get-quotes-index.parcel />
    </div>
    <div class="tab-pane fade" id="envelop" role="tabpanel" aria-labelledby="envelop-tab">
        <livewire:home.get-quotes-index.envelop />
    </div>
    <div class="tab-pane fade" id="scanning" role="tabpanel" aria-labelledby="scanning-tab">
        <livewire:home.get-quotes-index.scanning :services='$services'/>
    </div>
    <div class="tab-pane fade" id="printing" role="tabpanel" aria-labelledby="printing-tab">
        <livewire:home.get-quotes-index.printing />
    </div>
    <div class="tab-pane fade" id="faxing" role="tabpanel" aria-labelledby="faxing-tab">
        <livewire:home.get-quotes-index.faxing :services='$services'/>
    </div>
    <div class="tab-pane fade" id="mailbox" role="tabpanel" aria-labelledby="mailbox-tab">
        <livewire:home.get-quotes-index.mailbox />
    </div>
</div>
