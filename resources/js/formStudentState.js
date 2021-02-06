
window.addEventListener('load', () => {

    list_container = document.querySelector('#list_container')

    list_container.querySelectorAll('.chk_js').forEach(element => {

        var checkbox = element.querySelector('input[type="checkbox"]');

        element.onclick = function () {

            checkbox.click();

        }
    });


    sticker = document.querySelector('#sticker');
    sticker_input = document.querySelector('#sticker_input');

    sticker.onclick = () => sticker_input.click();


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


    startings.forEach((e, i) => e.addEventListener('mouseenter', e => onMouseEnterStare(i, this)))

    startings.forEach((e, i) => e.addEventListener('mouseleave', e => onMouseleaveStare(i, this)))

    startings.forEach((e, i) => e.addEventListener('click', e => onMouseClickStare(i, this)))




    function onMouseEnterStare(snum, ele) {
        startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-500') : null)
    }
    function onMouseleaveStare(snum, ele) {
        startings.forEach((e, i) => i <= snum ? e.classList.remove('text-indigo-500') : null)
    }
    function onMouseClickStare(snum, ele) {
        radios[snum].click()
        startings.forEach((e, i) => i <= snum ? e.classList.add('text-indigo-700') : null)

    }

    // star_1.onclick = ()=>{
    //     star_2.checked = false;
    //     star_3.checked = false;

    //     if (star_2.checked) {
    //        setTimeout(()=>{
    //            star_2.click()
    //        },1000) 
    //     }
    //     if (star_3.checked) {
    //         star_3.click()
    //     }
    // }



})
