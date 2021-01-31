
<div dir="rtl">
    <header class="flex items-center w-5/6  mx-auto justify-between">
       <div class="container right">
        <div class="p-2 w-1/1">
            <h1>اضف سجل حديد</h1>
            <input class="row-span-2" type="text" wire:model="newDayName" onfocus="this.value=`${dateOb.day}/${dateOb.months_num}${dateOb.months}`">
            <button  wire:click.prevent="newDay" class="h-70 px-10 bg-green-300">اضف</button>
            


        </div>
        <div class="p-2 w-1/1 bg-white">
          
               <h1>معلومات تسميع الطالب</h1>

              <div class="w-1/1  bg-gray grid grid-rows-3 grid-flow-col gap-4" >

            <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>الطالب</lable>
                <input class="row-span-2" type="text" wire:model="studentState.name">
            </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>الحفظ من</lable>
                <input class="row-span-2" type="text" wire:model="studentState.hfrom">
               </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>الحفظ الى</lable>
                <input class="row-span-2" type="text" wire:model="studentState.hto">
               </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>المراجعة من</lable>
                <input class="row-span-2" type="text" wire:model="studentState.mfrom">
               </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>المراجعة الى</lable>
                <input class="row-span-2" type="text" wire:model="studentState.mto">
               </div>
               
               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>نجوم</lable>
                <div class="row-span-2 flex items-center justify-between w-3/4 mx-auto py-2 ">
                    <input type="checkbox" class="" wire:model="studentState.starsCount.0">
                    <input type="checkbox" class="" wire:model="studentState.starsCount.1">
                    <input type="checkbox" class="" wire:model="studentState.starsCount.2">
                </div>
               </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>امتيازات</lable>
                <div class="row-span-2 flex items-center justify-between w-3/4 mx-auto py-2 ">
                    <input type="checkbox" class="" wire:model="studentState.list.0">
                    <input type="checkbox" class="" wire:model="studentState.list.1">
                    <input type="checkbox" class="" wire:model="studentState.list.2">
                </div>
               </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>وسام</lable>
                <input type="checkbox" class="" wire:model="studentState.hasFire">
               </div>

               <div class="bg-blue-100 grid grid-row-3 gap-1">
                <lable>تاريخ</lable>

                <select class="row-span-2" wire:model="studentState.day_id">
                @foreach ($days as $day)
                    <option value="{{ $day->id }}">{{ $day->date }} </option>
                    
                @endforeach
                </select>

               </div>
               <button  wire:click.prevent="createUser" class="h-70 px-10 bg-green-300">تسجيل</button>
              </div>
          
        </div>
       </div>
        <div class="p-5 space-y-5 w-5/12">
            <h2 class="text-3xl">
                Multipurpose landing template
            </h2>

            <h1 class="text-6xl font-bold">
                Beautifully
            </h1>
            <h1 class="text-6xl font-bold">
                simple, code.
            </h1>
            <h4 class="text-sm tracking-wider">
                Codelander is a beautifully simple, clean and lightweight landing page template for all types of businesses, with bold and bright colours.
            </h4>
            <button  wire:click.prevent="createUser" class="btn- dash shadow-lg">Learn More</button>
            
        </div>

         

    </header>
</div>
