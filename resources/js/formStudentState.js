
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
    console.log(e.detail.states)
    console.log(e.detail.day)

    e.detail.states.forEach((item, i) => {

        // console.log(`${item.name} \n ${item.hfrom} ${item.hto}\n ${item.mfrom} ${item.mto}\n\n`)
        text += `${i + 1}. ${item.name} \n ${item.hfrom} ${item.hto} عدد الصفحات (${item.hcount})\n ${item.mfrom} ${item.mto}عدد الصفحات (${item.hcount})\n-------------\n`;

    })


    
    let hsum = 0;

    for (let i = 0; i < e.detail.states.length; i++) {
        hsum += e.detail.states[i].hcount;
    }
    console.log(hsum);

    let msum = 0;

    for (let i = 0; i < e.detail.states.length; i++) {
        msum += e.detail.states[i].mcount;
    }
    console.log(msum);



    navigator.clipboard.writeText(` ${e.detail.day.date}\n\n` + text.replace('undefined', '') + hsum+ "  " +  msum);
})





})

