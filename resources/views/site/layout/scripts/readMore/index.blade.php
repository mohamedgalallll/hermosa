<script>
    $(document).ready(function () {
        var txt = document.getElementById('txt').textContent,
            txtOnly = document.getElementById('txt'),
            btn = document.getElementById('read'),
            subTxt = txt.substring(0,100);

        txtOnly.style.display ="none";

        function txtD(){

            if(txt.length > 100) {
                txtOnly.innerHTML = subTxt;
                txtOnly.style.display="block";
            }
            else {
                txtOnly.innerHTML = txt;
            }
        }
        txtD();
        btn.onclick = function () {
            'use strict';
            if(btn.classList.contains('more')) {
                btn.classList.remove('more');
                btn.classList.add('less');
                btn.textContent = trans('web.readLess')";
                txtOnly.innerHTML = txt;
            }
            else {
                btn.classList.remove('less');
                btn.classList.add('more');
                btn.textContent = trans('web.readMore');
                txtOnly.innerHTML = subTxt;
            }
        };
    });
</script>
