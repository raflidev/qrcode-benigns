<div id="add-coupon-modal" tabindex="-1" aria-hidden="true" class="hidden add-coupon-modal bg-black/30 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-0 p-4 w-full md:inset-0 h-modal md:h-full">
    <div class="relative w-full max-w-md h-full md:h-auto top-1/3 left-1/2 transform -translate-x-1/2 -translate-y-1/3 z-50">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-center pl-4 py-4 pr-2 rounded-t border-b dark:border-gray-600 lg:pl-8 lg:pr-6">
                <h3 class="text-xl line leading-none font-semibold text-gray-900 dark:text-white">
                    Input new Coupon
                </h3>
                <button type="button" class="closeModal text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="pt-4 pb-8 px-6 lg:px-8">
                <form class="flex flex-col gap-4" method="POST" action="{{route('kupon.store')}}">
                    @csrf
                    @method('POST')
                    {{-- <div>
                        <label for="kodeunik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Unik</label>
                        <input type="text" name="kodeunik" id="kodeunik" placeholder="kode unik" value="{{old('kodeunik')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div> --}}
                    <div>
                        <label for="kodeunik" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Unik</label>
                        <select name="kodeunik" id="kodeunik" placeholder="kode unik"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                            <option value="switchedNdyag">Q-Switched Ndyag Laser</option>
                            <option value="proyellowLaser">Proyellow Laser Complete</option>
                        </select>
                    </div>
                    <div>
                        <label for="max_use" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maksimal Penggunaan</label>
                        <input type="number" name="max_use" id="max_use" placeholder="Max Use" value="{{old('max_use')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                    </div>
                    <div>
                        <label for="benefit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Benefit</label>
                        <textarea name="benefit" id="benefit"  value="{{old('benefit')}}" class="resize-none bg-gray-50 border  border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white " placeholder="Benefit" required></textarea>
                    </div>

                    <button type="submit" id="submitCoupon" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add Coupon</button>
                </form>
            </div>
        </div>
    </div>
</div>
