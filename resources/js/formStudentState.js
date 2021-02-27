window.addEventListener('load', () => {

    //list =>[1= اولشخص يسمع 2= تسميع بدون اخطاء 3= تكرار الحفظ]     click checkbox 
    list_container = document.querySelector('#list_container')

    list_container.querySelectorAll('.chk_js').forEach(element => {

        var checkbox = element.querySelector('input[type="checkbox"]');

        element.onclick = () => checkbox.click();

    });
    //----------------------------------------------
    // one blue star sticker  click checkbox
    sticker = document.querySelector('#sticker');
    sticker_input = document.querySelector('#sticker_input');

    sticker.onclick = () => sticker_input.click();
    //----------------------------------------------
    //three stars chang color on hover and set color on click it and choise radio input
    startings = [
        document.querySelector('#staring-1'),
        document.querySelector('#staring-2'),
        document.querySelector('#staring-3')
    ];

    radios = [
        document.querySelector('#star-1'),
        document.querySelector('#star-2'),
        document.querySelector('#star-3')
    ]

    startings.forEach((e, i) => e.addEventListener('mouseenter', e => onMouseEnterStar(i, this)))

    startings.forEach((e, i) => e.addEventListener('click', e => onMouseClickStar(i, this)))


    function onMouseEnterStar(snum, ele) {
        startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-500') : e.classList.remove('text-indigo-500'))
    }

    function onMouseClickStar(snum, ele) {
        radios[snum].click()
        startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-700') : null)
    }
    //----------------------------------------------
})