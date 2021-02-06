<div dir="rtl">
    
    <header class="flex items-center w-5/6  mx-auto justify-between">
        <div class="container right">
            <div class="p-2 w-1/1">
                <h1>اضف سجل حديد</h1>
                <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                    wire:model="newDayName" onfocus="this.value=`${dateOb.months_num}/${dateOb.day}  ${dateOb.months}`">
                <button wire:click.prevent="newDay" class="h-70 px-10 bg-green-300">اضف</button>



            </div>
            <div class="p-2 w-1/1 bg-white">

                <h1>معلومات تسميع الطالب</h1>

                <div class="w-1/1  bg-gray grid grid-rows-4 grid-flow-col gap-4">

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>الطالب</label>
                        <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="studentState.name">
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>الحفظ من</label>
                        <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="studentState.hfrom">
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>الحفظ الى</label>
                        <div class="row-span-2 grid grid-cols-4 gap-1">
                            <input type="text" class=" col-span-3 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.hto">
                            <input type="text" class=" col-span-1 bg-gray-100 border-none text-gray-700 rounded-lg "
                                wire:model="studentState.hcount">

                        </div>
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>وسام</label>

                        <div id="sticker" class="flex items-center w-10 h-10 text-center justify-center rounded-lg cursor-pointer select-none"  style="background-color:  @if ($studentState['hasFire']) darkturquoise @else gray @endif "><span class="material-icons text-lg text-white">star</span></div>
                        <input id="sticker_input" type="checkbox" class="hidden" wire:model="studentState.hasFire">

                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>نجوم</label>
                        <div class="row-span-2 flex items-center justify-between w-3/4 mx-auto py-2 select-none">

                            <div><span class="material-icons cursor-pointer text-gray-400 text-6xl @if($studentState['starsCount'] >= '1')text-indigo-700 @endif" id="staring-1" >star</span></div>
                            <input id="star-1" value="1" type="radio" name="star" class="hidden" wire:model="studentState.starsCount">

                            <div><span class="material-icons cursor-pointer text-gray-400 text-6xl @if($studentState['starsCount'] >= '2')text-indigo-700 @endif" id="staring-2" >star</span></div>
                            <input id="star-2" value="2" type="radio" name="star" class="hidden" wire:model="studentState.starsCount">

                            <div><span class="material-icons cursor-pointer text-gray-400 text-6xl @if($studentState['starsCount'] == '3')text-indigo-700 @endif" id="staring-3" >star</span></div>
                            <input id="star-3" value="3" type="radio" name="star" class="hidden" wire:model="studentState.starsCount">

                        </div>
                    </div>


                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>المراجعة من</label>
                        <input type="text" class="row-span-2 bg-gray-100 border-none text-gray-700 rounded-lg"
                            wire:model="studentState.mfrom">
                    </div>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>المراجعة الى</label>

                        <div class="row-span-2 grid grid-cols-4 gap-1">
                            <input type="text" class=" col-span-3 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.mto">
                            <input type="text" class=" col-span-1 bg-gray-100 border-none text-gray-700 rounded-lg"
                                wire:model="studentState.mcount">
                        </div>
                    </div>






                    <button wire:click.prevent="createUser"
                        class="h-70 px-10 bg-green-300 col-span-2 rounded-lg text-white text-2xl ">تسجيل</button>

                    <div class="--bg-blue-100 grid grid-row-3 gap-1 row-span-2">

                        <script src="{{ asset('/js/formStudentState.js') }}"></script>
                        <label>امتيازات</label>
                        <div id="list_container" class="row-span-2 grid grid-row-3 gap-2 select-none">
                            <div class="grid grid-cols-1 grap-2 w-1/1 chk_js">

                                <label class="grid grid-cols-4 gap-1 cursor-pointer" >

                                     <span class="material-icons  text-center">
                                         @if ($studentState['list'][0]) check_circle @else radio_button_unchecked @endif
                                    </span>
                                    <h1 class="inline-block col-span-3">اول طالب يسمع</h1>

                                </label>

                                <input id="list-1" type="checkbox" style="display:none" class=""
                                    wire:model="studentState.list.0">

                            </div>
                            <div class="grid grid-cols-1 grap-2 w-1/1 chk_js ">

                                <label class="grid grid-cols-4 gap-1 cursor-pointer" >

                                     <span class="material-icons  text-center">
                                         @if ($studentState['list'][1]) check_circle @else radio_button_unchecked @endif
                                    </span>
                                    <h1 class="inline-block col-span-3">تسميع بلا اخطاء</h1>

                                </label>

                                <input id="list-2" type="checkbox" style="display:none" class=""
                                    wire:model="studentState.list.1">
                            </div>
                            <div class="grid grid-cols-1 grap-2 w-1/1 chk_js">

                                <label class="grid grid-cols-4 gap-1 cursor-pointer" >

                                     <span class="material-icons  text-center">
                                         @if ($studentState['list'][2]) check_circle @else radio_button_unchecked @endif
                                    </span>
                                    <h1 class="inline-block col-span-3">تكرار الحفظ 20 مرة</h1>

                                </label>

                                <input id="list-3" type="checkbox" style="display:none" class=""
                                    wire:model="studentState.list.2">
                            </div>
                        </div>
                    </div>


                    <div class="--bg-blue-100 grid grid-row-3 gap-1">
                        <label>تاريخ</label>

                        <select class="row-span-2" wire:model="studentState.day_id">
                            @foreach ($days as $day)
                                <option value="{{ $day->id }}">{{ $day->date }} </option>

                            @endforeach
                        </select>

                    </div>

                </div>

            </div>
        </div>
        <div class="p-5 space-y-5 w-5/12">

            <button wire:click.prevent="createUser" class="btn- dash shadow-lg">Learn More</button>

        </div>



    </header>
</div>
