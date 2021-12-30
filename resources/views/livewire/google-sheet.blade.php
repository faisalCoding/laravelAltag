<div>
    <div x-data="{}" id="set_google_data_button"
        class="p-2 w-1/1 bg-green-100 text-green-900 mx-auto mt-5 rounded-xl duration-500  flex justify-start items-center gap-10">
        <div class="logo">
            <a href="#" target="_blank" id="logo_link"><img src="https://www.gstatic.com/images/branding/product/2x/sheets_2020q4_48dp.png" alt="" class=" w-24 "
                style="filter: drop-shadow(1px 1px 2px #00000040)"></a>
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
        <button class=" bg-green-700 text-green-100 h-14 w-48 rounded-md justify-self-start mx-auto"
            x-on:click='$wire.setGoogleData(data)'>تعبئة البيانات</button>
    </div>

    <script>
        //------------------=============================----------------------+
//                  DATA FETCH FROM GOOGLE SHEETS                      |
//------------------=============================----------------------+


var data_from_google = []
var students_google = document.getElementById('students_google')

var h_from = document.getElementById('h_from')
var h_to = document.getElementById('h_to')
var m_from = document.getElementById('m_from')
var m_to = document.getElementById('m_to')
var set_google_data_button = document.getElementById('set_google_data_button')


async function fetchData(url) {
    return await (await fetch(url)).json()
}


async function echo() {
    console.log('echo fun')
    data_from_google = await fetchData('https://script.google.com/macros/s/AKfycbzqLYBgllFgKa23o6SvVbLbWX5SZVXbti6ht3CHkFggkdh4JAeKVW0-1n4QXtoxJsVcvg/exec').then(d => d)
    console.log(data_from_google)

    data_from_google.users.forEach(ob => {
        console.log(ob)

        let name = ob['user-name']

        students_google.innerHTML += `<option>${name}</option>`
    })

}

students_google.addEventListener('change', (e) => {
    let ob_select ;
    let select = e.target.value;
    
    

    ob_select = data_from_google.users.filter(obj => {
        return obj['user-name'] === select
    })[0]
    console.log(ob_select)

    let today_task = ob_select['user-data'].filter(ob => {
        return !ob['الانجاز']
    })[0]

    h_from.innerText = today_task["الحفظ من"]
    h_to.innerText = today_task["الحفظ الى"]
    m_from.innerText = today_task["المراجعة من"]
    m_to.innerText = today_task["المراجعة الى"]


    var link = 'https://docs.google.com/spreadsheets/d/18wnb0VP1HQQHIoHnT_YontlX78n9WjmYo_1gnq1S_Rg/edit#gid='
    document.getElementById('logo_link').setAttribute('href', link +ob_select['user-sheet-id']);
    set_google_data_button.setAttribute('x-data', `{data:['${today_task['الحفظ من']}','${today_task['الحفظ الى']}','${today_task['المراجعة من']}','${today_task['المراجعة الى']}','${select}']}`)
    
})
echo()

window.addEventListener('google-seting-data', event => {
   echo()
})

    </script>
</div>