let likes = document.querySelectorAll('.like');

if(likes) {
    for (let n = 0; n < likes.length; n++) {
        eventF.addEvent('click', likes[n], function (e) {
            let dataParams = {};

            dataParams.id = e.target.getAttribute('data-id');
            dataParams.liked = e.target.getAttribute('data-liked');
            dataParams.userId = document.getElementById('userId').value;

            AJAX.send({
                method: 'POST',
                url: './tasks/first/like.php',
                data: dataParams
            })
                .then(function (data) {
                    if(data.message == 'OK')
                    {
                        e.target.setAttribute('data-liked', 1);
                        e.target.classList.add('liked');
                    }
                    else if(data.message == 'DELETE')
                    {
                        e.target.setAttribute('data-liked', 0);
                        e.target.classList.remove('liked');
                    }
                    else
                    {
                        alert(data.message);
                    }
                });
        });
    }
}