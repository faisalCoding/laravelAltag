
window.addEventListener('load', () => {

    //list =>[1= اولشخص يسمع 2= تسميع بدون اخطاء 3= تكرار الحفظ]     click checkbox 

   var list_container = document.getElementById('list_container')

    list_container.querySelectorAll('.chk_js').forEach(element => {

        var checkbox = element.querySelector('input[type="checkbox"]');

        element.onclick = () => checkbox.click();

    });
   var e_list_container = document.querySelector('#e_list_container')

    e_list_container.querySelectorAll('.chk_js').forEach(element => {

        var checkbox = element.querySelector('input[type="checkbox"]');

        element.onclick = () => checkbox.click();

    });
    //----------------------------------------------
    // one blue star sticker  click checkbox
    var  sticker = document.querySelector('#sticker');
    var  sticker_input = document.querySelector('#sticker_input');

    sticker.onclick = () => sticker_input.click();



    var  e_sticker = document.querySelector('#e_sticker');
    var  e_sticker_input = document.querySelector('#e_sticker_input');

    e_sticker.onclick = () => e_sticker_input.click();
    //----------------------------------------------
    //three stars chang color on hover and set color on click it and choise radio input
    var  startings = [
        document.querySelector('#staring-1'),
        document.querySelector('#staring-2'),
        document.querySelector('#staring-3')
    ];

    var  e_startings = [
        document.querySelector('#e-staring-1'),
        document.querySelector('#e-staring-2'),
        document.querySelector('#e-staring-3')
    ];

    var  radios = [
        document.querySelector('#star-1'),
        document.querySelector('#star-2'),
        document.querySelector('#star-3')
    ]
    var  e_radios = [
        document.querySelector('#e-star-1'),
        document.querySelector('#e-star-2'),
        document.querySelector('#e-star-3')
    ]

    startings.forEach((e, i) => e.addEventListener('mouseenter', e => onMouseEnterStar(i, this)))

    startings.forEach((e, i) => e.addEventListener('click', e => onMouseClickStar(i, this)))

    e_startings.forEach((e, i) => e.addEventListener('mouseenter', e => e_onMouseEnterStar(i, this)))

    e_startings.forEach((e, i) => e.addEventListener('click', e => e_onMouseClickStar(i, this)))


    function onMouseEnterStar(snum, ele) {
        startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-500') : e.classList.remove('text-indigo-500'))
    }

    function onMouseClickStar(snum, ele) {
        radios[snum].click()
        startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-700') : null)
    }

    function e_onMouseEnterStar(snum, ele) {
        e_startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-500') : e.classList.remove('text-indigo-500'))
    }

    function e_onMouseClickStar(snum, ele) {
        e_radios[snum].click()
        e_startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-700') : null)
    }
    //----------------------------------------------


window.addEventListener('copyStates', e => {
    //console.log(e.detail.states)
    var text;

    e.detail.states.forEach((item, i) => {

        // console.log(`${item.name} \n ${item.hfrom} ${item.hto}\n ${item.mfrom} ${item.mto}\n\n`)
        text += `${i + 1}. ${item.name} \n ${item.hfrom} ${item.hto}\n ${item.mfrom} ${item.mto}\n-------------\n`;

    })

    console.log(text.replace('undefined', ''))
    navigator.clipboard.writeText(text);
})

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
    data_from_google = await fetchData('https://script.googleusercontent.com/macros/echo?user_content_key=JURUGREQ8P4KArcQBRvjxV6ZyEDE2WeX6lgnLnim-hCfKq2--IC72-g-sHcK1uy_pjOaNo9UiHMvACZs3uKgK5Tx_5prLLgZm5_BxDlH2jW0nuo2oDemN9CCS2h10ox_1xSncGQajx_ryfhECjZEnGKfZW-G7rgyuXwGoJzrx86E9K_VPdo70o8AJDK0uPqtH4Sh8ytagaqCUFhtwsJnNv_rkvVNNl5OZXSbe7EO_82EJlLCjoMiGdz9Jw9Md8uu&lib=MLL5eXg7nKsLYqIClj--q_3T8ajkO9VEN').then(d => d)
    console.log(data_from_google)

    data_from_google.user.forEach(ob => {
        console.log(Object.entries(ob))

        let name = Object.entries(ob)[0][0]

        students_google.innerHTML += `<option>${name}</option>`
    })

}

students_google.addEventListener('change', (e) => {
    let ob_select = {}
    let select = e.target.value;
    ob_select = data_from_google.user.filter(obj => {
        return Object.entries(obj)[0][0] === select
    })
    let today_task = ob_select[0][select].filter(ob => {
        return !ob['الانجاز']
    })[0]

    h_from.innerText = today_task["الحفظ من"]
    h_to.innerText = today_task["الحفظ الى"]
    m_from.innerText = today_task["المراجعة من"]
    m_to.innerText = today_task["المراجعة الى"]

    set_google_data_button.setAttribute('x-data', `{data:['${today_task['الحفظ من']}','${today_task['الحفظ الى']}','${today_task['المراجعة من']}','${today_task['المراجعة الى']}']}`)
    
})
echo()
})

