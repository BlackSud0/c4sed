<div class="flex items-center justify-center">
    <div class="box w-full border-b-2 border-purple-600 shadow-lg p-4">
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-6">
                <h1 class="flex text-3xl italic font-extrabold tracking-widest text-blue-500">
                <img class="w-10 rounded-full mr-1" src="{{ asset('logo.svg') }}" alt="" loading="lazy">
                    C4SED
                </h1>
                <p class="text-base">A simple web-based platform, providing analysis and design of steel elements based on <span class="text-red-600">BS 5950: Part 1: 1990</span> standards</p>
            </div>
            <div class="col-span-12 md:col-span-3 border-l border-r border-gray-400 dark:border-gray-600">
                <div class="flex p-2">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-4 text-purple-600"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                    <span class="ml-1 text-xs">
                        79371 - East Al-Sahafa , block
                        36, Khartoum, Sudan, SD
                    </span>
                </div>
                <div class="flex p-2">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-purple-600"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>   
                    <span class="ml-1 text-xs">
                        +249967408853
                    </span>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3">
                <div class="flex border-2 border-dashed border-gray-400 dark:border-gray-600 py-1 px-2"><span class="text-gray-900 dark:text-gray-300 text-xs">Calc No.</span><span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{$data->column->id}}-COLUMN</span></div>
                <div class="flex border-2 border-dashed border-gray-400 dark:border-gray-600 py-1 px-2 mt-2"><span class="text-gray-900 dark:text-gray-300 text-xs">Created at.</span><span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{ date("M j\, Y", strtotime($data->column->created_at)) }}</span></div>
                <div class="flex border-2 border-dashed border-gray-400 dark:border-gray-600 py-1 px-2 mt-2"><span class="text-gray-900 dark:text-gray-300 text-xs">Updated at.</span><span class="ml-auto text-gray-500 dark:text-gray-400 text-xs">{{ date("M j\, Y", strtotime($data->column->updated_at)) }}</span></div>
            </div>
        </div>
        <div class="w-full h-0.5 bg-purple-600 mt-2 mb-2"></div>
        <div class="grid grid-cols-12">
            @if($data->column->project_name)
                <div class="col-span-12 md:col-span-6">
                    <h6 class="text-lg font-semibold p-2 text-gray-700 dark:text-gray-300 text-sm">Project Name : <span class="text-xs font-medium text-gray-600 dark:text-gray-300 py-1 px-3 ml-2 border-2 border-dashed border-gray-400 dark:border-gray-600">{{$data->column->project_name}}</span></h6>
                </div>
            @endif
            @if($data->column->customer_name)
                <div class="col-span-12 md:col-span-6">
                    <h6 class="text-lg font-semibold p-2 text-gray-700 dark:text-gray-300 text-sm">Customer Name : <span class="text-xs font-medium text-gray-600 dark:text-gray-300 py-1 px-3 ml-2 border-2 border-dashed border-gray-400 dark:border-gray-600">{{$data->column->customer_name}}</span></h6>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-12 py-2">
            <div class="col-span-12 md:col-span-6 px-2">
                <div class="flex mb-2">
                    <a class="flex-grow w-full text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Section properties</a>
                </div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">Section</span><span class="ml-auto text-gray-700 dark:text-gray-300">{{$data->column->{$data->column_type}->designation}} {{$data->column->column_type === 'HSection' ? 'UC' : 'UB'}}</span><span class="ml-auto text-gray-500 text-xs">This is a {{$data->section_class}} section</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">D = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->h}} mm</span><span class="ml-auto text-gray-500 text-xs">Depth of section</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">t = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->s}} mm</span><span class="ml-auto text-gray-500 text-xs">Thickness of web</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">T = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->t}} mm</span><span class="ml-auto text-gray-500 text-xs">Thickness of flange</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">b/T = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->b2t}}</span><span class="ml-auto text-gray-500 text-xs">Ratios for buckling(flange)</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">d/t = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->ds}}</span><span class="ml-auto text-gray-500 text-xs">Ratios for buckling(web)</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">I<a style="left:1pt;position:relative;top:5pt;">x</a> = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->Ix}} cm<a class="text-xs" style="position:relative;top:-5pt;">4</a></span><span class="ml-auto text-gray-500 text-xs">Second moment of area</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">r<a style="left:1pt;position:relative;top:5pt;">y</a> = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->ry}} cm</span><span class="ml-auto text-gray-500 text-xs">Radius of Gyration (y-y)</span></div>
                <div class="flex border-t border-b mb-6 border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">A = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->{$data->column_type}->A}} mm<a class="text-xs" style="position:relative;top:-5pt;">2</a></span><span class="ml-auto text-gray-500 text-xs">Area of section</span></div>
            </div>
            <div class="col-span-12 md:col-span-6 px-2">
                <div class="flex mb-4">
                    <a class="flex-grow w-full text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Column loads / Length </a>
                </div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->L}} m</span><span class="ml-auto text-gray-500 text-xs">Span / Length</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">D.L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->DL}} KN/m</span><span class="ml-auto text-gray-500 text-xs">Dead Load</span></div>
                <div class="flex border-t @if(!$data->column->WL) border-b @endif border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">L.L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->LL}} KN/m</span><span class="ml-auto text-gray-500 text-xs">Live Load</span></div>
                @if($data->column->WL)
                <div class="flex border-t border-b border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">W.L = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->WL}} KN/m</span><span class="ml-auto text-gray-500 text-xs">Wind Load</span></div>
                @endif
                <div class="flex mb-4">
                    <a class="flex-grow w-full text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Steel material properties</a>
                </div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">Grade = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->column->grade}}</span><span class="ml-auto text-gray-500 text-xs">Steel grade</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">P<a style="left:-1pt;position:relative;top:4pt;">y</a> = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->Py}} N/mm<a class="text-xs" style="position:relative;top:-5pt;">2</a></span><span class="ml-auto text-gray-500 text-xs">Design strength</span></div>
                <div class="flex border-t border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">E = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->E}} KN/mm<a class="text-xs" style="position:relative;top:-5pt;">2</a></span><span class="ml-auto text-gray-500 text-xs">Modulus of elasticity</span></div>
                <div class="flex border-t border-b border-dashed border-gray-400 dark:border-gray-600 py-1 text-sm"><span class="text-gray-900 dark:text-gray-300">ϵ = </span><span class="mx-auto text-gray-600 dark:text-gray-400 text-xs">{{$data->Epsilon}}</span><span class="ml-auto text-gray-500 text-xs">Epsilon</span></div>

            </div>
        </div>

        <div class="grid grid-cols-12 gap-6 py-2">
            <div class="col-span-12 md:col-span-8 px-2">    
                <!-- Load Combinations (Load Factors) -->
                <div class="flex mb-2">
                    <a class="flex-grow text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Load Combinations (Load Factors)</a>
                </div>
                <p class="mb-2 text-sm leading-relaxed text-gray-900 dark:text-gray-300">@if($data->column->WL) W = 1.2 ({{$data->column->DL}} + {{$data->column->LL}} + {{$data->column->WL}}) = {{$data->W}} KN @else W =  1.4 ({{$data->column->DL}}) + 1.6 ({{$data->column->LL}}) = {{$data->W}} KN @endif</p>
                
                <!-- Compressive strength -->
                <div class="flex mb-2">
                    <a class="flex-grow text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Compressive strength</a>
                </div>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">λ = {{round($data->Lambda, 2)}} , => p<a class="text-xs mr-1" style="position:relative;top:4pt;">c</a> = {{round($data->pc, 2)}} N/mm<a class="text-xs" style="position:relative;top:-5pt;">2</a></p>

                <!-- Compression resistance Check-->
                <div class="flex mb-2">
                    <a class="flex-grow text-blue-500 font-medium border-b-2 border-dashed border-gray-400 dark:border-gray-600 py-2 text-md">Compression resistance</a>
                </div>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">P<a class="text-xs mr-1" style="position:relative;top:4pt;">c</a> = {{round($data->Pc, 2)}} KN</p>
                <p class="mb-2 text-sm flex leading-relaxed text-gray-900 dark:text-gray-300">P<a class="text-xs mr-1" style="position:relative;top:4pt;">c</a> > W => {{round($data->Pc, 2)}} > {{round($data->W, 2)}} <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-green-500 w-6 h-5 ml-3 mr-1" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path><path d="M22 4L12 14.01l-3-3"></path></svg><span class="title-font text-green-500 font-bold">OK</span></p>
                

            </div>
            <div class="col-span-12 md:col-span-4">
                @if($data->column->column_type === 'HSection')
                    <img alt="hero" src="{{ asset('assets/img/Column/universal-column.png') }}">
                @elseif($data->column->column_type === 'ISection')
                    <img alt="hero" src="{{ asset('assets/img/Column/universal-beam.png') }}">
                @endif
            </div>
        </div>

        <div class="flex justify-between p-4">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold">C4SED Director</h3>
                <img class="w-24 mx-auto mt-2" alt="hero" src="{{ asset('assets/img/Director.png') }}">
                <div class="text-xl italic border-b-2 border-dotted border-gray-400 dark:border-gray-600 font-bold text-blue-500" >Omer A. Bilal</div>
            </div>
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold">University Of Kassala</h3>
                <img class="w-24 mx-auto mt-2" alt="hero" src="{{ asset('assets/img/Kassala-logo.png') }}">
            </div>
        </div>
    </div>
</div>