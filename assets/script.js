window.onload = function () {

    var input = document.querySelector('#click');
    var hide = document.querySelector('#hide');

    input.onclick = function () {
        var lolol = document.querySelectorAll('.place2');
        var name2 = document.querySelectorAll('.place2bis');
        for (var i = 0; i < lolol.length; i++) {

            lolol[i].style.visibility = 'visible';
            console.log(lolol);
            name2[i].style.visibility = 'visible';
        };
    }

    hide.onclick = function () {
        var lolol = document.querySelectorAll('.place2');
        var name2 = document.querySelectorAll('.place2bis');
        for (var i = 0; i < lolol.length; i++) {

            lolol[i].style.visibility = 'hidden';
            console.log(lolol);
            name2[i].style.visibility = 'hidden';
        };
    }
};