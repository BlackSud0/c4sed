<div class="flex items-center justify-center">
    <div class="box w-full border-b-2 border-purple-600 shadow-lg p-4">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-6">
                <h1 class="flex text-3xl italic font-extrabold tracking-widest text-blue-500">
                <img class="w-10 rounded-full mr-1" src="{{ asset('logo.svg') }}" alt="" loading="lazy">
                    C4SED
                </h1>
                <p class="text-base">A simplified web-based platform, providing analysis and design of steel elements based on <span class="text-red-600">BS 5950: Part 1: 1990</span> standards</p>
            </div>
            <div class="col-span-12 md:col-span-3 border-l border-r border-gray-400 dark:border-gray-600">
                <div class="flex p-2">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-4 text-purple-600"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <span class="ml-1 text-xs">
                        3450 - P.O. Box 266, 
                        West Al-Gash river, Kassala, Sudan, SD
                    </span>
                </div>
                <div class="flex px-2">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-purple-600"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>   
                    <span class="ml-1 text-xs">
                        Phone: +249 679 64 3468
                    </span>
                </div>
                <div class="flex p-2">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-purple-600"><polyline points="6 9 6 2 18 2 18 9"></polyline><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path><rect x="6" y="14" width="12" height="8"></rect></svg>
                    <span class="ml-1 text-xs">
                        Fax: +249 411 82 3501
                    </span>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="flex border-2 border-dashed border-gray-400 dark:border-gray-600 py-1 px-2"><span class="text-gray-900 dark:text-gray-300 text-xs">Calc No.</span><span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{$data->eangle->id}}-ANGLE</span></div>
                <div class="flex border-2 border-dashed border-gray-400 dark:border-gray-600 py-1 px-2 mt-2"><span class="text-gray-900 dark:text-gray-300 text-xs">Created at.</span><span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{ date("M j\, Y", strtotime($data->eangle->created_at)) }}</span></div>
                <div class="flex border-2 border-dashed border-gray-400 dark:border-gray-600 py-1 px-2 mt-2"><span class="text-gray-900 dark:text-gray-300 text-xs">Updated at.</span><span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{ date("M j\, Y", strtotime($data->eangle->updated_at)) }}</span></div>
            </div>
        </div>
        <div class="w-full h-0.5 bg-purple-600 mt-2 mb-2"></div>
        <div class="grid grid-cols-12">
            @if($data->eangle->project_name)
                <div class="col-span-12 md:col-span-6">
                    <h6 class="text-lg font-semibold p-2 text-gray-700 dark:text-gray-300 text-sm">Project Name : <span class="text-xs font-medium text-gray-600 dark:text-gray-300 py-1 px-3 ml-2 border-2 border-dashed border-gray-400 dark:border-gray-600">{{$data->eangle->project_name}}</span></h6>
                </div>
            @endif
            @if($data->eangle->customer_name)
                <div class="col-span-12 md:col-span-6">
                    <h6 class="text-lg font-semibold p-2 text-gray-700 dark:text-gray-300 text-sm">Customer Name : <span class="text-xs font-medium text-gray-600 dark:text-gray-300 py-1 px-3 ml-2 border-2 border-dashed border-gray-400 dark:border-gray-600">{{$data->eangle->customer_name}}</span></h6>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-6 px-2">
                <div class="flex mb-2">
                    <a class="flex-grow w-full text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Section properties</a>
                </div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">Section</span><span class="ml-auto text-gray-700 dark:text-gray-300">{{$data->eangle->designation->designation}} {{$data->eangle->designation->H === $data->eangle->designation->B ? 'EA' : 'UEA'}}</span><span class="ml-auto text-gray-500 text-sm">{{$data->eangle->designation->H === $data->eangle->designation->B ? 'Equal' : 'Unequal'}} {{$data->eangle->eangle_type}} Angle</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">H = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->H}} mm</span><span class="ml-auto text-gray-500 text-sm">The long leg</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">B = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->B}} mm</span><span class="ml-auto text-gray-500 text-sm">The short leg</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">t = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->t}} mm</span><span class="ml-auto text-gray-500 text-sm">Thickness of angle</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">r1 = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->r1}} mm</span><span class="ml-auto text-gray-500 text-sm">The root radius</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">r2 = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->r2}} mm</span><span class="ml-auto text-gray-500 text-sm">The toe radius</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">C<a style="left:1pt;position:relative;top:5pt;">x</a> = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->Cx}} cm</span><span class="ml-auto text-gray-500 text-sm">Distance of center of gravity</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">C<a style="left:1pt;position:relative;top:5pt;">y</a> = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->Cy}} cm</span><span class="ml-auto text-gray-500 text-sm">Distance of center of gravity</span></div>
                <div class="flex border-t border-b mb-6 border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">A = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->designation->A}} cm<a class="text-sm" style="position:relative;top:-5pt;">2</a></span><span class="ml-auto text-gray-500 text-sm">Area of section</span></div>
            </div>
            <div class="col-span-12 md:col-span-6 px-2">
                <div class="flex mb-4">
                    <a class="flex-grow w-full text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Angle loads / Bolt hole </a>
                </div>
                @if($data->eangle->D)
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">D = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->D}} mm</span><span class="ml-auto text-gray-500 text-sm">Bolt hole</span></div>
                @endif
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">D.L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->DL}} KN</span><span class="ml-auto text-gray-500 text-sm">Dead Load</span></div>
                <div class="flex border-t @if(!$data->eangle->WL) border-b @endif border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">L.L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->LL}} KN</span><span class="ml-auto text-gray-500 text-sm">Live Load</span></div>
                @if($data->eangle->WL)
                <div class="flex border-t border-b border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">W.L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->WL}} KN</span><span class="ml-auto text-gray-500 text-sm">Wind Load</span></div>
                @endif
                <div class="flex mb-4">
                    <a class="flex-grow w-full text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Steel material properties</a>
                </div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">Grade = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->eangle->grade}}</span><span class="ml-auto text-gray-500 text-sm">Steel grade</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">P<a style="left:-1pt;position:relative;top:4pt;">y</a> = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->Py}} N/mm<a class="text-sm" style="position:relative;top:-5pt;">2</a></span><span class="ml-auto text-gray-500 text-sm">Design strength</span></div>
                <div class="flex border-t border-b border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">E = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-sm">{{$data->E}} KN/mm<a class="text-sm" style="position:relative;top:-5pt;">2</a></span><span class="ml-auto text-gray-500 text-sm">Modulus of elasticity</span></div>

            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 pb-6">
            <div class="col-span-12 md:col-span-6 px-2">    
                <!-- Load Combinations (Load Factors) -->
                <div class="flex mb-2">
                    <a class="flex-grow text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Load Combinations (Load Factors)</a>
                </div>
                <p class="mb-2 text-sm leading-relaxed text-gray-900 dark:text-gray-300">@if($data->eangle->WL) W = 1.2 ({{$data->eangle->DL}} + {{$data->eangle->LL}} + {{$data->eangle->WL}}) = {{$data->W}} KN @else W =  1.4 ({{$data->eangle->DL}}) + 1.6 ({{$data->eangle->LL}}) = {{$data->W}} KN @endif</p>
                
                <!-- Effective area of section -->
                <div class="flex mb-2">
                    <a class="flex-grow text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Effective area of section</a>
                </div>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">a<a class="text-sm mr-1" style="left:1pt;position:relative;top:4pt;">1</a> = {{round($data->a1, 2)}} mm , a<a class="text-sm mr-1" style="left:1pt;position:relative;top:4pt;">2</a> = {{round($data->a2, 2)}} mm</p>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">=> A<a class="text-sm mr-1" style="position:relative;top:4pt;">e</a> = {{round($data->Ae, 2)}} mm<a class="text-sm" style="position:relative;top:-3pt;">2</a></p>
                <!-- Tension capacity Check-->
                <div class="flex mb-2">
                    <a class="flex-grow text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Tension capacity</a>
                </div>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">P<a class="text-sm mr-1" style="position:relative;top:4pt;">t</a> = {{round($data->Pt, 2)}} KN</p>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">P<a class="text-sm mr-1" style="position:relative;top:4pt;">t</a> > W => {{round($data->Pt, 2)}} > {{round($data->W, 2)}} <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-green-500 w-6 h-5 ml-3 mr-1" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><path d="M22 4L12 14.01l-3-3"></path></svg><span class="title-font text-green-500 font-bold">OK</span></p>

            </div>
            <div class="col-span-12 md:col-span-6">
                @if($data->eangle->designation->H === $data->eangle->designation->B)
                <img alt="hero" src="{{ asset('assets/img/Angle/equal-angles.png') }}">
                @else
                <img alt="hero" src="{{ asset('assets/img/Angle/unequal-angles.png') }}">
                @endif
            </div>
        </div>

        <div class="flex justify-between p-4">
            <div class="p-4 text-center">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">C4SED Director</h3>
                <img class="w-24 mx-auto mt-2" alt="hero" src="{{ asset('assets/img/Director.png') }}">
                <div class="text-lg italic border-b-2 border-dotted border-gray-400 dark:border-gray-600 font-bold text-blue-500" >Civil E. Department</div>
            </div>
            <div class="p-4 text-center">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">University Of Kassala <br> Faculty Of Engineering</h3>
                <img class="w-24 mx-auto mt-2" alt="hero" src="{{ asset('assets/img/Kassala-logo.png') }}">
            </div>
        </div>
    </div>
</div>