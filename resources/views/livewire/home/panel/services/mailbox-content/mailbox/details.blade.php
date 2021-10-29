<div>
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item border-0 px-3 py-2 mt-3 {{ $show == 1 ? 'shadow-none' : 'shadow' }}">
            <div class="accordion-header d-flex align-items-center py-2">
                <div class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $show == 1 ? 'show' : 'collapsed' }}" >
                    <span class="me-2">{{ __("Customer's Consensus") }}</span>
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 9.89998V17H9V9.89998C6.71776 9.43671 5 7.41896 5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5C15 7.41896 13.2822 9.43671 11 9.89998ZM7 12.1573V14.1844C4.06718 14.5505 2 15.3867 2 16C2 16.807 5.57914 18 10 18C14.4209 18 18 16.807 18 16C18 15.3867 15.9328 14.5505 13 14.1844V12.1573C17.0559 12.6017 20 13.9678 20 16C20 18.5068 15.5203 20 10 20C4.47973 20 0 18.5068 0 16C0 13.9678 2.94412 12.6017 7 12.1573ZM13 5C13 6.65685 11.6569 8 10 8C8.34315 8 7 6.65685 7 5C7 3.34315 8.34315 2 10 2C11.6569 2 13 3.34315 13 5Z" fill="white"/>
                    </svg>
                </div>
            </div>
            <div class="accordion-collapse {{ $show == 1 ? 'show' : 'collapse' }}" >
                <livewire:home.panel.services.mailbox-content.mailbox.details.signature />
            </div>
        </div>
        <div class="accordion-item border-0 px-3 py-2 mt-3  {{ $show == 2 ? 'shadow-none' : 'shadow' }}" >
            <div class="accordion-header d-flex align-items-center py-2" id="flush-headingTwo" >
                <div class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $show == 2 ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('Registration Form') }}</span>
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 9.89998V17H9V9.89998C6.71776 9.43671 5 7.41896 5 5C5 2.23858 7.23858 0 10 0C12.7614 0 15 2.23858 15 5C15 7.41896 13.2822 9.43671 11 9.89998ZM7 12.1573V14.1844C4.06718 14.5505 2 15.3867 2 16C2 16.807 5.57914 18 10 18C14.4209 18 18 16.807 18 16C18 15.3867 15.9328 14.5505 13 14.1844V12.1573C17.0559 12.6017 20 13.9678 20 16C20 18.5068 15.5203 20 10 20C4.47973 20 0 18.5068 0 16C0 13.9678 2.94412 12.6017 7 12.1573ZM13 5C13 6.65685 11.6569 8 10 8C8.34315 8 7 6.65685 7 5C7 3.34315 8.34315 2 10 2C11.6569 2 13 3.34315 13 5Z" fill="white"/>
                    </svg>
                </div>
            </div>
            <div id="flush-collapseTwo" class="accordion-collapse  {{ $show == 2 ? 'show' : 'collapse' }}">
                <div class="accordion-body">
                    <livewire:home.panel.services.mailbox-content.mailbox.details.registration-form />
                </div>
            </div>
        </div>
        <div class="accordion-item border-0 px-3 py-2 mt-3  {{ $show == 3 ? 'shadow-none' : 'shadow' }}">
            <div class="accordion-header d-flex align-items-center py-2" id="flush-headingThree" >
                <div class="d-flex btn btn-pink rounded-pill px-4 fs-8 {{ $show == 3 ? 'show' : 'collapsed' }}">
                    <span class="me-2">{{ __('Mailbox Selection') }}</span>
                    <svg width="17" height="17" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.89 1.45003L20.89 5.45003C21.5697 5.78776 21.9996 6.48108 22 7.24003V16.77C21.9996 17.529 21.5697 18.2223 20.89 18.56L12.89 22.56C12.3267 22.8419 11.6634 22.8419 11.1 22.56L3.10005 18.56C2.42104 18.2179 1.99476 17.5203 2.00005 16.76V7.24003C2.00045 6.48108 2.43039 5.78776 3.11005 5.45003L11.11 1.45003C11.6707 1.17144 12.3294 1.17144 12.89 1.45003Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M2.31982 6.16003L11.9998 11L21.6798 6.16003" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 22.76V11" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M7 3.5L17 8.5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
            </div>
            <div id="flush-collapseThree" class="accordion-collapse {{ $show == 3 ? 'show' : 'collapse' }}">
                <livewire:home.panel.services.mailbox-content.mailbox.details.box-selection />
            </div>
        </div>
    </div>
</div>
