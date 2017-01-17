function plusMinus(likes, id)
{
    $.ajax('/likes/' + id + '/' + likes);

    var sansara = $('#likes' + id);
    var s = parseInt(sansara.text());
    sansara.text(s + (likes == 'minus' ? -1 : 1));
}


