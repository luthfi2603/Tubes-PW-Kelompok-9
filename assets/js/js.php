// untuk tombol lihat dan tutup password
function change(i){
    if(i == 1){
        var x = document.getElementById('password').type;
        if(x == 'password'){
            document.getElementById('password').type = 'text';
            document.getElementById('btn1').innerHTML = 'tutup';
        }else{
            document.getElementById('password').type = 'password';
            document.getElementById('btn1').innerHTML = 'lihat';
        }
    }else{
        var x = document.getElementById('konPass').type;
        if(x == 'password'){
            document.getElementById('konPass').type = 'text';
            document.getElementById('btn2').innerHTML = 'tutup';
        }else{
            document.getElementById('konPass').type = 'password';
            document.getElementById('btn2').innerHTML = 'lihat';
        }
    }
}

// untuk tombol back to the top
var backToTop = document.querySelector('.back-to-top');
window.addEventListener('scroll', () => {
    if (this.scrollY >= 100) {
        backToTop.classList.add('show');

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0 });
        })
    } else {
        backToTop.classList.remove('show');
    }
});
function PrintDiv(divName){
    var printContents = document.getElementById(divName).innerHTML;
    var orginialContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = orginialContents;
}