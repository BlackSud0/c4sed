
	<div class="border-t-8 border-gray-700 h-2"></div>
    <div class="flex my-6 justify-between">
        <h2 class="text-2xl font-bold pb-2 tracking-wider text-gray-600 dark:text-gray-300">Calculation Report</h2>
        <div>
            <div class="relative mr-4 inline-block">
                <div class="text-gray-500 zoom-in w-10 h-10 rounded-full bg-white hover:bg-gray-300 inline-flex items-center justify-center" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false" @click="printInvoice()">
                    <!-- Print this invoice! -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                        <rect x="7" y="13" width="10" height="8" rx="2" />
                    </svg>				  
                </div>
            </div>
            
            <div class="relative inline-block">
                <div class="text-gray-500 zoom-in w-10 h-10 rounded-full bg-white hover:bg-gray-300 inline-flex items-center justify-center" @mouseenter="showTooltip2 = true" @mouseleave="showTooltip2 = false" @click="window.location.reload()">
                    <!-- Reload Page -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
                    </svg>	  
                </div>
            </div>
        </div>
    </div>
    <div class="flex mb-10 items-center overflow-hidden justify-center min-h-screen">
        <div class="box w-full overflow-x-auto shadow-lg p-4">
            <div class="flex justify-between p-4">
                <div>
                    <h1 class="flex text-3xl italic font-extrabold tracking-widest text-blue-500">
                    <img class="w-10 rounded-full mr-2" src="{{ asset('logo.svg') }}" alt="" loading="lazy">
                        C4SED
                    </h1>
                    <p class="text-base">If account is not paid within 7 days the credits details supplied as
                        confirmation.</p>
                </div>
                <div class="p-2">
                    <ul class="flex">
                        <li class="flex flex-col items-center p-2 border-l-2 border-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                            </svg>
                            <span class="text-sm">
                                www.larainfo.com
                            </span>
                            <span class="text-sm">
                                www.lorememhh.com
                            </span>
                        </li>
                        <li class="flex flex-col p-2 border-l-2 border-indigo-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-600" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm">
                                2821 Kensington Road,Avondale Estates, GA 30002 USA
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full h-0.5 bg-purple-600"></div>
            <div class="flex justify-between p-4">
                <div>
                    <h6 class="font-bold">Order Date : <span class="text-sm font-medium"> 12/12/2022</span></h6>
                    <h6 class="font-bold">Order ID : <span class="text-sm font-medium"> 12/12/2022</span></h6>
                </div>
                <div class="w-40">
                    <address class="text-sm">
                        <span class="font-bold"> Billed To : </span>
                        Joe Smith
                        795 Folsom Ave
                        San Francisco, CA 94107
                        P: (123) 456-7890
                    </address>
                </div>
                <div class="w-40">
                    <address class="text-sm">
                        <span class="font-bold">Ship To :</span>
                        Joe doe
                        800 Folsom Ave
                        San Francisco, CA 94107
                        P: + 111-456-7890
                    </address>
                </div>
                <div></div>
            </div>
            <div class="flex justify-center p-4">
                <div class="border-b border-gray-200 shadow">
                    <table class="">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    #
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Product Name
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Quantity
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Rate
                                </th>
                                <th class="px-4 py-2 text-xs text-gray-500 ">
                                    Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    1
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        Amazon Brand - Symactive Men's Regular Fit T-Shirt
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">4</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    $20
                                </td>
                                <td class="px-6 py-4">
                                    $30
                                </td>
                            </tr>
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    2
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        Amazon Brand - Symactive Men's Regular Fit T-Shirt
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">2</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    $60
                                </td>
                                <td class="px-6 py-4">
                                    $12
                                </td>
                            </tr>
                            <tr class="border-b-2 whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    3
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        Amazon Brand - Symactive Men's Regular Fit T-Shirt
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">1</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    $10
                                </td>
                                <td class="px-6 py-4">
                                    $13
                                </td>
                            </tr>
                            <tr class="">
                                <td colspan="3"></td>
                                <td class="text-sm font-bold">Sub Total</td>
                                <td class="text-sm font-bold tracking-wider"><b>$950</b></td>
                            </tr>
                            <!--end tr-->
                            <tr>
                                <th colspan="3"></th>
                                <td class="text-sm font-bold"><b>Tax Rate</b></td>
                                <td class="text-sm font-bold"><b>$1.50%</b></td>
                            </tr>
                            <!--end tr-->
                            <tr class="text-white bg-gray-800">
                                <th colspan="3"></th>
                                <td class="text-sm font-bold"><b>Total</b></td>
                                <td class="text-sm font-bold"><b>$999.0</b></td>
                            </tr>
                            <!--end tr-->

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="flex justify-between p-4">
                <div>
                    <h3 class="text-xl">Terms And Condition :</h3>
                    <ul class="text-xs list-disc list-inside">
                        <li>All accounts are to be paid within 7 days from receipt of invoice.</li>
                        <li>To be paid by cheque or credit card or direct payment online.</li>
                        <li>If account is not paid within 7 days the credits details supplied.</li>
                    </ul>
                </div>
                <div class="p-4">
                    <h3>Signature</h3>
                    <div class="text-4xl italic text-blue-500">AAA</div>
                </div>
            </div>
            <div class="w-full h-0.5 bg-purple-600"></div>

            <div class="p-4">
                <div class="flex items-center justify-center">
                    Thank you very much for doing business with us.
                </div>
                <div class="flex items-end justify-end space-x-3">
                    <button class="px-4 py-2 text-sm text-green-600 bg-green-100">Print</button>
                    <button class="px-4 py-2 text-sm text-blue-600 bg-blue-100">Save</button>
                    <button class="px-4 py-2 text-sm text-red-600 bg-red-100">Cancel</button>
                </div>
            </div>

        </div>
    </div>   
    <!-- <div class="container box mx-auto py-6 px-4">
		<div class="flex justify-between">
			<h2 class="text-2xl font-bold mb-6 pb-2 tracking-wider uppercase">Invoice</h2>
		</div>

		<div class="flex mb-8 justify-between">
			<div class="w-2/4">
				<div class="mb-2 md:mb-1 md:flex items-center">
					<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Invoice No.</label>
					<span class="mr-4 inline-block hidden md:block">:</span>
					<div class="flex-1">
					<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-48 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="eg. #INV-100001" x-model="invoiceNumber">
					</div>
				</div>

				<div class="mb-2 md:mb-1 md:flex items-center">
					<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Invoice Date</label>
					<span class="mr-4 inline-block hidden md:block">:</span>
					<div class="flex-1">
					<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-48 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 js-datepicker" type="text" id="datepicker1" placeholder="eg. 17 Feb, 2020" x-model="invoiceDate" x-on:change="invoiceDate = document.getElementById('datepicker1').value" autocomplete="off" readonly>
					</div>
				</div>

				<div class="mb-2 md:mb-1 md:flex items-center">
					<label class="w-32 text-gray-800 block font-bold text-sm uppercase tracking-wide">Due date</label>
					<span class="mr-4 inline-block hidden md:block">:</span>
					<div class="flex-1">
					<input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-48 py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500 js-datepicker-2" id="datepicker2" type="text" placeholder="eg. 17 Mar, 2020" x-model="invoiceDueDate" x-on:change="invoiceDueDate = document.getElementById('datepicker2').value" autocomplete="off" readonly>
					</div>
				</div>
			</div>
			<div>
				<div class="w-32 h-32 mb-1 border rounded-lg overflow-hidden relative bg-gray-100">
					<img id="image" class="object-cover w-full h-32" src="https://placehold.co/300x300/e2e8f0/e2e8f0" />
					
					<div class="absolute top-0 left-0 right-0 bottom-0 w-full block cursor-pointer flex items-center justify-center" onClick="document.getElementById('fileInput').click()">
						<button type="button"
							style="background-color: rgba(255, 255, 255, 0.65)"
							class="hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 text-sm border border-gray-300 rounded-lg shadow-sm"
						>
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<rect x="0" y="0" width="24" height="24" stroke="none"></rect>
								<path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
								<circle cx="12" cy="13" r="3" />
							</svg>							  
						</button>
					</div>
				</div>
				<input name="photo" id="fileInput" accept="image/*" class="hidden" type="file" onChange="let file = this.files[0]; 
					var reader = new FileReader();

					reader.onload = function (e) {
						document.getElementById('image').src = e.target.result;
						document.getElementById('image2').src = e.target.result;
					};
				
					reader.readAsDataURL(file);
				">
			</div>
		</div>

		<div class="flex flex-wrap justify-between mb-8">
			<div class="w-full md:w-1/3 mb-2 md:mb-0">
				<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">Bill/Ship To:</label>
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Billing company name" x-model="billing.name">
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Billing company address" x-model="billing.address">
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Additional info" x-model="billing.extra">
			</div>
			<div class="w-full md:w-1/3">
				<label class="text-gray-800 block mb-1 font-bold text-sm uppercase tracking-wide">From:</label>
				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Your company name" x-model="from.name">

				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Your company address" x-model="from.address">

				<input class="mb-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="inline-full-name" type="text" placeholder="Additional info" x-model="from.extra">
			</div>
		</div>

		<div class="flex -mx-1 border-b py-2 items-start">
			<div class="flex-1 px-1">
				<p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Description</p>
			</div>

			<div class="px-1 w-20 text-right">
				<p class="text-gray-800 uppercase tracking-wide text-sm font-bold">Units</p>
			</div>

			<div class="px-1 w-32 text-right">
				<p class="leading-none">
					<span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Unit Price</span>
					<span class="font-medium text-xs text-gray-500">(Incl. GST)</span>
				</p>
			</div>

			<div class="px-1 w-32 text-right">
				<p class="leading-none">
					<span class="block uppercase tracking-wide text-sm font-bold text-gray-800">Amount</span>
					<span class="font-medium text-xs text-gray-500">(Incl. GST)</span>
				</p>
			</div>

			<div class="px-1 w-20 text-center">
			</div>
		</div>
	    <template x-for="invoice in items" :key="invoice.id">
			<div class="flex -mx-1 py-2 border-b">
				<div class="flex-1 px-1">
					<p class="text-gray-800" x-text="invoice.name"></p>
				</div>

				<div class="px-1 w-20 text-right">
					<p class="text-gray-800" x-text="invoice.qty"></p>
				</div>

				<div class="px-1 w-32 text-right">
					<p class="text-gray-800" x-text="numberFormat(invoice.rate)"></p>
				</div>

				<div class="px-1 w-32 text-right">
					<p class="text-gray-800" x-text="numberFormat(invoice.total)"></p>
				</div>

				<div class="px-1 w-20 text-right">
					<a href="#" class="text-red-500 hover:text-red-600 text-sm font-semibold" @click.prevent="deleteItem(invoice.id)">Delete</a>
				</div>
			</div>
		</template>

		<button class="mt-6 bg-white hover:bg-gray-100 text-gray-700 font-semibold py-2 px-4 text-sm border border-gray-300 rounded shadow-sm" x-on:click="openModal = !openModal">
			Add Invoice Items
		</button>

		<div class="py-2 ml-auto mt-5 w-full sm:w-2/4 lg:w-1/4">
			<div class="flex justify-between mb-3">
				<div class="text-gray-800 text-right flex-1">Total incl. GST</div>
				<div class="text-right w-40">
					<div class="text-gray-800 font-medium" x-html="netTotal"></div>
				</div>
			</div>
			<div class="flex justify-between mb-4">
				<div class="text-sm text-gray-600 text-right flex-1">GST(18%) incl. in Total</div>
				<div class="text-right w-40">
					<div class="text-sm text-gray-600" x-html="totalGST"></div>
				</div>
			</div>
		
			<div class="py-2 border-t border-b">
				<div class="flex justify-between">
					<div class="text-xl text-gray-600 text-right flex-1">Amount due</div>
					<div class="text-right w-40">
						<div class="text-xl text-gray-800 font-bold" x-html="netTotal"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="py-10 text-center">
			<p class="text-gray-600">Created by <a class="text-blue-600 hover:text-blue-500 border-b-2 border-blue-200 hover:border-blue-300" href="https://twitter.com/mithicher">@mithicher</a>. Built with <a class="text-blue-600 hover:text-blue-500 border-b-2 border-blue-200 hover:border-blue-300" href="https://tailwindcss.com/">tailwindCSS</a> and <a href="https://github.com/alpinejs/alpine" class="text-blue-600 hover:text-blue-500 border-b-2 border-blue-200 hover:border-blue-300">AlpineJS</a>. SVG icons from <a href="https://github.com/tabler/tabler-icons" class="text-blue-600 hover:text-blue-500 border-b-2 border-blue-200 hover:border-blue-300">Tabler Icons</a>.</p>
		</div>
	</div> -->
