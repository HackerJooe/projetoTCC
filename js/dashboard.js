$(document).ready(function(){
    $('#selector').on('change', function(id) {
        var selValue = '#'+$(this).val();
        console.log(selValue);
        var divs = document.querySelectorAll('.child');
        console.log(divs);
        divs.forEach((div) => {
            div.style.display = 'none';
        })
        $('#pai').children('.child').hide();
        $('#pai').children(selValue).show();
    })
})

