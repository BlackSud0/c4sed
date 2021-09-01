@section('content')

<div class="report-box-2 mt-8">
    <div class="box p-5">
        <div class="boxed-tabs nav nav-tabs flex-col sm:flex-row justify-center lg:justify-start w-4/5 bg-gray-200 text-gray-600 dark:bg-gray-700 dark:text-gray-400 rounded-md mx-auto" role="tablist">
            <a data-toggle="tab" data-target="#change-password" href="javascript:;" class="btn flex-1 border-0 shadow-none py-1.5 px-2 active" id="change-password-tab" role="tab" aria-controls="change-password" aria-selected="true">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                Change Password
            </a> 
            <a data-toggle="tab" data-target="#delete-account" href="javascript:;" class="btn flex-1 border-0 shadow-none py-1.5 px-2" id="delete-account-tab" role="tab" aria-selected="false">
                <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>
                Delete your Account
            </a> 
        </div>
        <div class="tab-content mt-6">
            <div class="tab-pane active" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                <div class="flex flex-col justify-center w-full">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        @livewire('settings.update-password')
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="delete-account" role="tabpanel" aria-labelledby="delete-account-tab">
                <div class="flex flex-col justify-center w-full">
                    <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        @livewire('settings.delete-account')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
