window.onload = function(){

    var input = document.querySelectorAll('.click');
    console.log(input);
    var lolol = document.querySelectorAll('.place2');

    console.log(name);
    var name2 = document.querySelectorAll('.place2bis');

    console.log(name2);

    for(i = 0; i<input.length;i++) {
        console.log('ok');
        input[i].onclick = function () {
            console.log('ok2');
            lolol[i].style.visibility = 'visible';
            console.log('ok3');
            name2[i].style.visibility = "visible";
            console.log('ok4');
        };
    }
};