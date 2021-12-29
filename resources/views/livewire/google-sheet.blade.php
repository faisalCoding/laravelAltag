<div>
    <div x-data="{}" id="set_google_data_button"
        class="p-2 w-1/1 bg-green-100 text-green-900 mx-auto mt-5 rounded-xl duration-500  flex justify-start items-center gap-10">
        <div class="logo">
            <img src="https://www.gstatic.com/images/branding/product/2x/sheets_2020q4_48dp.png" alt=""
                class=" w-24 " style="filter: drop-shadow(1px 1px 2px #00000040)">
        </div>

        <div class="flex gap-7 h-auto items-center">
            <select class=" bg-green-700 text-green-100 h-14 w-56 rounded-sm" id="students_google">
                <option value="">اسم الطالب</option>
            </select>

            <div class="flex flex-col bg-white shadow-md p-2 px-4 rounded-md">
                <h2>الحفظ من</h2>
                <h1 id="h_from">0</h1>
            </div>

            <div class="flex flex-col bg-white shadow-md p-2 px-4 rounded-md ml-10">
                <h2>الحفظ الى</h2>
                <h1 id="h_to">0</h1>
            </div>

            <div class="flex flex-col bg-white shadow-md p-2 px-4 rounded-md">
                <h2>المراجعة من</h2>
                <h1 id="m_from">0</h1>
            </div>

            <div class="flex flex-col bg-white shadow-md p-2 px-4 rounded-md">
                <h2>المراجعة الى</h2>
                <h1 id="m_to">0</h1>
            </div>

        </div>
        <button class=" bg-green-700 text-green-100 h-14 w-48 rounded-md justify-self-start mx-auto"  x-on:click='$wire.setGoogleData(data)'>تعبئة البيانات</button>
    </div>
</div>
